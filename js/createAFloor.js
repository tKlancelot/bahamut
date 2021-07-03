export default function CreateAFloor(element,texturePath,positionY,sizeX,sizeY,tableau,repeatFactor){
    

    function texturage(path)
    {
        var loader = new THREE.TextureLoader(); 
        const texture = loader.load( path, function ( texture ) {
            texture.wrapS = texture.wrapT = THREE.RepeatWrapping;
            texture.offset.set( 0, 0 );
            texture.repeat.set( repeatFactor, repeatFactor );
        });
        return texture;
    }

    let geometry = new THREE.PlaneGeometry( sizeX, sizeY, 1, 1 );
    let material = new THREE.MeshBasicMaterial( { map : texturage(texturePath)} );
    element = new THREE.Mesh( geometry, material );
    element.material.side = THREE.DoubleSide;
    console.log(element);
    element.rotation.x = - Math.PI / 2;
    element.position.y = positionY;
    tableau.push(element);
}
