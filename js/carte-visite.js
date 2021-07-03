
// déclaration dom

let allDraggable = document.querySelectorAll('.draggable');

let draggables = document.querySelectorAll(".front-end.draggable");
let draggables2 = document.querySelectorAll(".back-end.draggable");
let draggables3 = document.querySelectorAll(".framework.draggable");
let base0 = document.querySelectorAll("#front-end .case-droppable");
let base2 = document.querySelectorAll("#back-end .case-droppable");
let base3 = document.querySelectorAll("#libraries .case-droppable");
let toggledElements = 0;
let divText = document.createElement('div');
divText.classList.add('divText');
let dragLegend = document.querySelector('.dragLegend');

// déclarations des objets


let objetJs = {
    content : "js",
    combinaison : "abcd",
    borderColor : "#E2BF03",
    category : "langage",
    quality : "langage de programmation côté client",
    id : 0
}
let objetHtml = {
    content : "html5",
    combinaison : "aaba",
    borderColor : "#E44D26",
    category : "langage",
    quality : "langage de balisage utilisé pour structurer et représenter les pages web",
    id : 1
}
let objetCss = {
    content : "css3",
    combinaison : "ccad",
    borderColor : "#2965F1",
    category : "langage",
    quality : "langage décrivant la présentation des pages web",
    id : 2
}

let objetSass = {
    content : "sass",
    combinaison : "ddac",
    borderColor : "#CF649A",
    category : "langage",
    quality : "préprocesseur permettant d'écrire du code css",
    id : 3
}

let objetPhp = {
    content : "php",
    combinaison : "abda",
    borderColor : "#8993BE",
    category : "langage",
    quality : "langage de script côté serveur",
    id : 4
}

let objetMysql = {
    content : "sql",
    combinaison : "abdd",
    borderColor : "#51ACEB",
    category : "langage",
    quality : "langage de requête structurée",
    id : 5
}

let objetAngular = {
    content : "angular",
    combinaison : "ccca",
    borderColor : "#C3002F",
    category : "framework",
    quality : "framework pour créer des applications mobile et desktop",
    id : 6
}

let objetSymfony = {
    content : "symfony",
    combinaison : "cccd",
    borderColor : "#1A171B",
    category : "framework",
    quality : "framework MVC écrit en php",
    id : 7
}

let objetBootstrap = {
    content : "bootstrap",
    combinaison : "ccdd",
    borderColor : "#563D7C",
    category : "framework",
    quality : "collection d'outils pour créer rapidement du design",
    id : 7
}

let objetThreejs = {
    content : "three.js",
    combinaison : "dcdd",
    borderColor : "#fafafa",
    category : "librairie",
    quality : "bibliothèque 3d pour créer des scènes 3d dans un navigateur",
    id : 8
}


let objetP5js = {
    content : "P5.js",
    combinaison : "dddd",
    borderColor : "#E3545E",
    category : "librairie",
    quality : "librairie client-side pour créer des expériences graphiques intéractives",
    id : 9
}

let objetWordpress = {
    content : "wordpress",
    combinaison : "ddaa",
    borderColor : "#37769B",
    category : "cms",
    quality : "système de gestion de contenu très populaire",
    id : 10
}

let objetJquery = {
    content : "jQuery",
    combinaison : "ddad",
    borderColor : "#2869AD",
    category : "librairie",
    quality : "bibliothèque js utilisée pour faciliter l'écriture des scripts côté client",
    id : 11
}

// gestion de l'element draggable

function handleDraggable(draggable){
    draggable.forEach(function(element){
        element.addEventListener("dragstart",function(){
            console.log("drag start");
            element.classList.add('dragging-effect');
        })
        element.addEventListener("dragend",function(){
            console.log("drag end");
            element.classList.remove('dragging-effect');
        })
        element.addEventListener('mousedown',function(e){
            console.log(e);
        })
    });
}


handleDraggable(draggables);
handleDraggable(draggables2);
handleDraggable(draggables3);

