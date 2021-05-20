<?php

$nbSection = 5;

?>

<div class="sect">

    <nav id="navSpy" class="">
        <?php for($i = 0; $i <= $nbSection;$i++): ?>
            <a id='sect<?=$i?>' href="#section<?= $i ?>"></a>
            <?php endfor ?>
        </nav>
        <button id="toggleMenu"></button>
</div>