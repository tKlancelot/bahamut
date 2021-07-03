// en mode téléphone toutes les sections apparaissent
// l'appli est scrollable
// tout ce qui est passé en display none ici sera visible en mode téléphone -> voir le fichier responsive.js

export function Config()
{
    let allSection = document.querySelectorAll('.sect');
    let myTitle = document.querySelector('.responsiveB .zoneTitle');

    if (window.matchMedia("(min-width: 600px)").matches) 
    {
        // mode desktop
        allSection.forEach(element => 
            element.style.display = "none"    
        );
        // navBar.style.display = "none";
    }
    else 
    {
        allSection.forEach(element => 
            element.style.display = "initial"
        );
        console.log(myTitle);
        $(myTitle).text('');
    }
}