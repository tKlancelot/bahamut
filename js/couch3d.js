import CreateAFloor from './createAFloor.js';

var oReq = new XMLHttpRequest();
oReq.onload = reqListener;
oReq.open("get", "./assets/3d/canape-modular.glb", true);
oReq.send();


let bodyLoader = document.createElement('div');
$(bodyLoader).addClass('bodyLoader');
document.body.append(bodyLoader);

let loadingText = document.createElement('p');
loadingText.textContent = "veuillez patienter, la scène est en cours de chargement ...";
$(loadingText).addClass('loadingText');
bodyLoader.append(loadingText);

$('.config3d').hide();



var oReq2 = new XMLHttpRequest();
oReq2.open("get", "./assets/3d/wooden-floor.glb", true);
oReq2.send();

function reqListener () {
    if((this.readyState == 4) && (oReq2.readyState == 4)){
        global3dScript();
        $(bodyLoader).hide();
        $('.config3d').fadeIn(1000);
    }
    else{
        console.log('waiting ... ');
    }
}
  

console.log(oReq.readyState);


let theBody = document.querySelector('.config3d');
let modelLoaded = 0;


// fonctions

function enableButton(item)
{
    item.removeAttribute("disabled");
    $(item).css('pointer-events','auto');
}

function disableButton(item)
{
    item.setAttribute("disabled","");
    $(item).css('pointer-events','none');
}


