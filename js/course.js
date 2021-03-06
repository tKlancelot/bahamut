class CarouselTouchPlugin
{
 
    constructor(carousel)
    {
        this.carousel = carousel;
        carousel.container.addEventListener("dragstart",(e)=>{
            e.preventDefault();
        })
        carousel.container.addEventListener('mousedown', this.startDrag.bind(this));
        carousel.container.addEventListener('touchstart', this.startDrag.bind(this));
        window.addEventListener('mousemove',this.drag.bind(this));
        window.addEventListener('touchmove',this.drag.bind(this));
        window.addEventListener('mouseup',this.dragend.bind(this));
        window.addEventListener('touchend',this.dragend.bind(this));
        window.addEventListener('touchcancel',this.dragend.bind(this));
    }

    // demarre le deplacement au toucher
    startDrag(e)
    {
        console.log("start drag");
        if(e.touches)
        {
            if(e.touches.length > 1)
            {
                // console.log('multi touch');
                return;
            }
            else
            {
                // j'ecrase e et je lui affecte le premier point de pression
                e = e.touches[0];
            }
            console.log("start drag");  
        }
        // je definis origine comme un objet dont je pourrais recup les propriétés screenX et screenY
        this.origin = { x : e.screenX, y : e.screenY }
        console.log(this.carousel.disableTransition());
        this.width = this.carousel.containerWidth;
    }

    //deplacement event
    drag(e)
    {
        if(this.origin)
        {
            let point = e.touches ? e.touches[0] : e;
            let translate = {x: point.screenX - this.origin.x, y: point.screenY - this.origin.y}
            if(e.touches && Math.abs(translate.x) > Math.abs(translate.y))
            {
                e.preventDefault();
                e.stopPropagation();
            }else if(e.touches)
            {
                return;
            }
            let baseTranslate = this.carousel.currentItem * -100/this.carousel.items.length;
            this.carousel.translate(baseTranslate + 100 * translate.x/this.width);
            this.lastTranslate = translate;
            // console.log(translate);
        }
    }

    // fin du déplacement
    dragend(e)
    {
        if(this.origin && this.lastTranslate)
        {
            this.carousel.enableTransition();
            if(Math.abs(this.lastTranslate.x / this.carousel.carouselWidth) > 0.2)
            {
                if(this.lastTranslate.x < 0 )// on a slidé vers la gauche
                {
                    this.carousel.next();
                }
                else
                {
                    this.carousel.prev()
                }
            }
            else
            {
                this.carousel.gotoItem(this.carousel.currentItem);
            }
        }
        this.origin = null;
    }

}



export class Carousel  {

    constructor(element, options = {}){
        this.element = element;
        this.options = Object.assign({},{
            slidesToScroll : 1,
            slidesVisible : 1,
            loop : false,
            pagination : false,
            navigation : true,
            infinite : false
        },options);
        if(this.options.loop && this.options.infinite){
            throw new Error('un carousel ne peut être en infini et en loop');
        }
        let children = [].slice.call(element.children);         // convertir une nodelist sous forme de tableau
        this.moveCallBacks = [];
        this.currentItem = 0;
        this.isMobile = false;
        this.offSet = 0 ;

        // modification du DOM

        this.root = this.createDivWithClass('carousel');
        this.container = this.createDivWithClass('carousel__container');
        this.root.setAttribute('tabindex','0');
        this.root.appendChild(this.container);
        this.element.appendChild(this.root);
        this.items = children.map((child) =>{
            let item = this.createDivWithClass("carousel__item");

            item.appendChild(child);
            // this.container.appendChild(item);
            return item;
        })
        if(this.options.infinite){
            this.offSet = this.options.slidesVisible + this.options.slidesToScroll;
            if(this.offActivateSet > children.length){
                console.error("pas assez d'éléments dans le carousel",element);
            }
            this.items = [
                ...this.items.slice(this.items.length - this.offSet).map(item => item.cloneNode(true)),
                ...this.items,
                ...this.items.slice(0, this.offSet).map(item => item.cloneNode(true)),
            ]
            // this.currentItem = offSet;
            this.gotoItem(this.offSet,false);
            // console.log(this.items);
        }
        this.items.forEach(item => this.container.appendChild(item));
        this.setStyle();

        if(this.options.navigation === true){
            this.createNavigation();
        }
        if(this.options.pagination === true){
            this.createPagination();
        }
        
        //évenements 

        this.moveCallBacks.forEach(callback=>callback(this.currentItem));
        this.onWindowResize();
        window.addEventListener('resize',this.onWindowResize.bind(this)); 
        this.root.addEventListener('keyup', e =>{
            if(e.key === "ArrowRight" || e.key === "Right"){
                this.next();
            }else if(e.key === "ArrowLeft" || e.key === "Left"){
                this.prev();
            }
        })
        if(this.options.infinite){
            this.container.addEventListener("transitionend",this.resetInfinite.bind(this))
        }

        new CarouselTouchPlugin(this);
        // debugger
    }

    // methode creation div avec une class
    createDivWithClass(className){
        let div = document.createElement("div");
        div.setAttribute("class",className);
        return div;
    }

