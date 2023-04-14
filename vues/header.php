<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibliothèque</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/indexBis.css">
    <link rel="shortcut icon" href="image/logoLivre.png" type="image/x-icon">

<!-- Bootstrap accueil.php -->
<link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/album/">
<link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">

</head>
<body>
     
                   
    
<nav class="navbar navbar-expand-lg navbar-light couleur">
    <a class="navbar-brand" href="index.php"> <img src="image/livre.png" width="40"> <strong>Ma Bibliothèque</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <!-- Genres -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Gestion des Genres
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?uc=genres&action=list">Liste des genres</a>
                    <a class="dropdown-item" href="index.php?uc=genres&action=add">Ajouter un genre</a>
                </div>
            </li>
            <!-- Livre -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Gestion des Livres
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?uc=livres&action=list">Liste des livres</a>
                    <a class="dropdown-item" href="index.php?uc=livres&action=add">Ajouter un livres</a>
                </div>
            </li>
            <!-- Auteurs -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Gestion des Auteurs 
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?uc=auteurs&action=list">Liste des auteurs</a>
                    <a class="dropdown-item" href="index.php?uc=auteurs&action=add">Ajouter un auteur</a>
                </div>
            </li>
            <!-- Nationalités -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Gestion des Nationalité
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?uc=nationalites&action=list">Liste des nationalités</a>
                    <a class="dropdown-item" href="index.php?uc=nationalites&action=add">Ajouter une nationalité</a>
                </div>
            </li>
            <!-- Continents -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Gestion des Continents
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?uc=continents&action=list">Listes des continents</a>
                    <a class="dropdown-item" href='index.php?uc=continents&action=add'>Ajouter un continent</a>
                </div>
            </li>
            
        </ul>
    </div>
</nav>

<br><br>


    