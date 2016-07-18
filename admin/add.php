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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
    selector: 'textarea',
    height: 500,
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true,
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        '//www.tinymce.com/css/codepen.min.css'
    ]
});</script>
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
        $contenu=$_POST['contenu'];
        $id_categorie=$_POST['id_categorie'];
        $id=$_POST['id'];

        $article=new Article($id);
        $article->id_categorie=$id_categorie;
        $article->nom=$nom;
        $article->contenu=$contenu;
        $article->sauver();
        header('location:index.php');
    }
    $article=new Article($id);

    $article->charger();
    $tabCat=Categorie::tab();
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
        <form method="post" action="add.php">
            <input type="hidden" value="<?= $id ?>" name="id" /><br />   
            <input type="text" name="nom" value="<?= $article->nom ?>" /><br />
            <textarea name="contenu"><?= $article->contenu ?></textarea><br />
            <select name="id_categorie">
                <?php
    foreach ($tabCat as $cat) {
                ?>
                <option value="<?= $cat->id_categorie?>"><?= $cat->nom ?></option>
                <?php
    }
                ?>
            </select><br />
            <input type="submit" />
        </form>
    </div>
    <footer>
    </footer>
</body>
</html>