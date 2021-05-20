<?php

require ('object-list.php');
// en mode telephone - section thumbnails

$section0 = new Section();
$section0->startSection('sect','section1','data-spy');
$titreSection = $section0->setTitreSection('#vignettes');

// gestion de section 0 en mode telephone

$section0->createSectionTitle('heading2',$titreSection->getTitreSection());

// boucle dans une boucle sur un tableau d'objets

for ($j = 0; $j < count($thumbnails); $j++):
$section0->createSectionTitle($headings[$j]['class'],$headings[$j]['title']);
    for ($i = 0 ; $i < count($thumbnails[$j]) ; $i++):
        $section0->startSectionFrame(isset($_SESSION['class-frames'])?$_SESSION['class-frames'].'frame30 shadowed':'frame30 shadowed','30vh',$thumbnails[$j][$i]['title'],$thumbnails[$j][$i]['source']);
        $section0->endSectionFrame();
    endfor;
endfor;

$section0->endSection();

