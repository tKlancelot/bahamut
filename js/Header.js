export class Header{
    constructor(title,subtitle,className,element)
    {
        this.title = title;
        this.subtitle = subtitle;
        this.className = className;
        this.element = element;
    }

    createHeader(titre = false, menu = false)
    {
        this.element = document.createElement('header');
        this.element.classList = "header";
        document.body.appendChild(this.element);
        if(titre)
        {
            let myTitre = this.createTitle();
        }
        if(menu)
        {
            let myMenu = this.createMenu();
        }
    }

    createTitle()
    {
        let heading = document.createElement('h1');
        heading.classList.add(this.className);
        heading.innerHTML = "<span>"+this.title+"</span>&nbsp;" + "<span>"+this.subtitle+"</span>";
        this.element.appendChild(heading);
        return heading;
    }

    createMenu()
    {

        let menuItems = ['intro','vignettes','parcours','skills','projets','contact','legal notice'];
        let trimArray = [];
        for (let i = 0; i < menuItems.length; i++)
        {
            let oneTrim = menuItems[i].replace(/ /g, "");
            trimArray.push(oneTrim);
        }

        let menu = document.createElement('div');
        let myUl = document.createElement('ul');
        menu.append(myUl);
        for (let i = 0 ; i < menuItems.length; i++)
        {
            let oneLi = document.createElement("li");
            let myLink = document.createElement("a");
            myLink.href = "index.php?controller=default&action="+trimArray[i];
            myLink.textContent = menuItems[i];
            oneLi.append(myLink);
            myUl.append(oneLi);
        }
        menu.classList = "menu";
        this.element.appendChild(menu);
    }
}