<?php
$Chambredeuser = $connect->query("SELECT * FROM etudiant WHERE IdEtudiant  = ".$_SESSION['IdEt'])->fetch();
$chambre = $connect->query("SELECT * FROM chambre WHERE idChambre = ".$Chambredeuser['Chambre'])->fetch(); 
$coloc = $connect->query("SELECT * FROM etudiant WHERE chambre = ".$chambre['idChambre']." And IdEtudiant  != ".$_SESSION['IdEt'] )->fetchall();