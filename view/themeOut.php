<?php
session_start();
$_SESSION['mySwitch'] = "off";
header("Location: index.php");
?>