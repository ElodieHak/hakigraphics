<?php 
function autoloader($class) {
    include 'class/' . $class .'.php';
}

spl_autoload_register('autoloader');

$connex=new Connexion("mysql:dbname=hakigraphics_blog;host=localhost;charset=utf8","root","");
?>