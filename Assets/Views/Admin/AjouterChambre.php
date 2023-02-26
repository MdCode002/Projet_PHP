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
            <span id="menu"><img class="icone" src="../../img/menu.png" alt="">
                <p>Menu</p>
            </span>
            <a href="./profilAdmin.php"> <span id="profil"> <img class="icone" src="../../img/profil.png" alt="">
                    <p><?php echo $_SESSION['nomAd'] ?></p>
                </span></a>
            <div class="sep"></div>
            <a href="./homeAdmin.php"><span id="home"><img class="icone" src="../../img/home.png" alt="">
                    <p>Home</p>
                </span></a>
            <div class="sep"></div>
            <span id="parametre"><img class="icone" src="../../img/parametre.png" alt="">
                <p>Parametre</p>
            </span>

        </div>

    </div>
    <div class="Ajouter">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Ajouter une Chambre </h2>
        <form action="" method="post">
            <div id="continaddroom">
                <input type="text" class="addroom" placeholder="Nom de la Chambre" name="nChambre" required>
                <input type="number" class="addroom" placeholder="Superficie de la Chambre" name="superficie" required>
                <input type="number" class="addroom" placeholder="Etage de la chambre" name="etage" required>
                <input type="number" class="addroom" placeholder="Nombre de colocataire maximum " name="colocataire"
                    required>
                <div
                    style="display:flex;align-items: center;justify-content: space-between; width: 270px;margin-top: 20px;">
                    <button type="submit" name="Ajouter" class="addbtn2"
                        onclick="return confirm('Êtes-vous sûr de vouloir Ajouter cette  Chambre ?')">Ajouter</button>
                    <a href="./ListeChambre.php">
                        <div id="annulera">Annuler</div>
                    </a>
                </div>

        </form>



    </div>
    <p class="erreur"> <?php if (isset($e)) {
                            echo $e;
                        } ?></p>
    </div>

    </div>
    </div>
    <div class="hide">
        <div id="hidediv">Merci d'aller sur ordinateur pour voir la liste détailler</div>
    </div>
    <div class="blury">

        <div id="menuparametre">
            <a href="./profilAdmin.php"> <span id="profilb"> <img class="icone" src="../../img/profil.png" alt="">
                    <p><?php echo $_SESSION['nomAd'] ?></p>
                </span></a>
            <a href="./homeAdmin.php"><span id="homeb"><img class="icone" src="../../img/home.png" alt="">
                    <p>Home</p>
                </span></a>
            <a href="./AddAdmin.php"><span id="AddA"><img class="icone" src="../../img/addAdmin.png" alt="">
                    <p>Ajouter Admin</p>
                </span></a>
            <form action="" method="post">
                <button name="deconnexion" id="deconnexion"
                    onclick="return confirm('Êtes-vous sûr de vouloir vous  deconnecter ?')"> <img
                        src="../../img/logout.png" width="30px" alt="">
            </form>
            Déconnexion</button>
        </div>
    </div>
    <script src="../../style/script.js"></script>
</body>


</html>