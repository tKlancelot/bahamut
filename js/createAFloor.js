export default function CreateAFloor(element,texturePath,positionY,sizeX,sizeY,tableau){
    var loader = new THREE.TextureLoader();
    let texture = loader.load( texturePath, function ( texture ) {
        texture.wrapS = texture.wrapT = THREE.RepeatWrapping;
        texture.offset.set( 0, 0 );
        texture.repeat.set( 3, 3 );
    });
    let geometry = new THREE.PlaneGeometry( sizeX, sizeY, 1, 1 );
    let material = new THREE.MeshBasicMaterial( { map : texture } );
    element = new THREE.Mesh( geometry, material );
    element.material.side = THREE.DoubleSide;
    element.rotation.x = - Math.PI / 2;
    element.position.y = positionY;
    tableau.push(element);
}