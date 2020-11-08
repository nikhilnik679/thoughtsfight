<?php
include 'header.php';
include 'footer.php';
include 'dbConnect.php';

$obj = new dbConnect();
$table = 'authors';
$msg = "";

if (isset($_POST['login'])) {
	$username = trim($_POST['your-email']);
	$password = trim($_POST['password']);

	if ($username != "" && $password != "") {
		$condition = "`username`= '$username' and `password`= '$password'";

		$row = $obj->readData($table, $condition);
		if (!empty($row)) {
			echo "done";
			session_start();
			$_SESSION['username'] = $row[0]['username'];
			echo "<script>location.href='index.php';</script>";
		} else {
			$msg = "Invalid username and password!";
		}
	} else {
		$msg = "Both fields are required!";
	}
}
?>
<div class="page-content">
	<span class="loginMsg"><?php echo @$msg; ?></span>
	<div class="form-v5-content">
		<form class="form-detail" action="#" method="post">
			<h2>login</h2>
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
				<input type="submit" name="login" class="login" value="Login">
			</div>
		</form>
	</div>
</div>