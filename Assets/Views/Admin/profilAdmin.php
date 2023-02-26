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
    <div class="continerListeEtudiant">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Profil</h2>
        <div>
            <div id="Liste"
                style="flex-direction : column;align-items: center; font-family: 'Lato',sans-serif; top: 50px;">
                <h4 style="margin:10px"><span id="infogray">Nom </span> :
                    <?php echo  $_SESSION['nomAd']; ?></h4>
                <h4 style="margin:10px"><span id="infogray">Id</span> :
                    <?php echo $_SESSION['IdAd']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Telephone</span>:
                    <?php echo $_SESSION['telAd']; ?></h4>
                <h4 style="margin:10px"><span id="infogray">Email</span> :
                    <?php echo $_SESSION['emailAd']; ?> </h4>
            </div>
        </div>
    </div>
    </div>
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