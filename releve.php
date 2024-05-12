<?php

try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}

$sql = "SELECT * FROM operationsbancaires WHERE compte_id = :compte_id";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':compte_id', $compte_id);
$stmt->execute();
$operations = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'operations' => $operations]);
?>
