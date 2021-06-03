<?php
session_start();

$document = "#planete-3d";
$title = REGULAR_TITLE;
$sub = "";

require ('parts/header.php');

$main = new Main();
$main->startFrame('projet');


$main->endFrame();

require ('parts/footer.php');

?>

<script src="./js/planets-3d.js" type="module"></script>
<script>

if (window.matchMedia("(min-width: 600px)").matches) 
{
  /* La largeur minimum de l'affichage est 600 px inclus */
}
else 
{
    $('.header').removeClass('heading1');
    $('.header').css('background-image',"url('./assets/3d/sky-2.jpg')");
    $('.projet canvas').css('width','100%');
    $('#draggable').css('position','relative');
    $('#draggable').css('box-sizing','border-box');
    $('#draggable').css('width','100%');
    $('#draggable').css('display','flex');
    $('#draggable').css('left','unset');
    $('#draggable').css('top','unset');
    $('#draggable').css('flex-direction','unset');
    $('#draggable button').css('font-size','0.72rem');
    $('#draggable button').css('width','100px');

    let buttonReturn = document.createElement('button');
    buttonReturn.textContent = "home";
    $(buttonReturn).css('position','absolute');
    $(buttonReturn).css('top','14.25%');
    $(buttonReturn).css('left','5%');
    $(buttonReturn).css('background','unset');
    $(buttonReturn).css('border','2px solid #fff8');
    $(buttonReturn).css('color','#fffd');
    $(buttonReturn).css('height','40px');

    $('.projet').append(buttonReturn);

    $(buttonReturn).click(function(){
        window.location = "https://leviathan-pacifique.com";
    })
}

</script>


</script>