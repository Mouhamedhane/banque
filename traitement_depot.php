<?php
// Vérifier si les données du formulaire sont envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $solde = $_POST['solde'];
    $compteId = $_POST['compte_id'];

    // Inclure le fichier de connexion à la base de données
    require_once("connexion.php");

    try {
        // Commencer une transaction
        $connect->beginTransaction();

        // Mettre à jour le solde du compte dans la base de données en ajoutant la somme fournie
        $sql = "UPDATE ComptesBancaires SET solde = solde + :solde WHERE compte_id = :compte_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':solde', $solde);
        $stmt->bindParam(':compte_id', $compteId);
        $stmt->execute();

        // Valider la transaction
        $connect->commit();

        // Rediriger vers la page de gestion des comptes après le dépôt
        header("Location: gestion_compte.php");
        exit;
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction et afficher un message d'erreur
        $connect->rollBack();
        echo "Erreur lors du dépôt: " . $e->getMessage();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
