<?php
$Demande = $connect->prepare('SELECT demandechambre from etudiant where IdEtudiant = ?');
$Demande->execute(array($_SESSION['IdEt']));
$statutDemant = $Demande->fetch();
if ($statutDemant[0] == "none") {
    $message = "Vous n'avez pas encore fait de demande de chambre";
}
if ($statutDemant[0] == "rejeter") {
    $message = "Votre demande de chambre a etait rejeter refaite en une ou veuillez conctacter l'administrateur";
}
if ($statutDemant[0] == "enCours") {
    $message = "Votre demande de chambre est en cours de traitement, elle sera traitée dans les meilleurs délais et une chambre vous seras attribué.";
}
if ($statutDemant[0] == "valider") {
    header("Location: ../../Views/Etudiants/homeEtudiant.php");
}

if ($statutDemant[0] == "none" || $statutDemant[0] == "rejeter") {
    if (isset($_POST["Fdemande"])) {
        $connect->query("UPDATE etudiant SET DemandeChambre = 'enCours' WHERE IdEtudiant  = " . $_SESSION['IdEt']);
        header("Refresh:0");
    }
}