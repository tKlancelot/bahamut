<?php

require ('parts/head.php');
// dump($louatah);
// die();
$header = new Header($title,$sub);
//booleans : 1 => logo ? , 2 => title ?, 3 => menu ? 

if(isset($_POST['logo']) && isset($_POST['title']) && isset($_POST['class']))
{   
    $_SESSION['logo'] = $_POST['logo'];
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['class'] = $_POST['class'];
    $header->startHeader($_SESSION['class'],$_SESSION['logo'],$_SESSION['title'],true);
}
else{
    //option par défaut
    $header->startHeader($_SESSION['class'] ?? "header",false,$_SESSION['title'] ?? 1,true);
}




$header->endHeader();



?>