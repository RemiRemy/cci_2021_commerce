<h1>accueil</h1>

<?php
$connexion = new PDO("mysql:host=localhost;dbname=tsni", "root", "");
$resultat = $connexion->query("SELECT * FROM article;");
$listeArticles = $resultat->fetchAll(); // comment selectionner le dernier article ? 

foreach($listeArticles as $article)
    // on transforme la date en français
setlocale(LC_TIME, "fr");
$date = strftime("%A %d %B %G", strtotime($article["date_publication"]));
?>

<article>

<h1> <?php echo $article["titre"]; ?> </h1>
<p>Auteur <?php echo $article["auteur"] . " le " . $article["date_publication"] ?> </p>
<img src="./imag/<?=$article["nom_image"];?> " alt="<?php echo $article["alt_image"] ?> ">
<p><?php echo $article["contenu"] ?> </p>

</article>