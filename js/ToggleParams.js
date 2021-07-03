export function ToggleParams()
{
    let divForm = document.querySelector('#params');
    let boutonParam = document.querySelector('.logoFrame');
    let cross = document.querySelector('.cross');

    let toggleMenu = 0;
    let navspy = document.querySelector('#navSpy');
    let toggleMenuButton = document.querySelector('#toggleMenu');

    let toggled = false;
    
    divForm.style.display = "none";
    
    boutonParam.addEventListener('click',function(){
        if(!toggled)
        {
            $(this).fadeOut('fast');
            setTimeout(function(){
                $(divForm).fadeIn(400);
            },400);
            toggled = true;
        }
    })
    
    cross.addEventListener('click',function(){
        if(toggled)
        {
            let theParent = this.parentNode.parentNode.parentNode;
            $(divForm).hide();
            setTimeout(function(){$(boutonParam).fadeIn(100)},400);
            if (!window.matchMedia("(min-width: 600px)").matches) 
            {
                theParent.style.width = "initial";
                $("#navSpy").show();
                $(toggleMenuButton).show();  
                initMenuStatus();
            } 
            toggled = false;
        }
    })


    // fleche de toggle

    // par defaut menu non deplié

    function initMenuStatus()
    {
        $("#navSpy").slideUp();
        $("#toggleMenu").css('transform','rotate(180deg)');
        toggleMenu = 1;
    }

    initMenuStatus();

    $("#toggleMenu").click(function(){
        if(toggleMenu == 0)
        {
            $("#navSpy").toggle('slow');
            $('.divParam').css('width','auto');
            $('.divParam').css('opacity','0.64');
            $(this).css('transform','rotate(180deg)');
            toggleMenu = 1;
        }
        else
        {
            $("#navSpy").fadeIn();
            $('.divParam').css('width','100%');
            $('.divParam').css('opacity','1');
            $('#navSpy').css('justify-content','space-evenly');
            $(this).css('transform','initial');
            toggleMenu = 0;
        }
    })

}