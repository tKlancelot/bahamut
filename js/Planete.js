export class Planet 
{
    constructor(name, radius, widthSeg, heightSeg, description,texture,color,posX,posZ,associerCone,repeatX = 1,repeatY = 1)
    {
        this.name = name;
        this.radius = radius;
        this.widthSeg = widthSeg;
        this.heightSeg = heightSeg;
        this.description = description;
        this.texture = texture;
        this.color = color;
        this.posX = posX;
        this.posZ = posZ;
        this.associerCone = associerCone;
        this.repeatX = repeatX;
        this.repeatY = repeatY;
    }


    createTexture()
    {
        const texture = new THREE.TextureLoader().load( "./assets/3d/"+this.texture );
        texture.wrapS = THREE.RepeatWrapping;
        texture.wrapT = THREE.RepeatWrapping;
        texture.repeat.set( this.repeatX, this.repeatY );
        console.log(texture);
        return texture;
    }

    createMaterial() 
    {
        var myMaterial = new THREE.MeshPhongMaterial({color: this.color,flatShading: false});
        myMaterial.map = this.createTexture();
        return myMaterial;
    }

    createPlanet()
    {
        let geometry = new THREE.SphereGeometry( this.radius, this.widthSeg, this.heightSeg,6, 6.3, 6, 6.3);
        let sphere = new THREE.Mesh( geometry, this.createMaterial() );
        sphere.receiveShadow = true;
        sphere.material.skinning = true;
        sphere.position.x = this.posX;
        sphere.position.z = this.posZ;
        if(this.associerCone == true)
        {
            let geometry1 = new THREE.CylinderGeometry( 0.18, 0, 1, 64 );
            let material1 = new THREE.MeshBasicMaterial( {color: sphere.material.color} );
            const cylinder = new THREE.Mesh( geometry1, material1 );
            cylinder.position.y = 1;
            sphere.add( cylinder );
        }
        return sphere;	
    }


    getName()
    {
        return this.name;
    }

    getDescription()
    {
        return this.description;
    }


}