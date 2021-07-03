<?php 

session_start();

$document = "#portfolio";

require ('parts/head.php');

?>

<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="./js/Activate.js" type="module"></script>
<script src="./js/PositionItem.js" type="module"></script>
<script src="./js/Header.js" type="module"></script>
<script src="./js/scrollspy.js" type="module"></script>
<!-- <script src="./js/course.js" type="module"></script> -->

<script type="module">

import { Activate } from "./js/Activate.js";
import { PositionItem } from "./js/PositionItem.js";
import { Header } from "./js/Header.js";
import { ToggleParams } from "./js/ToggleParams.js";
import { Scene } from "./js/Scene.js";
import { Thumbnail } from "./js/Thumbnail.js";
import { Carousel } from "./js/course.js";
import { DisableWheel } from "./js/DisableWheel.js";


class ImageLink {
    constructor(href,source,content,parent)
    {
        this.href = href;
        this.source = source;
        this.content = content;
        this.parent = parent;
        this.createImageLink();
    }

    createImageLink()
    {
        let item = createDivWithClass('network',this.parent,'');
        let link = createElementWithTextContent('a','link',this.href,'',item,'');
        $(link).css("background-image","url('./assets/icons/"+this.source+"')");
        $(link).text('');
    }
}

class Accordeon{
    constructor(title,content,description,href,parent,slug,innerHtml)
    {
        this.title = title;
        this.description = description;
        this.content = content;
        this.href = href;
        this.parent = parent;
        this.slug = slug;
        this.innerHtml = innerHtml;
        this.createAccordeon();
        this.initAccordeon();
    }

    createAccordeon()
    {
        let myFrame = createDivWithClass('myFrame',this.parent,'');
        let accordeonHeader = createDivWithClass('accordeon_header',myFrame,'')
        let heading = createHeading('h4','heading3',this.title,accordeonHeader);
        let button = document.createElement('button');
        // button.textContent = "open";
        accordeonHeader.append(button);
        let accordeonContent = createDivWithClass('accordeon_content',myFrame,'');
        let download = createElementWithTextContent('a','download',this.href,this.content,accordeonContent,'',this.innerHtml);
        let description = createElementWithTextContent('p','para','',this.description,accordeonContent,'');
        download.download = this.title;
        // console.log(download);
        this.handleClick(button,accordeonContent);
    }


    handleClick(elem,item)
    {
        let toggle = 0;
        elem.addEventListener('click',function(){
            if(toggle == 0)
            {
                $(item).slideDown();
                $(this).css('background-image','url("./assets/icons/icon-minus-dark.svg")');
                toggle = 1;
            }
            else
            {
                $(item).slideUp();
                $(this).css('background-image','url("./assets/icons/icon-plus-dark.svg")');
                toggle = 0;
            }
        })
    }

    initAccordeon()
    {
        $('.accordeon_content').hide();
    }
}

class Competence{
    constructor(title,source,content,parent)
    {
        this.title = title;
        this.source = source;
        this.content = content;
        this.parent = parent;
        this.createCompetence();
    }
    
    createCompetence()
    {
        let toggle = 0;
        let item = createDivWithClass('competence',this.parent,'test');
        let heading = createHeading('h4','heading3',this.title,item);
        let content = createElementWithTextContent('p','para','',this.content,item,'test');
        $(item).css('background-image','url("./assets/skills/'+this.source+'")');
        let mySource = this.source;
        let myContent = content.textContent;
        item.addEventListener('mouseover',function(){
            if(toggle == 0)
            {
                $(item).css('background-image','initial');
                $(heading).hide();
                $(content).css('display','flex');
                $(myContent).show();
                toggle = 1;
            }
        })
        item.addEventListener('mouseout',function(){
            if(toggle == 1)
            {
                $(item).css('background-image','url("./assets/skills/'+mySource+'")');
                $(heading).show();
                $(content).css('display','none');
                $(myContent).hide();
                toggle = 0;
            }
        })
        return item;
    }



}

DisableWheel();

let loaderFrame;
createLoader();

function loadPage(){
    $(document.body).append(loaderFrame);
    setTimeout(function(){
        $(loaderFrame).fadeOut();
        if (window.matchMedia("(min-width: 600px)").matches)
        {
            createDesktop();
            Activate(0,'.menu ul li a');
            PositionItem(0);

        }
        else
        {
            let theBody = document.querySelector('body');
            theBody.classList.add('theBody');
            createResponsive();
        }
    },4000)
}

// lorsque le document est pret
window.onload = loadPage;

function createLoader()
{
    loaderFrame = document.createElement("div");
    loaderFrame.classList.add("loaderFrame");
    
    let ldsFacebook = createDivWithClass('lds-facebook',loaderFrame,'');
    let div1 = createEmptyElement('div',ldsFacebook,'');
    let div2 = createEmptyElement('div',ldsFacebook,'');
    let div3 = createEmptyElement('div',ldsFacebook,'');
    // return loaderFrame;
}

function createDesktop()
{
    // ancien code

    // // creer un header
    let header = new Header("","","zoneTitle");
    header.createHeader(true,true);
    let myHeader = document.querySelector('.header');
    $(myHeader).addClass('desktop_header');
    // // creer un bouton parametre
    // createParams();
    // // creer un main
    // createMain();
    // $('.presentation .section').fadeIn("slow");
    // superCarousel();
    // // createVideoFrame();
    
    // // creer un footer
    createFooter();
    let myFooter = document.querySelector('.footer');
    $(myFooter).addClass('desktop_footer');

    // nouveau code
    // creer une div "frame" de 100vh/100vw
    let myFrame = createDivWithClass('desktopBody',$('body'),'desktop');
    console.log(myFrame);
    computer3d();
}

