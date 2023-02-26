<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/ActionsListeHomeAdmin.php');
require_once('../../Actions/Admin/ActionsAccorderchambre.php');
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
        <h3 style="position: relative;width:420px; left: 50%; transform: translate(-50%);top:10px">Accorder une chambre
            a
            <?php echo $etudiantChambre[1] . "(" . $etudiantChambre[0] . ")"; ?></h4>
            <h5 style="position: absolute; left: 50%; transform: translate(-50%);top:35px">Chambre disponible</h5>
            <div id="continaddroom">
                <form action="" method="post">
                    <select name="chambre" id="chambreselect">
                        <?php foreach ($Leschambres as $Chambre) { ?>
                        <option
                            <?php if (isset($_POST["chambre"]) && $_POST["chambre"] == $Chambre['nomChambre']) echo "selected"; ?>
                            value="<?php echo $Chambre['nomChambre']; ?>"><?php echo $Chambre['nomChambre']; ?>
                        </option><?php } ?>
                    </select>
                    <button type="submit" id="Choisirechambre" name="Choisire">Choisire </button>
                </form>
                <?php if (isset($_POST['Choisire'])) { ?>
                <div style="display: flex;    align-items: flex-start;">
                    <div id="Lesprenom">
                        <div style="margin: 3px;">Locataire</div>
                        <br>
                        <?php if (isset($m)) {
                                echo $m;
                            }
                            foreach ($Listecolocataire as $Etudiant) { ?>
                        <div id="ListeName" style="background: white; margin-top: 0;">
                            <?php echo $Etudiant['NomEtudiant']; ?></div>
                        <?php } ?>
                    </div>
                    <div id="Lesprenom">
                        <div style="margin: 3px;">Nombre Locataire</div>
                        <br>
                        <div id="ListeName" style="background: white; margin-top: 0;">
                            <?php echo $selectchambre[5] . "/" . $selectchambre[4]; ?>
                        </div>

                    </div>
                    <div id="Lesprenom">
                        <div style="margin: 3px;">Superficie</div>
                        <br>
                        <div id="ListeName" style="background: white; margin-top: 0;">
                            <?php echo $selectchambre[2] . "m²"; ?>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <div><button type="submit" name="accorder" class="addbtn">Accorder</button>
                        <button class="addbtn" name="annuler">Annuler</button>
                    </div>
                </form>
                <?php } ?>


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