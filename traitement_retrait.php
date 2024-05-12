<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $montant = $_POST['solde'];
    $compteId = $_POST['compte_id'];

    header("Location: gestion_compte.php");
    exit;
} else {
    echo "Méthode de requête non autorisée.";
}
?>
