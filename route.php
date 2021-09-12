<?php
require_once("controller/articleController.php");

$articleController = new articleController;

if( isset($_GET["action"]) ){
    $action = $_GET["action"];
}else{
    $action = false;
}



if($action == "NewArticle"){
    $articleController->addArticle();
}elseif($action == "UpdateArticle" && $_GET["id"] != ""){
    $articleController->uppdateArticle($_GET["id"]);
}elseif($action == "showOneArticle" && $_GET["id"] != ""){
    $articleController->getOneArticle($_GET["id"]);
}elseif($action == "deleteArticle" && $_GET["id"] != ""){
    $articleController->deleteArticle($_GET["id"]);
}else{
    $articleController->getArticles();
}

?>