function createResponsive()
{
    // nouveau code responsive tel
    let header = new Header("tarik","louatah","zoneTitle");
    header.createHeader(true,false);
    // creer les différentes sections
    createSection('section0','sect');
        createMain();
        superCarousel();
        configResponsiveIntroCarousel();
    createSection('section1','sect');
        createSectionHeading('vignettes',"#section1");
        createThumbnails(); 
    let section2 = createSection('section2','sect');
        createSectionHeading('parcours',"#section2");
        createCourseCarousel();
        configCourseCarousel();
    createSection('section3','sect');
        let skillHeading = createSectionHeading('skills',"#section3");
        createCompetenceBlock();
    createSection('section5','sect');
        createSectionHeading('projets',"#section5");
        createProjects();
    createSection('section4','sect');
        createSectionHeading('contact',"#section4");
    //reseaux
    createNetworkPanel();
    //downloads
    createDownloadPanel();
    
    createFooter();
    let myTitle = document.querySelector('.theBody .zoneTitle');
    $(myTitle).hide();
    setTimeout(function(){
        $(myTitle).slideDown('slow');
    },600);
}

function createVideoFrame()
{
    let videoSkipped = 0;
    let frameVideo = createDivWithClass('frameVideo',$('.presentation'));
    let skipButton = createElementWithTextContent('button','skip','','skip',frameVideo,'skip');
    frameVideo.append(createVideo());
    createVideo().addEventListener('ended',function()
    {
        if(videoSkipped == 1)
        {
            $(".frameVideo").hide();
            $('.presentation .section').fadeIn("slow");
        }
        else
        {
            skipVideo();
        }
    })
    $("#skip").click(function(){
        skipVideo();
        videoSkipped = 1;
    })
}

function skipVideo()
{

    $(".frameVideo").hide();
    $('.presentation .section').fadeIn("slow");
    superCarousel();
    
}

function createVideo()
{
    // CRÉONS LA VIDEO
    // creons objet video
    const largeurFenetre = window.innerWidth;
    const hauteurFenetre = window.innerHeight;

    let myVideo = 
    {
        "element" : "video",
        "controls" : false,
        "autoplay" : "true",
        "width" : largeurFenetre,
        "height" : hauteurFenetre,
        "src" : "./assets/videos/welcome-vid-3.webm",
        // "src" : "./assets/videos/transparent-welcome.webm",
        "type" : "video/webm"
    }


    const myVid = function()
    {
        let video = document.createElement(myVideo.element);
        let source = document.createElement("source");
        video.controls = myVideo.controls;
        video.autoplay = myVideo.autoplay;
        video.width = myVideo.width;
        video.height = myVideo.height;
        source.type = myVideo.type;
        source.src = myVideo.src;
        console.log(video.controls);
        video.append(source);
        return video;
    }
    return myVid();
}

function createHeading(type,className,content,parent)
{
    let myHeading = document.createElement(type);
    myHeading.classList.add(className);
    if(content)
    {
        myHeading.textContent = content;
    }
    if(parent)
    {
        parent.append(myHeading);
    }
    return myHeading;
}

function createPara(className,content,parent)
{
    let myPara = document.createElement('p');
    myPara.classList.add(className);
    if(content)
    {
        myPara.textContent = content;
    }
    if(parent)
    {
        parent.append(myPara);
    }
    return myPara;
}

function createSectionHeading(content,parent)
{
    let titreSection = createHeading('h2','heading2');
    titreSection.textContent = content;
    $(parent).append($(titreSection));
}

function createBlock(id,content)
{
    let elem = createDivWithClass('block',$('#section1'),id);
    let blockTitle = createHeading('h4','heading3')
    blockTitle.textContent = content;
    $(elem).append($(blockTitle));    
    return elem;
}

function createDivWithClass(className, parent,id)
{
    let element = document.createElement('div');
    element.classList.add(className);
    if(id)
    {
        element.id = id;
    }
    parent.append(element);
    return element;
}

function createEmptyElement(type,parent,id)
{
    let element = document.createElement(type);
    if(id)
    {
        element.id = id;
    }
    parent.append(element);
    return element;
}

function createElementWithTextContent(type,className,href,content,parent,id,innerHtml)
{
    let element= document.createElement(type);
    element.classList.add(className);
    element.textContent = content;
    element.innerHtml = '<a href='+href+'>'+innerHtml+'</a>';
    if(type == "a")
    {
        element.href = href;
    }
    if(id)
    {
        element.id = id;
    }
    parent.append(element);
    return element;
}

function createParams()
{
    let divParam = createDivWithClass("divParam",document.body);
    let logoFrame = createDivWithClass("logoFrame",divParam);
    let logoParam = createDivWithClass("logoParam",logoFrame);
    let params = createDivWithClass("test",divParam,"params");
    let optionPanel = createDivWithClass("headingMenu",params);
    let darkLink = createElementWithTextContent('a','link','index.php?controller=default&&action=themeOn','DARK THEME',optionPanel);
    let lightLink = createElementWithTextContent('a','link','index.php?controller=default&&action=themeOut','LIGHT THEME',optionPanel);
    let button = createElementWithTextContent('button','cross',"","",optionPanel);
}

