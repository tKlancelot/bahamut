<?php

$footer = new Footer();
//boolean 1 => menu footer , 2 => copyright
if(isset($_POST['class-footer']))
{
    $_SESSION['class-footer'] = $_POST['class-footer'];
    $footer->startFooter($_SESSION['class-footer'],true,true,"© tarik louatah - 2021 - tous droits réservés");
}
else{
    //option par défaut
    $footer->startFooter($_SESSION['class-footer'] ?? "footer",true,true,"© tarik louatah - 2021 - tous droits réservés");
}



$footer->startSection('section-footer');
$footer->endSection();
$footer->endFooter();

?>

</html>