<?php
$dbhost = 'mysql-medev.alwaysdata.net';
$dbname = 'medev_samaneek';
$dbuser = 'medev';
$dbpswd = 'Mouhamed002';
try {
    session_start();
    $connect = new PDO(
        'mysql:host=' . $dbhost . ';dbname=' . $dbname,
        $dbuser,
        $dbpswd,
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        )
    );
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}