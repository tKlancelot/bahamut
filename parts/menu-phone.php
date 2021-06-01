<?php

$nbSection = 5;

$sections = ['home','thumbnails','course','skills','testimonials','contact'];

?>

<div class="sect">

    <!-- <button id="informations"></button>  -->
    <nav id="navSpy" class="">
        <?php for($i = 0; $i <= $nbSection;$i++): ?>
            <a id='sect<?=$i?>' href="#section<?= $i ?>"><?=$sections[$i]?></a>
            <?php endfor ?>
    </nav>
    <button id="toggleMenu"></button>
</div>

<script>
    let section0 = document.querySelectorAll('#navSpy a')[0];
    section0.classList.add('active');

</script>