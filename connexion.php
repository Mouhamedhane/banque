<?php
$dbhost = 'mysql-mouha.alwaysdata.net';
$dbname = 'mouha_bds';
$dbuser = 'mouha_bds';
$dbpswd = 'bds123456789*';


try {
    // Connexion à la base de données
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    // En cas d'erreur lors de la connexion à la base de données
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>