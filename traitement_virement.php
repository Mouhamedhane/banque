<?php
// Vérifier si les données du formulaire sont envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $montant = $_POST['solde'];
    $compteId = $_POST['compte_id'];
    $compteDest = $_POST['compte_id'];


    header("Location: gestion_compte.php");
    exit;
} else {
    echo "Méthode de requête non autorisée.";
}
?>