function createMain()
{
    let presentation = createDivWithClass('presentation',document.body);
    let section = createDivWithClass('section',presentation);
    let frame1 = createDivWithClass('frame-1',section);
    let picture = createDivWithClass('picture',frame1);
    let under = createDivWithClass('under',picture);
    
    let frame2 = createDivWithClass('frame-2',section);
    let under2 = createDivWithClass('under',frame2);
    let underFrame = createDivWithClass('under-frame',under2);  
    let h4 = createEmptyElement('h4',underFrame);
    let para = createEmptyElement('p',underFrame);
    let para2 = createEmptyElement('p',underFrame,"second");

    let frame3 = createDivWithClass('frame-3',section);
    let frameCarousel = createDivWithClass('under-frame',frame3);
    frameCarousel.classList.add('classy');
    let buttonAuto = createElementWithTextContent('button','link','','',frameCarousel,"auto");
    let buttonPrev = createElementWithTextContent('button','link','','',frameCarousel,"prev");
    let buttonNext = createElementWithTextContent('button','link','','',frameCarousel,"next");
    
}

function superCarousel()
{
    const chemin = "./assets/slideshow-intro/";

    let pictureFrame = document.querySelector('.picture .under');
    let legendFrame = document.querySelector('.frame-2 .under .under-frame h4');
    let paraFrame = document.querySelector('.frame-2 .under .under-frame p');
    let paraFrame2 = document.querySelector('#second');
    let optionFrame = document.querySelector('.frame-3 .under-frame');
    let prevButton = document.querySelector('.under-frame #prev');
    let nextButton = document.querySelector('.under-frame #next');
    let currentIndex = 0;
    $(paraFrame2).hide();

    let scene1 = new Scene(
        'portrait',
        'Salutations',
        'Je m\'appelle Tarik et je suis passionné par le développement web.'
        +'\n\r',
        chemin+'tarik-blue.jpg',
        0,
        'cover',
        'Chacun des projets que j\'entreprends me permet de révéler ma créativité et mon goût pour un travail de qualité et de précision. Voici quelques-unes de mes activités récentes.',
        "brightness(1.4) sepia(0.24) opacity(0.8)"
    )
    let scene2 = new Scene(
        'canapé 3d au format gltf',
        'Création d\'un canapé en 3d sur Blender, intégration avec Three.js',
        'Concevoir un meuble sur Blender 2.90, l\'intégrer dans un projet au format gltf et manipuler les propriétés de cet objet à l\'aide de Three.js.',
        chemin+'canape.png',
        0,
        'cover',
        '',
        "brightness(1) sepia(0) opacity(1)"
    )
    let scene3 = new Scene(
        'site ArcomiK',
        'Refonte et intégration du site arcomik.com',
        'Lors de mon stage, j\'ai participé à la refonte du site arcomik.com qui avait pour but de présenter le festival du même nom.',
        chemin+'arcomik-site-3.png',
        1,
        'cover'
    )

    let scene4 = new Scene(
        'client saint-clair',
        'Intégration de pages pour le site saint-clair.com',
        'Dans le cadre de mon stage, j\'ai intégré des maquettes pour le client Saint-Clair, un traiteur parisien.',
        chemin+'saint-clair-1.png',
        2,
        'cover'
    )

    let scene5 = new Scene(
        'maquettage figma',
        'Élaboration de maquettes sur l\'outil Figma',
        'Un échantillon de la maquette de ce site.',
        chemin+'maquettage.png',
        3,
        'contain'
    )

    let scene6 = new Scene(
        'configurateur 3d',
        'Création d\'un configurateur 3d à l\'aide de Three.js',
        'Exemple d\'utilisation de la librairie Three.js.',
        chemin+'configurateur-3d-2.png',
        4,
        'cover'
    )

    let scene7 = new Scene(
        'sculptris face',
        'Visage modélisé avec Sculptris',
        'Travailler un visage en 3d avec le freeware sculptris.',
        chemin+'sculptris-face.png',
        5,
        'contain'
    )

    let scene8 = new Scene(
        'motion picture blender',
        'Création vidéo sur blender',
        'Réaliser une vidéo, créer des effets et rendre une animation sur blender, puis intégrer la vidéo en html5.',
        chemin+'video-making.png',
        6,
        'contain'
    )

    let sceneArray = [scene1,scene2,scene3,scene4,scene5,scene6,scene7,scene8];

    function createBullets()
    {
        for(let i = 0; i < sceneArray.length;i++)
        {
            let oneBullet = document.createElement('div');
            oneBullet.classList.add('bullet');
            optionFrame.append(oneBullet);
            optionFrame.insertBefore(oneBullet,nextButton);
        }
    }

    createBullets();

    let bullets = document.querySelectorAll('.bullet');

    function handleAfter(){
        $(pictureFrame).slideDown(1000);
        sceneArray[currentIndex].display(pictureFrame);
        sceneArray[currentIndex].showTitle(legendFrame);
        sceneArray[currentIndex].showPara(paraFrame);
        sceneArray[currentIndex].showSecondPara(paraFrame2);
        bullets[currentIndex].classList.add('bullet-active');
    }

    function handleBefore(){
        bullets[currentIndex].classList.remove('bullet-active');
        $(pictureFrame).hide();
    }

    // init carousel

    handleAfter();

    // gestion des click next et prev 

    nextButton.addEventListener('click',function(){
        if(currentIndex < sceneArray.length -1){
            handleBefore();
            currentIndex++;
            handleAfter();
        }
        else{
            handleBefore();
            currentIndex = 0;
            handleAfter();
        }
    })

    prevButton.addEventListener('click',function(){
        if(currentIndex > 0 ){
            handleBefore();
            currentIndex--;
            handleAfter();
        }
        else{
            handleBefore();
            currentIndex = sceneArray.length-1;
            handleAfter();
            //do nothing disable button
        }
    })

    // fonction autoplay

    let autoplayButton = document.querySelector('.frame-3 .under-frame #auto');
    let autoplaying = false;
    let myInt;

    // gestion du click

    pictureFrame.addEventListener("click",function(){
        if (window.matchMedia("(min-width: 600px)").matches)
        {
            // recuperer le titre
            let titre = sceneArray[currentIndex].getSceneInfo();

            // creer un cadre
            let myBox = document.createElement('div');

            // creer une barre de titre
            let myBar = document.createElement('div');
            myBar.classList.add('myBar');
            let myH4 = document.createElement('h4');
            myH4.classList.add('myH4');
            myH4.textContent = titre;

            
            // creer un bouton fermer
            
            let myCross = document.createElement('button');
            myCross.classList.add('myCross');
            myBar.append(myH4);
            let divOptions = document.createElement('div');
            divOptions.classList.add('divOptions');
            myBar.append(divOptions);
            
            // bouton zoom in et out
            let zoomIn = document.createElement('button');
            zoomIn.classList.add('zoomIn');
            // zoomIn.textContent = "+";
            let zoomOut = document.createElement('button');
            zoomOut.classList.add('zoomOut');
            // zoomOut.textContent = "-";
            
            divOptions.append(zoomIn);
            divOptions.append(zoomOut);
            divOptions.append(myCross);


            // creer l'element image

            let myImage = document.createElement('img');
            let imgUrl = this.style.backgroundImage;
            myBox.classList.add('myBox');
            myImage.src = imgUrl.slice(5,-2);
            $("body").append($(myBox));

            let zoomIndex = 0;
            let zoomArray = [0,1,2,3,4];

            function zoomin() {
                var currWidth = myImage.clientWidth;
                var currHeight = myImage.clientHeight;
                myImage.style.width = (currWidth + 100) + "px";
                // myImage.style.height = (currHeight + 100) + "px";
            }
            
            function zoomout() {
                var currWidth = myImage.clientWidth;
                var currHeight = myImage.clientHeight;
                myImage.style.width = (currWidth - 100) + "px";
                // myImage.style.height = (currHeight - 100) + "px";
            }


            setTimeout(function(){
                myBox.append(myBar);
                myBox.append(myImage);
                zoomIn.addEventListener('click',function(){
                    if(zoomIndex < zoomArray.length - 1)
                    {
                        zoomin();
                        zoomIndex++;
                    }
                })
                zoomOut.addEventListener('click',function(){
                    if(zoomIndex >= -1 )
                    {
                        zoomout();
                        zoomIndex--;
                    }
                })

                myCross.addEventListener("click",function(){
                myBox.remove();
                })
            },1000)
        }
        else
        {
            // do nothing
        }
    })


    function mouseOverOut(elem,source,source2)
    {
        elem.addEventListener('mouseover',function(){
            elem.style.backgroundImage = "url('./assets/elements/"+source2+"')";
        })
        elem.addEventListener('mouseout',function(){
            elem.style.backgroundImage = "url('./assets/elements/"+source+"')";
        })
        elem.style.backgroundImage = "url('./assets/elements/"+source+"')";
    }

    autoplayButton.addEventListener("click",function(){
        if(autoplaying == true)
        {
            mouseOverOut(this,"autoplay-button.svg","autoplay-button.svg")
            clearInterval(myInt);
            handleAfter();
            autoplaying = false;
        }
        else
        {
            mouseOverOut(this,"stop-button.svg","stop-button-hover.svg")
            autoplaying = true;
            myInt = setInterval(function(){
                if(currentIndex < sceneArray.length-1){
                    handleBefore();
                    currentIndex++;
                    handleAfter();
                }
                else{
                    handleBefore();
                    currentIndex = 0;
                    handleAfter();
                }
            },8000)
        }
    })

    // fonction autoplay 

    function autoplay()
    {
        autoplaying = true;

        myInt = setInterval(function(){
            if(currentIndex < sceneArray.length-1)
            {
                handleBefore();
                currentIndex++;
                handleAfter();
                // $(pictureFrame).fadeOut("slow");
            }
            else{
                handleBefore();
                currentIndex = 0;
                handleAfter();
            }
        },8000)
    }

    autoplay();
}

