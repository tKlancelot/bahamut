<?php
session_start();

$document = "#planete-3d";
$title = REGULAR_TITLE;
$sub = REGULAR_SUB;

require ('parts/header.php');

$main = new Main();
$main->startFrame('projet');


$main->endFrame();

require ('parts/footer.php');

?>

<script type="module">

    import { Activate } from "./js/Activate.js";
    import { PositionItem } from "./js/PositionItem.js";

    Activate(4,'.menu ul li a');
    PositionItem(4);
    
</script>

<script src="./js/planets-3d.js" type="module"></script>

</script>