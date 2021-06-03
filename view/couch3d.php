<?php 

session_start();

$document = "#configurateur 3d";
$title = REGULAR_TITLE;
$sub = "";

require ('parts/header.php');

$main = new Main();
$main->startFrame('config3d');
$section = new Section();
$section->createTitle('configurateur 3d canapé (refonte en cours)','heading2');
$section->startDiv('bottomPanel','bottomP');
?>
<button id='colors'>change color</button>
<button id='lights'>lights</button>
<!-- <button>texture</button> -->
<?php
$section->endDiv();
$main->endFrame();

require ('parts/footer.php');

?>

<script src='./js/couch3d.js' type='module'></script>