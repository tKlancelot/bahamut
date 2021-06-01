<?php
session_start();

$document = "#thumbnails";
$title = "tarik";
$sub = "louatah";



require ('parts/header.php');

$main = new Main();
$main->startFrame('diapo');


require ('object-list.php');
// en mode desktop - section thumbnails

$section1 = new Section();


// $section1->createTitle('vignettes','heading2 shadowed');

$section1->startDiv('cadreCarousel');
    $section1->startDiv('','carousel5');
    for ($j = 0;$j < count($thumbnails);$j++):
        // $section1->startDiv('divHeading shadowed','','');
        //     $section1->createTitle($headings[$j]['title'],$headings[$j]['class']);
        // $section1->endDiv();
        for($i = 0; $i < count($thumbnails[$j]);$i++):
            $section1->createThumbnailsCarousel($thumbnails,$j,$i);
        endfor;
    endfor;
    $section1->endDiv();
$section1->endDiv();


$main->endFrame();

require ('parts/footer.php');

?>
<script type="module">

import { Activate } from "./js/Activate.js";
import { Carousel } from "./js/course.js";
Activate(1,'.menu ul li a');

let myCar6   = new Carousel(document.querySelector('#carousel5'),{
            slidesToScroll : 2,
            slidesVisible : 6,
            infinite : true,
            // pagination : true
        })
        console.log(myCar6);

</script>