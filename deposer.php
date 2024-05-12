<?php
if (isset($_GET['id'])) {
    $compteId = $_GET['id'];

    
    echo "<h1>Dépôt sur le compte numéro " . $compteId . "</h1>";
    echo "<form action='traitement_depot.php' method='post'>";
    echo "Montant à déposer : <input type='text' name='montant'><br>";
    echo "<input type='hidden' name='compte_id' value='" . $compteId . "'>";
    echo "<input type='submit' value='Déposer'>";
    echo "</form>";
} else {
    echo "ID du compte non spécifié.";
}
?>
