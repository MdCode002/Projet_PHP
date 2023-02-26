<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Etudiant/AuthantificationEtudiant.php');
// require_once('../../Actions/Etudiant/pasDeChambre.php');
require_once('../../Actions/Etudiant/ActionhomeEtudiant.php');
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

        <a href="./homeEtudiant.php"><img src="../../img/logo.png" alt="" height="48px" style="margin-left:15px;margin-top:2px;"></a>
        <div class="menu">
            <span id="menu"><img class="icone" src="../../img/menu.png" alt="">
                <p>Menu</p>
            </span>
            <a href="./ProfilEtudiant.php"> <span id="profil"> <img class="icone" src="../../img/profil.png" alt="">
                    <p><?php echo $_SESSION['nomEt'] ?></p>
                </span></a>
            <div class="sep"></div>
            <a href="./homeEtudiant.php"><span id="home"><img class="icone" src="../../img/lit-double 1.png" alt="">
                    <p>Chambre</p>
                </span></a>
            <div class="sep"></div>
            <span id="parametre"><img class="icone" src="../../img/parametre.png" alt="">
                <p>Parametre</p>
            </span>

        </div>

    </div>
    <div class="continerListeEtudiant">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Profil</h2>
        <div>
            <div id="Liste" style="flex-direction : column;align-items: center; font-family: 'Lato',sans-serif; top: 50px;">
                <h4 style="margin:10px"><span id="infogray">Prenoms et Nom </span> :
                    <?php echo $Chambredeuser['NomEtudiant']; ?></h4>
                <h4 style="margin:10px"><span id="infogray">Matricule</span> :
                    <?php echo $Chambredeuser['IdEtudiant']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Telephone</span>:
                    <?php echo $Chambredeuser['TelEtudiant']; ?></h4>
                <h4 style="margin:10px"><span id="infogray">Classe</span> :
                    <?php echo $Chambredeuser['Classe']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Email</span> :
                    <?php echo $Chambredeuser['emailEtudiant']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Chambre</span> :
                    <?php if ($Chambredeuser['Chambre'] == 1) {
                        echo "Pas de chambre";
                    } else {
                        echo $chambre['nomChambre'];
                    }; ?>
                </h4>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="blury">

        <div id="menuparametre">
            <a href="./ProfilEtudiant.php"> <span id="profilb"> <img class="icone" src="../../img/profil.png" alt="">
                    <p><?php echo $_SESSION['nomEt'] ?></p>
                </span></a>
            <a href="./homeEtudiant.php"><span id="homeb"><img class="icone" src="../../img/lit-double 1.png" alt="">
                    <p>Chambre</p>
                </span></a>
            <form action="" method="post">
                <button name="deconnexion" id="deconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous  deconnecter ?')"> <img src="../../img/logout.png" width="30px" alt="">
            </form>
            Déconnexion</button>
        </div>
    </div>
    <script src="../../style/script.js"></script>
</body>


</html>