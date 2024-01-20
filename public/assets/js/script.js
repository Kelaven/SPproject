// ! GSAP (loading animation)

// * variables
const loadingContainer = document.getElementById('container__loading');
const firstImg = document.querySelector('.container__loadingImg > img');
const logo = document.querySelector('.loadingLogo');
const bgTransition = document.querySelector('.container__bgTransition');


// * event
window.addEventListener('load', loader); // when pictures etc are loaded, launch the animation



// * function
function loader() {
    const loadingAnimation = gsap.timeline(); // like video montage

    loadingAnimation.to(firstImg, {
        height: 400, // from 0px in CSS until 400px here
        duration: 1.3,
        delay: 0.4,
        ease: "power2.out"
    })
        .to(logo, {
            height: 120, // from 0px in CSS until 200px here
            duration: 1,
            ease: "power4.out"
        }, '= -0.7') // to start 0.7s before the firstImg end in the timeline
        .to(bgTransition, {
            height: 400, // from 0px in CSS until 200px here
            duration: 0.6,
            delay: 0.2,
            ease: "power2.out"
        })
        .add(() => { // fletched function to change image
            firstImg.src = "http://phpprojetperso.localhost/public/assets/img/loading-img-pauline-flower-400-80.jpg";
        })
        .to(bgTransition, {
            height: 0,
            duration: 0.8,
            delay: 0.1,
            ease: "power1.out"
        })
        .to(loadingContainer, {
            opacity: 0,
            duration: 0.9,
            delay: 0.9
        })
        .add(() => {
            loadingContainer.classList.add('d-none');
        })
}




// ! Cursor
// * variable
const cursor = document.querySelector('.cursor'); // to select the div


// * function (to move the div's cursor with the mouse )
function cursorDivFollowsMouse(event) {

    cursor.setAttribute("style", `top:${event.pageY - 80}px; left:${event.pageX - 80}px;`);
    // to modify the position in the style with setAttribute
    // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
    // NB : -60 is to divise the div's 120px by 2 to place the cursor on the middle
}


// * event (animate div's cursor to follow the mouse)
document.addEventListener("mousemove", cursorDivFollowsMouse); // to have event when the mouse moves
