<?php

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['logout'])) {
    unset($_SESSION['admin']);
}
if(!$_SESSION['admin']){
    header('Location: index.php');
}

?>