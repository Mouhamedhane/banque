<?php
if (isset($_GET['id'])) {
    $compteId = $_GET['id'];

    
    echo "<h1>Virement depuis le compte numéro " . $compteId . "</h1>";
    echo "<form action='traitement_virement.php' method='post'>";
    echo "Montant à transférer : <input type='text' name='montant'><br>";
    echo "Compte destinataire : <input type='text' name='compte_dest'><br>";
    echo "<input type='hidden' name='compte_id' value='" . $compteId . "'>";
    echo "<input type='submit' value='Virement'>";
    echo "</form>";
} else {
    echo "ID du compte non spécifié.";
}
?>