function createFooter()
{
    let message = "© tarik louatah - 2021 - tous droits réservés";
    let footer = createDivWithClass('footer',document.body);
    let copyRight = createEmptyElement("p",footer);
    copyRight.classList.add("copyright");
    copyRight.textContent = message;
}

function createThumbnails()
{

    let sources = [
        ['image-1.svg','image-2.svg','image-9.svg'],
        ['image-4.svg','image-5.svg','image-6.svg'],
        ['image-7.svg','image-8.svg','image-21.svg'],
        ['image-10.svg','image-11.svg','image-12.svg'],
        ['image-13.svg','image-14.svg','image-15.svg'],
        ['image-16.svg','image-17.svg','image-18.svg'],
        ['image-19.svg','image-20.svg','image-3.svg'],
    ];
    let subtitles = [
        ['open to work','développeur web junior','3d friendly'],
        ['laptop','desktop','tablet & smartphone'],
        ['idées novatrices','esprit créatif','implication'],
        ['joystick réalisé avec figma','un logotype','logo image'],
        ['Three.js','P5.js','jQuery'],
        ['Figma','Trello','VsCode'],
        ['rigoureux','soif d\'apprendre','organisé'],
    ];
    let titles = [
        'à propos de moi',
        'responsive web design',
        'mindset',
        'création de logos',
        'librairies de prédilection',
        'Outils favoris',
        'Qualités',
    ];
    let blocks = ['block1','block2','block3','block4','block5','block6','block7'];
    for (let i = 0; i < blocks.length; i++)
    {
        let myBlock = createBlock(blocks[i],titles[i]);
        for (let j = 0; j < sources[i].length; j++)
        {
            let item = new Thumbnail(subtitles[i][j],sources[i][j],myBlock);
        }
    }

    let myHeadings = document.querySelectorAll('.theBody #section1 .block > .heading3');

    for (let i = 0; i < myHeadings.length; i++)
    {
        $(myHeadings[i]).addClass('reveal');
    }




    const ratio = 0.1;
    var options = {
    root : null,
    rootMargin : "0px",
    threshold : ratio
    }

    const handleIntersect = function(entries,observer)
    {
        entries.forEach(function(entry){
            if(entry.intersectionRatio > ratio)
            {
                entry.target.classList.add('reveal-visible');
                observer.unobserve(entry.target);
            }
        })
    }

    const observer = new IntersectionObserver(handleIntersect,options);
    document.querySelectorAll('.reveal').forEach(function(r)
    {
        observer.observe(r);
    })
}

