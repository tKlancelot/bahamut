
// alert('scrollspy chargé');

// // scrollspy function

// const threshold = 0.6;
// const ratio = 0.6;
// let observer1 = null;
// const ratio1 = 0.2;
// const options = {
//     root : null,
//     rootMargin : "0px",
//     threshold : ratio1
// }        


// window.addEventListener('DOMContentLoaded', (event) => {
    
//     const activate = function(elems){
//         const id = elems.getAttribute('id');
//         const anchor = document.querySelector(`a[href="#${id}"]`);
//         if(anchor === null){
//             return null;
//         }
//         anchor.parentElement
//             .querySelectorAll('.active')
//             .forEach(node => node.classList.remove('active'))
//         anchor.classList.add('active');
//     }
    
//     const callback = function(entries,observer){
//         entries.forEach(function (entry){
//             if(entry.isIntersecting){
//                 // console.log(entry);
//                 const id = entry.target.getAttribute('id');
//                 activate(entry.target);
//                 // console.log(entry.boundingClientRect);
//             }
//         })
//     }
    
//     const handleIntersect = function(entries, observer){
//         entries.forEach(function(entry){
//             if (entry.intersectionRatio > ratio1){
//                 // console.log("visible");
//                 entry.target.classList.add("reveal-visible");
//                 // console.log(entry.target.classList);
//                 observer.unobserve(entry.target);
//             }
//             else{
//                 // console.log("invisible");
//             }
//         })
//         // console.log("handle intersect");
//     }
    
//     const observer2 = new IntersectionObserver(handleIntersect, options);
    
//     document.querySelectorAll('.reveal').forEach(function(r){
//         observer2.observe(r);
//     });
    
//     const spies = document.querySelectorAll("[data-spy]");
    
//     const scrollSpy = function(elems){
//         if(observer1 !== null){
//             elems.forEach(elem => observer.unobserve(elem) )
//         }
//         const y = Math.round(window.innerHeight * ratio);
//         const observer = new IntersectionObserver(callback,{
//             // threshold : threshold
//             rootMargin : `-${window.innerHeight - y - 1}px 0px -${y}px 0px`
//         })
//         spies.forEach(elems => observer.observe(elems));
//     }
    
    
    
//     if(spies.length > 0){
//         scrollSpy(spies);
//         window.addEventListener("resize",function(){
//             scrollSpy(spies);
//         })
//     }
// });


