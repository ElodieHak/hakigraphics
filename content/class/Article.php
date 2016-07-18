<?php 

class Article {
    public $id_article;
    public $nom;
    public $contenu;
    public $datePublication;
    public $visible;
    public $id_categorie;


    public  function __construct($id_article=0,$nom='',$contenu='',$datePublication='',$visible=0,$id_categorie=0) {

        $this->id_article = $id_article;
        $this->nom = $nom;
        $this->contenu = $contenu;
        $this->datePublication = (new DateTime())->format('Y-m-d');
        $this->visible = true;
        $this->id_categorie = $id_categorie;
    }


    public  function charger() {

        global $connex;
        if (!$this->id_article) return;
        $connex->req="SELECT * FROM article WHERE id_article={$this->id_article}";
        return $connex->xeq()->ins($this);
    }

    public  function sauver() {

        global $connex;
        if($this->id_article){
            $connex->req="UPDATE article SET nom={$connex->esc($this->nom)}, contenu={$connex->esc($this->contenu)}, datePublication={$connex->esc($this->datePublication)}, visible={$this->visible}, id_categorie={$this->id_categorie}  WHERE id_article = {$this->id_article} ";
            return $connex->xeq();
        }
        $connex->req="INSERT INTO article VALUES(DEFAULT,{$connex->esc($this->nom) },{$connex->esc($this->contenu) },{$connex->esc($this->datePublication) },{$this->visible },{$this->id_categorie })";
        $connex->xeq();
        $this->id_article=$connex->pk();
    }


    public  function supprimer() {

        global $connex;
        if (!$this->id_article) return;
        $connex->req="DELETE FROM article WHERE id_article={$this->id_article}";
        return $connex->xeq();
    }

    public static function tab($where='1',$orderBy='1') {

        global $connex;
        $connex->req="SELECT * FROM article WHERE {$where} ORDER BY {$orderBy}";
        return $connex->xeq()->tab(__CLASS__);
    }


    public  function existe() {

        global $connex;
        if (!$this->id_article) return;
        $connex->req="SELECT COUNT(*) AS existe FROM article WHERE id_article={$this->id_article}";
        return (bool)$connex->xeq()->prem()->existe;
    }
} 
?>