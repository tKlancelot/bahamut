<?php
session_start();
$_SESSION['mySwitch'] = "on";
header("Location: index.php");
?>