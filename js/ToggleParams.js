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
    boutonParam.style.border = "none";

    
    boutonParam.addEventListener('click',function(){
        if(!toggled)
        {
            if(toggleMenu == 0)
            {
                $("#navSpy").toggle('slow');
                $('.divParam').css('height','auto');
                $('.divParam').css('opacity','0.64');
                $("#toggleMenu").css('transform','rotate(180deg)');
                toggleMenu = 1;
            }
            let theParent = this.parentNode;
            $(this).fadeOut('fast');
            $(divForm).fadeIn(600);
            $('.divParam').css('border','1px solid var(--thema-dark-transp)');
            if (!window.matchMedia("(min-width: 600px)").matches) 
            {
                divForm.style.width = "-webkit-fill-available";
                $("#navSpy").hide();  
                $(toggleMenuButton).hide();  
            } 
            toggled = true;
        }
    })
    
    cross.addEventListener('click',function(){
        if(toggled)
        {
            let theParent = this.parentNode.parentNode.parentNode;
            $('.divParam').css('border','initial');
            $(divForm).hide('fast');
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
            // alert('hey');
            $("#navSpy").toggle('slow');
            $('.divParam').css('height','auto');
            $('.divParam').css('opacity','0.64');
            $(this).css('transform','rotate(180deg)');
            toggleMenu = 1;
        }
        else
        {
            $("#navSpy").fadeIn();
            $('.divParam').css('height','100vh');
            $('.divParam').css('opacity','1');
            $('#navSpy').css('justify-content','center');
            $(this).css('transform','initial');
            toggleMenu = 0;
        }
    })


    // gestion du bouton d'info
    // let panneau = document.querySelector('.panneauInfo');
    // let boutonInfo = document.querySelector('#informations');
    // let cross2 = document.querySelector('.panneau-head .cross2');
    // let togglePanneau = 0;

    // $(panneau).hide();
    // boutonInfo.addEventListener("click",function(){
    //     if(togglePanneau == 0)
    //     {
    //         $(".divParam").hide();
    //         $(panneau).show(500);
    //         togglePanneau = 1;
    //     }
    // })
    // cross2.addEventListener('click',function()
    // {
    //     if(togglePanneau == 1)
    //     {
    //         $(panneau).hide(500);
    //         $(".divParam").show(500);
    //         togglePanneau = 0;
    //     }
    // })

}