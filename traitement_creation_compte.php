<?php
// Inclure le fichier de connexion à la base de données
require_once("connexion.php");

// Initialiser les variables pour les ID et le numéro de compte des nouveaux enregistrements
$client_id = null;
$compte_id = null;
$numero_compte = null;

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];

    // Insérer les données dans la table Clients
    $sql_insert_client = "INSERT INTO Clients (nom, prenom, adresse, telephone) VALUES (?, ?, ?, ?)";
    $stmt_insert_client = $connect->prepare($sql_insert_client);
    $stmt_insert_client->execute([$nom, $prenom, $adresse, $telephone]);

    // Récupérer l'ID du client inséré
    $client_id = $connect->lastInsertId();

    // Définir le solde initial à 0
    $solde_initial = 0;

    // Insérer les données dans la table ComptesBancaires avec un solde initial de 0
    $sql_insert_compte = "INSERT INTO ComptesBancaires (client_id, solde) VALUES (?, ?)";
    $stmt_insert_compte = $connect->prepare($sql_insert_compte);
    $stmt_insert_compte->execute([$client_id, $solde_initial]);

    // Récupérer l'ID du compte inséré
    $compte_id = $connect->lastInsertId();

    // Récupérer le numéro de compte
    $sql_select_numero_compte = "SELECT numero_compte FROM ComptesBancaires WHERE compte_id = ?";
    $stmt_select_numero_compte = $connect->prepare($sql_select_numero_compte);
    $stmt_select_numero_compte->execute([$compte_id]);
    $row = $stmt_select_numero_compte->fetch(PDO::FETCH_ASSOC);
    $numero_compte = $row['numero_compte'];

    // Rediriger vers une page de confirmation ou une autre page selon vos besoins
    header("Location: confirmation_creation_compte.php?client_id=$client_id&compte_id=$compte_id&numero_compte=$numero_compte");
    exit();
}
?>
