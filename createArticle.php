<?php
include 'header.php';
include 'footer.php';
include 'dbConnect.php';

session_start();
$author = $_SESSION['username'];
$author_id = $_SESSION['author_id'];

$obj = new dbConnect();
$table = 'articles';
$data = '';
$result = '';

if (isset($_POST['create'])) {
	$title = $_POST['blog-title'];
	$blog = $_POST['blog'];

	$field = "`article_body`, `article_title`, `author_id`";
	$value = " '$blog', '$title', '$author_id' ";

	$result = $obj->createData($table, $field, $value);

	echo "<script>location.href='index.php';</script>";
}
?>

<div class="page-content">
	<div class="form-v5-content">
		<form class="form-detail" action="#" method="post">
			<div class="form-row">
				<label for="blog-title">Title</label>
				<input type="text" name="blog-title" id="blog-title" class="input-text" required>
			</div>
			<div class="form-row">
				<label for="blog">Article </label>
				<textarea class="form-control" name="blog" rows="12" cols="55" id="blog"></textarea>
			</div>
			<div class="form-row-last">
				<input type="submit" name="create" class="register" value="Create">
			</div>
		</form>
	</div>
</div>