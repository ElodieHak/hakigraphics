<?php
require_once('connexion.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>hakigraphics admin</title>
    <meta name="description" content="Graphiste, Webdev et mobile">
    <meta name="author" content="Elodie HAK">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Styles -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- Favicons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

</head>

<!----------------------- Body ----------------------->
<body>

    <!---------------------- Header ---------------------->
    <header class="active">

        <div id="fond">
            <div id="banner">
            </div>
        </div>

        <!------- Menu Principal ------->
        <nav id="menu_principal">
            <ul>

                <li><a id='accueil'  href="index.php">Accueil</a></li>
                <li><a id="add" href="add.php">Ajouter</a></li>
                <li><a id="site" href="../index.html">Retour au site</a></li>              
            </ul>
        </nav>

    </header>
    <div id="content">
        <div id="blog">
            <h2>Toutes les categories</h2>
            <?php 
            $tabCat=Categorie::tab();
            foreach ($tabCat as $cat) {
            ?><div> 
            <a href="addcategorie.php?id=<?= $cat->id_categorie ?>" ><?= $cat->nom ?></a><button onclick='document.location="delcategorie.php?id=<?= $cat->id_categorie ?>";' >Supprimer</button></div>
            <br />
            <?php
            }
            ?>            <a href="addcategorie.php">Ajouter une catégorie</a>

            <h2>Tous les articles</h2>
            <?php
            $tab=Article::tab('1','datePublication DESC');
            foreach ($tab as $article) {

                $date = new DateTime($article->datePublication);
                $datePub = $date->format('d / m / Y');

            ?>
            <!-- .article --> <div class= "article">
            <button onclick="document.location.href='add.php?id=<?= $article->id_article ?>'">Modifier</button><button onclick="if (confirm('Vraiment ?')) {document.location.href='del.php?id=<?= $article->id_article ?>';}">Supprimer</button>

            <!-- nom --><h2 class="cadre"><?= $article->nom ?></h2>
            <!-- contenu --><p><?= $article->contenu ?></p>
            <!-- date --><h4>Posté le : <?= $datePub  ?></h4>

            </div>
            <?php } ?>
        </div>     
    </div>
    <footer>

    </footer>
</body>
</html>