// fonctions responsive

function createSection(id,className)
{
    let mySection = document.createElement('section');
    mySection.id = id;
    mySection.classList.add(className);
    document.body.append(mySection);
}

function configResponsiveIntroCarousel()
{
    $('#section0').append($('.presentation'));
    $('.frame-1').after($('.frame-3'));
}

function createCourseCarousel()
{
    let cadreCarousel = createDivWithClass('cadreCarousel',section2);
    let courseCarousel = createDivWithClass('carousel',cadreCarousel,'courseCarousel');

    let carouselItems = [
        'portrait.jpg',
        'univ-stendhal.jpg',
        'human-booster.png',
        'get-bold-design.jpg',
        'sunshine.jpg',
    ];
    let titles = [
        'présentation',
        'parcours linguistique',
        'human booster',
        'get bold design',
        'vers de nouveaux défis'
    ];
    let contents = [
        'Hello, Je m\'appelle Tarik et je suis développeur web junior.',
        'Après un baccalauréat général, j\'ai fait des études d\'espagnol et d\'anglais à l\'université Stendhal à Grenoble.',
        'Après 1 an de formation au sein de l\'organisme HUMAN BOOSTER, me voilà diplômé au titre de développeur web et web mobile.',
        'J\'ai réalisé mon stage de fin de parcours chez le webdesigner Gaël Barnabé qui dirige sa propre entreprise Get Bold Design.',
        'Je me sens pleinement serein pour la suite de l\'aventure et prêt à relever de nouveaux défis.'
    ];
    let contentsBis = [
        'Concevoir des maquettes, créer des graphismes, réfléchir à des algorithmes performants, apprendre de nouvelles technologies sont autant d\'activités qui m\'animent !',
        'Je suis bilingue, j\'ai récemment passé le TOEIC avec succès.',
        'À cet égard, je remercie HUMAN BOOSTER pour leur implication, leur sérieux et les efforts qu\'ils ont déployé pour maintenir et poursuivre la formation en dépit du contexte sanitaire.',
        'J\'ai eu la chance d\'apprendre de nombreuses techniques de création graphique et d\'intégration web, c\'est à cette occasion que j\'ai découvert l\'outil Figma, et les librairies P5.js et Three.js. J\'ai beaucoup apprécié ce stage. Cela a renforcé ma volonté de devenir un développeur aguéri.',
        'J\'ai hâte d\'intégrer une équipe, commencer à mettre en pratique les techniques acquises et en apprendre de nouvelles !'
    ];

    // debut boucle
    for (let i = 0; i < carouselItems.length;i++)
    {
        let pict = createDivWithClass('pict',courseCarousel);
        $(pict).css('background-image','url("./assets/carousel/'+carouselItems[i]+'")');
        let content = createDivWithClass('content',pict);
        let paraContent = createDivWithClass('paraContent',content);
        let myHeading = createHeading('h3','heading3',titles[i],paraContent);
        let content1 = createPara('para',contents[i],paraContent)
        let content2 = createPara('para',contentsBis[i],paraContent);
    }
    //fin boucle

}

function configCourseCarousel()
{
    let myCar5 = new Carousel(document.getElementById('courseCarousel'),{
            slidesToScroll : 1,
            slidesVisible : 1,
            pagination : false,
            isMobile : true,
            infinite : true
    })
}

