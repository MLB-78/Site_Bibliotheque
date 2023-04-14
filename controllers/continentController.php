<?php 

$action = $_GET['action'];
switch($action){
    case 'list':
        $lesContinents = Continent::findAll();
        include('vues/continent/listeContinent.php');
        break;
    case 'add' : 
        $mode = "Ajouter";
        include("vues/continent/formContinent.php");
    break;
    case 'update' :
        $mode = "Modifier";
        $continent = Continent::findById($_GET['num']);
        include("vues/continent/formContinent.php");
    break;
    case 'delete' :
        $continent = Continent::findById($_GET['num']);
        $nb = Continent::delete($continent);
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess" => "Le continent a bien été supprimé "];

        } else {
            
            $_SESSION['message']=["danger" => "Le continent n'a pas été supprimer "];
        }
        header("location: index.php?uc=continents&action=list");
        exit();
    break;
    case 'valideForm' :

        $continent = new Continent();

        if (empty($_POST['num'])) {
            
            $continent->setLibelle($_POST['libelle']);
            $nb = Continent::add($continent);
            $message = 'ajouté';

        }else { 

            $continent->setNum($_POST['num']);
            $continent->setLibelle($_POST['libelle']);
            $nb = Continent::update($continent);
            $message = 'modifié';
        }
        // Si sa c'est bien passéS
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess"=>"Le continent a bien été $message "];

        } else {
            
            $_SESSION['message']=["danger"=>"Le continent a bien été $message "];

        }

        header("location: index.php?uc=continents&action=list");
        exit();
    break;
    
}



