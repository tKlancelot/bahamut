import { Orbite } from "./Orbite.js";
import { Planet } from "./Planete.js";
import { TextGeo } from "./TextGeo.js";

let body3D = document.querySelector('.projet');

const scene = new THREE.Scene();
const fov = 75;
const aspect = 2;  // valeur par défaut du canevas
const near = 0.1;
const far = 10000;
const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
const renderer = new THREE.WebGLRenderer({ alpha: true });
const controls = new THREE.OrbitControls( camera, renderer.domElement);
camera.fov = window.innerHeight / window.screen.height;
camera.aspect = window.innerWidth / window.innerHeight;
renderer.setSize(window.innerWidth, window.innerHeight,false);

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

body3D.appendChild( renderer.domElement );

const loader = new THREE.FontLoader();

let myTextArray = [];

loader.load( 'https://unpkg.com/three@0.77.0/examples/fonts/helvetiker_regular.typeface.json', function ( font ) {
	let textSun = new THREE.TextGeometry( 'sun', {
		font: font,
		size: 1,
		height: 0.1,
		curveSegments: 0.25
	});
	let textHtml = new THREE.TextGeometry( 'html', {
		font: font,
		size: 0.50,
		height: 0.1,
		curveSegments: 0.25
	});
	myTextArray.push(textHtml);
	myTextArray.push(textSun);
} );

const promise1 = new Promise((resolve, reject) => {
	setTimeout(() => {
	  resolve(loader);
	}, 1000);
  });
  
  promise1.then(() => {
	console.log(myTextArray);
  });

// let test = new TextGeo('salut',1,0.25,1,2);
// console.log(test.createTextGeo());


camera.position.x = 1000;
camera.position.z = 1500;
camera.position.y = 250;

/************************/
/*****   helpers ********/
/************************/

const size = 80;
const divisions = 10;
const gridHelper = new THREE.GridHelper( size, divisions );
console.log(gridHelper.material.color = { r : 0.01, g : 0.02, b : 0.96});
console.log(gridHelper.material);
scene.add( gridHelper );
const axesHelper = new THREE.AxesHelper(40);
//supprimer l'axe y (vertical)
console.log(axesHelper.scale.y = 0);
scene.add( axesHelper );

/************************/
/*****   lights  ********/
/************************/


const light = new THREE.AmbientLight(0xFFFFFF, 0.4);
const light1 = new THREE.HemisphereLight( 0xd4d4dd, 0xf4f4f4, 0.8 );
// const light2 = new THREE.PointLight( 0xa4a4a4, 1, 100 );
scene.add(light);
scene.add( light1 );
// scene.add( light2 );
const a = new THREE.Vector3( 0, 1, 0 );

const directionalLight = new THREE.DirectionalLight( 0xffffff, 0.8 );
scene.add( directionalLight );



/************************/
/*****   orbites  *******/
/************************/

let orbite1, orbite2, orbite3, orbite4, orbite5, orbite6;

// cercle orbite 
let myOrbiteArray = [
	orbite1 = new Orbite('orbite bootstrap',7.2,7.3,128,0x563d7c),
	orbite2 = new Orbite('orbite html5',8,8.1,128,0xe34c26),
	orbite3 = new Orbite('orbite css',10,10.1,64,0x0048ee),
	orbite4 = new Orbite('orbite sass',26,26.1,64,0xc41692),
	orbite5 = new Orbite('orbite php',28,28.1,64,0x787CB5),
	orbite6 = new Orbite('orbite javaScript',36,36.1,64,0xffd43b),
];

function makeRing(item)
{
	let geometry = new THREE.RingGeometry( item.radius,item.innerRadius,item.nbSegments,12,0,6.3);
	let material = new THREE.MeshBasicMaterial( { color: item.color, side: THREE.DoubleSide } );
	console.log(item.getName());
	let mesh = new THREE.Mesh( geometry, material );
	mesh.rotation.x = Math.PI/2;
	scene.add( mesh );
}

for (let i = 0; i < myOrbiteArray.length; i++)
{
	makeRing(myOrbiteArray[i]);
}

/************************/
/*****   planètes *******/
/************************/

const sun = new Planet("html",2.4,32,32,'blablabla',"sun.jpg",0xe4e023,0,0,false,1,1);
const bootstrap = new Planet("bootstrap",0.08,32,32,"blabla","planet-texture-four.jpg",0x563d7c,0,-(Math.cos(Math.PI)*7.2),true);
const html = new Planet("html",0.32,32,32,'bla',"planet-texture-five.jpg",0xe34c26,0,Math.cos(Math.PI)*8,true);
const css = new Planet("css",0.60,32,32,'planete css','planet-texture-three.jpg',0x264de4,Math.cos(Math.PI)*10,0,true,2.2,2.2);
const sass = new Planet("sass",0.30,32,32,'planete sass','planet-texture-four.jpg',0xcc6699,(Math.cos(Math.PI)*26),0,true);
const php = new Planet("php",0.72,32,32,'planete php','planet-texture-two.jpg',0x787CB5,0,-(Math.cos(Math.PI)*28),true,1,1);
const javaScript = new Planet("javaScript",0.88,32,32,'planete javascript','planet-texture-four.jpg',0xffd43b,-(Math.cos(Math.PI)*36),0,true);

