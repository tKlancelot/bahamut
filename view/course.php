<?php
session_start();

$document = "#course";
$title = "#course";
$sub = "portfolio - tarik louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('course');

$main->endFrame();

require ('parts/footer.php');

?>


<script type="module">

import { Activate } from "./js/Activate.js";
Activate(2,'.menu ul li a');

</script>
