<?php

require ('object-list.php');
// en mode telephone - section thumbnails



$section1 = new Section();
$section1->startSection('sect reveal','section1','data-spy');
$titreSection = $section1->createTitle('#vignettes','heading2');


// boucle dans une boucle sur un tableau d'objets

for ($j = 0; $j < count($thumbnails); $j++):
$section1->createSectionTitle($headings[$j]['class'],$headings[$j]['title']);
    for ($i = 0 ; $i < count($thumbnails[$j]) ; $i++):
        $section1->startSectionFrame('frame30','30vh',$thumbnails[$j][$i]['title'],$thumbnails[$j][$i]['source']);
        $section1->endDiv();
    endfor;
endfor;

$section1->endSection();

