<?php

define("CHEMIN3","./assets/pictos/");
require ('object-list.php');
// en mode telephone - section thumbnails

$section5 = new Section();
$section5->startSection('sect','section5','data-spy');
$titreSection = $section5->createTitle('#contacts','heading2');

$titreSection = $section5->createTitle('réseaux sociaux et contact','heading3 smaller text-left');
// boucle dans une boucle sur un tableau d'objets
$section5->startSectionFrame('frame50','50vh','','','');
for ($i = 0; $i < count($contacts); $i++):
    $section5->startDiv('contactFrame shadowed');
        $section5->startDiv('content');
        $section5->createImageLink(CHEMIN3.$contacts[$i]['source'],$contacts[$i]['href'],'picto','');
        $section5->endSectionFrame();
        $section5->endSectionFrame();
endfor;
$section5->endSectionFrame();
    



$titreSection = $section5->createTitle('téléchargements','heading3 smaller text-left');

$section5->startSectionFrame('frameDl','12.5vh','','','');

for ($i = 0; $i < count($downloads); $i++):
    $section5->startDiv('contactFrame shadowed');
    $section5->startDiv('content');
    $section5->createImageLink(CHEMIN3.$downloads[$i]['source'],$downloads[$i]['href'],'picto',NULL,$downloads[$i]['download']);
    $section5->endSectionFrame();
    $section5->endSectionFrame();
endfor;

$section5->endSectionFrame();

$titreSection = $section5->createTitle('© tarik louatah - 2021 - tous droits réservés','heading4');
// formulaire de contact

$section5->endSection();