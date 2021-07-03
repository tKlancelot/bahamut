<?php

require ('parts/head.php');
// dump($louatah);
// die();
$header = new Header('','');
//booleans : 1 => logo ? , 2 => title ?, 3 => menu ? 

//option par défaut
$header->startHeader($_SESSION['class'] ?? "header",false,$_SESSION['title'] ?? 1,true);

$header->endHeader();



?>


<script>

</script>