<?php

class Article{

    public $title = "";
    public $descr = "";
    public $pict = "";

    public function insertArticle(){
        $bdd = new PDO("mysql:host=localhost;dbname=newblog;charset=utf8","root","");
        $req = $bdd->prepare("INSERT INTO `articles`(`title`, `description`, `pict`) VALUES ('$this->title', '$this->descr', '$this->pict')");
        $req->execute();

        return $bdd->lastInsertId();
    }

    public function updateArticle($id){
        $bdd = new PDO("mysql:host=localhost;dbname=newblog;charset=utf8","root","");
        $req = $bdd->prepare("UPDATE articles SET `title`='$this->title', `description`='$this->descr', `pict`='$this->pict' WHERE id='$id'");
        

        return $req->execute();
    }

    public function getArticles(){
        $bdd = new PDO("mysql:host=localhost;dbname=newblog;charset=utf8","root","");
        //$conArticle = $bdd->prepare("SELECT * FROM articles");

        $articles = $bdd->query("SELECT * FROM articles");
        $articles = $articles->fetchAll();
        return $articles;

    }

    public function getSpeArticle($id){
        $bdd = new PDO("mysql:host=localhost;dbname=newblog;charset=utf8","root","");
        $conArticle = $bdd->prepare("SELECT * FROM articles WHERE id=:id");
        $conArticle->execute(['id' => $id]); 
        $article = $conArticle->fetch();

        if(!empty($article)){

            $this->setTitle($article["title"]);
            $this->setDescription($article["description"]);
            $this->setPict($article["pict"]);

            return true;
        }else{

            return false;
        }

    }
    public function getOneArticle($id){
        $bdd = new PDO("mysql:host=localhost;dbname=newblog;charset=utf8","root","");
        $conArticle = $bdd->prepare("SELECT * FROM articles WHERE id=:id");
        $conArticle->execute(['id' => $id]); 
        $article = $conArticle->fetch();
        return $article;

    }

    public function deleteOneArticle($id){
        $bdd = new PDO("mysql:host=localhost;dbname=newblog;charset=utf8","root","");
        $conArticle = $bdd->prepare("DELETE FROM articles WHERE id=:id");
        $conArticle->execute(['id' => $id]); 
        $article = $conArticle->fetch();
        return $article;

    }

    public function getTitle(){

        return $this->title;
    }

    public function setTitle($val){

        $this->title = $val;

        return $this->title;
    }

    public function getDescription(){

        return $this->descr;
    }

    public function setDescription($Description){

        $this->descr = $Description;

        return $this->descr;
    }

    public function getPict(){

        return $this->pict;
    }

    public function setPict($pict){

        $this->pict = $pict;

        return $this->pict;
    }
    

}

?>