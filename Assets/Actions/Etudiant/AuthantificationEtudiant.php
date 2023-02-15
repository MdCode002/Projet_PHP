<?php
if (!isset($_SESSION['authE'])){
    session_destroy();
    header('Location: ./index.php');
};