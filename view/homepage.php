<?php
session_start();


$document = "#home";
$title = "#home";
$sub = "portfolio - tarik louatah";

if(!isset($_SESSION['mySwitch']))
{
    $_POST['mySwitch'] = "off";
    $_SESSION['mySwitch'] = $_POST['mySwitch'];
}
else{
    isset($_POST['mySwitch'])? $_SESSION['mySwitch'] = $_POST['mySwitch'] : $_SESSION['mySwitch'] = "off";
}



isset($_POST['font-size']) ? $_SESSION['font-size'] = $_POST['font-size'] : null;


isset($_POST['class-footer']) ? $_SESSION['class-footer'] = $_POST['class-footer'] : null;
isset($_POST['class-panel']) ? $_SESSION['class-panel'] = $_POST['class-panel'] : null;

$_POST['class-frames'] = "";
// die();
isset($_POST['class-frames']) ? $_SESSION['class-frames'] = $_POST['class-frames'] : null;

require ('parts/header.php');


$main = new Main();

// n'apparait qu'en mode telephone

$sectionPres = new Section();
$sectionPres->startSection('sect','sectionPres','data-spy');
$sectionPres->createTitle('web&nbsp;<span>developer</span>','heading1 test');
$sectionPres->createTitle('#presentation','heading2');
$sectionPres->endSection();

$main->startFrame('presentation');

// apparait en mode telephone et desktop

$main->startSection('section-main','section0');

//formulaire de custom app html part

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
            <div class='under <?=$_SESSION['class-frames'] ?? "lightest classy"?>'>
                <div class="under-frame">
                    <h4></h4>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="frame-3">
            <div class='under-frame <?=$_SESSION['class-panel'] ?? "classy shadowed"?>'>
                <button id="auto"></button>
                <button id="prev"></button>
                <button id="next"></button>
            </div>
        </div>
    </div>
<?php

$main->endSection();
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
    .typeString('<strong>let\'s get coding !</strong>')
    .pauseFor(1500)
    .start();


</script>

<script src="./js/homePage.js">




</script>

