<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

session_start();
$author = $_SESSION['username'] ;

$obj = new dbConnect();
$table = 'articles';
$condition = '';
$result = $obj->readData($table);
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

                    <a href="editArticle.php?id=<?= $list['article_id']; ?>" class="btn btn-danger">
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