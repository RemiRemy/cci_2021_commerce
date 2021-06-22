<!-- site internet
inscription 
connexion
accueil -> le dernier article
blog -> tous les articles 
goodies -> tous les produits
réservé aux admins _ administration
                   _ajout article
                   _ ajout produit
                   si pas admin renvoi sur table inscription

page 404
3 table  
page par défaut accueil
-->

<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <title>TSNI Marine</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php?page=accueil">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=inscription">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=connexion">Connexion</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="./index.php?page=connexion" role="button" aria-haspopup="true" aria-expanded="false">Administrateur</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

</body>

</html>



<?php
$page = "accueil";
$listePagesDispos = [
    "inscription",
    "accueil",
    "blog",
    "goodies",
    "connexion"
];

$listePagesBackOffice = [
    "administrateur",
    "ajout_article",
    "ajout_produit"
];

if (isset($_GET["page"])) {
    if (in_array($_GET["page"], $listePagesDispos)) {
        if (in_array($_GET["page"], $listePagesBackOffice)) {
            if (isset($_SESSION["is_admin"])) {
                $page = $_GET["page"];
            } else {
                $page = "connexion";
            }
        } else {
            $page = $_GET["page"];
        }
    } else {
        $page = "404";
    }
}

include("./" . "$page" . ".php");
