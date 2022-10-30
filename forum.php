<?php

session_start();

if( !isset($_SESSION["login"]))
{
    header("Location: account.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- Link CSS -->
	<link rel="stylesheet" href="css/forumCSS.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/578ea8ad42.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navMenu navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" style="color: orange;" href="home.html"><b>COVID-FORUM</b></a>
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
						<a class="nav-link" href="logout.php">LogOut &emsp;&emsp;</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<br><br><br><br>
	<h2 align="center">Mari Tanya Ahlinya</h2>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-sm-12"></div>
			<div class="col-lg-8 col-sm-12">
				<form method="POST" id="comment_form">
					<div class="form-group">
						<input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
					</div>
					<div class="form-group">
						<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="comment_id" id="comment_id" value="0" />
						<br>
						<input type="submit" name="submit" id="submit" class="flex btn btn-warning" value="Submit" />
					</div>
				</form>
				<span id="comment_message"></span>
				<br />
				<div id="display_comment"></div>
			</div>
			<div class="col-lg-2 col-sm-12"></div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function()
		{
			$('#comment_form').on('submit', function(event)
			{
				event.preventDefault();
				var form_data = $(this).serialize();
				$.ajax
				({
					url:"add_comment.php",
					method:"POST",
					data:form_data,
					dataType:"JSON",
					success:function(data)
					{
						if(data.error != '')
						{
							$('#comment_form')[0].reset();
							$('#comment_message').html(data.error);
							$('#comment_id').val('0');
							load_comment();
						}
					}
				})
			});

			load_comment();
			function load_comment()
			{
				$.ajax
				({
					url:"fetch_comment.php",
					method:"POST",
					success:function(data)
					{
						$('#display_comment').html(data);
					}
				})
			}
			$(document).on('click', '.reply', function()
			{
				var comment_id = $(this).attr("id");
				$('#comment_id').val(comment_id);
				$('#comment_name').focus();
			});
		});
	</script>

</body>
</html>
