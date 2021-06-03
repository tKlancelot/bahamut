<?php
session_start();

$document = "#portfolio";
$title = REGULAR_TITLE;
$sub = "";

require ('parts/header.php');

require ('./parts/custom-form.php');

// n'apparait qu'en mode telephone

$section0 = new Section();
echo "<section id='section0' class='sect reveal' data-spy>";
$section0->createTitle('web&nbsp;<span>developer</span>','heading1 test');
$section0->createTitle('#presentation','heading2 reveal-2');
$section0->endSection();


$main = new Main();

echo '<main class="presentation">';

// apparait en mode telephone et desktop

$main->startDiv('section-main','Pres');

// contenu

?>

    <div class="section">
        <div class="frame-1">
            <div class="picture">
                <div class="under"></div>        
            </div>
        </div>
        <div class="frame-2">
            <div class='under'>
                <div class="under-frame">
                    <h4></h4>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="frame-3">
            <div class='under-frame classy'>
                <button id="auto"></button>
                <button id="prev"></button>
                <button id="next"></button>
            </div>
        </div>
    </div>
<?php


$main->endDiv();

$main->endFrame();



// fin du carousel autoplay
// en mode telephone uniquement ->

require ('parts/sect-thumbnails.php');
require ('parts/sect-course.php');
require ('parts/sect-skills.php');
require ('parts/sect-testimonials.php');
require ('parts/sect-contact.php');

// n'apparait qu'en mode desktop

require ('parts/footer.php');
// dump($_POST);

?>
<script type="module">

import { Activate } from "./js/Activate.js";
import { ToggleParams } from "./js/ToggleParams.js";
import { Config } from "./js/Config.js";
Activate(0,'.menu ul li a');
ToggleParams();
Config();
$(".logoFrame").css('border','2px solid transparent');
$(".logoFrame").attr('title','cliquez pour changer le thème');

$( function() {
    // $( ".logoFrame" ).draggable();
    $('.logoFrame').mouseover(function(){
        $(this).css('border','2px solid var(--thema-darkest)');
    })
    $('.logoFrame').mouseleave(function(){
        $(this).css('border','2px solid transparent');
    })
});


var app = document.querySelector('.heading1.test');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString('Web Developer')
    .pauseFor(1500)
    .deleteAll()
    .typeString('Ready to Work !')
    .pauseFor(1500)
    .deleteAll()
    .typeString('Let\'s Get Programming !')
    .pauseFor(1500)
    .start();

</script>

<script src="./js/homePage.js">

</script>

