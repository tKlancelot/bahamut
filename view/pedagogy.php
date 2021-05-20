<?php
session_start();

$document = "#pedagogy";
$title = "#pedagogy";
$sub = "portfolio - tarik louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('contact');

$main->endFrame();

require ('parts/footer.php');

?>

<script type="module">

import { Activate } from "./js/Activate.js";
Activate(1,'.menu-footer ul li a');

</script>