function createCompetenceBlock()
{
    let subtitle = createHeading('h4','heading3','technos front-end');
    $('#section3').append($(subtitle));
    let grid = createDivWithClass('grid',$('#section3'));
    let html = new Competence('html','logo-html.svg','hypertext mark-up language',grid);
    let css = new Competence('css','logo-css.svg','cascading stylesheet',grid);
    let sass = new Competence('sass','logo-sass.svg','préprocesseur optimisant le code css',grid);
    let js = new Competence('js','logo-js.svg','langage de programmation client-side',grid);
    let subtitle2 = createHeading('h4','heading3','technos back-end');
    $('#section3').append($(subtitle2));
    let grid2 = createDivWithClass('grid',$('#section3'));
    let php = new Competence('php','logo-php.svg','langage de programmation server-side',grid2);
    let mysql = new Competence('mysql','logo-mysql.svg','langage de requête',grid2);
    let subtitle3 = createHeading('h4','heading3','frameworks & librairies');
    $('#section3').append($(subtitle3));
    let grid3 = createDivWithClass('grid',$('#section3'));
    let angular = new Competence('angular','logo-angular.svg','framework front',grid3);
    let symfony = new Competence('symfony','logo-symfony.svg','framework back',grid3);
    let bootstrap = new Competence('bootstrap','logo-bootstrap.svg','librairie front',grid3);
    let jQuery = new Competence('jQuery','logo-jQuery.svg','librairie javaScript',grid3);
    let wordpress = new Competence('wordpress','logo-wordpress.svg','système de gestion de contenu',grid3);
    let react = new Competence('react','logo-react.svg','framework front',grid3);
}

function createNetworkPanel()
{

    // let myTitle = createHeading('h4','heading3','',$('#section4'));
    let grid = createDivWithClass('grid',$('#section4'));
    // console.log(grid);
    let github = new ImageLink('https://github.com/tKlancelot','icon-github.svg','github',grid);
    let linkedin = new ImageLink('https://www.linkedin.com/in/tarik-louatah-7983481b3/','icon-linkedin.svg','linkedin',grid);
    let email = new ImageLink('mailto:tarik.louatah@gmail.com','icon-mail.svg','mail',grid);
    let telephone = new ImageLink('tel:+33763740559','icon-telephone.svg','telephone',grid);
    let myPhone = document.querySelectorAll('.network .link')[3];
    $(myPhone).css('background-size','44%');
}

function createDownloadPanel()
{
    let downloads = ['cv moderne','cv imprimable','rapport de stage human booster','dossier professionnel human booster'];
    let hrefs = ['./downloads/cv-officiel.pdf','./downloads/printable-resume.pdf','./downloads/rs-tarik-louatah.pdf','./downloads/dp-tarik-louatah.pdf'];
    let myTitle = createHeading('h4','heading3','téléchargements',$('#section4'));

    for (let i = 0; i < downloads.length; i++)
    {
        // console.log(myItem);
        let myItem = document.createElement('a');
        myItem.href = hrefs[i];
        myItem.download = downloads[i];
        myItem.textContent = downloads[i];
        myItem.classList.add('link2');
        $("#section4").append(myItem);

        let item1 = document.querySelector("#section4 > a:nth-child(5)");
        let item2 = document.querySelector("#section4 > a:nth-child(7)");
        $(item1).css('background-color','var(--thema-dark-transp');
        $(item2).css('background-color','var(--thema-dark-transp');
        $(item1).css('border','1px solid transparent');
        $(item2).css('border','1px solid transparent');
    }



    // let item1 = new Accordeon('cv moderne',"",'cv moderne réalisé avec figma','./downloads/cv-officiel.pdf',$('#section4'),'cv-moderne');
    // let item2 = new Accordeon('cv basique',"",'cv imprimable classique','./downloads/printable-resume.pdf',$('#section4'),'cv-basique');
    // let item3 = new Accordeon('rapport de stage',"",'rapport de stage HUMAN BOOSTER','./downloads/rs-tarik-louatah.pdf',$('#section4'),'rapport-de-stage-gbd');
    // let item4 = new Accordeon('dossier professionnel',"",'dossier professionnel HUMAN BOOSTER','./downloads/dp-tarik-louatah.pdf',$('#section4'),'dossier-pro-tarik-louatah');
}

function createProjects()
{
    let myBlock = createDivWithClass('block',$('#section5'),'');
    let projet11 = new Thumbnail('','living-room.png',myBlock);
    let projet1 = new Thumbnail('','projet-config-3d.png',myBlock);
    let projet4 = new Thumbnail('','config-salon-3d.png',myBlock);
    let projet10 = new Thumbnail('ville 3d low poly','town-blue.png',myBlock);
    let projet8 = new Thumbnail('','3dtown.png',myBlock);
    let projet7 = new Thumbnail('refonte du site du plasticien Laurent Curat','laurent-curat-2.png',myBlock);
    let projet9 = new Thumbnail('','laurent-curat-5.png',myBlock);
    let projet6 = new Thumbnail('','laurent-curat-4.png',myBlock);
    let projet5 = new Thumbnail('','laurent-curat-0.png',myBlock);
    let projet3 = new Thumbnail('','planete-3d.png',myBlock);
    // let projet2 = new Thumbnail('','projet-drag-and-drop.png',myBlock);
    // console.log(item);
}

