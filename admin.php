<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/form.css">
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="images/novirus.png" rel="icon" type="image/png"/>
</head>
<body>
	<?php include("nav.html"); ?>
	<div class="main-container login my-3">
		<div><img src="avatar.png" class="avatar"></div>
		<h1>Admin Login</h1>
		<form action="control.php" method="post">
			<div class="input-field">
				<input type="text" name="adminid" required>
				<label>Admin-ID</label>
			</div>
			<div class="input-field">
				<input type="Password" name="password" required>
				<label>Password</label>
			</div>
			<div class="input-field btn">
				<input class="btn btn-outline-info" type="submit" name="submit_btn" value="Login">
				<center style="color: #fff">Or</center>
				<input class="btn btn-outline-info" type="reset" value="Clear all">
			</div>
		</form>
	</div>

	<!--scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
</body>
</html>