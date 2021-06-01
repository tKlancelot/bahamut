<?php
session_start();

$document = "#pedagogy";
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
Activate(1,'.menu-footer ul li a');

</script>