function computer3d()
{
    const chemin = "./assets/slideshow-intro/";
    let body3D = document.querySelector('#desktop');

    // DECLARATIONS 3D
    const halfWidth = window.innerWidth;
    const halfHeight = window.innerHeight;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera( 40, halfWidth / window.innerHeight, 0.1, 500 );
    const renderer = new THREE.WebGLRenderer({alpha:true, antialias: true});
    renderer.shadowMap.enabled = true;
    renderer.setPixelRatio(window.devicePixelRatio); 

    const gltfLoader = new THREE.GLTFLoader();
    const controls = new THREE.OrbitControls( camera, renderer.domElement);
    const url =   './assets/3d/computer.glb';
    camera.position.z = 3;
    camera.position.y = 5;
    controls.maxPolarAngle = Math.PI / 2;
    controls.minPolarAngle = Math.PI / 8;
    controls.enableDamping = true;
    controls.enablePan = false;
    controls.autoRotate = true;
    controls.minDistance = 1;
    controls.maxDistance = 10;
    controls.autoRotateSpeed = 0.24; // 30
    // controls.dampingFactor = 1.8;

    let scene1 = {
        title : 'welcome',
        content1 : 'Salutations !',
        content2 :'Voici un modèle 3d d\'ordinateur portable que j\'ai réalisé sur Blender 2.9 en m\'inspirant de ma propre machine. Voila de quoi nous "mettre en abyme".'
    }

    let scene2 = {
        title : "Pour Faire Simple ...",
        content1 : "La simplicité peut-être plus difficile à atteindre que la complexité. Il faut travailler dur pour arriver à faire simple.",
        content2 : "Et bien, ce dicton que j'emprunte avec déférence à Steve Jobs, cadre bien avec le développement web ! À maintes reprises, je me suis rendu compte qu'un projet beau et abouti, c'est un projet où le parcours utilisateur est fluide, où les graphismes sont simples mais cohérents, où les informations sont claires et structurées sans forcément 'remplir la page'. Enfin, c'est parvenir à dire l'essentiel en quelques mots bien choisis et quelques illustrations bien travaillées. La sobriété est la qualité qui convient pour obtenir un bon résultat."
    }

    let scene3 = {
        title : 'living room au Format Gltf',
        content1 : 'Création d\'un living room en 3d sur Blender, intégration avec Three.js',
        content2 : 'Ici, l\'objectif est de concevoir un salon en 3d sur Blender 2.90 en me basant sur des photographies ou des modèles réels. Quelques extrusions, bevel, uvmapping et mapping de matériaux plus tard, on obtient une jolie scène. L\'étape suivante est l\'export au format gltf, l\'intégration dans un projet web. On utilisera la librairie Three.js pour manipuler nos objets .glb.' 
    }

    let scene4 = {
        title : 'Site ArcomiK',
        content1 : 'Refonte et intégration du site arcomik.com',
        content2 : "Lors de mon stage de fin d'études, j'ai participé à la refonte du site arcomik.com qui avait pour but de présenter le festival du même nom. À cette occasion, je me suis perfectionné en Wordpress et en gestion de projet à plusieurs."
    }

    let scene5 = {
        title : 'Client Saint Clair',
        content1 : 'Intégration de pages pour le site saintclair.com',
        content2 : "Dans le cadre de mon stage, j'ai intégré des maquettes pour le client Saint-Clair, un traiteur parisien. Ce projet constituait un challenge de précision et de rigueur. Mon rôle était d'intégrer les pages selon des maquettes bien définies."
    }

    let scene6 = {
        title : 'Conception des Maquettes sur Figma',
        content1 : 'Figma est un outil de création graphique en ligne, de création de maquette et de gestion de projets, tout en un !',
        content2 : "Les possibilités et la facilité d'appréhension font que je l'utilise très souvent."
    }
    // let scene7 = {
    //     title : 'Configurateur 3d',
    //     content1 : "La création 3d, c'est une découverte assez récente mais cela me passionne.",
    //     content2 : "J'ai inventé de toute pièce ce salon en 3d. Cela constitue un exemple d'utilisation de la librairie Three.js."
    // }
    let scene8 = {
        title : 'Motion Picture Blender',
        content1 : "D'un petit cube tout simple à un film d'animation complet, Blender est un outil au potentiel surprenant!",
        content2 : "Ce projet avait pour objectif d'animer cet objet de texte 'welcome' et formater l'animation rendue au format mpeg puis enfin l'intégrer en html5." 
    }
    let scene9 = {
        title : '3d town',
        content1 : 'Construction d\'immeubles et assemblage sur blender',
        content2 : "Utiliser un plugin Blender pour simplifier la construction, travailler en low-poly pour optimiser le rendu et faciliter l\'intégration. Utiliser une image hdri qui possède des propriétés d'éclairage et la configurer dans la section world de blender."
    }

    let sceneArray = [scene1,scene2,scene3,scene4,scene5,scene6,scene8,scene9];

    // LIGHTS

    const hemiLight = new THREE.HemisphereLight( 0xccccff, 0x9696a4, 2 );
    const blueLight = new THREE.HemisphereLight( 0xccccff, 0x4848a4, 2 );
    let ambientLight = new THREE.AmbientLight( 0xc4c4e8 );
    let dirLight = new THREE.DirectionalLight( 0xc4c4f4, 1.16 );
    dirLight.position.set(1,1,0);
    var hemiLight2 = new THREE.HemisphereLight( 0xa8a8ff, 0xc4c4ff, 1 );
    hemiLight2.position.set( 0, 400, 50 );
    

    let MODEL_PATHS = [url];
    let myArray = [];
    let maScene;

    const axesHelper = new THREE.AxesHelper( 10 );

    // PROMESSES

    const promise = new Promise((resolve, reject) => {
        setTimeout(() => {
        resolve(myArray[0]);
        }, 4000);
    });

    // LOADER
    
    
    function loadScene()
    {
        gltfLoader.load(MODEL_PATHS[0], (gltf) => {
            myArray.push(gltf.scene);
        });
    }
    
    
    // RENDERER NEED RESIZE

    function resizeRendererToDisplaySize(renderer) {
        const canvas = renderer.domElement;
        var width = window.innerWidth;
        var height = window.innerHeight;
        var canvasPixelWidth = canvas.width / window.devicePixelRatio;
        var canvasPixelHeight = canvas.height / window.devicePixelRatio;
        const needResize = canvasPixelWidth !== width || canvasPixelHeight !== height;
        if (needResize) {
            renderer.setSize(width, height, false);
        }
        return needResize;
    }

    function createScene(parent){
        parent.appendChild( renderer.domElement );
        const animate = function () {
            controls.update();
            requestAnimationFrame( animate );
            renderer.render( scene, camera );
            if (resizeRendererToDisplaySize(renderer)) {
                const canvas = renderer.domElement;
                camera.aspect = canvas.clientWidth / canvas.clientHeight;
                camera.updateProjectionMatrix();
            }
        };

        resizeRendererToDisplaySize(renderer);
        loadScene();
        promise.then((value) => {
            maScene = value;
            ajouterUnObjet(maScene);
            maScene.position.y = -0.5;
            getInfo();
            addLights();
        });
        animate();
    }

    // FONCTIONS

    function ajouterUnObjet(monObjet){
        scene.add(monObjet);
    }

    function addLights(){
        scene.add( hemiLight );
        scene.add( blueLight );
        scene.add( dirLight );
        scene.add( ambientLight );
        scene.add( hemiLight2 );
    }

    const pictures = function ()
    {
        const myArray = [];

        let sources = [
            'code-planet.png',
            'tarik-blue.jpg',
            'living-room.png',
            'arcomik-site-2.png',
            'saint-clair-1.png',
            'new-maquette.png',
            'video-making.png',
            'town-3d-alt.png',
        ]
        for (let i = 0 ; i < sources.length; i++)
        {
            let oneFrame = new THREE.MeshBasicMaterial( { map : texturage('./assets/slideshow-intro/'+sources[i]+'',1,-1)} );            
            myArray.push(oneFrame);
        }
        return myArray;
    }

    function getInfo()
    {
        console.log(maScene.children);
        let screen = maScene.children[9]; 
        let screenMat = screen.material;
        // console.log(screenMat);
        let myTexture = texturage();
        // console.log(myTexture);
        pictures();
        // let desktop = maScene.children[10];
        // let matDesktop = desktop.material;
        // console.log(matDesktop);
        // console.log(matDesktop.opacity = 0.48);
        // console.log(matDesktop.metalness = 0.5);
        // console.log(matDesktop.roughness = 0.72);

        let testButton = document.createElement('button');
        $("#desktop").append(testButton);
        testButton.textContent = "switch";
        $(testButton).addClass('switchButton')
        
        let currentIndex = 0;
        let panel = createDivWithClass('infoPanel',$('#desktop'),'');
        let contentPanel = createDivWithClass('contentPanel',$(panel),'');
        let heading = createDivWithClass('heading2',$(contentPanel),'');
        let para1 = createDivWithClass('para1',$(contentPanel),'');
        let para2 = createDivWithClass('para1',$(contentPanel),'');
        $(heading).text(sceneArray[currentIndex].title);
        $(para1).text(sceneArray[currentIndex].content1);
        $(para2).text(sceneArray[currentIndex].content2);
        let toggleBtn = document.createElement('button');
        $(toggleBtn).addClass('toggleUp');
        // $(toggleBtn).text('toggleUp');
        $(panel).append(toggleBtn);
        let toggledUp = 0;

        function toggleUp()
        {
            $(toggleBtn).click(function(){
                if(toggledUp == 0)
                {
                    $(contentPanel).hide(400);
                    $(panel).addClass('widthAuto');
                    $(this).addClass('toggleDown');
                    toggledUp = 1;
                }
                else
                {
                    $(contentPanel).show();
                    $(panel).removeClass('widthAuto');
                    $(this).removeClass('toggleDown');
                    toggledUp = 0;
                }
            })
        }

        toggleUp();

        testButton.addEventListener('click',function()
        {
            if(currentIndex < pictures().length-1)
            {
                currentIndex++;
                screen.material = pictures()[currentIndex];
                $(heading).text(sceneArray[currentIndex].title);
                $(para1).text(sceneArray[currentIndex].content1);
                $(para2).text(sceneArray[currentIndex].content2);
            }
            else
            {
                currentIndex = 0;
                screen.material = pictures()[currentIndex];
                $(heading).text(sceneArray[currentIndex].title);
                $(para1).text(sceneArray[currentIndex].content1);
                $(para2).text(sceneArray[currentIndex].content2);
            }
        })        
    }



    function texturage(path,repeatFactor,repeatFactorY)
    {
        var loader = new THREE.TextureLoader(); 
        const texture = loader.load( path, function ( texture ) {
            texture.wrapS = texture.wrapT = THREE.RepeatWrapping;
            texture.offset.set( 0, 0 );
            texture.repeat.set( repeatFactor, repeatFactorY );

        });
        return texture;
    }

    createScene(body3D);
    body3D.appendChild( renderer.domElement );
}



</script>

