<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

session_start();
$author = $_SESSION['username'];
$author_id = $_SESSION['author_id'];

$obj = new dbConnect();
$table = 'articles';
$condition = " where `author_id`= '$author_id' ";
$result = $obj->readData($table, $condition);
?>

<div class="container content-box">
    <article>
        <div class="article">
            <?php foreach ($result as $list) : ?>
                <a href="viewArticle.php?id=<?= $list['article_id']; ?>">
                    <h4 class='articleHeading'><?= $list['article_title']; ?></h4>
                </a>
                <hr>
                <p class='articleText'><?= $list['article_body']; ?></p>
                <div>
                    <a href="editArticle.php?id=<?= $list['article_id'];
                                                $_SESSION['article_id'] = $list['article_id']; ?>" class="btn btn-danger">
                        <h4 class='articleHeading'> Edit </h4>
                    </a>

                    <a href="deleteArticle.php?id=<?= $list['article_id']; ?>" class="btn btn-danger">
                        <h4 class='articleHeading'> Delete </h4>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <article>
</div>