    disableTransition()
    {
        this.container.style.transition = "none";
    }

    enableTransition()
    {
        this.container.style.transition = "";
    }

    // applique les bonnes dimensions aux éléments du carousel 
    setStyle(){
        let ratio = this.items.length / this.slidesVisible;
        this.container.style.width = (ratio *100)+"%";
        this.items.forEach(item => item.style.width = ((100/this.slidesVisible)/ratio)+"%")
    }

    // methode creation de fleche de navigation
    createNavigation(){
        let nextButton = this.createDivWithClass("carousel__next");
        let prevButton = this.createDivWithClass("carousel__prev");
        this.root.appendChild(nextButton);
        this.root.appendChild(prevButton);
        nextButton.addEventListener('click',this.next.bind(this));
        prevButton.addEventListener('click',this.prev.bind(this));
        if(this.options.loop == true){
            return;
        }
    }

    createPagination(){
        let pagination =  this.createDivWithClass('carousel__pagination');
        let buttons = [];
        this.root.appendChild(pagination);
        //trouver le nombre de boutons
        for (let i = 0; i < (this.items.length - 2 * this.offSet); i = i + this.options.slidesToScroll){
            let button = this.createDivWithClass('carousel__pagination__button');
            button.addEventListener("click",()=> this.gotoItem(i + this.offSet));
            pagination.appendChild(button);
            buttons.push(button);
        }
        this.onMove(index => {
            let count = this.items.length - 2 * this.offSet;
            let activeButton = buttons[Math.floor(((index - this.offSet) % count) / this.options.slidesToScroll)];
            if(activeButton){
                buttons.forEach(button => button.classList.remove('carousel__pagination__button__active'));
                activeButton.classList.add('carousel__pagination__button__active');
            }
        })
    }

    translate(percent)
    {
        this.container.style.transform = "translate3d("+percent+"%,0,0)";
    }


    next(){
        this.gotoItem(this.currentItem + this.slidesToScroll);
    }
    prev(){
        this.gotoItem(this.currentItem - this.slidesToScroll);
    }

    gotoItem(index, animation = true){
        if(index < 0){
            if(this.options.loop){
                index = this.items.length - this.slidesVisible;
            }else{
                return;
            }
            index = this.items.length - this.options.slidesVisible
        }
        else if(index >= this.items.length || (this.items[this.currentItem + this.slidesVisible] === undefined && index > this.currentItem)){
            if(this.options.loop){
                index = 0;
            }else{
                return;
            }
        }
        let translateX = index * -100/this.items.length;
        if(animation == false){
            this.disableTransition();
        }
        this.translate(translateX);
        this.container.offsetHeight; // force le navigateur à repaint
        if(animation === false){
            this.enableTransition();
        }
        this.currentItem = index;
        this.moveCallBacks.forEach(callback => callback(index));
    }

    // deplacer le container pour donner l'impression d'un slide infini
    resetInfinite(){
        if(this.currentItem <= this.options.slidesToScroll){
            this.gotoItem(this.currentItem + (this.items.length - 2 * this.offSet), false);
        }else if(this.currentItem >= this.items.length - this.offSet){
            this.gotoItem(this.currentItem - (this.items.length - 2 * this.offSet), false);
        }
    }

    onMove(callback){
        this.moveCallBacks.push(callback);
    }

    onWindowResize(){
        let mobile = window.innerWidth < 800;
        if(mobile !== this.isMobile){
            // changer la valeur de la propriété d'instance
            this.isMobile = mobile;
            this.setStyle();
            this.moveCallBacks.forEach(callback=>callback(this.currentItem));
        }
    }

    get slidesToScroll(){
        //ecriture ternaire
        return this.isMobile ? 1 : this.options.slidesToScroll;
    }

    get slidesVisible(){
        //ecriture ternaire
        return this.isMobile ? 1 : this.options.slidesVisible;
    }

    get containerWidth()
    {
        return this.container.offsetWidth;
    }

    get carouselWidth()
    {
        return this.root.offsetWidth;
    }
}



document.addEventListener("DOMContentLoaded", function(){
    if (window.matchMedia("(min-width: 600px)").matches) 
    {

    }
    else
    {  
        // let myCar   = new Carousel(document.querySelector('#carousel0'),{
        //     slidesToScroll : 2,
        //     slidesVisible : 3,
        //     // pagination : true,
        //     infinite : true,
        // });
        // let myCar2   = new Carousel(document.querySelector('#carousel1'),{
        //     slidesToScroll : 1,
        //     slidesVisible : 1,
        //     pagination : false,
        //     infinite : true
        // })
        // let myCar3   = new Carousel(document.querySelector('#carousel2'),{
        //     slidesToScroll : 1,
        //     slidesVisible : 1,
        //     pagination : false,
        //     infinite : true
        // })
        // let myCar4   = new Carousel(document.querySelector('#carousel3'),{
        //     slidesToScroll : 1,
        //     slidesVisible : 1,
        //     pagination : false,
        //     infinite : true
        // })


    }
})

let section2 = document.getElementById('section1');
