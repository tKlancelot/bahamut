export class TextGeo
{
    constructor(content,size,height,posX, posY)
    {
        this.content = content;
        this.size = size;
        this.height = height;
        this.posX = posX;
        this.posY = posY;
    }

    createTextGeo()
    {
        let txt_mat = new THREE.MeshPhongMaterial({color:0x48f4f8});
        let txt_mesh = new THREE.Mesh(myText, txt_mat);
        txt_mesh.position.x = this.posX;
        txt_mesh.position.y = this.posY;
        return txt_mesh;
    }

    resolvePromise()
    {
        let promise = new Promise((resolve, reject) => {
            setTimeout(() => {
              resolve(loader);
            }, 1000);
          });
        return promise;
    }

  

}