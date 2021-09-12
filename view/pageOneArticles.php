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
    $routDelete = "route.php?action=deleteArticle&id=".$viewArticle["id"]; 
    $routUpdate = "route.php?action=UpdateArticle&id=".$viewArticle["id"]; 
    ?>
    <div>
      titre : <?=$viewArticle["title"] ?> ||
      description : <?=$viewArticle["description"] ?> ||
      <?php
      if(is_dir($viewArticle["pict"])){
        foreach(scandir($viewArticle["pict"]) as $namePict){
          $infosfichier = pathinfo($namePict);
          if( $infosfichier['extension'] == "png" || $infosfichier['extension'] == "jpg" || $infosfichier['extension'] == "gif"){
  
            echo "<img src=".$viewArticle["pict"]."/0.".$infosfichier['extension'].">";
  
          }
        }
      }
      ?>
      <a href=<?=$routDelete ?>>delete</a>
      <a href=<?=$routUpdate ?>>update</a>
      <br>
      -------------------------------------------
    </div>

  </body>
</html>