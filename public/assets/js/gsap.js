// ! GSAP


// * animate loading page
const loadingContainer = document.getElementById('container__loading');
const firstImg = document.querySelector('.container__loadingImg > img');
const logo = document.querySelector('.loadingLogo');
const bgTransition = document.querySelector('.container__bgTransition');
console.log(loadingContainer);


window.addEventListener('load', loader); // when pictures etc are loaded

function loader() {
    const loadingAnimation = gsap.timeline(); // like video montage

    loadingAnimation.to(firstImg, {
        height: 400, // from 0px in CSS until 400px here
        duration: 1.3,
        delay: 0.4,
        ease : "power2.out"
    })
    .to(logo, {
        height: 200, // from 0px in CSS until 200px here
        duration: 1,
        ease : "power4.out"
    }, '= -0.7' ) // to start 0.7s before the firstImg end in the timeline
    .to(bgTransition, {
        height: 400, // from 0px in CSS until 200px here
        duration: 0.6,
        ease : "power2.out"
    })
    .add( () => { // fletched function to change image
        firstImg.src = "http://phpprojetperso.localhost/public/assets/img/loading-img-pauline-flower-400-80.jpg";
    })
    .to(bgTransition, {
        height: 0,
        duration: 0.8,
        delay: 0.1,
        ease : "power1.out"
    })
    .to(loadingContainer, {
        opacity: 0,
        duration: 0.9,
        delay: 0.85
    })
    .add(() => {
        loadingContainer.classList.add('d-none');
    })

}




// // * animate selection text

// gsap.registerPlugin(TextPlugin);

// const h1toAnimate = document.querySelector('.h1__scramble');

// const scrambleAnimation = gsap.timeline({ paused: true }); // to store GSAP animation but don't play now

// scrambleAnimation.to(h1toAnimate, { // the animation is to the h1 selected
//     text: { value: "Chaque image raconte une histoire, laissons-nous emporter.", scrambleText: true },
//     duration: 1.5,
//     ease: "power1.inOut"
// });

// h1toAnimate.addEventListener('mouseenter', () => {
//     scrambleAnimation.play(); // launch animation
// });

// h1toAnimate.addEventListener('mouseleave', () => {
//     scrambleAnimation.reverse(); // reverse animation
// });