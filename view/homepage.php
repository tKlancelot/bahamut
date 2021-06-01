<?php

session_start();
// session_destroy();   


$document = "#portfolio";
$title = "tarik";
$sub = "louatah";


require ('parts/header.php');

// n'apparait qu'en mode telephone

$section0 = new Section();
// $section0->startSection('sect reveal','section0',null);
echo "<section id='section0' class='sect reveal' data-spy>";
$section0->createTitle('web&nbsp;<span>developer</span>','heading1 test');
$section0->createTitle('#presentation','heading2 reveal-2');
$section0->endSection();


$main = new Main();



echo '<main class="presentation">';
// $main->startFrame('presentation');


// apparait en mode telephone et desktop

$main->startDiv('section-main','Pres');

require('./parts/custom-form.php');



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
            <div class='under-frame <?=$_SESSION['class-panel'] ?? "classy"?>'>
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

var app = document.querySelector('.heading1.test');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString('web developer')
    .pauseFor(1500)
    .deleteAll()
    .typeString('ready to work !')
    .pauseFor(1500)
    .deleteAll()
    .typeString('let\'s get coding !')
    .pauseFor(1500)
    .start();


</script>

<script src="./js/homePage.js">


</script>

