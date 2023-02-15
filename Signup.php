<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/style/logsign.css">
    <title>Document</title>
</head>
<?php require('./Assets/Actions/ActionSignup.php') ?>

<body>
    <div class="Menu">
        <img src="./Assets/img/logo.png" alt="" height="48px" style="margin-left:15px;margin-top:2px">
    </div>
    <div id="log">
        <pre id="slogan"><span id="txtg">SAMA NEEK</span>      KOU NEK AK SA NEEK</pre>
        <p id="inscription">Inscription</p>
        <form action="" method="post">
            <div class="formsign">
                <input type="email" placeholder="Email" name="Email" required>
                <input type="number" placeholder="Matricule" name="id" required>
                <input type="text" placeholder="Prenom et Nom" name="nom" required>
                <input type="number" placeholder="Telephone" name="tel" required>
                <input type="text" placeholder="Classe" name="classe" required>
                <input type="password" placeholder="Mots de passe" name="mdp"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Le mot de passe doit comporter au moins 8 caractères, dont au moins une minuscule, une majuscule et un chiffre."
                    required>
                <p class="erreur"> <?php if(isset($e)){echo$e;}?></p>
                <button id="btn" style="top:30px" type="submit" name="valider"> S'inscrire</button>
                <p id="sinscrire" style="top:60px"><span>Vous avais deja un compte?<a href="./index.php"><span
                                style="text-decoration-line: underline;color: black;font-weight: 900;cursor: pointer;">Se
                                connecter </span></a></span>
                </p>
            </div>
        </form>

    </div>

</body>

</html>