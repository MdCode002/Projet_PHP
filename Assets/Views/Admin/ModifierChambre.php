<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/ActionModifierchambre.php');
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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Modifier Chambre </h2>
        <form action="" method="post">
            <div id="continaddroom">
                <div id="updatecontainer">
                    <h3> Nom : </h3> <input type="text" class="modifieroom"
                        placeholder="<?php echo $arrayMChambre[0]["nomChambre"]; ?>" name="MnomChambre">
                </div>
                <div id="updatecontainer">
                    <h3> Superficie en m² : </h3> <input type="number" class="modifieroom"
                        placeholder="<?php echo $arrayMChambre[0]["Superficie"]; ?>" name="Msuperficie">
                </div>
                <div id="updatecontainer">
                    <h3> Etage : </h3> <input type="number" class="modifieroom"
                        placeholder="<?php echo $arrayMChambre[0]["etageChambre"]; ?>" name="Metage">
                </div>
                <div id="updatecontainer">
                    <h3> Nbr max locataire: </h3> <input type="number" class="modifieroom"
                        placeholder="<?php echo $arrayMChambre[0]["effectifMax"]; ?>" name="Mcolocataire">
                </div>
                <h3 style="margin: 10px;">Supprimer locataire de la chambre:</h3>
                <div id="coloc">
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Prenoms Noms</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                        <div id="ListeName" style="background: white;"><?php echo $etudiant['NomEtudiant']; ?></div>
                        <?php } ?>
                    </div>
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Matricule</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                        <div id="ListeName" style="background: white;"><?php echo $etudiant[0]; ?></div>
                        <?php } ?>
                    </div>

                    <div id="Lesprenom">
                        <div style="margin: 10px;">Supprimer</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                        <form action="" method="post">
                            <button id="ListeName" style="background: white;" name="suppEtCha"
                                value="<?php echo $etudiant['0']; ?>">Supprimer</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>

                <div><button type="submit" name="ModifierChambre" class="addbtn">Modifier</button>
                    <button class="addbtn" name="annuler">Retour</button>
                </div>
                <p class="erreur"> <?php if (isset($e)) {
                                        echo $e;
                                    } ?></p>
            </div>
        </form>
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