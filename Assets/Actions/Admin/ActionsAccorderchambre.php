<?php
if (isset($_SESSION['accetudiant'])){
    $accetudiant = $_SESSION['accetudiant'];
    $etudiantChambre = $connect->query("SELECT * from etudiant where IdEtudiant = $accetudiant")->fetch();
    $Leschambres = $connect->query("SELECT * FROM chambre where effectifMax > effectif and idChambre != 1 ")->fetchAll();
    if (isset($_POST['Choisire'])){
        $chambre =  $_POST['chambre'];
        $selectchambre = $connect->query("SELECT *  from chambre where nomChambre = '$chambre'")->fetch();
        $nomChambre = $selectchambre[0];
        $_SESSION['selectchambre']= $selectchambre;
        $colocataire = $connect->query("SELECT * from etudiant where Chambre = $nomChambre");
        $Listecolocataire = $colocataire->fetchAll();
        if ($colocataire->rowCount() == 0){
            $m = "Aucun locataire";
        }   
    }
}
else{
     header("Location: ./ListeDemande.php");}
     
if (isset($_POST['accorder'])){
$selectchambre = $_SESSION['selectchambre'];
$connect->query("UPDATE etudiant SET DemandeChambre = 'valider' WHERE IdEtudiant  = " .$etudiantChambre[0]);
$connect->query("UPDATE etudiant SET Chambre = $selectchambre[0] WHERE IdEtudiant = $etudiantChambre[0]"); 
$Neweffectif = $selectchambre[5]+1;
$connect->query("UPDATE chambre SET effectif = $Neweffectif WHERE idChambre  = ".$selectchambre[0]);
header("Location: ./ListeDemande.php");
}