<?php
if (isset($_SESSION['Idmodifieroom'])){
    // Afficheer les residant de la chambre
    $coloc = $connect->query("SELECT * FROM etudiant WHERE chambre = ".$_SESSION['Idmodifieroom'])->fetchall();
$arrayMChambre = $connect->query('SELECT * FROM chambre where IdChambre = '.$_SESSION['Idmodifieroom'])->fetchAll();
if (isset($_POST['ModifierChambre'])){
    if(!empty($_POST['MnomChambre']) || isset($_POST['Msuperficie']) || isset($_POST['Metage']) || isset($_POST['Mcolocataire'])){
    // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
    if(!empty($_POST['MnomChambre'])){
        // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
        $MnomChambre = htmlspecialchars($_POST['MnomChambre']);
        // On verife si la chambre est deja present dans la base de données----------------------------------------------------------------
        $chambreExist = $connect->prepare('SELECT nomChambre FROM chambre where nomChambre = ?');
        $chambreExist -> execute(array($MnomChambre));
        if($chambreExist ->rowCount() == 0){
                    // On insert la chambre dans le site----------------------------------------------------------------------------------
                    $connect->query("UPDATE chambre  set nomChambre = '".$MnomChambre."' Where idChambre = ".$_SESSION['Idmodifieroom']);
                    // header("Location: ./ListeChambre.php");
        }else{
        $e = "Le nom de cette chambre existe déja.";
        }}
    if(!empty($_POST['Msuperficie'])){
        // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
        $Msuperficie = htmlspecialchars($_POST['Msuperficie']);
        // On insert la chambre dans le site----------------------------------------------------------------------------------
        $connect->query("UPDATE chambre  set Superficie = ".$Msuperficie." Where idChambre = ".$_SESSION['Idmodifieroom']);
    }
    if(!empty($_POST['Metage'])){
        // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
        $Metage = htmlspecialchars($_POST['Metage']);
        // On insert la chambre dans le site----------------------------------------------------------------------------------
        $connect->query("UPDATE chambre  set etageChambre = ".$Metage." Where idChambre = ".$_SESSION['Idmodifieroom']);
    }
    if(!empty($_POST['Mcolocataire'])){
        // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
        $Mcolocataire = htmlspecialchars($_POST['Mcolocataire']);
        if($Mcolocataire>=$arrayMChambre[0]["effectif"]){
            // On insert la chambre dans le site----------------------------------------------------------------------------------
            $connect->query("UPDATE chambre  set effectifMax = ".$Mcolocataire." Where idChambre = ".$_SESSION['Idmodifieroom']);
        }else{$e="L'effectif max doit etre superieur au nombre de locataire actuellement present dans la chambre";}
    }
    
    if(!isset($e)){
    header("Refresh:0");}
    
}

}if(isset($_POST['suppEtCha'])){
        $connect->query("UPDATE etudiant SET chambre = 1 WHERE IdEtudiant = ".$_POST['suppEtCha']);
        $connect->query("UPDATE etudiant SET DemandeChambre = 'rejeter' WHERE IdEtudiant = ".$_POST['suppEtCha']);
        $neweffectif = $arrayMChambre[0]["effectif"] - 1;
        $connect->query("UPDATE chambre  set effectif = ".$neweffectif." Where idChambre = ".$_SESSION['Idmodifieroom']);

    }}else{
    header('Location: ./ListeChambre.php');
}