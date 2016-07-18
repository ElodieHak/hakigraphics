<?php
    require_once("inc/connexion.php");
    $page=1;
    if ($_GET && isset($_GET['page'])) {
        $page=$_GET['page'];
    }
    $tab=Article::tab('1','datePublication DESC');
    for ($i=($page-1)*10;$i<=($page*10-1);$i++) {
        if ($i<count($tab)) {
        $article=$tab[$i];
        if ($article->visible) {
        echo "Titre : {$article->nom}<br />Contenu : {$article->contenu}<br />";
        }
        }
    }
?>