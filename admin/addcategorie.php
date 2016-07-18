<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>hakigraphics</title>
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
    <?php
    require_once('connexion.php');
    if ($_GET && isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    else {
        $id=0;
    }

    if ($_POST) {
        $nom=$_POST['nom'];
        $id=$_POST['id'];

        $cat=new Categorie($id);
        $cat->nom=$nom;
        $cat->description=$nom;
        $cat->sauver();
        header('location:index.php');
    }
    $cat=new Categorie($id);

    $cat->charger();
    ?>
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
        <form method="post" action="addcategorie.php">
            <input type="hidden" value="<?= $id ?>" name="id" /><br />   
            <input type="text" name="nom" value="<?= $cat->nom ?>" /><br />
            <input type="submit" />
        </form>
    </div>
    <footer>
    </footer>
</body>
</html>