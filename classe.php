<?php
class Client {
    public $id;
    public $prenom;
    public $nom;
    public $adresse;
    public $telephone;

    // Constructeur
    public function __construct($id, $prenom, $nom, $adresse, $telephone) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
    }

    
}
?>
