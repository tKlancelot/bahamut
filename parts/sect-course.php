<?php

require('object-list.php');

define("CHEMIN","./assets/carousel/");

$section2 = new Section();
$section2->startSection('sect reveal','section2','data-spy');
$titreSection = $section2->createTitle('#parcours','heading2 reveal-2');


$section2->startDiv('cadreCarousel');
    $section2->startDiv('','carousel0');
    for ($i = 0;$i < count($carouselItems);$i++):
        $section2->createCourseCarousel($carouselItems,$i,true,false);
    endfor;
    $section2->endDiv();
$section2->endDiv();

$section2->endSection();

?>

<script src="js/course.js" type="module"></script>