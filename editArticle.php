<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

$obj = new dbConnect();
$table = 'articles';
$result = '';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $condition = "where `article_id`= '$id' ";
    $result = $obj->updateData($table, $condition);
    
}

// echo "<script>location.href='myArticles.php';</script>";
?>

<div class="container content-box">
    <div class="article">
        <h4 class="articleHeading"><?= $result[0]['article_title']; ?></h4>
        <hr>
        <p class="articleText"><?= $result[0]['article_body']; ?></p>
    </div>
</div>

