<?php
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('Location: ../../../index.php');
}