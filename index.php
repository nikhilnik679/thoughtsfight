<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";

$obj = new dbConnect();
$table = 'articles';
$condition = 'ORDER BY YEAR(date_published) DESC , MONTH(date_published) DESC , DAY(date_published) DESC';
$result = $obj->readData($table,$condition);
?>

<div class="container content-box">
  <article>
      <div class="article">
          <?php foreach ($result as $list) : ?>
              <a href="viewArticle.php?id=<?= $list['article_id']; ?>">
                <h4 class='articleHeading'><?= $list['article_title']; ?></h4>
              </a>
              <hr>
              <p class='articleText'><?= $list['date_published']; ?></p>
              <p class='articleText'><?= $list['article_body']; ?></p>
            
          <?php endforeach; ?>
      </div>
  <article>
</div>