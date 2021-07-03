
export class Scene {
    constructor(name,title,para2,source,numero,displayMode,para3,filter) {
        this.name = name;
        this.title = title;
        this.para2 = para2;
        this.para3 = para3;
        this.source = source;
        this.numero = numero;
        this.displayMode = displayMode;
        this.filter = filter;

    }
    display(cadre)
    {

        cadre.style.backgroundImage = 'url('+this.source+')';
        cadre.style.backgroundSize = this.displayMode;
        if(this.filter)
        {
            cadre.style.filter = this.filter;
        }
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
        $('#second').hide();
    }
    showSecondPara(cadre)
    {
        if(this.para3)
        {
        cadre.textContent = this.para3;
        $(cadre).show();
        if (window.matchMedia("(min-width: 600px)").matches) 
            {
                $(cadre).css('margin','0 auto auto');
                // console.log(cadre);
            }
        }
    }
}
