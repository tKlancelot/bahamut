<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- favicon -->
    <link rel="icon" href="./assets/icons/temp-favicon.svg"/>   


    <!-- librairie jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://unpkg.com/typewriter-effect@2.3.1/dist/core.js"></script>



    <!-- librairie three js -->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/108/three.min.js'></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" integrity="sha512-dLxUelApnYxpLt6K2iomGngnHO83iUvZytA3YjDUCjT0HDOHKXnVYdf3hU4JjM8uEhxf9nD1/ey98U3t2vZ0qQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdn.jsdelivr.net/gh/mrdoob/three.js@r128/examples/js/loaders/GLTFLoader.js'></script>
    <!-- <script src='https://unpkg.com/three@0.91.0/examples/js/loaders/GLTFLoader.js'></script> -->
    <script src="https://unpkg.com/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
    

    <title><?=$document?></title>
</head>

<style>
    <?php if(isset($_SESSION['mySwitch'])):?>
        <?php if($_SESSION['mySwitch'] === "on"):?>
        :root{
            --thema-white:#0f2930f0;
            --thema-lightest:#0E1F23;
            --thema-light:#E1FBFF;
            --thema-transp:#E1FBFF96;
            --thema:#b5e9ff;
            --thema-dark:#9bddf8;
            --thema-darker:#E9FBFF;
            --thema-darkest:#F7FEFF;
            --thema-dark-transp:#C6F8FF32;
            --font-contrail:'Contrail One', cursive;
            --font-zilla:'Zilla Slab', serif;
            --font-normal:'DM Sans', sans-serif;
            --font-spectral:'Spectral', serif;
        }
        <?php elseif($_SESSION['mySwitch'] === "off"): ?>
        :root{     
            --thema-white:#ffffffe0;
            --thema-lightest:#e5faff;
            --thema-light:#B5E9FF;
            --thema:#B5E9FF;
            --thema-transp:#dafeffc4;
            --thema-dark:#9bddf8;
            --thema-darker:#1D7689;
            --thema-darkest:#18475Ad4;
            --thema-dark-transp:#2f7a9948;
            --font-contrail:'Contrail One', cursive;
            --font-zilla:'Zilla Slab', serif;
            --font-normal:'DM Sans', sans-serif;
            --font-spectral:'Spectral', serif;
        }
        <?php endif; ?>
    <?php else: ?>
    :root{
        --thema-white:#fffffff0;
        --thema-lightest:#e5faff;
        --thema-light:#B5E9FF;
        --thema:#B5E9FF;
        --thema-transp:#dafeffc4;
        --thema-dark:#9bddf8;
        --thema-darker:#1D7689;
        --thema-darkest:#18475Ad4;
        --thema-dark-transp:#2f7a9948;
        --font-contrail:'Contrail One', cursive;
        --font-zilla:'Zilla Slab', serif;
        --font-normal:'DM Sans', sans-serif;
        --font-spectral:'Spectral', serif;
    }
    <?php endif; ?>

    h3, h4, h5, li, a, p, label, input, select, option{
        font-size:<?= isset($_SESSION['font-size']) ? $_SESSION['font-size'] : "14px";?>
    }
</style>




<script src="./js/responsive.js" type="module"></script>
<script src="./js/scrollspy.js" type="module"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
    
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N91KK6BTFG"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-N91KK6BTFG');
</script>


<!-- /* --thema-lightest:#f6fdff;
     --thema-light:#e8fbff;
     --thema:#bbe9f4;
     --thema-transp:#D0F6FF96;
     --thema-dark:#B2EDFB;
     --thema-darker:#5393A1;
     --thema-darkest:#2C5058;
     --thema-dark-transp:#5393A132;
     --font-contrail:'Contrail One', cursive;
     --font-zilla:'Zilla Slab', serif;
     --font-normal:'DM Sans', sans-serif; */

     /* green theme */

     /* --thema-lightest:#F6FEE6;
     --thema-light:#ECFAD0;
     --thema:#ddf2b6;
     --thema-transp:#ddf2b696;
     --thema-dark:#cbec8f;
     --thema-darker:#6E9A1B;
     --thema-darkest:#364F08;
     --thema-dark-transp:#6E9A1B32;
     --font-contrail:'Contrail One', cursive;
     --font-zilla:'Zilla Slab', serif;
     --font-normal:'DM Sans', sans-serif; */

    /* turquoise theme */

     /* --thema-lightest:#DAFFF4;
     --thema-light:#C6FDEC;
     --thema:#AEF7E1;
     --thema-transp:#AEF7E196;
     --thema-dark:#98f0d5;
     --thema-darker:#519983;
     --thema-darkest:#335248;
     --thema-dark-transp:#51998332;
     --font-contrail:'Contrail One', cursive;
     --font-zilla:'Zilla Slab', serif;
     --font-normal:'DM Sans', sans-serif; */ -->


     <!-- purple theme
     --thema-lightest:#F8F8FF;
        --thema-light:#DDDFFB;
        --thema-transp:#D7D8FF96;
        --thema:#dcddff;
        --thema-dark:#b3b5ed;
        --thema-darker:#7073CD;
        --thema-darkest:#2F306F;
        --thema-dark-transp:#7073CD32;
        --font-contrail:'Contrail One', cursive;
        --font-zilla:'Zilla Slab', serif;
        --font-normal:'DM Sans', sans-serif; -->