<?php

define("CHEMIN3","./assets/pictos/");
require ('object-list.php');
// en mode telephone - section thumbnails

$section5 = new Section();
$section5->startSection('sect reveal','section5','data-spy');
$titreSection = $section5->createTitle('#contacts','heading2 reveal-2');

$titreSection = $section5->createTitle('réseaux sociaux et contact','heading3 smaller');
// boucle dans une boucle sur un tableau d'objets
$section5->startSectionFrame('frame50','50vh','','','');
for ($i = 0; $i < count($contacts); $i++):
    $section5->startDiv('contactFrame');
        $section5->startDiv('content');
        $section5->createImageLink(CHEMIN3.$contacts[$i]['source'],$contacts[$i]['href'],'picto','');
        $section5->endDiv();
        $section5->endDiv();
endfor;
$section5->endDiv();
    

// formulaire de contact
?>
<!-- pour l'instant en html -->
<form class="form-tarik shadowed2" action="index.php?controller=message&&action=addMessage" method="post">
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


$titreSection = $section5->createTitle('téléchargements','heading3 smaller');

$section5->startSectionFrame('frameDl','auto','','','');

for ($i = 0; $i < count($downloads); $i++):
    $section5->startDiv('contactFrame');
    $section5->startDiv('content');
    $section5->createImageLink(null,$downloads[$i]['href'],'picto','&emsp;'.$downloads[$i]['content'],$downloads[$i]['download']);
    $section5->endDiv();
    $section5->endDiv();
endfor;

$section5->endDiv();

$titreSection = $section5->createTitle('© tarik louatah - 2021 - tous droits réservés','heading4');

$section5->endSection();

?>

<script>

    let allPictos = document.querySelectorAll('.contactFrame .content .picto');

    function jumpto(anchor){
        window.location.href = "#"+anchor;
    }
    let erreur = document.getElementById("erreur");

    window.onload = checkError;

    function checkError(){
        if(erreur){
            jumpto('section5');
        }
    }

    // rajouter du style au liens de téléchargement

    let links = document.querySelectorAll('#section5 > .frameDl .contactFrame .content');

    links.forEach(function(element){
        $(element).addClass('heading3');
        $(element).css('margin','1.5% 0');
    }
    )

</script>