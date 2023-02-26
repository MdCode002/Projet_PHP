<?php
require('./Assets/database/bdd.php');
if (isset($_SESSION['authA'])) {
    header('Location: ./Assets/Views/Admin/homeAdmin.php');
};
if (isset($_SESSION['authE'])) {
    header('Location: ./Assets/Views/Etudiants/homeEtudiant.php');
};
if (isset($_POST['valider'])) {
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
        $Email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $emailExist = $connect->prepare('SELECT * FROM etudiant WHERE emailEtudiant = ?');
        $emailExist->execute(array($Email));

        if ($emailExist->rowCount() > 0) {
            $userinfo = $emailExist->fetch();

            if (password_verify($mdp, $userinfo['mdp'])) {
                $_SESSION['authE'] = true;
                $_SESSION['IdEt'] = $userinfo['IdEtudiant'];
                $_SESSION['nomEt'] = $userinfo['NomEtudiant'];
                $_SESSION['telET'] = $userinfo['TelEtudiant'];
                $_SESSION['mdpAd'] = $userinfo['mdp'];
                $_SESSION['emailAd'] = $userinfo['emailEtudiant'];
                $_SESSION['classe'] = $userinfo['Classe'];
                $_SESSION['DemandeChambre'] = $userinfo['DemandeChambre'];
                header("Location: ./Assets/Views/Etudiants/homeEtudiant.php");
            } else {
                $e = "Mots de passe incorrect";
            }
        } else {
            $emailExist = $connect->prepare('SELECT * FROM admin WHERE emailAdmin = ?');
            $emailExist->execute(array($Email));
            if ($emailExist->rowCount() > 0) {
                $admininfo = $emailExist->fetch();
                if (password_verify($mdp, $admininfo['mdp'])) {
                    $_SESSION['authA'] = true;
                    $_SESSION['IdAd'] = $admininfo['IdAdmin'];
                    $_SESSION['nomAd'] = $admininfo['nomAdmin'];
                    $_SESSION['telAd'] = $admininfo['telAdmin'];
                    $_SESSION['mdpAd'] = $admininfo['mdp'];
                    $_SESSION['emailAd'] = $admininfo['emailAdmin'];
                    header("Location: ./Assets/Views/Admin/homeAdmin.php");
                } else {
                    $e = "Mots de passe incorrect";
                }
            } else {
                $e = "Cette email n'est pas inscrit dans le site";
            }
        }
    } else {
        $e = "Remplit tous les champs";
    }
}