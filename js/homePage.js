const chemin = "./assets/slideshow-intro/";


class Scene {
    constructor(name,title,para2,source,numero,displayMode) {
        this.name = name;
        this.title = title;
        this.para2 = para2;
        this.source = source;
        this.numero = numero;
        this.displayMode = displayMode;

    }
    display(cadre)
    {

        cadre.style.backgroundImage = 'url('+this.source+')';
        cadre.style.backgroundSize = this.displayMode;
    }


    getSceneInfo()
    {
        return this.name;
    }

    showTitle(cadre)
    {
        cadre.textContent = this.title;
    }

    showPara(cadre)
    {
        cadre.textContent = this.para2;
    }
}

let pictureFrame = document.querySelector('.picture .under');
let legendFrame = document.querySelector('.frame-2 .under .under-frame h4');
let paraFrame = document.querySelector('.frame-2 .under .under-frame p');
let optionFrame = document.querySelector('.frame-3 .under-frame');
let prevButton = document.querySelector('.under-frame #prev');
let nextButton = document.querySelector('.under-frame #next');
let currentIndex = 0;


let scene1 = new Scene(
    'portrait',
    'Salutations',
    'Je m\'appelle Tarik et le développement web est ma passion'
    +'\n\r',
    chemin+'portrait.svg',
    0,
    'cover'
)
let scene2 = new Scene(
    'canapé 3d',
    'Création d\'un canapé en 3d sur Blender, intégration avec Three.js',
    'Concevoir un meuble sur Blender 2.90, l\'intégrer dans un projet au format gltf et manipuler les propriétés de cet objet à l\'aide de Three.js',
    chemin+'canape.png',
    0,
    'cover'
)
let scene3 = new Scene(
    'site ArcomiK',
    'Refonte et intégration du site arcomik.com',
    'Lors de mon stage, j\'ai participé à la refonte du site arcomik.com qui avait pour but de présenter le festival du même nom ',
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
    'contain'
)

let scene5 = new Scene(
    'maquettage figma',
    'Élaboration de maquettes sur l\'outil Figma',
    'Un échantillon de la maquette de ce site',
    chemin+'maquettage.png',
    3,
    'contain'
)

let scene6 = new Scene(
    'configurateur 3d',
    'Création d\'un configurateur 3d à l\'aide de Three.js',
    'Exemple d\'utilisation de la librairie Three.js',
    chemin+'configurateur-3d.svg',
    3,
    'contain'
)

let sceneArray = [scene1,scene2,scene3,scene4,scene5,scene6];

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

// let clicked = 0;

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
        },5000)
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
    },5000)
}

autoplay();


// formulaire action

// let input = document.forms.robby.test;
// let submit = document.forms.robby[1];

// submit.addEventListener('click',function(){
//     let inputVal = input.value;
//     if(inputVal == 1)
//     {
//         for(let i  = 0; i < bullets.length;i++)
//         {
//             bullets[i].classList.remove('bullet')
//             bullets[i].textContent = i+1;
//         }
//     }
//     else{
//         for(let i  = 0; i < bullets.length;i++)
//         {
//             bullets[i].classList.add('bullet')
//             bullets[i].textContent = "";
//         }
//     }   
// })


