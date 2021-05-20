<?php

require ('object-list.php');

// en mode telephone - section testimonials

$section4 = new Section();
$section4->startSection('sect','section4');
$titreSection = $section4->createTitle('#témoignages','heading2');

// gestion de section4 en mode telephone

// boucle dans une boucle sur un tableau d'objets

for ($i = 0 ; $i < count($testimonials) ; $i++):
    $section0->startSectionFrame($testimonials[$i]['class'],'48vh',$testimonials[$i]['author'],null,$testimonials[$i]['content']);
    $section0->endSectionFrame();
endfor;


$section4->endSection();