let mySun = sun.createPlanet();
let myBootstrap = bootstrap.createPlanet();
let myHtml = html.createPlanet();
let myCss = css.createPlanet();
let mySass = sass.createPlanet();
let myPhp = php.createPlanet();
let myJs = javaScript.createPlanet();



scene.add(mySun);
mySun.add(myBootstrap);
mySun.add(myHtml);
mySun.add(myCss);
mySun.add(mySass);
mySun.add(myPhp);
mySun.add(myJs);



//control panel

let panel = document.createElement('div');
let action = document.createElement('button');
$(action).text('freeze !');

let blendMode = document.createElement('button');
$(blendMode).text('blend mode');

let helpersBtn = document.createElement('button');
$(helpersBtn).text('helpers on');

let gridBtn = document.createElement('button');
$(gridBtn).text('grid on');
// css panel 

$(panel).css('border','1px solid var(--thema-dark-transp)');
$(panel).css('width','auto');
$(panel).css('height','auto');
$(panel).css('position','absolute'); 
$(panel).css('left','12%'); 
$(panel).css('top','33%'); 
$(panel).css('display','flex'); 
$(panel).css('flex-direction','column'); 
panel.id = "draggable"; 

// css action
let boutons = [action,blendMode,helpersBtn,gridBtn];
let blendModes = ['color-dodge','luminosity','lighten','screen'];

for (let i = 0 ; i < boutons.length; i++)
{
	$(boutons[i]).css('border','1px solid var(--thema-darkest)');
	$(boutons[i]).css('background','unset');
	$(boutons[i]).css('color','var(--thema-darkest');
	$(boutons[i]).css('cursor','pointer');
	$(boutons[i]).css('display','flex');
	$(boutons[i]).css('min-height','40px');
	$(boutons[i]).css('width','100px');
	$(boutons[i]).css('align-items','center');
	$(boutons[i]).css('justify-content','center');
	$(boutons[i]).css('margin','1rem');
	$(boutons[i]).css('transition','0.4s');
	$(panel).append(boutons[i]);
}

$('.projet').append(panel);


$( function() {
    $( "#draggable" ).draggable();
});


// stop rotation

let toggled = 0;

$(action).click(function()
{
	if(toggled == 0)
	{
		mySun.rotateY(0);
		$(this).text('unfreeze');
		toggled = 1;
	}
	else
	{
		mySun.rotateY(0.001);
		$(this).text('freeze');
		toggled = 0;
	}
})


// change blend mode
let currentBlendMode = 0;
$(blendMode).click(function()
{
	if(currentBlendMode < blendModes.length-1)
	{
		currentBlendMode++;
		$('.projet canvas').css('background-blend-mode',blendModes[currentBlendMode]);
		$(this).text(blendModes[currentBlendMode]);
	}
	else{
		currentBlendMode = 0;
		$('.projet canvas').css('background-blend-mode',blendModes[currentBlendMode]);
		$(this).text("blend mode");
	}
})

let helpersOn = true;

$(helpersBtn).click(function()
{
	if(helpersOn == true)
	{
		scene.remove(axesHelper);
		helpersOn = false;
		$(this).text('helpers off');
	}
	else{
		scene.add(axesHelper);
		$(this).text('helpers on');
		helpersOn = true;
	}
})

let gridOn = true;
$(gridBtn).click(function()
{
	if(gridOn == true)
	{
		scene.remove(gridHelper);
		$(this).text('grid off');
		gridOn = false;
	}
	else{
		scene.add(gridHelper);
		$(this).text('grid on');
		gridOn = true;
	}
})


window.onresize = resizeRendererToDisplaySize(renderer);

const animate = function () {
	controls.update();
	// controls.autoRotate = true;
	// controls.autoRotateSpeed = 0.5;
	requestAnimationFrame( animate );

	renderer.render( scene, camera );
	if (resizeRendererToDisplaySize(renderer)) {
		const canvas = renderer.domElement;
		camera.aspect = canvas.clientWidth / canvas.clientHeight;
		camera.updateProjectionMatrix();
	}
	if(toggled == false)
	{
		mySun.rotateY(0.001);
		myBootstrap.rotateY(0.004);
		myHtml.rotateY(0.0024);
		myCss.rotateY(0.0028);
		mySass.rotateY(0.0028);
		myPhp.rotateY(0.0028);
		myJs.rotateY(0.004);
	}
};
resizeRendererToDisplaySize(renderer);

setTimeout(() => {
	animate();
}, 1);

// modif dom


let canvas = document.querySelector('.projet canvas');

$('.footer.classy').css('background-color','#040416');
$('.footer.classy').css('background-image','url("./assets/3d/sky.jpg")');
$('.projet').css('flex-direction','column');
$('.projet canvas').css('margin','1% auto');
$('.projet canvas').css('height','100%');
$('.projet canvas').css('background-image','url("./assets/3d/sky-2.jpg")');
$('.projet canvas').css('background-size','cover');
$('.projet canvas').css('background-color','#161620');
$('.projet canvas').css('background-blend-mode','color-dodge');
