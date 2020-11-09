<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

$obj = new dbConnect();
$table = 'articles';
$result = '';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $condition = "where `article_id` = '$id' ";
    $result = $obj->deleteData($table, $condition);
    
}
echo "<script>location.href='myArticles.php';</script>";

?>

