<?php
class CompteBancaire {
    public $id;
    public $numeroCompte;
    public $solde;
    public $proprietaire; 

    
    public function __construct($id, $numeroCompte, $solde, $proprietaire) {
        $this->id = $id;
        $this->numeroCompte = $numeroCompte;
        $this->solde = $solde;
        $this->proprietaire = $proprietaire;
    }

    public function deposer($montant) {
    }

    public function retirer($montant) {
    }

    public function virerVers($compteDestinataire, $montant) {
    }
}
?>
