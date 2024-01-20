// * animate selection text

gsap.registerPlugin(TextPlugin);

const h1toAnimate = document.querySelector('.h1__scramble');

const scrambleAnimation = gsap.timeline({ paused: true }); // to store GSAP animation but don't play now

scrambleAnimation.to(h1toAnimate, { // the animation is to the h1 selected
    text: { value: "Chaque image raconte une histoire, laissons-nous emporter.", scrambleText: true },
    duration: 1.5,
    ease: "power1.inOut"
});

h1toAnimate.addEventListener('mouseenter', () => {
    scrambleAnimation.play(); // launch animation
});

h1toAnimate.addEventListener('mouseleave', () => {
    scrambleAnimation.reverse(); // reverse animation
});