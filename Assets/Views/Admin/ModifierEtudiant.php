<!DOCTYPE html>
<html lang="en">
<?php
require_once('../../database/bdd.php');
require_once('../../Actions/Admin/AuthantificationAdmin.php');
require_once('../../Actions/Admin/ActionsListeHomeAdmin.php');
require_once('../../Actions/Admin/ActionsModifierEtudiant.php');
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
    <div class="Ajouter">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Modifier l'etudiant </h2>
        <form action="" method="post">
            <div id="continaddroom">
                <div id="updatecontainer">
                    <h3> Prenom Nom : </h3> <input type="text" class="modifieroom"
                        placeholder="<?php echo $etudiantdeuser["NomEtudiant"] ; ?>" name="MnomEtudiant">
                </div>
                <div id="updatecontainer">
                    <h3> Matricule : </h3> <input type="text" class="modifieroom"
                        placeholder="<?php echo $etudiantdeuser["IdEtudiant"] ; ?>" name="Mmatricule">

                </div>
                <div id="updatecontainer">
                    <h3> Telephone : </h3> <input type="text" class="modifieroom"
                        placeholder="<?php echo $etudiantdeuser["TelEtudiant"] ; ?>" name="MTel">
                </div>
                <div id="updatecontainer">
                    <h3> classe : </h3> <input type="text" class="modifieroom"
                        placeholder="<?php echo $etudiantdeuser["Classe"] ; ?>" name="MClasse">
                </div>
                <div id="updatecontainer">
                    <h3> email : </h3> <input type="text" class="modifieroom"
                        placeholder="<?php echo $etudiantdeuser["emailEtudiant"] ; ?>" name="MEmail">
                </div>


                <div
                    style="display:flex;align-items: center;justify-content: space-between; width: 270px;margin-top: 20px;">
                    <button type="submit" name="ModifierEtudiant" class="addbtn2">Ajouter</button>
                    <a href="./ListeEtudiant.php">
                        <div id="annulera">Annuler</div>
                    </a>
                </div>
                <p class="erreur"> <?php if(isset($e)){echo$e;}?></p>
            </div>
        </form>
    </div>
    </div>
    <div class="blury">
        <div id="menuparametre">
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