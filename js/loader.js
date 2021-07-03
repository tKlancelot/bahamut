$("body").addClass('theBody');

let desktopBodyArray = [
    '.theBody .header',
    '.theBody .divParam',
    '.theBody .presentation',
    '.theBody .footer'
]

function hideBody(array)
{
    for (let i = 0; i < array.length; i++)
    {
        // $(array[i]).hide("fast");
        $(array[i]).hide("fast");
        $(array[i]).css("visibility","hidden");
    }
}

// creer une div loader black


// loadPage();

// $(document).ready(function(){

// })




function showRealBody(){
    for (let i = 0; i < realBodyArray.length; i++)
    {
        $(realBodyArray[i]).fadeIn("slow");
    }
}

// window.onload = handleShow;




function handleShow()
{
    if (window.matchMedia("(min-width: 600px)").matches) 
    {
        $(".desktop").hide();
    }
    else
    {
        $(".responsiveB").hide();
    }
}
