<?php
require_once("inc/connexion.php");
$page=1;
$cat=0;
if ($_GET ) {
    if (isset($_GET['page'])) {
        $page=$_GET['page'];
    }

    if (isset($_GET['cat'])) {
        $cat=$_GET['cat'];
    }
}

if ($cat==0){
?>
<!--
<!----------------------- Intro ----------------------->

<div class="intro">

    <h1>Bienvenue sur mon blog : les dernières news!</h1>

</div>

<!----------------------- Titre ----------------------->

<div id="blog">

    <h2>Tous les articles</h2>

    <?php
    $tab=Article::tab('1','datePublication DESC');
}
else {

    ?>
    <div id="blog">

        <h2><?php (new Categorie($cat))->charger()->nom ?></h2>

        <?php
        $tab=Article::tab("id_categorie=$cat",'datePublication DESC');
}
        ?>

        <!----------------------- Articles ----------------------->

        <?php
        $pageSuivante=true;
        for ($i=($page-1)*10;$i<=($page*10-1);$i++) {
            if ($i<count($tab)) {
                $article=$tab[$i];
                if ($article->visible) {
                    $date = new DateTime($article->datePublication);
                    $datePub = $date->format('d / m / Y');
        ?>
        <!-- .article --> <div class= "article">
        <!-- nom --><h2 onclick="loadPage('view','?id=<?= $article->id_article?>');" class="cadre"><?= $article->nom ?></h2>
        <!-- contenu --><p><?= strlen($article->contenu)>255 ? substr($article->contenu,0,255)."(...)<br /><a onclick=\"loadPage('view','?id={$article->id_article}');\" href='#'>Lire la suite</a>":$article->contenu ?></p>
        <!-- date --><h3>Posté le : <?= $datePub  ?></h3>

        </div>

        <!----------------------- Navigation ----------------------->

        <?php
                }
            }
            else {
                $pageSuivante=false;
            }
        }
        ?>

        <div id="navigation">

            <?php
            if ($page>1){ ?>
            <a href="#" onclick="loadPage('blog','?page=<?= ($page-1) ?>&cat=<?= $cat?>')">Précédent</a><?php 
                        }
            if ($pageSuivante){
            ?>
            <a href="#" onclick="loadPage('blog','?page=<?= ($page+1) ?>&cat=<?= $cat?>')">Suivant</a><br>
            <?php
            }
            $tabCat=Categorie::tab();
            foreach ($tabCat as $c) {
            ?>
            <a href="#" onclick="loadPage('blog','?cat=<?= $c->id_categorie ?>');"><?= $c->nom ?></a>
            <?php
            }
            ?>
            <a href="#" onclick="loadPage('blog','?cat=0');">Toutes les categories </a>

        </div>
    </div>

    <!----------------------- Aside Blog ----------------------->

    <aside id="aside_blog">

        <!-- Catégories -->
        <div class="categories_articles">
            <h2>Categories</h2>
            <a href="#" onclick="loadPage('blog','?cat=0');">Toutes les catégories</a> <br />

            <?php 

            foreach ($tabCat as $cat) {
            ?>
            <a href="#" onclick="loadPage('blog','?cat=<?= $cat->id_categorie ?>');"><?= $cat->nom ?></a> <br />
            <?php
            }
            ?>

        </div>

        <!-- Derniers articles -->
        <div class="derniers_articles">
            <h2>Derniers articles</h2>
            <?php foreach(array_slice($tab,0,5) as $t) {
            ?>
            <a href="#" onclick="alert('Lecture de l\'article <?= $t->id_article ?>')"><?= $t->nom ?></a><br />       
            <?php
}
            ?>

        </div>

    </aside>

     -->