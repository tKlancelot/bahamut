<?php
session_start();

$document = "#projets";
$title = REGULAR_TITLE;
$sub = "";

require ('parts/header.php');
require ('object-list.php');

$main = new Main();
$main->startFrame('projet');
?>

<div class="projet-list">
    <?php for($i = 0; $i < count($projects);$i++): ?>
    <div class="projet-content">
        <a href="<?= $projects[$i]['link']?>">go to project</a>
        <p><i>ojectif : </i><?= $projects[$i]['goal']?></p>
        <span><?=$projects[$i]['span']?></span>
    </div>
    <?php endfor; ?>
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