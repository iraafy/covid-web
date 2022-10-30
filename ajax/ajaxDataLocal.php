<?php

  $db_location = "127.0.0.1";
  $db_user = "user_php";
  $db_password = "password_php";
  $db_dbname = "db_ira";
  $conn = mysqli_connect($db_location, $db_user, $db_password, $db_dbname);
	$keyword = $_GET["keyword"];
	if (!$conn) {
        die ("Connection failed: " .mysqli_connect_error());
	}

	function query($query) {

		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

    $query = "SELECT id, jumlah_positif_kum, jumlah_dirawat_kum, jumlah_sembuh_kum, jumlah_meninggal_kum FROM dataCovidIndonesia WHERE id LIKE '%$keyword%' ORDER BY id DESC";
	$sql = query($query);



?>

<table class="table table-hover table-striped table-bordered" cellpadding="20px">
    <tr>
        <th>Tanggal</th>
        <th>Positif</th>
        <th>Dirawat</th>
        <th>Sembuh</th>
        <th>Meninggal</th>
    </tr>
	<?php foreach ($sql as $row) : ?>
        <tr style="text-align: justify;">
            <td> <?= $row['id']; ?> </td>
            <td> <?= $row['jumlah_positif_kum']; ?> </td>
            <td> <?= $row['jumlah_dirawat_kum']; ?> </td>
            <td> <?= $row['jumlah_sembuh_kum']; ?> </td>
            <td> <?= $row['jumlah_meninggal_kum']; ?> </td>
        </tr>
	<?php endforeach; ?>
</table>
