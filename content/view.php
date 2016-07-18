
<?php
require_once("inc/connexion.php");
$article=0;
if ($_GET ) {
    if (isset($_GET['id'])) {
        $article=$_GET['id'];
    }

}

if ($article!=0){
    $view=new Article($article);
    $view->charger();
    $datePub = (new DateTime($view->datePublication))->format("d / m / Y");

?>

<div id="blog">
    <div class= "article">
        <a href="#" onclick="loadPage('blog');">Retour</a>
        <!-- nom --><h2 class="cadre"><?= $view->nom ?></h2>
        <!-- contenu --><p><?= $view->contenu ?></p>
        <!-- date --><h3>Posté le : <?= $datePub  ?></h3>

    </div>
</div>


<?php } ?>