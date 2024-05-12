<?php
// Vérifier si l'ID du compte est passé en paramètre
if (isset($_GET['id'])) {
    $compteId = $_GET['id'];

    // Récupérer les informations sur le compte à partir de la base de données (vous devez implémenter cette partie)
    // Utilisez $compteId pour récupérer les informations nécessaires sur le compte
    // ...

    // Afficher le formulaire de retrait
    echo "<h1>Retrait sur le compte numéro " . $compteId . "</h1>";
    echo "<form action='traitement_retrait.php' method='post'>";
    echo "Montant à retirer : <input type='text' name='montant'><br>";
    echo "<input type='hidden' name='compte_id' value='" . $compteId . "'>";
    echo "<input type='submit' value='Retirer'>";
    echo "</form>";
} else {
    echo "ID du compte non spécifié.";
}
?>
