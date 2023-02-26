<?php
require('./Assets/database/bdd.php');
if (isset($_SESSION['authA'])) {
    header('Location: ./Assets/Views/Admin/homeAdmin.php');
};
if (isset($_SESSION['authE'])) {
    header('Location: ./Assets/Views/Etudiants/homeEtudiant.php');
};
// verifie si l'utilisateur a appuier sur le bouton s'inscrire-------------------------------------------------------------
$e = "";
if (isset($_POST['valider'])) {
    // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
    if (!empty($_POST['Email']) && isset($_POST['nom']) && isset($_POST['tel']) && isset($_POST['id']) && isset($_POST['mdp']) && isset($_POST['classe'])) {
        // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
        $Email = htmlspecialchars($_POST['Email']);
        $nom = htmlspecialchars($_POST['nom']);
        $tel = htmlspecialchars($_POST['tel']);
        $id = htmlspecialchars($_POST['id']);
        $classe = htmlspecialchars($_POST['classe']);
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        // On verife si l'email est deja present dans la base de données----------------------------------------------------------------
        $emailExist = $connect->prepare('SELECT emailEtudiant FROM etudiant where emailEtudiant = ?');
        $emailExist->execute(array($Email));
        if ($emailExist->rowCount() == 0) {
            // on verifie si l'utilisateur n'a pas entré l'email d'un admin-------------------------------------------
            $adminExist = $connect->prepare('SELECT emailAdmin FROM admin where emailAdmin = ?');
            $adminExist->execute(array($Email));
            if ($adminExist->rowCount() == 0) {
                // On verifie si le matricule  est deja present dans la base de données-------------------------------------------------------
                $idExist = $connect->prepare('SELECT IdEtudiant FROM etudiant where IdEtudiant = ? ');
                $idExist->execute(array($id));
                if ($idExist->rowCount() == 0) {
                    // On insert l'etudiant dans le site----------------------------------------------------------------------------------
                    $insertEtudiant = $connect->prepare('INSERT INTO etudiant (IdEtudiant,NomEtudiant,TelEtudiant,mdp,emailEtudiant,Classe) VALUES (?,?,?,?,?,?)');
                    $insertEtudiant->execute(array($id, $nom, $tel, $mdp, $Email, $classe));
                    header("Location: ./index.php");
                } else {
                    $e = "Ce Matricule est déja inscrit dans le site.";
                }
            } else {
                $e = "Cette adrresse Email est déja inscrit dans le site.";
            }
        } else {
            $e = "Cette adrresse Email est déja inscrit dans le site.";
        }
    } else {
        $e = "Veuillez Remplire tous les champs .";
    }
}