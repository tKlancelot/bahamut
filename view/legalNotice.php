<?php
session_start();

$document = "#mentions légales";
$title = REGULAR_TITLE;
$sub = REGULAR_SUB;

require ('parts/header.php');
require ('object-list.php');

$main = new Main();
$main->startFrame('mentions');

$mentions = new Section();

$mentions->startDiv('frame-mention');
    $mentions->startDiv('barreTitre');
    $mentions->createTitle('informations légales','heading2');
    $mentions->endDiv();
    $mentions->startDiv('panneau');
    for ($k = 0; $k < count($legalTitles);$k++)
    {
        echo '<a class="link" href="index.php?controller=default&action=legalnotice#sect'.$k.'">article '.($k+1).'</a>';
    }
    $mentions->endDiv();

    $mentions->startDiv('content');

        for ($j = 0; $j < count($legalMentions);$j++)
        {
            $mentions->createTitle($legalTitles[$j],'heading5','sect'.$j);
            for ($i = 0; $i < count($legalMentions[$j]);$i++)
            {
                $mentions->createPara($legalMentions[$j][$i],'para');
            }
            echo '<hr>';
        }
    $mentions->endDiv();

$mentions->endDiv();

$main->endFrame();

require ('parts/footer.php');

?>

<script type="module">

import { Activate } from "./js/Activate.js";
import { PositionItem } from "./js/PositionItem.js";

Activate(6,'.menu ul li a');
PositionItem(6);

$('.frame-mention').css('display','none');

window.onload = function(){
    setTimeout(function(){
        $('.frame-mention').slideDown(1000);
    },500)
}

let links = document.querySelectorAll('.frame-mention .panneau .link');
let current = 0;

function activateLink()
{
    // recup tous les liens
    
    links.forEach(function(item){
        item.addEventListener('click',function(){
            console.log(current);
            if(current == 1)
            {
                let activeLink = document.querySelector('.active');
                activeLink.classList = "link";
            }
            item.classList.add('active');
            current = 1;
        })
    })
    
}

activateLink();

</script>