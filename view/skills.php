<?php
session_start();

$document = "#skills";
$title = REGULAR_TITLE;
$sub = "";

require ('object-list.php');
require ('parts/header.php');

define('CHEMIN','./assets/skills/');
$main = new Main();
$main->startFrame('testimonials');
$section = new Section();

// content goes here
$section->startDiv('cadreCarousel');
    $section->startDiv('','carousel6');
    for ($i = 0;$i < count($skillsItems2);$i++):
        $section->createCourseCarousel($skillsItems2,$i,false,true);
    endfor;
    $section->endDiv();
$section->endDiv();

$main->endFrame();

require ('parts/footer.php');   
?>

<script type="module">

import { Activate } from "./js/Activate.js";
import { Carousel } from "./js/course.js";
Activate(3,'.menu ul li a');

/* La largeur minimum de l'affichage est 600 px inclus */
let myCar5 = new Carousel(document.querySelector('#carousel6'),{
    slidesToScroll : 1,
    slidesVisible : 6,
    infinite : true,
    // pagination : true
})


</script>