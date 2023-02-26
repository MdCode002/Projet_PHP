<?php
// Selectionne 5 chambre maximum dans la base de donnee
$chambres_5max = $connect->query("SELECT nomChambre FROM chambre where idChambre != 1 limit 5")->fetchAll();
// Selectionne 4 Etudiants maximum dans la base de donnee
$Etudiant_4max = $connect->query("SELECT NomEtudiant,idEtudiant FROM etudiant  limit 5")->fetchAll();
// Selectionne Tous les Etudiants  dans la base de donnee
$Etudiant = $connect->query("SELECT * FROM etudiant ")->fetchAll();
if (isset($_POST["filtre"]) && $_POST["filtre"] == "all") {
    $Etudiant = $connect->query("SELECT * FROM etudiant ")->fetchAll();
}
if (isset($_POST["filtre"]) && $_POST["filtre"] == "loge") {
    $Etudiant = $connect->query("SELECT * FROM etudiant where Chambre != 1 ")->fetchAll();
}
if (isset($_POST["filtre"]) && $_POST["filtre"] == "nonloge") {
    $Etudiant = $connect->query("SELECT * FROM etudiant where Chambre = 1 ")->fetchAll();
}
// else{ $Etudiant = $connect->query("SELECT * FROM etudiant ")->fetchAll();}

// Supprimer un  Etudiants  dans la base de donnee
if (isset($_POST['supprimer'])) {
    $supetudiant = $_POST['supprimer'];
    $selectetu = $connect->query("SELECT * from etudiant WHERE idEtudiant = $supetudiant")->fetch();
    $selectchambre = $connect->query("SELECT * from chambre WHERE idChambre = $selectetu[7]")->fetch();
    $Neweffectif = $selectchambre[5] - 1;
    $connect->query("UPDATE chambre SET effectif = $Neweffectif WHERE idChambre  = " . $selectchambre[0]);
    $connect->query("DELETE FROM etudiant WHERE IdEtudiant  = $supetudiant");

    header("Refresh:0");
}
// Selectionne Tous les Chambres  dans la base de donnee
$Leschambres = $connect->query("SELECT * FROM chambre where idChambre != 1 ")->fetchAll();
if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "tout") {
    $Leschambres = $connect->query("SELECT * FROM chambre where idChambre != 1 ")->fetchAll();
}
if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "complet") {
    $Leschambres = $connect->query("SELECT * FROM chambre where effectifMax = effectif and idChambre != 1 ")->fetchAll();
}
if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "dispo") {
    $Leschambres = $connect->query("SELECT * FROM chambre where effectifMax > effectif and idChambre != 1 ")->fetchAll();
}
// Supprimer une  Chambre  dans la base de donnee
if (isset($_POST['supprimerchambre'])) {
    $supetudiant = $_POST['supprimerchambre'];
    $connect->query("DELETE FROM chambre WHERE idChambre  = $supetudiant");
    header("Refresh:0");
}
//Ajouter une chambre dns la bse de donnee
if (isset($_POST['Ajouter'])) {
    // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
    if (!empty($_POST['nChambre']) && isset($_POST['superficie']) && isset($_POST['etage']) && isset($_POST['colocataire'])) {
        // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
        $nChambre = htmlspecialchars($_POST['nChambre']);
        $superficie = htmlspecialchars($_POST['superficie']);
        $etage = htmlspecialchars($_POST['etage']);
        $colocataire = htmlspecialchars($_POST['colocataire']);
        // On verife si la chambre est deja present dans la base de données----------------------------------------------------------------
        $chambreExist = $connect->prepare('SELECT nomChambre FROM chambre where nomChambre = ?');
        $chambreExist->execute(array($nChambre));
        if ($chambreExist->rowCount() == 0) {
            // On insert la chambre dans le site----------------------------------------------------------------------------------
            $insertchambre = $connect->prepare('INSERT INTO chambre (nomChambre,Superficie,etageChambre,effectifMax) VALUES (?,?,?,?)');
            $insertchambre->execute(array($nChambre, $superficie, $etage, $colocataire));
            header("Location: ./ListeChambre.php");
        } else {
            $e = "Le nom de cette chambre existe déja.";
        }
    } else {
        $e = "Veuillez Remplire tous les champs .";
    }
}
if (isset($_POST['annuler'])) {
    header("Location:  ./ListeChambre.php");
}

// On recupere les demande de Chambre
$demandeChambre_5max = $connect->query('SELECT * from etudiant where DemandeChambre = "enCours" limit 5')->fetchAll();
// Rejeter une demande de chambre
if (isset($_POST['rejeter'])) {
    $rejetudiant = $_POST['rejeter'];
    $connect->query("UPDATE etudiant SET DemandeChambre = 'rejeter'  WHERE IdEtudiant  = $rejetudiant");

    header("Refresh:0");
}
//Si on appuie sur accrpeter la demande
if (isset($_POST['Accepterdemande'])) {
    $_SESSION['accetudiant'] = $_POST['Accepterdemande'];
    header("Location: ./AccorderChambre.php");
}
if (isset($_POST['modifieroom'])) {
    $_SESSION['Idmodifieroom'] = $_POST['modifieroom'];
    header("Location: ./ModifierChambre.php");
}
if (isset($_POST['modifieretudiant'])) {
    $_SESSION['IdmodifierEtudiant'] = $_POST['modifieretudiant'];
    header("Location: ./ModifierEtudiant.php");
}
function chambre($x, $connect)
{
    $y = $connect->query("SELECT nomChambre FROM chambre WHERE idChambre = $x")->fetchAll();
    echo ($y[0][0]);
}
// RECHERCHER UN L'ID D'UNE CHAMBRE
if (isset($_POST['validefiltre'])) {
    if (!empty($_POST['Searchchambre'])) {
        $Searchchambre =  $_POST['Searchchambre'];
        $Leschambres = $connect->query("SELECT * FROM chambre where idChambre  = $Searchchambre ")->fetchAll();
    }
}
// RECHERCHER UN LE MATRICUKE D'UN Etudiant
if (isset($_POST['validefiltreEtu'])) {
    if (!empty($_POST['Searchetudiant'])) {
        $Searchetudiant =  $_POST['Searchetudiant'];
        $Etudiant = $connect->query("SELECT * FROM etudiant where IdEtudiant  = $Searchetudiant ")->fetchAll();
    }
}