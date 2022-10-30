<?php

	require "logic.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<!-- Link CSS -->
	<link rel="stylesheet" href="css/trackerCSS.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/578ea8ad42.js" crossorigin="anonymous"></script>

	<title>Document</title>
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

	<div class="container">
		<h1 style="text-align: center;">COVID-19 TRACKER</h1>
		<br> <br>
		<div style="overflow-x: auto;">
			<table width="100%" cellpadding="20" class="table table-striped table-bordered">
				<tr>
					<th>NO</th>
					<th>Negara</th>
					<th>Confirmed</th>
					<th>Recovered</th>
					<th>Deceased</th>
				</tr>
				<?php $no = 1; ?>
				<?php foreach ($data as $key => $value) : ?>
					<tr>
						<td>
							<?= $no ?>
						</td>
						<td>
							<?= $key; ?>
						</td>
						<td>
							<?= $value[$days_count]['confirmed']; ?>
						</td>
						<td>
							<?= $value[$days_count]['recovered']; ?>
						</td>
						<td>
							<?= $value[$days_count]['deaths']; ?>
						</td>
					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<script src="js/tracker.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
