<?php

class Article{

    // Attribut
    public $id;
    public $titre;
    public $genre;
    public $auteur;
    public $prix;
    public $img_url;

    // Constructeur
    function __construct($unId, $unTitre, $unGenre, $unAuteur, $unPrix, $uneURL )
    {
        $this->id = $unId;
        $this->titre = $unTitre;
        $this->genre = $unGenre;
        $this->auteur = $unAuteur;
        $this->prix = $unPrix;
        $this->img_url = $uneURL;

    }


}

?>