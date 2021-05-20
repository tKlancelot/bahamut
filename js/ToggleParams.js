export function ToggleParams()
{
    let divForm = document.querySelector('#params');
    let myForm = document.querySelectorAll('#params .form form')[1];
    let boutonParam = document.querySelector('.logoFrame');
    let cross = document.querySelector('.cross');

    let toggleMenu = 0;
    let navspy = document.querySelector('#navSpy');
    let toggleMenuButton = document.querySelector('#toggleMenu');

    let toggled = false;
    
    divForm.style.display = "none";
    boutonParam.style.border = "none";

    
    boutonParam.addEventListener('click',function(){
        if(!toggled)
        {
            let theParent = this.parentNode;
            divForm.style.display = "flex";
            divForm.classList.add('shadowed');
            this.style.display = "none";
            if (!window.matchMedia("(min-width: 600px)").matches) 
            {
                // theParent.style.width = "100%";
                // divForm.style.height = "100vh";
                divForm.style.width = "-webkit-fill-available";
                $("#navSpy").hide();  
                $(toggleMenuButton).hide();  
                myForm.style.display = "none";
            } 
            toggled = true;
        }
    })
    
    cross.addEventListener('click',function(){
        if(toggled)
        {
            let theParent = this.parentNode.parentNode.parentNode;
            divForm.style.display = "none";
            boutonParam.style.display = "flex";
            if (!window.matchMedia("(min-width: 600px)").matches) 
            {
                theParent.style.width = "initial";
                $("#navSpy").show();
                $(toggleMenuButton).show();  
            } 
            toggled = false;
        }
    })


    // fleche de toggle

    $("#toggleMenu").click(function(){
        if(toggleMenu == 0)
        {
            // alert('hey');
            $("#navSpy").slideUp();
            $(this).css('transform','rotate(180deg)');
            toggleMenu = 1;
        }
        else
        {
            $("#navSpy").slideDown();
            $(this).css('transform','initial');
            toggleMenu = 0;
        }
    })
}