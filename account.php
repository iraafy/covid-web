<?php 

$conn = mysqli_connect("localhost", "root", "", "tubes");

session_start();

if(isset($_SESSION["login"]))
{
    header("Location: home.html");
    exit;
}

if ( isset($_POST["login"]) )
{

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	
	//cek username
	if( mysqli_num_rows($result) === 1) 
	{
		//cek pass
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]))
		{
			//set session
			$_SESSION["login"] = true;
			header("Location: home.html");
			exit;
		}

	}
	$error = true;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- Link CSS -->
	<link rel="stylesheet" href="css/accountCSS.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/578ea8ad42.js" crossorigin="anonymous"></script>
	<title>REGIST</title>

</head>
<body>
	<nav class="navbar navv navbar-expand-lg navbar-light fixed-top">
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
					<li class="nav-item">
						<a class="nav-link" href="regist.php">Registrasi &emsp;&emsp;</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br><br>

	<div class="container top">
		<div class="row justify-content-center" data-aos="fade-up">
			<div class="col-lg col-sm-12 flx p1">
				<img src="img/login.svg" style="margin: 0 auto;" width="90%">
			</div>
			<div class="col-lg col-sm-12 p1">
				<div class="wrapper xtop">
					<?php if (isset($error)) : ?>
						<p style="color: red;">user name dan password tidak terdaftar!</p>
					<?php endif; ?>
					<h3 style="text-align: center; color: rosybrown;">MASUK</h3>
					<hr style="background-color: rosybrown;">
					<form action="" method="POST">
						
						<label for="username">Username:</label>
						<br>
						<input placeholder="Name" type="text" name="username" class="inputt" required>
						<br><br>					
						
						<label for="password">Password:</label>
						<br>
						<input placeholder="Password" type="password" name="password" class="inputt" required>
						<br>

						<br><br>
						<button type="submit" class="submitt flx" name="login">LOGIN</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- SCRIPT -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html>