<?php
$etudiantdeuser = $connect->query("SELECT * FROM etudiant WHERE IdEtudiant  = ".$_SESSION['IdmodifierEtudiant'])->fetch();
if(isset($_SESSION['IdmodifierEtudiant'])){
    if (isset($_POST['ModifierEtudiant'])){
        if(!empty($_POST['MnomEtudiant']) || isset($_POST['Mmatricule']) || isset($_POST['MTel']) || isset($_POST['MClasse']) || isset($_POST['MEmail'])){
        // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
        if(!empty($_POST['Mmatricule'])){
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $Mmatricule = htmlspecialchars($_POST['Mmatricule']);
            // On verife si la etudiant est deja present dans la base de données----------------------------------------------------------------
            $matriculeExist = $connect->prepare('SELECT idEtudiant  FROM etudiant where IdEtudiant  = ?');
            $matriculeExist -> execute(array($Mmatricule));
            if($matriculeExist ->rowCount() == 0){
                        // On insert la etudiant dans le site----------------------------------------------------------------------------------
                        $connect->query("UPDATE etudiant  set IdEtudiant = ".$Mmatricule." Where idEtudiant = ".$_SESSION['IdmodifierEtudiant']);
                        // header("Location: ./Listeetudiant.php");
            }else{
            $e = "Cette matricule est déja dans le site.";
            }}
        if(!empty($_POST['MnomEtudiant'])){
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $MnomEtudiant = htmlspecialchars($_POST['MnomEtudiant']);
            // On insert la etudiant dans le site----------------------------------------------------------------------------------
            $connect->query("UPDATE etudiant  set NomEtudiant = '".$MnomEtudiant."' Where idEtudiant = ".$_SESSION['IdmodifierEtudiant']);
        }
        if(!empty($_POST['MTel'])){
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $MTel = htmlspecialchars($_POST['MTel']);
            // On insert la etudiant dans le site----------------------------------------------------------------------------------
            $connect->query("UPDATE etudiant  set TelEtudiant = ".$MTel." Where idEtudiant = ".$_SESSION['IdmodifierEtudiant']);
        }
        if(!empty($_POST['MClasse'])){
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $MClasse = htmlspecialchars($_POST['MClasse']);
                // On insert la etudiant dans le site----------------------------------------------------------------------------------
                $connect->query("UPDATE etudiant  set Classe = '".$MClasse."' Where idEtudiant = ".$_SESSION['IdmodifierEtudiant']);
        }
        if(!empty($_POST['MEmail'])){
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $MEmail = htmlspecialchars($_POST['MEmail']);
            $EmailExist = $connect->prepare('SELECT idEtudiant  FROM etudiant where emailEtudiant  = ?');
            $EmailExist -> execute(array($MEmail));
            if($EmailExist ->rowCount() == 0){
                        // On insert la etudiant dans le site----------------------------------------------------------------------------------
                        $connect->query("UPDATE etudiant  set emailEtudiant = '".$MEmail."' Where idEtudiant = ".$_SESSION['IdmodifierEtudiant']);
                        // header("Location: ./Listeetudiant.php");
            }else{
            $e = "Cette matricule est déja dans le site.";
            }}
        }
        
        if(!isset($e)){
        header("Refresh:0");}
        
    }
    }    
else{
    header('Location: ./ListeEtudiant.php');
}

if (isset($_POST['annulerEtudiant'])){
    header( "Location:  ./ListeEtudiant.php");
    }