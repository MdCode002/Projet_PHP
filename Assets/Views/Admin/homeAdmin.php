<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/ActionsListeHomeAdmin.php');
require_once('../../Actions/logOut.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Document</title>
</head>

<body>

    <div class="navbar">
        <a href="./homeAdmin.php"><img src="../../img/logo.png" alt="" height="48px"
                style="margin-left:15px;margin-top:2px;"></a>
        <div class="menu">
            <a href="./ProfilAdmin.php"> <span id="profil"> <img class="icone" src="../../img/profil.png" alt="">
                    <p><?php echo $_SESSION['nomAd'] ?></p>
                </span></a>
            <div class="sep"></div>
            <a href="./homeAdmin.php"><span id="home"><img class="icone" src="../../img/home.png" alt="">
                    <p>home</p>
                </span></a>
            <div class="sep"></div>
            <span id="parametre"><img class="icone" src="../../img/parametre.png" alt="">
                <p>Parametre</p>
            </span>
        </div>
    </div>
    <h2 style="margin:20px;">Liste chambres</h2>
    <div id="containroom">
        <?php foreach ($chambres_5max as $nomchambre){ ?>
        <div class="room">
            <img src="../../img/lit-double 1.png" alt="" height="50px" style="margin: 10px;">
            <p><?php echo $nomchambre['nomChambre'];?></p>
        </div><?php }?>
    </div>
    <a href="./ListeChambre.php">
        <div id="Listeroom">
            <img src="../../img/Vector.png" alt="" height="50px" style="margin: 10px;">
            <p>Voire toutes les Chambres</p>
        </div>
    </a>

    <div id="listeEte">
        <h3 style="margin: 10px;">Liste Des etudiant</h3>
        <div id="cointainerListe">
            <div id="Lesprenom">
                <div style="margin: 10px;">Prenoms et Noms</div>
                <?php foreach ($Etudiant_4max as $etudiant){ ?>
                <div id="prenom"><?php echo $etudiant['NomEtudiant'];?></div><?php }?>
            </div>
            <div id="Lesprenom">
                <div style="margin: 10px;">Matricules</div>
                <?php foreach ($Etudiant_4max as $etudiant){ ?>
                <div id="matricule"><?php echo $etudiant['idEtudiant'];?></div><?php }?>
            </div>

            <a href="./ListeEtudiant.php">
                <div id="valideListe">Détails complets</div>
            </a>
        </div>
    </div>
    <div id="listeMess">
        <h3 style="margin: 10px;">Demande de Chambre</h3>
        <div id="cointainerListe">
            <div id="Lesdemanderoom">
                <!-- <h3>Aucune demande de chambre</h3> -->
                <?php foreach ($demandeChambre_5max as $etudiant){ ?>
                <div class="demanderoom">
                    <?php echo $etudiant['NomEtudiant']."(".$etudiant['IdEtudiant'].")"." Demande une chambre";?></div>
                <?php }?>
            </div>
            <a href="./ListeDemande.php">
                <div id="valideListe">Détails complets</div>
            </a>
        </div>
    </div>
    </div>
    <div class="blury">
        <div id="menuparametre">
            <form action="" method="post">
                <button name="deconnexion" id="deconnexion"
                    onclick="return confirm('Etes vous sur de vouloir vous  deconnecter ?')"> <img
                        src="../../img/logout.png" width="30px" alt="">
            </form>
            Déconnexion</button>
        </div>
    </div>
    <script src="../../style/script.js"></script>
</body>


</html>