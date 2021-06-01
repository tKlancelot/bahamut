
if (window.matchMedia("(min-width: 600px)").matches) 
{
  /* La largeur minimum de l'affichage est 600 px inclus */
}
else 
{

    // recuperer les elements et les stocker dans des variables
    
    // header

    let theBody = document.querySelector('body');
    let theHeader = document.querySelector('header');
    let theFooter = document.querySelector('footer');
    let theMenu = document.querySelector('.menu');
    let theLogo = document.querySelector('.logo');
    let theTitle = document.querySelector('.zoneTitle');
    let theNavSpy = document.querySelector('#navSpy');
    
    // main
    
    let divParam = document.querySelector('.divParam');
    let firstItem = document.querySelectorAll('#navSpy a')[0];
    
    // donner une classe a ce body
    
    $(theBody).addClass('responsiveB');
    
    $(theMenu).hide();
    $(theLogo).hide();
    $(theFooter).hide();

    // customize header
    theHeader.classList.remove('classy');
    theHeader.classList.add('heading1');
    $(".zoneTitle").css('background-image','none');
    $(theHeader).css('background-image','none');
    $("#section0 .test").css('background-image','none');
    $(".frame-1 .picture").css('border','unset');
    $(".frame-2 .under").css('border','1px solid var(--thema-darker');
    $(".responsiveB main .section-main .section").css('padding-top','0px');
    $(".responsiveB main .section-main .section").css('padding-bottom','0px');
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
    // console.log(allThumbnails);
  
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

    // allThumbnails.forEach(element =>
    //   $(element).css('filter','brightness(120%)')
    // );


    // test sur une vignette
    // $(allThumbnails[0]).css('background-color',myArrayColors[15]);
    // $(allThumbnails[1]).css('background-color',myArrayColors[16]);
    // $(allThumbnails[2]).css('background-color',myArrayColors[17]);
    // $(allThumbnails[6]).css('background-color',myArrayColors[5]);
    // $(allThumbnails[7]).css('background-color',myArrayColors[3]);
    // $(allThumbnails[8]).css('background-color',myArrayColors[4]);
    // $(allThumbnails[9]).css('background-color',myArrayColors[0]);
    // $(allThumbnails[10]).css('background-color',myArrayColors[1]);
    // $(allThumbnails[11]).css('background-color',myArrayColors[2]);
    // $(allThumbnails[12]).css('background-color',myArrayColors[6]);
    // $(allThumbnails[13]).css('background-color',myArrayColors[7]);
    // $(allThumbnails[14]).css('background-color',myArrayColors[8]);
    // $(allThumbnails[15]).css('background-color',myArrayColors[9]);
    // $(allThumbnails[16]).css('background-color',myArrayColors[10]);
    // $(allThumbnails[17]).css('background-color',myArrayColors[11]);
    // $(allThumbnails[18]).css('background-color',myArrayColors[12]);
    // $(allThumbnails[19]).css('background-color',myArrayColors[14]);
    // $(allThumbnails[20]).css('background-color',myArrayColors[13]);
    
    
    $(allPictos[4]).css('background-size','30%');
    // test ok

    // projet planetes
    $('.projet').css('max-width','100%');


}