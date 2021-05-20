
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


    
    // carousel
    // recuperer les deux fleches et les positionner au centre de l'écran
    let prevArrow = document.querySelector('.frame-3 .under-frame #prev');
    let nextArrow = document.querySelector('.frame-3 .under-frame #next');
    $(prevArrow).insertBefore($('.frame-1'));
    $(nextArrow).insertBefore($('.frame-1'));
}