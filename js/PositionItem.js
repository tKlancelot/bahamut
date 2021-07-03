export function PositionItem(thePosition)
{

    let theMenu = document.querySelector('.menu');
    let theUl = document.querySelector('.menu ul');
    let theLi = document.querySelectorAll('.menu ul li');
    let theLiA = document.querySelectorAll('.menu ul li a');

    // coloriser les li
    for (let i = 0 ; i < theLi.length; i++)
    {
        $(theLi[i]).css('background-color','transparent');       
    }

    let nbreLi = theLi.length;

    let rightArrow = document.createElement('button');
    let leftArrow = document.createElement('button');
    rightArrow.classList.add('rightArrow');
    leftArrow.classList.add('leftArrow');

    theMenu.appendChild(leftArrow);
    theMenu.appendChild(rightArrow);
    theMenu.insertBefore(leftArrow,theUl);

    let currentPosition = thePosition;

    function initPosition(currentPosition){
        switch(currentPosition)
        {
            case 0:
            translateLi(444)
            $(leftArrow).css('background-image','unset');
            $(leftArrow).css('pointer-events','none');
            break;
            case 1:
            translateLi(296)
            break;
            case 2:
            translateLi(148)
            break;
            case 3:
            translateLi(0)
            break;
            case 4:
            translateLi(-148)
            break;
            case 5:
            translateLi(-296)
            break;
            case 6:
            translateLi(-444)
            $(rightArrow).css('background-image','unset');
            $(rightArrow).css('pointer-events','none');
            break;
        }
    }

    initPosition(thePosition);
    theLi[currentPosition].style.opacity = "1";
    theLiA[currentPosition].style.color = "var(--thema-darkest)";
    theLiA[currentPosition].style.fontSize = "1.12rem";
    // theLiA[currentPosition].style.backgroundColor = "var(--thema-dark-transp)";

    function translateLi(vector)
    {
        theLi.forEach((element)=>{
            // element.style.transform = 'skewX(-10deg)';
            element.style.transform += 'translate('+vector+'px)';
        })
    }

    rightArrow.addEventListener('click',function(){
        if(currentPosition <= nbreLi -2){
            $(leftArrow).css('background-image','url(./assets/icons/icon-next.svg)');
            $(leftArrow).css('pointer-events','auto');
            translateLi(-148);
            // theLiA[currentPosition+1].style.backgroundColor = "var(--thema-dark-transp)";
            theLiA[currentPosition+1].style.fontSize = "1.12rem";
            theLiA[currentPosition+1].style.color = "var(--thema-darkest)";
            theLi[currentPosition+1].style.opacity = "1";
            theLi[currentPosition+1].style.boxShadow = "1px 1px 0px inset var(--thema-dark-transp), -1px -1px 0px inset var(--thema-dark-transp)";
            

            // theLiA[currentPosition].style.backgroundColor = "transparent";
            theLiA[currentPosition].style.fontSize = "0.84rem";
            theLiA[currentPosition].style.color = "var(--thema-darkest)";
            theLi[currentPosition].style.opacity = "0.48";
            theLi[currentPosition].style.boxShadow = "initial";
            currentPosition++;
            if(currentPosition >= nbreLi -1)
            {
                $(this).css('background-image','unset');
                $(this).css('pointer-events','none');
            }
        }
    })
    leftArrow.addEventListener('click',function(){
        if(currentPosition >= 1){
            $(rightArrow).css('background-image','url(./assets/icons/icon-next.svg)');
            $(rightArrow).css('pointer-events','auto');
            translateLi(148);
            // theLiA[currentPosition-1].style.backgroundColor = "var(--thema-dark-transp)";
            theLiA[currentPosition-1].style.fontSize = "1.12rem";
            theLiA[currentPosition-1].style.color = "var(--thema-darkest)";
            theLi[currentPosition-1].style.boxShadow = "1px 1px 0px inset var(--thema-dark-transp), -1px -1px 0px inset var(--thema-dark-transp)";
            theLi[currentPosition-1].style.opacity = "1";

            // theLiA[currentPosition].style.backgroundColor = "transparent";
            theLiA[currentPosition].style.fontSize = "0.84rem";
            theLiA[currentPosition].style.color = "var(--thema-darkest)";
            theLi[currentPosition].style.opacity = "0.48";
            theLi[currentPosition].style.boxShadow = "initial";

            currentPosition--;
            if(currentPosition <= 0 )
            {
                $(this).css('background-image','unset');
                $(this).css('pointer-events','none');
            }
        }
    })
}