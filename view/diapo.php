<?php
session_start();

$document = "#slideshow";
$title = "#slideshow";
$sub = "portfolio - tarik louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('diapo');

$main->endFrame();

require ('parts/footer.php');

?>

<script type="module">

import { Activate } from "./js/Activate.js";
Activate(1,'.menu ul li a');

</script>