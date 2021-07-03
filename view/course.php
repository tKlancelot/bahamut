<?php
session_start();

$document = "#parcours";
$title = REGULAR_TITLE;
$sub = REGULAR_SUB;

require ('parts/header.php');

$main = new Main();
$main->startFrame('course');


require('object-list.php');


$section2 = new Section();

?>

<div class='cadreCarousel'>
    <div id="carousel4">
        <?php for ($i = 0 ; $i < count($carouselItems); $i++): ?>
        <div class="pict" style="background-image:url('./assets/carousel/<?=$carouselItems[$i]["source"];?>')">
            <div class="content">
                <div class="paraContent">
                    <h3 class='heading3'><?=$carouselItems[$i]['title']?></h3>
                    <p><?=$carouselItems[$i]['content']?></p>
                    <p><?=$carouselItems[$i]['content2']?></p>
                </div>
            </div>
        </div>
        <?php endfor ?>  
    </div>
</div>

<?php
?>
<?php

$main->endFrame();

require ('parts/footer.php');

?>


<script type="module">

import { Activate } from "./js/Activate.js";
import { PositionItem } from "./js/PositionItem.js";
import { Carousel } from "./js/course.js";

Activate(2,'.menu ul li a');
PositionItem(2);

    // carousel en mode desktop
    let myCar5 = new Carousel(document.querySelector('#carousel4'),{
        slidesToScroll : 1,
        slidesVisible : 4,
        infinite : true,
        isMobile : true
        // pagination : true
    })


// recuperer les carousel item

// let carouselItems = document.querySelectorAll('#carousel4 .carousel .carousel__container .carousel__item .pict');
// console.log(carouselItems);

</script>
