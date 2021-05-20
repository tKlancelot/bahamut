<?php
session_start();

$document = "#legal notice";
$title = "#legal notice";
$sub = "portfolio - tarik louatah";

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