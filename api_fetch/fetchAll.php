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

$json = file_get_contents('https://data.covid19.go.id/public/api/update.json');
$obj = json_decode($json);
$x = 0;

foreach ($obj->update->harian as &$content) {
    $id = substr($content->key_as_string, 0, 10);
    $jumlah_meninggal = $content->jumlah_meninggal->value;
    $jumlah_sembuh = $content->jumlah_sembuh->value;
    $jumlah_positif = $content->jumlah_positif->value;
    $jumlah_dirawat = $content->jumlah_dirawat->value;
    $jumlah_positif_kum = $content->jumlah_positif_kum->value;
    $jumlah_sembuh_kum = $content->jumlah_sembuh_kum->value;
    $jumlah_meninggal_kum = $content->jumlah_meninggal_kum->value;
    $jumlah_dirawat_kum = $content->jumlah_dirawat_kum->value;

    $sql = "INSERT INTO $db_table (
      id, jumlah_meninggal, jumlah_sembuh, jumlah_positif, jumlah_dirawat,
      jumlah_positif_kum, jumlah_sembuh_kum, jumlah_meninggal_kum, jumlah_dirawat_kum
    ) VALUES (
      '$id', '$jumlah_meninggal', '$jumlah_sembuh', '$jumlah_positif', '$jumlah_dirawat',
      '$jumlah_positif_kum', '$jumlah_sembuh_kum', '$jumlah_meninggal_kum', '$jumlah_dirawat_kum'
    )";

    if(!mysqli_query($conn, $sql)){
        echo("Fetch Number [" . $x . "] Failed, Error description: " . $conn -> error . "<br>");
    }

    $x = $x + 1;

}

?>
