<?php

$db_location = "127.0.0.1";
$db_user = "user_php";
$db_password = "password_php";
$db_dbname = "db_ira";
$db_table = "dataCovidIndonesia";
/*+--------------------+------------------+------+-----+---------+-------+
| Field                | Type             | Null | Key | Default | Extra |
+----------------------+------------------+------+-----+---------+-------+
| id                   | date             | NO   | PRI | NULL    |       |
| jumlah_meninggal     | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_sembuh        | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_positif       | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_dirawat       | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_positif_kum   | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_sembuh_kum    | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_meninggal_kum | int(10) unsigned | NO   |     | NULL    |       |
| jumlah_dirawat_kum   | int(10) unsigned | NO   |     | NULL    |       |
+----------------------+------------------+------+-----+---------+-------+*/

$conn = mysqli_connect($db_location, $db_user, $db_password, $db_dbname);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//Get JSON File From API
$json = file_get_contents('https://data.covid19.go.id/public/api/update.json');
$obj = json_decode($json);

//Get Updated Data From API
$id = substr($obj->update->penambahan->tanggal, 0, 10);
$jumlah_meninggal = $obj->update->penambahan->jumlah_meninggal;
$jumlah_sembuh = $obj->update->penambahan->jumlah_sembuh;
$jumlah_positif = $obj->update->penambahan->jumlah_positif;
$jumlah_dirawat = $obj->update->penambahan->jumlah_dirawat;

//Get Previous Date From Current Date
$id_prev = substr($obj->update->penambahan->tanggal, 8, 10);
$id_prev = $id_prev - 1;
if($id_prev < 10){
    $id_prev = substr($obj->update->penambahan->tanggal, 0, 8) . "0" . $id_prev;
} else {
    $id_prev = substr($obj->update->penambahan->tanggal, 0, 8) . $id_prev;
}

//Get Data From Previous Date
$sql = "SELECT jumlah_positif_kum, jumlah_sembuh_kum, jumlah_meninggal_kum, jumlah_dirawat_kum FROM $db_table WHERE id='$id_prev'";
$result = mysqli_query($conn, $sql);
$data_prev = mysqli_fetch_assoc($result);
$jumlah_positif_kum = $data_prev["jumlah_positif_kum"] + $jumlah_positif;
$jumlah_sembuh_kum = $data_prev["jumlah_sembuh_kum"] + $jumlah_sembuh;
$jumlah_meninggal_kum = $data_prev["jumlah_meninggal_kum"] + $jumlah_meninggal;
$jumlah_dirawat_kum = $data_prev["jumlah_dirawat_kum"] + $jumlah_dirawat;

//Check if data doesn't exists
if(mysqli_num_rows( mysqli_query($conn, "SELECT id FROM $db_table WHERE id='$id'") ) < 1) {
    $sql = "INSERT INTO $db_table (
        id, jumlah_meninggal, jumlah_sembuh, jumlah_positif, jumlah_dirawat,
        jumlah_positif_kum, jumlah_sembuh_kum, jumlah_meninggal_kum, jumlah_dirawat_kum
    ) VALUES (
        '$id', '$jumlah_meninggal', '$jumlah_sembuh', '$jumlah_positif', '$jumlah_dirawat',
        '$jumlah_positif_kum', '$jumlah_sembuh_kum', '$jumlah_meninggal_kum', '$jumlah_dirawat_kum'
    )";

    if(!mysqli_query($conn, $sql)){
        echo("Fetch Failed, Error description: " . $conn -> error . "<br>");
    }
}

?>
