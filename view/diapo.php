<?php
session_start();

$document = "#thumbnails";
$title = REGULAR_TITLE;
$sub = REGULAR_SUB;



require ('parts/header.php');

$main = new Main();
$main->startFrame('diapo');


// require ('object-list.php');
// // en mode desktop - section thumbnails

// $section1 = new Section();

// // a changer poo php -> poo javascript
// // $section1->createTitle('vignettes','heading2 shadowed');

// $section1->startDiv('cadreCarousel');
//     $section1->startDiv('','carousel5');
//     for ($j = 0;$j < count($thumbnails);$j++):
//         $section1->startDiv('divHeading special',"",'');
//             $section1->createTitle($headings[$j]['title'],$headings[$j]['class']);
//         $section1->endDiv();
//         for($i = 0; $i < count($thumbnails[$j]);$i++):
//             $section1->createThumbnailsCarousel($thumbnails,$j,$i);
//         endfor;
//     endfor;
//     $section1->endDiv();
// $section1->endDiv();

?>

<div class="travaux">
    <p>page en cours de travaux, reviens bientôt !</p>
</div>

<?php
$main->endFrame();

require ('parts/footer.php');

?>
<script src="./js/responsive.js" type="module"></script>
<script type="module">

import { Activate } from "./js/Activate.js";
import { PositionItem } from "./js/PositionItem.js";
import { Carousel } from "./js/course.js";


Activate(1,'.menu ul li a');

