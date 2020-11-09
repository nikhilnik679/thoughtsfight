<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

session_start();
$author = $_SESSION['username'];
$author_id = $_SESSION['author_id'];
$article_id = $_SESSION['article_id'];

$obj = new dbConnect();
$table = 'articles';
$result = '';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $condition = " where `article_id`= '$id' ";
    $result = $obj->readData($table, $condition);
}

if (isset($_POST['update'])) {
	$title = $_POST['blog-title'];
	$blog = $_POST['blog'];
    
    $query = "UPDATE `articles` SET `article_body` = '$blog', `article_title` = '$title' WHERE `article_id` = '$article_id' ";
	$obj->updateData($query);  
	echo "<script>location.href='myArticles.php';</script>";
}
?>

<div class="page-content">
	<div class="form-v5-content">
		<form class="form-detail" action="#" method="post">
			<div class="form-row">
				<label for="blog-title">Title</label>
				<input type="text" name="blog-title" id="blog-title" class="input-text" value="<?= $result[0]['article_title']; ?>" required>
			</div>
			<div class="form-row">
				<label for="blog"> Article </label>
				<textarea class="form-control" name="blog" rows="12" cols="55" id="blog" ><?= $result[0]['article_body']; ?></textarea>
			</div>
			<div class="form-row-last">
				<input type="submit" name="update" class="register" value="Update">
			</div>
		</form>
	</div>
</div>