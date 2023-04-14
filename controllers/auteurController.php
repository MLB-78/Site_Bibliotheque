<?php 

$action = $_GET['action'];
switch ($action){

    case 'list':
        // Traitement du formulaire de recherche 
        $nom = "";
        $prenom = "";
        $nationaliteSel="Tous";
        if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['nationalite'])){
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $nationaliteSel = $_POST['nationalite'];
        }
        $lesNationalites = Nationalite::findAllNat();
        $lesAuteurs = Auteur::findAll($nom, $prenom, $nationaliteSel);
        include('vues/auteur/listeAuteur.php');
    break;
    case 'add' : 
        $mode = "Ajouter";
        $lesNationalites = Nationalite::findAllNat();
        include("vues/auteur/formAuteur.php");
    break;
    case 'update' :
        $mode = "Modifier";
        $lesNationalites = Nationalite::findAllNat();
        $auteur = Auteur::findById($_GET['num']);
        include("vues/auteur/formAuteur.php");
    break;
    case 'delete' :

        $auteur = Auteur::findById($_GET['num']);
        $nb = Auteur::delete($auteur);

        if ($nb == 1) {
            
            $_SESSION['message']=["sucess" => "L'auteur a bien été supprimé "];

        } else {
            
            $_SESSION['message']=["danger" => "L'auteur n'a pas été supprimer "];
        }
        
        header("location: index.php?uc=auteurs&action=list");
        exit();
    break;
    case 'validForm' :

        $auteur = new Auteur();
        $nationalite = Nationalite::findById($_POST['nationalite']);
        if (empty($_POST['num'])) {
            
            $auteur->setNom($_POST['nom'])
                   ->setPrenom($_POST['prenom'])
                   ->setNationalite($nationalite);
            $nb = Auteur::add($auteur);
            $message = 'ajouté';

        }else { 

            $auteur->setNum($_POST['num'])
                   ->setNom($_POST['nom'])
                   ->setPrenom($_POST['prenom'])
                   ->setNationalite($nationalite);
            $nb = Auteur::update($auteur);
            $message = 'modifié';
        }
        // Si sa c'est bien passéS
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess"=>"L'auteur a bien été $message "];

        } else {
            
            $_SESSION['message']=["danger"=>"L'auteur a bien été $message "];

        }

        header("location: index.php?uc=auteurs&action=list");
        exit();
    break;
    
}

