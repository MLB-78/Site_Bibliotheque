<?php 

    ob_start();
    session_start();  

    include "vues/header.php";
    include "vues/messageFlash.php";
    
    include "modeles/connexionPDO.php";
    include "modeles/continent.php";
    include "modeles/nationalite.php";
    include "modeles/auteur.php";
    include "modeles/genre.php";
    include "modeles/livre.php";
    

    // uc = unité de contrôle (ou tu choisis)

    $uc = empty($_GET['uc']) ? "accueil" : $_GET["uc"]; 

    switch($uc){

        case 'accueil' :
            include('vues/accueil.php');
        break;
        case 'continents' :
            include('controllers/continentController.php');
        break;
        case 'nationalites' :
            include('controllers/nationaliteController.php');
        break;
        case 'genres' :
            include('controllers/genreController.php');
        break;
        case 'auteurs' :
            include('controllers/auteurController.php');
        break;
        case 'livres' :
            include('controllers/livreController.php');
        break;

    }

    echo"<br><br>";

    include "vues/footer.php";

?>



