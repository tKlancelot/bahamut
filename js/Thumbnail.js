export class Thumbnail{
    constructor(titre,source,parent,element)
    {
        this.titre = titre;
        this.source = source;
        this.parent = parent;
        this.element = this.createThumbnail(); 
    }

    createElementWithClass(type,className,parent)
    {
        let elem = document.createElement(type);
        elem.classList.add(className);
        if(parent)
        {
            $(this.parent).append($(elem));
        }
        return elem;
    }

    createThumbnail()
    {
        let frameThumbnail = this.createElementWithClass('div','frame30',this.parent);
        let myThumbnail = this.createElementWithClass('div','picto');
        let myH4 = this.createElementWithClass('h4','heading3');
        $(myH4).text(this.titre);
        frameThumbnail.appendChild(myThumbnail);
        frameThumbnail.appendChild(myH4);
        $('.frame30').css('height','30vh');
        $('.frame30').css('flex-direction','column');
        $(myThumbnail).css('background-image','url("./assets/pictos/'+this.source+'")');
        return frameThumbnail;
    }


}