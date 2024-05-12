<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relevé de Compte</title>
</head>
<body>
    <h1>Relevé de Compte</h1>
    <?php
    
    if (isset($_GET['id'])) {
        $compteId = $_GET['id'];

        require_once("connexion.php");

        $sql = "SELECT * FROM ComptesBancaires WHERE compte_id = :compte_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':compte_id', $compteId);
        $stmt->execute();
        $compte = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($compte) {
            echo "<h2>Informations du Compte</h2>";
            echo "<p>Numéro de Compte: " . $compte['numero_compte'] . "</p>";
            echo "<p>Solde: " . $compte['solde'] . "</p>";
        } else {
            echo "Aucun compte trouvé avec cet ID.";
        }

        $sql_operationsbancaires = "SELECT * FROM operationsbancaires WHERE compte_id = :compte_id";
        $stmt_operationsbancaires= $connect->prepare($sql_operationsbancaires);
        $stmt_operationsbancaires->bindParam(':compte_id', $compteId);
        $stmt_operations->execute();
        $operationsbancaires = $stmt_operationsbancaires->fetchAll(PDO::FETCH_ASSOC);

        if ($operations) {
            echo "<h2>Opérations effectuées sur ce compte :</h2>";
            echo "<ul>";
            foreach ($operationsbancaires as $operationsbancaires) {
                echo "<li>" . $operationsbancaires['description'] . " - Montant: " . $operation['montant'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Aucune opération trouvée pour ce compte.";
        }
    } else {
        echo "ID du compte non spécifié.";
    }
    ?>
</body>
</html>
