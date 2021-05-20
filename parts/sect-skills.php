<?php

require('object-list.php');

define("CHEMIN2","./assets/skills/");

$section = new Section();
$section->startSection('sect','section3','data-spy');
$titreSection = $section->createTitle('#compétences','heading2');

// boucle dans une boucle pour créer plusieurs carousel

for($j = 0 ; $j < count($skillsItems);$j++):
    $sousTitre = $section->createTitle($carousels[$j]['title'],'heading3');
    $section->startDiv('cadreCarousel');
        $section->startDiv('',$carousels[$j]['id']);
        for ($i = 0;$i < count($skillsItems[$j]);$i++):
            $section->createCarousel($j,$i,$skillsItems);
        endfor;
        $section->endSectionFrame();
    $section->endSectionFrame();
endfor;

$section->endSection();

?>