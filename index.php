<?php
include 'header.php';
include 'footer.php';
include "dbConnect.php";


$obj = new dbConnect();
$table = 'articles';
$author_name = '';
$condition = 'ORDER BY YEAR(date_published) DESC , MONTH(date_published) DESC , DAY(date_published) DESC';
$result = $obj->readData($table,$condition);
$tableAuthor = 'authors';
$condition2 = '';

function getAuthorName($author_id){
  $obj = new dbConnect();
  $condition2 = " authors where author_id= '$author_id' ";
  $result =  $obj->readData('authors',$condition2,'name');
  return $result[0]['name'];
}

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
              <p class='articleText'><?= getAuthorName($list['author_id']); ?></p>
              <p class='articleText'><?= substr($list['article_body'],0, 120);?></p>
            
          <?php endforeach; ?>
      </div>
  <article>
</div>