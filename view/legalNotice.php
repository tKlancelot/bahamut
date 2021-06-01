<?php
session_start();

$document = "#mentions légales";
$title = "tarik";
$sub = "louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('contact');

$main->endFrame();

require ('parts/footer.php');

?>

<script type="module">

import { Activate } from "./js/Activate.js";
Activate(2,'.menu-footer ul li a');

</script>