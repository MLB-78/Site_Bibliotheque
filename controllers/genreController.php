<?php 

$action = $_GET['action'];
switch ($action){

    case 'list':
        $lesGenres = Genre::findAll();
        include('vues/genre/listeGenre.php');
    break;
    case 'add' : 
        $mode = "Ajouter";
        include("vues/genre/formGenre.php");
    break;
    case 'update' :
        $mode = "Modifier";
        $genre = Genre::findById($_GET['num']);
        include("vues/genre/formGenre.php");
    break;
    case 'delete' :
        $genre = Genre::findById($_GET['num']);
        $nb = Genre::delete($genre);
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess" => "Le genre a bien été supprimé "];

        } else {
            
            $_SESSION['message']=["danger" => "Le genre n'a pas été supprimer "];
        }
        header("location: index.php?uc=genres&action=list");
        exit();
    break;
    case 'valideForm' :

        $genre = new Genre();

        if (empty($_POST['num'])) {
            
            $genre->setLibelle($_POST['libelle']);
            $nb = Genre::add($genre);
            $message = 'ajouté';

        }else { 

            $genre->setNum($_POST['num']);
            $genre->setLibelle($_POST['libelle']);
            $nb = Genre::update($genre);
            $message = 'modifié';
        }
        // Si sa c'est bien passéS
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess"=>"Le genre a bien été $message "];

        } else {
            
            $_SESSION['message']=["danger"=>"Le genre a bien été $message "];

        }

        header("location: index.php?uc=genres&action=list");
        exit();
    break;
    
}



