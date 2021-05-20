<?php
session_start();

$document = "#testimonials";
$title = "#testimonials";
$sub = "portfolio - tarik louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('testimonials');

// content goes here


$main->endFrame();

require ('parts/footer.php');   
?>

<script type="module">

import { Activate } from "./js/Activate.js";
Activate(3,'.menu ul li a');

</script>