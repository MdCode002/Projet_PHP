<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/ActionsListeHomeAdmin.php');
require_once('../../Actions/logOut.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/responsive.css">
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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Liste des étudiants </h2>
        <form action="" method="post">
            <input type="number" placeholder="Chercher un matricule" name="Searchetudiant" id="Searchchambre">

            <select name="filtre" id="filtre">
                <option value="all" selected>Tout</option>
                <option value="loge"
                    <?php if (isset($_POST["filtre"]) && $_POST["filtre"] === "loge") echo "selected"; ?>>Logé</option>
                <option value="nonloge"
                    <?php if (isset($_POST["filtre"]) && $_POST["filtre"] === "nonloge") echo "selected"; ?>>Non logé
                </option>
            </select>
            <input type="submit" id="validefiltre" name="validefiltreEtu" value="Filtrer">
        </form>
        <div>
            <div id="Liste">
                <div id="Lesprenom">
                    <div style="margin: 10px;">Prenoms Noms</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <div id="ListeName"><?php echo $etudiant['NomEtudiant']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Matricules</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <div id="ListeName"><?php echo $etudiant[0]; ?></div><?php } ?>
                </div>
                <div id="Lesprenom" class="telli">
                    <div style="margin: 10px;">Telephone</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <div id="ListeName"><?php echo $etudiant['TelEtudiant']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Classe</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <div id="ListeName"><?php echo $etudiant['Classe']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Chambres</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <div id="ListeName"><?php if ($etudiant['Chambre'] == 1) {
                                                echo "Pas de chambre";
                                            } else chambre($etudiant['Chambre'], $connect); ?></div>
                    <?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Supprimer</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <form action="" method="post">
                        <button id="ListeName" name="supprimer" value="<?php echo $etudiant[0]; ?>"
                            onclick="return confirm('Êtes-vous sûr de vouloir Supprimer cette Étudiant  ?')">Supprimer<?php $etudiant[0]; ?></button>
                    </form><?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Modifier</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                    <form action="" method="post">
                        <button id="ListeName" name="modifieretudiant"
                            value="<?php echo $etudiant[0]; ?>">modifier<?php $etudiant[0]; ?></button>
                    </form><?php } ?>
                </div>
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