<?php

if (!isset($_SESSION['authA'])){
    session_destroy();
    header('Location: ../../../index.php');
};