<?php
unset($_SESSION['user']);
session_destroy();
$_SESSION['user']="";
header('Location: login.php');
?>