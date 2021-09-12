<?php
echo $viewId;
if ( $viewId == "" ){
   $rout = "route.php?action=NewArticle";
}else{
  $rout = "route.php?action=UpdateArticle&id=".$viewId;
}
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
    <form action=<?= $rout ?> method="post" enctype="multipart/form-data">
    <div>
        <label for="title">titre :</label>
        <input type="text" id="title" name="title" value=<?= $viewTitle ?> >
    </div>
    <div>
        <label for="description">description :</label>
        <input type="text" id="description" name="description" value=<?= $viewDescription ?> >
    </div>
    <div>
        <label for="picts">pict :</label>
        <input type="file" id="picts" name="picts" value=<?= $viewPict ?> >
    </div>
    <div class="button">
        <button type="submit">Envoyer l'article</button>
    </div>
</form>
  </body>
</html>