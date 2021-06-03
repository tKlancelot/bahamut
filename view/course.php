<?php
session_start();

$document = "#parcours";
$title = REGULAR_TITLE;
$sub = "";

require ('parts/header.php');

$main = new Main();
$main->startFrame('course');


require('object-list.php');

define("CHEMIN","./assets/carousel/");

$section2 = new Section();


$section2->startDiv('cadreCarousel');
    $section2->startDiv('','carousel4');
    for ($i = 0;$i < count($carouselItems);$i++):
        $section2->createCourseCarousel($carouselItems,$i,true,false);
    endfor;
    $section2->endDiv();
$section2->endDiv();


?>
<?php

$main->endFrame();

require ('parts/footer.php');

?>


<script type="module">

import { Activate } from "./js/Activate.js";
import { Carousel } from "./js/course.js";
Activate(2,'.menu ul li a');

/* La largeur minimum de l'affichage est 600 px inclus */
let myCar5 = new Carousel(document.querySelector('#carousel4'),{
    slidesToScroll : 1,
    slidesVisible : 4,
    infinite : true,
    // pagination : true
})

</script>
