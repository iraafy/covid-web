<?php
	$db_location = "127.0.0.1";
	$db_user = "user_php";
	$db_password = "password_php";
	$db_dbname = "db_ira";
	$conn = mysqli_connect($db_location, $db_user, $db_password, $db_dbname);
	if (!$conn) {
		die ("Connection failed: " .mysqli_connect_error());
	}
	$select = "SELECT id, jumlah_positif_kum, jumlah_dirawat_kum, jumlah_sembuh_kum, jumlah_meninggal_kum FROM dataCovidIndonesia ORDER BY id DESC";
	$sql = mysqli_query($conn, $select);
?>

<!doctype html>
<html lang="en">
<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<!-- Link CSS -->
	<link rel="stylesheet" href="css/rsCSS.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/578ea8ad42.js" crossorigin="anonymous"></script>

	<!-- Title -->
	<title>TUBES</title>

</head>

<body>

	<nav class="navbar navMenu navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" style="color: white;" href="home.html"><b>COVID</b></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse a" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 a">
					<li class="nav-item">
						<a class="nav-link" href="home.html">Home &emsp;&emsp;</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="forum.php">Forum &emsp;&emsp;</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="rs.php">RS Rujukan &emsp;&emsp;</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tracker.php">Data Dunia &emsp;&emsp;</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="data_local.php">Data Local &emsp;&emsp;</a>
					</li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container space">
		<form action="" method="POST">
			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="keyword" id="keyword" autofocus placeholder="Masukan Tanggal Data Yang Ingin Dicari">
		</form>
		<br>
		<div style="overflow-x: auto;" id="bungkus">
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
		</div>
	</div>
	<br><br>

	<!-- Optional JavaScript; choose one of the two! -->
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="js/scriptDataLocal.js"></script>
	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->

</body>
</html>
