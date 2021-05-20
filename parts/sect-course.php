<?php

require('object-list.php');

define("CHEMIN","./assets/carousel/");

$section1 = new Section();
$section1->startSection('sect','section2','data-spy');
$titreSection = $section1->createTitle('#parcours','heading2');

$section1->startDiv('cadreCarousel');
    $section1->startDiv('','carousel0');
    for ($i = 0;$i < count($carouselItems);$i++):
        $section1->createCourseCarousel($carouselItems,$i);
    endfor;
    $section1->endSectionFrame();
$section1->endSectionFrame();

$section1->endSection();

?>

<script src="js/course.js" type="module"></script>