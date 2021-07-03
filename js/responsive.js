let theBody = document.querySelector('body');

if (window.matchMedia("(max-width: 600px)").matches) 
{
    // recuperer les elements et les stocker dans des variables
    // header

    let theHeader = document.querySelector('header');
    $(theBody).addClass('responsiveB');  

    // customize header
    // theHeader.classList.add('heading1');
    $(".frame-1 .picture").css('border','unset');
    $(".form-tarik .section-input").css('border','unset');

    
    // carousel
    // recuperer les deux fleches et les positionner au centre de l'écran
    let prevArrow = document.querySelector('.frame-3 .under-frame #prev');
    let nextArrow = document.querySelector('.frame-3 .under-frame #next');
    $(prevArrow).insertBefore($('.frame-1'));
    $(nextArrow).insertBefore($('.frame-1'));


    // coloriser les vignettes

    let allThumbnails = document.querySelectorAll('#section1 .frame30');
    let allPictos = document.querySelectorAll('#section1 .frame30 .picto');
  
    // creer un tableau de couleurs
    let myArrayColors = [
      "#BAE8D9",
      "#E9C3E8",
      "#FFDCD0",
      "#FEC8D8",
      "#D8E9F7",
      "#FFEED3",
      "#D1D8FD",
      "#D3EEFF",
      "#F9F0C1",
      "#C0ECCC",
      "#B5E6E5",
      "#D3EEFF",
      "#C9D6DF",
      "#FAD9D7",
      "#D1C2E0",
      "#FBF4E2",
      "#D8F0FA",
      "#C7DEFA",
    ];    
    
    $(allPictos[4]).css('background-size','30%');
    // test ok

    // projet planetes
    $('.projet').css('max-width','100%');
}
else
{
  $(theBody).addClass('desktop');
}