function handleBase(base,caseMax){
    base.forEach(function(element){
        element.style.userSelect = "none";
        element.addEventListener("dragover",function(event){
            event.preventDefault();
            element.classList.add('dragging-effect');
            element.classList.add('bgGreen');
            event.dataTransfer.dropEffect = 'copy'; 
        })
        element.addEventListener("dragleave",function(event){
            event.preventDefault();
            element.classList.remove('bgGreen');
            element.classList.remove('dragging-effect');
            event.dataTransfer.dropEffect = 'copy'; 
        })

        element.addEventListener("drop",function(){
            if(element.classList.contains("dragging-effect")){
                element.classList.remove('bgGreen');
                element.classList.remove('dragging-effect');
            }
            let draggedElement = document.querySelector('.dragging-effect');
            let codeBase = element.dataset.combinaison;
            let codeCase = draggedElement.dataset.combinaison;
            console.log("dragover");
            if(codeBase == codeCase){
                element.style.borderColor = draggedElement.style.borderColor;
                element.style.pointerEvents = "none";
                element.style.cursor = "none";
                element.append(draggedElement);
                element.addEventListener("mouseover",function(){
                    divText.remove();
                })
                draggedElement.classList.add('dragged');
                draggedElement.classList.remove('dragging-effect');
                draggedElement.removeAttribute('draggable');
                draggedElement.style.cursor = "none";

                draggedElement.style.background = draggedElement.style.borderColor;
                toggledElements++;
                checkingThings(caseMax);
            }
        });
    });
}

handleBase(base0,13);
handleBase(base2,13);
handleBase(base3,13);


//positionner les éléments en cercles dans la grid

let allCases = document.querySelectorAll('.zone-droppable .case-droppable');


function griserCase(base,caseD){ 
    base[caseD].style.background = "var(--thema-dark-transp)";
    base[caseD].style.cursor = "not-allowed";
    base[caseD].style.pointerEvents = "none";
}

griserCase(base0,5);
griserCase(base0,6);
griserCase(base0,7);
griserCase(base0,8);
griserCase(base2,2);
griserCase(base2,3);
// griserCase(base3,7);
griserCase(base3,8);


function decalerCase(caseD,valueLeft,valueRight,valueTop,valueBottom){
    allCases[caseD].style.left = valueLeft;
    allCases[caseD].style.right = valueRight;
    allCases[caseD].style.top = valueTop;
    allCases[caseD].style.bottom = valueBottom;
    allCases[caseD].style.position = "relative";
}

// decalerCase(3,"-50%","initial","initial","initial");
// decalerCase(12,"-50%","initial","initial","initial");
// decalerCase(5,"initial","-50%","initial","initial");
// decalerCase(14,"initial","-50%","initial","initial");
// decalerCase(1,"initial","initial","-50%","initial");
// decalerCase(10,"initial","initial","-50%","initial");
// decalerCase(7,"initial","initial","initial","-50%");
// decalerCase(16,"initial","initial","initial","-50%");



allCases[4].style.border = "none";
allCases[4].style.pointerEvents = "none";
allCases[13].style.border = "none";
allCases[13].style.pointerEvents = "none";




let myObjectArray = [objetJs,objetHtml,objetCss,objetSass];
let backEndArray = [objetPhp,objetMysql];
let frameworkArray = [objetAngular, objetSymfony,objetBootstrap,objetThreejs,objetP5js,objetWordpress,objetJquery];


const shuffleArray = array =>{
    for (let i = array.length - 1; i > 0;i--){
        const j = Math.floor(Math.random() * (i+1));
        const temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }

    return array;
}

shuffleArray(myObjectArray);
shuffleArray(backEndArray);
shuffleArray(frameworkArray);


function associerObjets(objDraggable,tableau){
    for (let i = 0; i < tableau.length;i++){
        objDraggable[i].dataset.combinaison = tableau[i].combinaison;
        objDraggable[i].textContent = tableau[i].content;
        objDraggable[i].style.borderColor = tableau[i].borderColor;
        objDraggable[i].style.background = tableau[i].borderColor;
        if((tableau[i].content == "js")||(tableau[i].content == "three.js")){
            objDraggable[i].style.color = "black";
        }
    }
}

associerObjets(draggables,myObjectArray);
associerObjets(draggables2,backEndArray);
associerObjets(draggables3,frameworkArray);






function associerBase(base,array){
    for (let i = 0 ; i < array.length; i++){
        console.log(array[i].combinaison);
        base[i].dataset.combinaison = array[i].combinaison;
        base[i].addEventListener("mouseover",function(){
            divText.textContent = array[i].quality;
            dragLegend.append(divText);
            base[i].style.background = "#EEEEEE14";
        })
        base[i].addEventListener("mouseout",function(){
            divText.remove();
            base[i].style.background = "initial";
        })
    }
}


let tableauBase3 = Array.from(base3);
var elementsSupprimes = tableauBase3.splice(4, 1);
let tableauBase = Array.from(base0);
var elementsSupprimes2 = tableauBase.splice(4, 1);


associerBase(tableauBase,myObjectArray);
associerBase(base2,backEndArray);
associerBase(tableauBase3,frameworkArray);


function checkingThings(caseMax){
    console.log(toggledElements);
    if(toggledElements == caseMax){
        setTimeout(function(){
            alert('good job');
            $('.cadre-bottom').remove();
        },500); 
    }
}

// fonctionnalité supp
