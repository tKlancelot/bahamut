class Carousel  {

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
            if(this.offSet > children.length){
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
        // debugger
    }

    // methode creation div avec une class
    createDivWithClass(className){
        let div = document.createElement("div");
        div.setAttribute("class",className);
        return div;
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
        this.onMove(index => {
            if(index == 0){
                prevButton.classList.add("hidden");
            }
            else{
                prevButton.classList.remove("hidden");
            }
            if(this.items[this.currentItem + this.slidesVisible] === undefined){
                nextButton.classList.add("hidden");
            }
            else{
                nextButton.classList.remove("hidden");
            }
        })
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
            this.container.style.transition = "none";
        }
        this.container.style.transform = "translate3d("+translateX+"%,0,0)";
        this.container.offsetHeight; // force le navigateur à repaint
        if(animation === false){
            this.container.style.transition = "";
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
}



document.addEventListener("DOMContentLoaded", function(){
    let myCar   = new Carousel(document.querySelector('#carousel0'),{
        slidesToScroll : 1,
        slidesVisible : 2,
        // pagination : true,
        infinite : true
    });
    let myCar2   = new Carousel(document.querySelector('#carousel1'),{
        slidesToScroll : 1,
        slidesVisible : 1,
        pagination : false,
        infinite : true
    })
    let myCar3   = new Carousel(document.querySelector('#carousel2'),{
        slidesToScroll : 1,
        slidesVisible : 1,
        pagination : false,
        infinite : true
    })
    let myCar4   = new Carousel(document.querySelector('#carousel3'),{
        slidesToScroll : 1,
        slidesVisible : 1,
        pagination : false,
        infinite : true
    })

})

let section2 = document.getElementById('section1');
