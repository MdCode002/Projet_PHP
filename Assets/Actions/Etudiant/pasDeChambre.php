<?php
$Demande = $connect ->prepare('SELECT DemandeChambre from etudiant where IdEtudiant = ?');
$Demande -> execute(array($_SESSION['IdEt']));
$statutDemant = $Demande->fetch();
if($statutDemant[0] != "valider"){
    header('Location: ../../Views/Etudiants/DemandeChambre.php');
}