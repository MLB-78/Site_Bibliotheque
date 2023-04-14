<?php

$action = $_GET['action'];
switch ($action){

    case 'list':
        // Traitement du formulaire de recherche 
        $libelle = "";
        $continentSel="Tous";
        if (!empty($_POST['libelle']) || !empty($_POST['continent'])){
            
            $libelle = $_POST['libelle'];
            $continentSel = $_POST['continent'];
        }
        $lesContinents = Continent::findAll();
        $lesNationalites = Nationalite::findAll($libelle, $continentSel);
        include('vues/nationalite/listeNationalite.php');
    break;
    case 'add' : 
        $mode = "Ajouter";
        $lesContinents = Continent::findAll();
        include("vues/nationalite/formNationalite.php");
    break;
    case 'update' :
        $mode = "Modifier";
        $lesContinents = Continent::findAll();
        $nationalite = Nationalite::findById($_GET['num']);
        include("vues/nationalite/formNationalite.php");
    break;
    case 'delete' :
        

        $nationalite = Nationalite::findById($_GET['num']);
        $nb = Nationalite::delete($nationalite);

        if ($nb == 1) {
            
            $_SESSION['message']=["sucess" => "Le nationalite a bien été supprimé "];

        } else {
            
            $_SESSION['message']=["danger" => "Le nationalite n'a pas été supprimer "];
        }
        
        header("location: index.php?uc=nationalites&action=list");
        exit();
    break;
    case 'validForm' :

        $nationalite = new Nationalite();
        $continent = Continent::findById($_POST['continent']);
        if (empty($_POST['num'])) {
            
            $nationalite->setLibelle($_POST['libelle'])
                        ->setContinent($continent);
            $nb = Nationalite::add($nationalite);
            $message = 'ajouté';

        }else { 

            $nationalite->setNum($_POST['num'])
                        ->setLibelle($_POST['libelle'])
                        ->setContinent($continent)       
                        ;
            $nb = Nationalite::update($nationalite);
            $message = 'modifié';
        }
        // Si sa c'est bien passéS
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess"=>"La nationalité a bien été $message "];

        } else {
            
            $_SESSION['message']=["danger"=>"La nationalité a bien été $message "];

        }

        header("location: index.php?uc=nationalites&action=list");
        exit();
    break;
    
}


