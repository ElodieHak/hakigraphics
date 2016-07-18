<?php

require_once('connexion.php');

if ($_GET && isset($_GET['id'])) {
    (new Categorie($_GET['id']))->supprimer();
}
header('location:index.php');