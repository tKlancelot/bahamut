<?php
session_start();


$document = "#contact";
$title = REGULAR_TITLE;
$sub = "";

require ('parts/header.php');

$main = new Main();
$main->startFrame('contact');


define("CHEMIN3","./assets/pictos/");
require ('object-list.php');

$sectionLeft = new Section();
$sectionLeft->startSection('section-left');

$titreSection = $sectionLeft->createTitle('téléchargements','heading3 smaller');

$sectionLeft->startSectionFrame('frameDl','auto','','','');

for ($i = 0; $i < count($downloads); $i++):
    $sectionLeft->startDiv('contactFrame');
    $sectionLeft->startDiv('content reveal');
    $sectionLeft->createImageLink(CHEMIN3.$downloads[$i]['source'],$downloads[$i]['href'],'picto',$downloads[$i]['content'],$downloads[$i]['download']);
    $sectionLeft->endDiv();
    $sectionLeft->endDiv();
endfor;

$sectionLeft->endDiv();

$titreSection = $sectionLeft->createTitle('sites partenaires','heading3 smaller');

$sectionLeft->startSectionFrame('frameDl partner','auto','','','');

for ($i = 0; $i < count($partners); $i++):
    $sectionLeft->startDiv('contactFrame');
    $sectionLeft->startDiv('content');
    $sectionLeft->createImageLink(CHEMIN3.$partners[$i]['source'],$partners[$i]['href'],'picto',$partners[$i]['content'],'');
    $sectionLeft->endDiv();
    $sectionLeft->endDiv();
endfor;

$sectionLeft->endDiv();

$sectionLeft->endSection();

?><hr><?php


$section5 = new Section();
$section5->startSection('contacts');
$titreSection = $section5->createTitle('formulaire de contact','heading3 smaller');

    

// formulaire de contact
?>
<!-- pour l'instant en html -->
<form class="form-tarik shadowed2" action="index.php?controller=message&&action=addMessageDesktop" method="post">
    <div class="section-label">
        <label for="pseudo">prénom</label>
    </div>
    <div class="section-input">
        <input name="pseudo" type="text" placeholder="renseignez un prénom ou pseudo" value='<?= isset($_POST['pseudo'])?($_POST['pseudo']):null;?>'>
    </div>
    <div class="section-label">
        <label for="content">message</label>
    </div>
    <div class="section-input">
        <textarea rows="8" name="content" placeholder="rédigez votre message ici"></textarea>
        <input class="submit" type="submit">
    </div>
</form>


<?php if(isset($errors)):?>
    <?php foreach($errors as $error):?>
        <p id="erreur" class="heading4"><?=$error?></p>
    <?php endforeach;?>
<?php endif ?>

<?php
// boucle dans une boucle sur un tableau d'objets
$section5->startSectionFrame('frame50 desktop','10vh','','','');
for ($i = 0; $i < count($contacts); $i++):
    $section5->startDiv('contactFrame');
        $section5->startDiv('content');
        $section5->createImageLink(CHEMIN3.$contacts[$i]['source'],$contacts[$i]['href'],'picto','');
        $section5->endDiv();
        $section5->endDiv();
endfor;
$section5->endDiv();
$section5->endSection();

$main->endFrame();

require ('parts/footer.php');

?>

<script type="module">

import { Activate } from "./js/Activate.js";
Activate(0,'.menu-footer ul li a');
// $('.form-tarik .section-input').css('border-color','var(--thema-dark-transp)');
$('.form-tarik .section-input').css('border','unset');
$('.form-tarik .section-input input').css('padding','0.25rem');
$('.form-tarik .section-input textarea').css('padding','0.25rem');


// $('.section-left').css('display','none');
// $('.contacts').css('display','none');
$('.contact hr').css('display','none');

window.onload = function(){
    setTimeout(function(){
        // $('.section-left').slideDown(100);
        $('.contact hr').slideDown(2500);
        // $('.contacts').slideDown(100);
    },500)
}



</script>