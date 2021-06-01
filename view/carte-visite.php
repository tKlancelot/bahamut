<?php

session_start();

$document = "#planete-3d";
$title = "tarik";
$sub = "louatah";

require ('parts/header.php');

$main = new Main();
$main->startFrame('carte-visite');
$section = new Section();
?>

<div class="panneauMilieu darkNeon">
    <?php $section->createTitle('complétez mon arbre de compétence','heading3'); ?>
    <div class="zone1">
        <section>
            <div class="zone-titre darkNeon">
                <h4>front-end</h4>
            </div>
            <div id="front-end" class="zone-droppable">
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
            </div>
        </section>
        <section>
            <div class="zone-titre darkNeon">
                <h4>back-end</h4>
            </div>
            <div id="back-end" class="zone-droppable-2">
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
            </div>
        </section>
        <section>
            <div class="zone-titre darkNeon">
                <h4>libraries, framework, cms</h4>
            </div>
            <div id="libraries" class="zone-droppable">
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
                <div class="case-droppable"></div>
            </div>
        </section>
    </div>

    <div class="zone4">
        <div class="zone-selectable">
            <div class="base">
                <div id="special" class="front-end draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="front-end draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="back-end draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="front-end draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="front-end draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="back-end draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
            <div class="base">
                <div class="framework draggable" draggable=true></div>
            </div>
        </div>
    </div>
</div>

<div class="cadre-bottom">
    <div class="dragLegend"></div>  
</div>

<?php

$main->endFrame();

require ('parts/footer.php');

?>

<script src='js/carte-visite.js' type="module"></script>