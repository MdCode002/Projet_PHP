<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/ActionAddadmin.php');

require_once('../../Actions/logOut.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Ajouter Admin</title>
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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Ajouter un Admin</h2>
        <form action="" method="post">
            <div id="continaddroom">
                <input type="text" class="addroom" placeholder="Nom de l'Admin" name="addnomadmin" required>
                <input type="number" class="addroom" placeholder="Telephone" name="addteladmin" required>
                <input type="email" class="addroom" placeholder="Email" name="addemailadmin" required>
                <input type="passwoed" class="addroom" placeholder="mots de passe" name="addmspadmin"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Le mot de passe doit comporter au moins 8 caractères, dont au moins une minuscule, une majuscule et un chiffre."
                    required>
                <div
                    style="display:flex;align-items: center;justify-content: space-between; width: 270px;margin-top: 20px;">
                    <button type="submit" name="AjouterAdmin" class="addbtn2"
                        onclick="return confirm('Êtes-vous sûr de vouloir Ajouter cette  Administrateur ?')">Ajouter</button>
                    <a href="./homeAdmin.php">
                        <div id="annulera">Annuler</div>
                    </a>
                </div>
                <br>
                <?php if (isset($e)) {
                    echo "<h4>$e</h4>";
                } ?>

        </form>



    </div>
    </div>

    </div>
    </div>
    <!-- <div class="hide">
        <div id="hidediv">Merci d'aller sur ordinateur pour Ajouter un administrateur</div>
    </div> -->
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