function superCarousel()
{
   


    // function handleAfter(){
    //     $(pictureFrame).slideDown(1000);
    //     sceneArray[currentIndex].display(pictureFrame);
    //     sceneArray[currentIndex].showTitle(legendFrame);
    //     sceneArray[currentIndex].showPara(paraFrame);
    //     sceneArray[currentIndex].showSecondPara(paraFrame2);
    //     bullets[currentIndex].classList.add('bullet-active');
    // }

    // function handleBefore(){
    //     bullets[currentIndex].classList.remove('bullet-active');
    //     $(pictureFrame).hide();
    // }

    // // init carousel

    // handleAfter();

    // // gestion des click next et prev 

    // nextButton.addEventListener('click',function(){
    //     if(currentIndex < sceneArray.length -1){
    //         handleBefore();
    //         currentIndex++;
    //         handleAfter();
    //     }
    //     else{
    //         handleBefore();
    //         currentIndex = 0;
    //         handleAfter();
    //     }
    // })

    // prevButton.addEventListener('click',function(){
    //     if(currentIndex > 0 ){
    //         handleBefore();
    //         currentIndex--;
    //         handleAfter();
    //     }
    //     else{
    //         handleBefore();
    //         currentIndex = sceneArray.length-1;
    //         handleAfter();
    //         //do nothing disable button
    //     }
    // })

    // // fonction autoplay

    // let autoplayButton = document.querySelector('.frame-3 .under-frame #auto');
    // let autoplaying = false;
    // let myInt;

    // // gestion du click

    // pictureFrame.addEventListener("click",function(){
    //     if (window.matchMedia("(min-width: 600px)").matches)
    //     {
    //         // recuperer le titre
    //         let titre = sceneArray[currentIndex].getSceneInfo();

    //         // creer un cadre
    //         let myBox = document.createElement('div');

    //         // creer une barre de titre
    //         let myBar = document.createElement('div');
    //         myBar.classList.add('myBar');
    //         let myH4 = document.createElement('h4');
    //         myH4.classList.add('myH4');
    //         myH4.textContent = titre;

            
    //         // creer un bouton fermer
            
    //         let myCross = document.createElement('button');
    //         myCross.classList.add('myCross');
    //         myBar.append(myH4);
    //         let divOptions = document.createElement('div');
    //         divOptions.classList.add('divOptions');
    //         myBar.append(divOptions);
            
    //         // bouton zoom in et out
    //         let zoomIn = document.createElement('button');
    //         zoomIn.classList.add('zoomIn');
    //         // zoomIn.textContent = "+";
    //         let zoomOut = document.createElement('button');
    //         zoomOut.classList.add('zoomOut');
    //         // zoomOut.textContent = "-";
            
    //         divOptions.append(zoomIn);
    //         divOptions.append(zoomOut);
    //         divOptions.append(myCross);


    //         // creer l'element image

    //         let myImage = document.createElement('img');
    //         let imgUrl = this.style.backgroundImage;
    //         myBox.classList.add('myBox');
    //         myImage.src = imgUrl.slice(5,-2);
    //         $("body").append($(myBox));

    //         let zoomIndex = 0;
    //         let zoomArray = [0,1,2,3,4];

    //         function zoomin() {
    //             var currWidth = myImage.clientWidth;
    //             var currHeight = myImage.clientHeight;
    //             myImage.style.width = (currWidth + 100) + "px";
    //             // myImage.style.height = (currHeight + 100) + "px";
    //         }
            
    //         function zoomout() {
    //             var currWidth = myImage.clientWidth;
    //             var currHeight = myImage.clientHeight;
    //             myImage.style.width = (currWidth - 100) + "px";
    //             // myImage.style.height = (currHeight - 100) + "px";
    //         }


    //         setTimeout(function(){
    //             myBox.append(myBar);
    //             myBox.append(myImage);
    //             zoomIn.addEventListener('click',function(){
    //                 if(zoomIndex < zoomArray.length - 1)
    //                 {
    //                     zoomin();
    //                     zoomIndex++;
    //                 }
    //             })
    //             zoomOut.addEventListener('click',function(){
    //                 if(zoomIndex >= -1 )
    //                 {
    //                     zoomout();
    //                     zoomIndex--;
    //                 }
    //             })

    //             myCross.addEventListener("click",function(){
    //             myBox.remove();
    //             })
    //         },1000)
    //     }
    //     else
    //     {
    //         // do nothing
    //     }
    // })


    // function mouseOverOut(elem,source,source2)
    // {
    //     elem.addEventListener('mouseover',function(){
    //         elem.style.backgroundImage = "url('./assets/elements/"+source2+"')";
    //     })
    //     elem.addEventListener('mouseout',function(){
    //         elem.style.backgroundImage = "url('./assets/elements/"+source+"')";
    //     })
    //     elem.style.backgroundImage = "url('./assets/elements/"+source+"')";
    // }

    // autoplayButton.addEventListener("click",function(){
    //     if(autoplaying == true)
    //     {
    //         mouseOverOut(this,"autoplay-button.svg","autoplay-button.svg")
    //         clearInterval(myInt);
    //         handleAfter();
    //         autoplaying = false;
    //     }
    //     else
    //     {
    //         mouseOverOut(this,"stop-button.svg","stop-button-hover.svg")
    //         autoplaying = true;
    //         myInt = setInterval(function(){
    //             if(currentIndex < sceneArray.length-1){
    //                 handleBefore();
    //                 currentIndex++;
    //                 handleAfter();
    //             }
    //             else{
    //                 handleBefore();
    //                 currentIndex = 0;
    //                 handleAfter();
    //             }
    //         },8000)
    //     }
    // })

    // // fonction autoplay 

    // function autoplay()
    // {
    //     autoplaying = true;

    //     myInt = setInterval(function(){
    //         if(currentIndex < sceneArray.length-1)
    //         {
    //             handleBefore();
    //             currentIndex++;
    //             handleAfter();
    //             // $(pictureFrame).fadeOut("slow");
    //         }
    //         else{
    //             handleBefore();
    //             currentIndex = 0;
    //             handleAfter();
    //         }
    //     },8000)
    // }

    // autoplay();
}

PositionItem(1);
superCarousel();


// let myCar6   = new Carousel(document.querySelector('#carousel5'),{
//             slidesToScroll : 2,
//             slidesVisible : 6,
//             infinite : true,
//             // pagination : true
//         })
//         console.log(myCar6);


// let specialFrames = document.querySelectorAll('#carousel5 .special');
// let parents = document.querySelectorAll('.desktop #carousel5 .carousel__item'); 
// let arrayTitle = [0,4,8,12,16,20,24,28,32,36,40];

// for (let i = 0; i < parents.length ;i++)
// {
//     let element = parents[arrayTitle[i]];
//     $(element).css('width','auto');
//     // $(element).css('transform','rotate(90deg)');
// }

// let specialHeadings = document.querySelectorAll('#carousel5 .special h4');
// $(specialFrames).css('width','auto');
// $(specialFrames).css('display','flex');
// $(specialFrames).css('border-color','var(--thema-dark-transp');
// $(specialHeadings).css('writing-mode','vertical-lr');
// $(specialHeadings).css('text-orientation','upright');
// $(specialHeadings).css('font-size','0.92rem');
// $(specialHeadings).css('margin','1rem');
// $(specialHeadings).css('align-items','center');
// $(specialHeadings).css('justify-content','center');
// $(specialHeadings).css('text-align','center');

</script>