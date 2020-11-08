<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

$obj = new dbConnect();
$table = 'authors';

if (isset($_POST['register'])) {

	$name = $_POST['full-name'];
	$username =  $_POST['your-email'];
	$password =  $_POST['password'];

	$field = "  `name`, `username`, `password`, `author_articles` ";
	$value = "  '$name', '$username', '$password', ' ' ";

	$obj->createData($table, $field, $value);
	echo "<script>location.href='login.php';</script>";
}
?>
<div class="page-content">
	<div class="form-v5-content">
		<form class="form-detail" action="#" method="post">
			<h2>Registeration</h2>
			<div class="form-row">
				<label for="full-name">Full Name</label>
				<input type="text" name="full-name" id="full-name" class="input-text" placeholder="Your Name" required>
				<i class="fas fa-user"></i>
			</div>
			<div class="form-row">
				<label for="your-email">Your Email</label>
				<input type="text" name="your-email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				<i class="fas fa-envelope"></i>
			</div>
			<div class="form-row">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
				<i class="fas fa-lock"></i>
			</div>
			<div class="form-row-last">
				<input type="submit" name="register" class="register" value="Register">
			</div>
		</form>
	</div>
</div>