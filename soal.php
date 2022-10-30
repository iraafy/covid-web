<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<!-- Link CSS -->
	<link rel="stylesheet" href="css/soalCSS.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/578ea8ad42.js" crossorigin="anonymous"></script>
	<script src="function.js"></script>

	<!-- Title -->
	<title>TUBES</title>
</head>
<body>
	<nav class="navbar navMenu navbar-expand-lg navbar-dark bg-dark fixed-top">
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
	<div class="container">
		<div class="row space">
			<table cellpadding="20">
				<form action="" method="post">
					<tr>
						<td>
							<label for="satu">Apakah anda keluar rumah akhir-akhir ini?</label> <br>
							<input class="form-check-input" type="radio" name="satu" id="satu" value="Ya"> Ya &emsp;
							<input class="form-check-input" type="radio" name="satu" id="satu" value="Tidak"> Tidak
						</td>
					</tr>
					<tr>
						<td>
							<label for="dua">Apakah anda merasa flu?</label> <br>
							<input class="form-check-input" type="radio" name="dua" id="dua" value="Ya"> Ya &emsp;
							<input class="form-check-input" type="radio" name="dua" id="dua" value="Tidak"> Tidak
						</td>
					</tr>
					<tr>
						<td>
							<label for="tiga">Apakah anda merasa batuk?</label> <br>
							<input class="form-check-input" type="radio" name="tiga" id="tiga" value="Ya"> Ya &emsp;
							<input class="form-check-input" type="radio" name="tiga" id="tiga" value="Tidak"> Tidak
						</td>
					</tr>
					<tr>
						<td>
							<label for="empat">Apakah anda merasa sakit tenggorokan?</label> <br>
							<input class="form-check-input" type="radio" name="empat" id="empat" value="Ya"> Ya &emsp;
							<input class="form-check-input" type="radio" name="empat" id="empat" value="Tidak"> Tidak
						</td>
					</tr>
					<tr>
						<td>
							<label for="lima">Apakah anda merasa tidak bisa mencium bau?</label> <br>
							<input class="form-check-input" type="radio" name="lima" id="lima" value="Ya"> Ya &emsp;
							<input class="form-check-input" type="radio" name="lima" id="lima" value="Tidak"> Tidak
						</td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="submit" class="btn btn-danger">Submit</button>
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

<?php

	require "hasil.php";

	if(isset($_POST['submit']))
	{
		$soal1 = $_POST['satu'];
		$soal2 = $_POST['dua'];
		$soal3 = $_POST['tiga'];
		$soal4 = $_POST['empat'];
		$soal5 = $_POST['lima'];
		$ya = 'Ya';
		$tidak = 'Tidak';

		if( ($soal1 == $ya) && ($soal2 == $ya) && ($soal3 == $ya) && ($soal4 == $ya) && ($soal5 == $ya) ) {
			tampil1();
		}
		else if( ($soal1 == $tidak) && ($soal2 == $ya) && ($soal3 == $ya) && ($soal4 == $ya) && ($soal5 == $ya) ) {
			tampil2();
		}
		else if( ($soal1 == $tidak) && ($soal2 == $tidak) && ($soal3 == $tidak) && ($soal4 == $tidak) && ($soal5 == $tidak) ) {
			tampil3();
		}
		else {
			tampil4();
		}
	}

?>
