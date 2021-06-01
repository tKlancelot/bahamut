<?php
session_start();

$document = "#projets";
$title = "tarik";
$sub = "louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('projet');
?>

<div class="projet-list">
    <div class="projet-content">
        <a href="index.php?controller=projets&&action=planete3d">go to project</a>
        <p><i>objectif</i> : système solaire des langages de développement réalisé avec la librairie Three.js</p>
        <span>planète 3d</span>
    </div>
    <div class="projet-content">
        <a href="index.php?controller=projets&&action=carteVisite">go to project</a>
        <p><i>objectif</i> : exploiter l'api drag and drop de javascript afin de créer des programmes pédagogiques</p>
        <span>drag&drop</span>
    </div>
</div>

<?php
$main->endFrame();

require ('parts/footer.php');

?>



<script type='module'>
import { Activate } from "./js/Activate.js";
Activate(4,'.menu ul li a');

let projectLinks = document.querySelectorAll('.projet-list .projet-content');


projectLinks.forEach((element)=>{
    let parent = element.parentNode;

    let headBar = document.createElement('div');
    let arrowButton = document.createElement('button');
    let para = element.children[0]; 
    let link = element.children[1]; 
    let span = element.children[2]; 
    let title = element.children[2].textContent;
    $(arrowButton).addClass('toggle');
    $(headBar).addClass('headBar');
    headBar.textContent = title;
    let toggled = 0;
    element.appendChild(headBar);
    headBar.append(arrowButton);
    $(para).hide();
    $(link).hide();
    $(span).hide();
    $(arrowButton).click(function(){
        if(toggled == 0)
        {
            $(para).slideToggle("fast");
            $(link).slideToggle("fast");
            $(this).css('background-image','url("./assets/icons/icon-minus.svg")');
            toggled = 1;
        }
        else
        {
            $(para).slideToggle('fast');
            $(link).slideToggle("fast");
            $(this).css('background-image','url("./assets/icons/icon-plus.svg")');
            toggled = 0;
        }
    })
})


</script>