<?php
// / on verifie si l'utilisateur n'a pas entré l'email d'un admin-------------------------------------------
if (isset($_POST['AjouterAdmin'])) {
    $Email = htmlspecialchars($_POST['addemailadmin']);
    $nom = htmlspecialchars($_POST['addnomadmin']);
    $tel = htmlspecialchars($_POST['addteladmin']);
    $mdp = password_hash($_POST['addmspadmin'], PASSWORD_DEFAULT);

    $adminExistETU = $connect->prepare('SELECT emailEtudiant FROM etudiant where emailEtudiant = ?');
    $adminExistETU->execute(array($Email));
    if ($adminExistETU->rowCount() == 0) {
        $adminExist = $connect->prepare('SELECT emailAdmin FROM admin where emailAdmin = ?');
        $adminExist->execute(array($Email));
        if ($adminExist->rowCount() == 0) {
            // On insert l'etudiant dans le site----------------------------------------------------------------------------------
            $insertAdmin = $connect->prepare('INSERT INTO admin (nomAdmin,telAdmin,mdp,emailAdmin) VALUES (?,?,?,?)');
            $insertAdmin->execute(array($nom, $tel, $mdp, $Email));
            $e = "L'administrateur a bien etait ajouter dans le site.";
        } else {
            $e = "Cette email est déja inscrit dans le site.";
        }
    } else {
        $e = "Cette email est déja inscrit dans le site.";
    }
}