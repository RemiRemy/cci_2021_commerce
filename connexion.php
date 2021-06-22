<?php

if(isset($_POST["pseudo"]) && isset($_POST["password"])) {
    $sql = "SELECT * FROM utilisateur
    WHERE pseudo = :pseudo";
    $maConnexion = new PDO("mysql:host=localhost;dbname=tsni", "root", "");
    $requete = $maConnexion -> prepare($sql);
    $requete -> execute(
        [
            ":pseudo" => $_POST["pseudo"],
        ]
        );
    $utilisateur = $requete -> fetch();
        // si utilisateur existe bien dans la bdd et que le mdp post correspond au mdp dans la bdd
    if($utilisateur && password_verify($_POST["password"], $utilisateur["password"])) {
        $_SESSION["pseudo"] = $_POST["pseudo"];
        $_SESSION["is_admin"] = $utilisateur["is_admin"];
        if($utilisateur["is_admin"]) {
            header("Location: ./index.php?page=administrateur");
        }else{
            header("Location: ./index.php?page=accueil" );
        }
    }else{
        echo "mauvais login ou mot de passe ";
    }
}


?>
<form method="POST">

<label>pseudo</label>
<input type="text" name="pseudo">
<label>Mot de passe</label>
<input type="password" name="password">
<input type="submit">


</form>