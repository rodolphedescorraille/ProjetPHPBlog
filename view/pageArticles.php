<?php
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Super Blogue</title>
  </head>
  <body>
    <?php
    include("menu.php");
    ?>
    <h1>SUPER BLOGUE</h1>
    <?php 
    foreach($viewArticles as $article){
    ?>
    <div>
    <?php 
    $rout = "route.php?action=showOneArticle&id=".$article["id"]; 
    $routDelete = "route.php?action=deleteArticle&id=".$article["id"]; 
    
    ?>
    <a href=<?=$rout ?>>
      titre : <?=$article["title"] ?> ||
      description : <?=$article["description"] ?> ||
      photo : <?=$article["pict"] ?> ||
    </a>
    <a href=<?=$routDelete ?>>delete</a>
      <br>
      -------------------------------------------
    </div>

    <?php
    }
    ?>
  </body>
</html>