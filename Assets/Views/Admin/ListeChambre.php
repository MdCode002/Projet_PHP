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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Liste des Chambres </h2>
        <form action="" method="post">
            <input type="number" placeholder="Chercher ID" name="Searchchambre" id="Searchchambre">
            <select name="filtrechambre" id="filtre">
                <option value="tout" selected>Tout</option>
                <option value="complet"
                    <?php if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "complet") echo "selected"; ?>>
                    Chambres complètes</option>
                <option value="dispo"
                    <?php if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "dispo") echo "selected"; ?>>
                    Chambres disponibles
                </option>
            </select>
            <input type="submit" id="validefiltre" name="validefiltre" value="Filtrer">
        </form>
        <div>
            <div id="Liste">
                <div id="Lesprenom">
                    <div style="margin: 10px;">Nom Chambre</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                    <div id="ListeName"><?php echo $Chambre['nomChambre']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">ID Chambre</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                    <div id="ListeName"><?php echo $Chambre['idChambre']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Nombre Locataire</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                    <div id="ListeName"><?php echo $Chambre['effectif'] . "/" . $Chambre['effectifMax']; ?></div>
                    <?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Superficie</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                    <div id="ListeName"><?php echo $Chambre['Superficie'] . " m²"; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Supprimer</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                    <form action="" method="post">
                        <button id="ListeName" name="supprimerchambre" value="<?php echo $Chambre[0]; ?>"
                            onclick="return confirm('Êtes-vous sûr de vouloir Supprimer cette Chambre  ?')">Supprimer</button>
                    </form><?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Modifier</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                    <form action="" method="post">
                        <button id="ListeName" name="modifieroom"
                            value="<?php echo $Chambre[0]; ?>">modifier<?php $Chambre[0]; ?></button>
                    </form><?php } ?>
                </div>
            </div>
        </div>
    </div>
    <a href="./AjouterChambre.php">
        <div id="ajouteroom">
            <img src="../../img/Vector.png" alt="" height="35px" style="margin: 10px;">
            <p>Ajouter une Chambre</p>
        </div>
    </a>
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