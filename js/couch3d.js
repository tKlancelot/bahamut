import CreateAFloor from './createAFloor.js';

function reqListener () {
    if(this.readyState == 4){
        // $(".loaderDiv").hide(400);
        global3dScript();
    }
    else{
        console.log('waiting ... ');
    }
}
  
var oReq = new XMLHttpRequest();
oReq.onload = reqListener;
oReq.open("get", "./assets/3d/canape-modular.glb", true);
oReq.send();

let theBody = document.querySelector('.config3d');
let modelLoaded = 0;

function global3dScript(){

    let cadre3d = document.createElement('div');
    theBody.append(cadre3d);

    // DECLARATIONS DOM

    cadre3d.classList = 'cadre3d';

    // DECLARATIONS 3D

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera( 50, window.innerWidth / window.innerHeight, 1, 1000 );
    const renderer = new THREE.WebGLRenderer({ alpha: true });
    const gltfLoader = new THREE.GLTFLoader();
    const controls = new THREE.OrbitControls( camera, renderer.domElement);
    const url =   './assets/3d/canape-modular.glb';
    scene.receiveShadow = true;
    scene.castShadow = true;
    camera.position.z = 8;
    camera.position.y = 16;
    camera.autoRotate = false;
    camera.enableDamping = true;
    const directionalLight = new THREE.DirectionalLight( 0xeeeeee, 0.8 );
    const pointLight = new THREE.PointLight( 0xff0000, 1, 100 );
    pointLight.position.set( 50, 50, 50 );
    const light = new THREE.AmbientLight( 0xd8d8d8 ); // medium white light
    const light2 = new THREE.HemisphereLight( 0xc4c4c8, 0x646468, 0.8 );
    let MODEL_PATHS = [url];
    let myArray = [];
    let myFloorArray = [];
    let myFloor;

    const axesHelper = new THREE.AxesHelper( 10 );

    // PROMESSES

    const promise = new Promise((resolve, reject) => {
        setTimeout(() => {
        resolve(myArray);
        //   configFloor();
        }, 10000);
    });

    // LOADER

    // ajouter un sol

    function configFloor(){
        CreateAFloor(myFloor,'./assets/3d/wooden-floor.jpg',-0.020,8,8,myFloorArray);
    }

    function loadScene(){
        gltfLoader.load(MODEL_PATHS[0], (gltf) => {
            myArray.push(gltf.scene);
        });
    }

    configFloor();

    // fonctions

    function addLights(){
        scene.add( directionalLight );
        scene.add( light );
        scene.add( light2 );
        scene.add( pointLight );
    }


    function removeLights(){
        scene.remove( directionalLight );
        scene.remove( light );
        scene.remove( light2 );
        scene.remove( pointLight );
    }


    function ajouterTousLesObjets(tableau){
        for (let i = 0; i < tableau.length; i++){
            scene.add(tableau[i]);
        }
    }

    function supprimerTousLesObjets(tableau){
        for (let i = 0; i < tableau.length; i++){
            scene.remove(tableau[i]);
        }
    }



    function resizeRendererToDisplaySize(renderer) {
        const canvas = renderer.domElement;
        var width = 892;
        var height = 560.7;
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
            ajouterTousLesObjets(value);
            getInfo();
            modelLoaded = 1;
        });
        // addLights();
        scene.add(myFloorArray[0]);
        animate();
        
    }

    function ajouterUnObjet(monObjet){
        scene.add(monObjet);
    }

    function getInfo()
    {
        let livingRoom = myArray[0];
        console.log(livingRoom.children);
        let coating = livingRoom.children[12];
        let cushion2 = livingRoom.children[16];
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

    let toggleColor = 0;
    let buttonColor = document.querySelector('#colors');

    $(buttonColor).click(function(){
        let livingRoom = myArray[0];
        let coating = livingRoom.children[12];
        let cushion2 = livingRoom.children[16];
        if(modelLoaded == 1)
        {
            if(toggleColor == 0)
            {
                coating.material.color.b = 0.78;
                coating.material.color.g = 0.02;
                coating.material.color.r = 1;
                cushion2.material.color.g = 0.2;
                toggleColor = 1;
            }
            else
            {
                coating.material.color.b = 1;
                coating.material.color.g = 1;
                coating.material.color.r = 1;
                cushion2.material.color.g = 1;
                toggleColor = 0;
            }
        }
        else
        {
            alert('model not loaded yet');
        }
    })

    // INIT

    createScene(cadre3d);

}