function global3dScript(){

    let cadre3d = document.createElement('div');
    theBody.append(cadre3d);

    // DECLARATIONS DOM

    cadre3d.classList = 'cadre3d';

    // DECLARATIONS 3D

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera( 50, window.innerWidth / window.innerHeight, 1, 1000 );
    const renderer = new THREE.WebGLRenderer({alpha:true, antialias: true});
    renderer.shadowMap.enabled = true;
    renderer.setPixelRatio(window.devicePixelRatio); 

    const gltfLoader = new THREE.GLTFLoader();
    const controls = new THREE.OrbitControls( camera, renderer.domElement);
    const url =   './assets/3d/canape-modular.glb';
    const url2 =   './assets/3d/wooden-floor.glb';
    const url3 =   './assets/3d/herringbone-floor.glb';
    const url4 =   './assets/3d/terra-cotta-floor.glb';
    const url5 =   './assets/3d/light-wood-floor.glb';
    const url6 =   './assets/3d/marble-floor.glb';
    const url7 =   './assets/3d/grass.glb';
    const url8 =   './assets/3d/frame.glb';
    const url9 =   './assets/3d/frame-2.glb';
    const url10 =   './assets/3d/grass-2.glb';
    scene.receiveShadow = true;
    scene.castShadow = true;
    camera.position.z = 8;
    camera.position.y = 6;
    controls.maxPolarAngle = Math.PI / 2;
    controls.minPolarAngle = Math.PI / 8;
    controls.enableDamping = true;
    controls.enablePan = false;
    controls.dampingFactor = 0.1;
    controls.autoRotate = true; // Toggle this if you'd like the chair to automatically rotate
    controls.autoRotateSpeed = 0.2; // 30

    // LIGHTS

    let hemiLight = new THREE.HemisphereLight( 0xeeeeff, 0xa4a4a8, 1*1.25 );
    hemiLight.position.set( 0, 25, 0 );
    let ambientLight = new THREE.AmbientLight( 0x929296 ); // soft white light
    let dirLight = new THREE.DirectionalLight( 0x9696a4, 0.6 );
    dirLight.position.set( -10, 50, 8 );
    let dirLight2 = new THREE.DirectionalLight( 0xc4c4d4, 0.8 );
    dirLight2.position.set( 8, 12, 8 );
    dirLight.castShadow = true;
    dirLight.shadow.mapSize = new THREE.Vector2(1024, 1024);
    dirLight2.shadow.mapSize = new THREE.Vector2(1024, 1024);

    let MODEL_PATHS = [url];
    let FLOOR_PATHS = [url2,url3,url4,url5,url6];
    let GRASS_PATHS = [url7,url10];
    let FRAME_PATHS = [url8,url9];
    let myArray = [];
    let myFloorArray = [];
    let grassArray = [];
    let frameArray = [];
    let lawnTexture;
    let maScene;

    const axesHelper = new THREE.AxesHelper( 10 );


    // GRASS

    // CreateAFloor(lawnTexture,'./assets/3d/lawn-texture.jpg',-0.008,14,14,grassArray,3);


    // PROMESSES

    const promise = new Promise((resolve, reject) => {
        setTimeout(() => {
        resolve(myArray[0]);
        }, 10000);
    });

    // LOADER


    function loadScene(){
        gltfLoader.load(MODEL_PATHS[0], (gltf) => {
            myArray.push(gltf.scene);
        });
    }

    function loadFloors()
    {
        for (let i = 0 ; i < FLOOR_PATHS.length; i ++)
        {
            gltfLoader.load(FLOOR_PATHS[i], (gltf) => {
                myFloorArray.push(gltf.scene);
            });
        }
    }

    function loadGrass(){
        for (let i = 0 ; i < GRASS_PATHS.length; i ++)
        {
            gltfLoader.load(GRASS_PATHS[i], (gltf) => {
                grassArray.push(gltf.scene);
            });
        }
    }
    
    function loadFrame()
    {
        for (let i = 0 ; i < FRAME_PATHS.length; i ++)
        {
            gltfLoader.load(FRAME_PATHS[i], (gltf) => {
                frameArray.push(gltf.scene);
            });
        }
    }

    loadFloors();
    loadGrass();
    loadFrame();

    // fonctions

    function addLights(){
        scene.add( dirLight );
        scene.add( hemiLight );
        scene.add( dirLight2 );
        scene.add( ambientLight );
    }
    
    
    function removeLights(){
        scene.remove( hemiLight );
        scene.remove( dirLight );
        scene.remove( dirLight2 );
        scene.remove( ambientLight );
    }


    function supprimerTousLesObjets(tableau){
        for (let i = 0; i < tableau.length; i++){
            scene.remove(tableau[i]);
        }
    }



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
            enableButton(buttonFloor);
            enableButton(buttonFrame);
            enableButton(buttonGrass);
            initPosition(myFloorArray,-0.006);
            initPosition(frameArray,-0.02);
            initPosition(grassArray,-0.02);
            ajouterUnObjet(myFloorArray[0]);
            ajouterUnObjet(grassArray[0]);
            ajouterUnObjet(frameArray[0]);
            ajouterUnObjet(maScene);
            maScene.position.y = 0;
            modelLoaded = 1;
            addLights();
            toggleLight = 1;
        });
        animate();
    }

    function ajouterUnObjet(monObjet){
        scene.add(monObjet);
    }


    function initPosition(array,position = 0)
    {
        for (let i = 0 ; i < array.length; i++)
        {
            array[i].position.y = position;
        }
    }



    // ÉVÈNEMENTS

    let toggleLight = 0;
    let buttonLight = document.querySelector('#lights');

    $(buttonLight).click(function(){
        if(modelLoaded == 1)
        {
            if(toggleLight == 0)
            {
                addLights();
                toggleLight = 1;
            }
            else
            {
                removeLights();
                toggleLight = 0;
            }
        }
        else
        {
            alert('model not loaded yet');
        }
    })

    // FONCTION SWITCH FLOOR
    
    let currentFloor = 0;
    let buttonFloor = document.querySelector('#floor');
    disableButton(buttonFloor);
    
    $(buttonFloor).click(function(){
        if(currentFloor < myFloorArray.length - 1)
        {
            scene.remove(myFloorArray[currentFloor]);
            currentFloor++;
            scene.add(myFloorArray[currentFloor]);
        }
        else{
            scene.remove(myFloorArray[currentFloor]);
            currentFloor = 0;
            scene.add(myFloorArray[currentFloor]);
        }
    })
    
    // FONCTION SWITCH FRAME
    
    let currentFrame = 0;
    let buttonFrame = document.querySelector('#frame');
    disableButton(buttonFrame);

    $(buttonFrame).click(function(){
        if(currentFrame < frameArray.length - 1)
        {
            scene.remove(frameArray[currentFrame]);
            currentFrame++;
            scene.add(frameArray[currentFrame]);
        }
        else{
            scene.remove(frameArray[currentFrame]);
            currentFrame = 0;
            scene.add(frameArray[currentFrame]);
        }
    })

    // FONCTION SWITCH GRASS
    
    let currentGrass = 0;
    let buttonGrass = document.querySelector('#grass');
    disableButton(buttonGrass);

    $(buttonGrass).click(function(){
        if(currentGrass < grassArray.length - 1)
        {
            scene.remove(grassArray[currentGrass]);
            currentGrass++;
            scene.add(grassArray[currentGrass]);
        }
        else{
            scene.remove(grassArray[currentGrass]);
            currentGrass = 0;
            scene.add(grassArray[currentGrass]);
        }
    })
    
    // FONCTION SWITCH BACKGROUND

    let currentBackground = 0;
    const chemin = "./assets/3d/";

    let bgArray = [
        'background-blur.jpg',
        'background-blur-2.jpg',
        'background-blur-3.jpg'
    ]
    let bgButton = document.getElementById('background');
    disableButton(bgButton);
    let theCanvas;

    const promiseCanvas = new Promise((resolve, reject) => {
        setTimeout(() => {
            theCanvas = document.querySelector('.config3d .cadre3d canvas');
            resolve(theCanvas);
        }, 4000);
      });
      
    promiseCanvas.then((value) => {
        console.log(value);
        switchBg();
    });

    const switchBg = function()
    {
        enableButton(bgButton);
        $(bgButton).click(function(){
            if(currentBackground < bgArray.length - 1)
            {
                currentBackground++;
                $(theCanvas).css('background-image','url('+chemin+bgArray[currentBackground]+')');
            }
            else
            {
                currentBackground = 0;
                $(theCanvas).css('background-image','url('+chemin+bgArray[currentBackground]+')');
            }
        })
    }

    
      
    //   console.log(promise1);
      // expected output: [object Promise]

    // INIT

    createScene(cadre3d);

}

$('.config3d').css('height','100vh');

let retour = document.getElementById('back');

console.log(retour);

$(retour).click(function(){
    alert('reviens bientôt !');
    // window.location = 'http://localhost/bahamut/index.php?controller=default&action=projets';
    window.location = 'https://leviathan-pacifique.com/index.php?controller=default&action=projets';
})

