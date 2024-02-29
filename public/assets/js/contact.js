window.addEventListener('load', loader);


function loader() {
    const loadingAnimation = gsap.timeline();

    loadingAnimation.to(form__pic, {
        // height: '54vmin',
        // width: '54vmin',
        transform: 'translateX(0%)',
        duration: 1.5,
        delay: 0.4,
        ease: "back.out"
    })
    .to("#form__pic", {
        '--translate-coverContact': -150, // to get the pseudo element, we can use CSS variables
        duration: 2.5,
        delay: -0.2,
        ease: "sine.in"
    })

}