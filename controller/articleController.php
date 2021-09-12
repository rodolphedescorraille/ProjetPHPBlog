<?php


require_once("model/article.php");


class articleController{


    public function addArticle(){

        //variable pour la vue
        $viewTitle = "";
        $viewDescription = "";
        $viewPict= "";
        $viewId = "";

        //si le form est remplie
        if(isset($_POST["title"] ) && $_POST["title"] != "" && 
        isset($_POST["description"] ) && $_POST["description"] != "" && 
        isset($_FILES)){

            //gestion des images
            $infosfichier = pathinfo($_FILES['picts']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            $rep ='undifine';
            
            if (in_array($extension_upload, $extensions_autorisees))
            {
                //stockage des images
                print_r($infosfichier['extension']);
                $rep = uniqid();
                $rep = "pict/".$rep;
                mkdir($rep);
                move_uploaded_file($_FILES['picts']['tmp_name'], $rep."/"."0.".$infosfichier['extension']) ;
            }

            //création de l'article
            $article = new article;
            $viewTitle = $article->setTitle($_POST["title"]);
            $viewDescription = $article->setDescription($_POST["description"]);
            $viewPict= $article->setPict($rep);
            //injection de l'article
            $viewId = $article->insertArticle();

            if( $viewId > 0){
                print_r ("enregristrer");
                
            }else{
                print_r ("non enregistrer");
            }
        }
        include("view\makeArticleView.php");
    }

    public function uppdateArticle($id){

        $article = new article;
        //variable pour la vue
        $viewId = $id; 
        $viewTitle = "";
        $viewDescription = "";
        $viewPict= "";
        
        if($article->getSpeArticle($id) != false){
            
            //on récupère les infos de l'article
            $viewTitle = $article->getTitle();
            $viewDescription = $article->getDescription();
            $viewPict= $article->getPict();

            if(isset($_POST["title"] ) && $_POST["title"] != "" && 
            isset($_POST["description"] ) && $_POST["description"] != "" ){

                //modification des infos de l'article
                $viewTitle = $article->setTitle($_POST["title"]);
                $viewDescription = $article->setDescription($_POST["description"]);

                // si une nouvelle image est selectioné
                if($_FILES["picts"]["error"] == 0){
                     //gestion des images
                    $infosfichier = pathinfo($_FILES['picts']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    $rep =$viewPict;
                    
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                        //stockage des images
                        foreach(scandir($rep) as $namePict){
                          $infos = pathinfo($namePict);
                          if( $infos['extension'] == "png" || $infos['extension'] == "jpg" || $infos['extension'] == "gif"){
                            
                            //supression enscien fichier
                            unlink($rep."/0.".$infos['extension']);
                    
                          }
                        }
                        
                        move_uploaded_file($_FILES['picts']['tmp_name'], $rep."/"."0.".$infosfichier['extension']) ;
                    }

                }
                if( $article->updateArticle($id)){
                    print_r ("enregristrer");
                    
                }else{
                    print_r ("non enregistrer");
                }
            }

        }else{
            print_r("l'article n'existe pas");
        }

        
        include("view\makeArticleView.php");

    }

    public function deleteArticle($id){
        $article = new article;
        $viewArticle = $article->deleteOneArticle($id);
        include("view\deleteArticles.php");
    }

    public function getArticles(){
        $article = new article;
        $viewArticles = $article->getArticles();
        include("view\pageArticles.php");

    }

    public function getOneArticle($id){
        $article = new article;
        $viewArticle = $article->getOneArticle($id);
        include("view\pageOneArticles.php");
    }

    
}
?>