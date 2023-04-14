<?php 

$action = $_GET['action'];
switch ($action){

    case 'list':
        // Traitement du formulaire de recherche 
        $titre = "";
        $prix = "";
        $langue = "";
        $isbn = "";
        $annee = "";
        $editeur = "";
        $auteurSel="Tous";
        $genreSel="Tous";
        if (!empty($_POST['titre']) || !empty($_POST['prix']) || !empty($_POST['langue']) || !empty($_POST['isbn']) || !empty($_POST['annee']) || !empty($_POST['editeur']) || !empty($_POST['auteur']) || !empty($_POST['genre'])){
            
            $titre = $_POST['titre'];
            $prix = $_POST['prix'];
            $langue = $_POST['langue'];
            $isbn = $_POST['isbn'];
            $annee = $_POST['annee'];
            $editeur = $_POST['editeur'];

            $auteurSel = $_POST['auteur'];
            $genreSel = $_POST['genre'];
        }
        

        $lesAuteurs = Auteur::findAllAut();
        $lesGenres = Genre::findAll();
        $lesLivres = Livre::findAll($titre , $auteurSel, $genreSel, $editeur);
        include('vues/livre/listeLivre.php');
    break;
    case 'add' : 
        $mode = "Ajouter";
        $lesAuteurs = Auteur::findAllAut();
        $lesGenres = Genre::findAll();
        include("vues/livre/formLivre.php");
    break;
    case 'update' :
        $mode = "Modifier";
        $lesNationalites = Nationalite::findAllNat();
        $livre = Livre::findById($_GET['num']);
        include("vues/livre/formLivre.php");
    break;
    case 'delete' :

        $livre = Livre::findById($_GET['num']);
        $nb = Livre::delete($livre);

        if ($nb == 1) {
            
            $_SESSION['message']=["sucess" => "Le livre a bien été supprimé "];

        } else {
            
            $_SESSION['message']=["danger" => "Le livre n'a pas été supprimer "];
        }
        
        header("location: index.php?uc=livres&action=list");
        exit();
    break;
    case 'validForm' :

        $livre = new Livre();
        $auteur = Nationalite::findById($_POST['auteur']);
        if (empty($_POST['num'])) {
            
            $livre->setTitre($_POST['titre'])
                   ->setPrix($_POST['prix'])
                   ->setAnnee($_POST['annee'])
                   ->setEditeur($_POST['editeur'])
                   ->setLangue($_POST['langue'])
                   ->setIsbn($_POST['isbn'])
                   ->setAuteur($livre);
            $nb = Livre::add($livre);
            $message = 'ajouté';

        }else { 

            $livre->setTitre($_POST['titre'])
                  ->setPrix($_POST['prix'])
                  ->setAnnee($_POST['annee'])
                  ->setEditeur($_POST['editeur'])
                  ->setLangue($_POST['langue'])
                  ->setIsbn($_POST['isbn'])
                  ->setAuteur($livre);
                $nb = Livre::update($livre);
            $message = 'modifié';

            
        }
        // Si sa c'est bien passéS
        if ($nb == 1) {
            
            $_SESSION['message']=["sucess"=>"Le livre a bien été $message "];

        } else {
            
            $_SESSION['message']=["danger"=>"Le livre a bien été $message "];

        }

        header("location: index.php?uc=livres&action=list");
        exit();
    break;
    
}

