

// video intro

    // CRÉONS LA VIDEO

    // creons objet video

    const largeurFenetre = window.innerWidth;
    const hauteurFenetre = window.innerHeight;

    let myVideo = 
    {
        "element" : "video",
        "controls" : "true",
        "autoplay" : "true",
        "width" : largeurFenetre/2,
        "height" : hauteurFenetre/2,
        "src" : "./assets/videos/myVideo.mp4",
        "type" : "video/mp4"
    }


    const myVid = function()
    {

        let video = document.createElement(myVideo.element);
        let source = document.createElement("source");
        video.controls = myVideo.controls;
        video.autoplay = myVideo.autoplay;
        video.width = myVideo.width;
        video.height = myVideo.height;
        source.type = myVideo.type;
        source.src = myVideo.src;
        video.append(source);
        return video;
    }


// if (window.matchMedia("(min-width: 600px)").matches) 
// {
//     $(".theBody").addClass('theBodyVideo');
  /* La largeur minimum de l'affichage est 600 px inclus */
  document.body.append(myVid());
//   $(".theBody").insertBefore(myVid());
// }

// var elem = myVid();


// function openFullscreen() {
//     if (elem.requestFullscreen) {
//       elem.requestFullscreen();
//     } else if (elem.webkitRequestFullscreen) { /* Safari */
//       elem.webkitRequestFullscreen();
//     } else if (elem.msRequestFullscreen) { /* IE11 */
//       elem.msRequestFullscreen();
//     }
// }

// window.onload = openFullscreen();

myVid().addEventListener('ended',function()
{
    $('.theBody').removeClass('theBodyVideo');
    autoplay();
})
