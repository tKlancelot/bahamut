<?php 

session_start();

$document = "#configurateur 3d";
$title = REGULAR_TITLE;
$sub = REGULAR_SUB;

require ('parts/head.php');

$main = new Main();
$main->startFrame('config3d');
$section = new Section();
// $section->createTitle('configurateur 3d canapé (refonte en cours)','heading2');
// $section->startDiv('bottomPanel','bottomP');
?>
<div class="control-panel">

    <button id='back'>retour</button>
    <!-- <button id='lights'>lights</button> -->
    <button id='floor'>floor</button>
    <button id='background'>background</button>
    <button id='frame'>frame</button>
    <button id='grass'>grass</button>
</div>
<?php
// $section->endDiv();
$main->endFrame();

// require ('parts/footer.php');

?>

<script src='./js/couch3d.js' type='module'></script>