// ! Variables
const ball = document.querySelector('.cursor--pages');
let mouseX; // to store ball positions
let mouseY;
// console.log(ball);


// ! Functions

// Function to update ball's position
function updateBall() {
    ball.style.transform = `translate(${mouseX}px, ${mouseY}px)`; // to update the stored ball position with the mouse's position
    requestAnimationFrame(updateBall); // web browser's function to have fluid animation at 60FPS. updateBall() is called here before it's impression => continuous animation loop
}
updateBall();

// Function to handle mousemove event
function ballFollowsMouse(event) {
    mouseX = event.pageX - 20; // to affect the mouse position on the variables "mouseX" and "mouseY" (with a gap for the design)
    mouseY = event.pageY + 5;

    // Function to change ball's design into specific divs
    const elements = document.querySelectorAll('.div1, .div2, .div3, .carousel-inner, .navbar, .h1__scramble, button, .container__form--ball, .accesclient__img, .accesclient__txt, .footer__mentionslegales'); // select divs to change the ball's design
    // console.log(elements);
    const ballRect = ball.getBoundingClientRect(); // method to have a "DOMRect" object => to have the ball display informations like a 2D canvas rectangle (but with no border limits)

    let isHovering = false; // I consider that by default, the ball isn't in a element. isHovering acts as a persistent indicator when hovering over elements (target divs) to avoid instability between each element detection. 

    elements.forEach((element) => {
        const targetRect = element.getBoundingClientRect();

        if (
            ballRect.right > targetRect.left &&
            ballRect.left + 18 < targetRect.right &&
            ballRect.bottom - 20 > targetRect.top &&
            ballRect.top < targetRect.bottom
        ) {
            isHovering = true; // if the ball is in a element, it's true
        }
    });

    if (isHovering) {
        ball.classList.remove('cursor--pages--normal');
        ball.classList.add('cursor--pages--pointer');
    } else {
        ball.classList.remove('cursor--pages--pointer');
        ball.classList.add('cursor--pages--normal');
    }
}

// ! Event

// Add event listener for mousemove
document.addEventListener("mousemove", ballFollowsMouse);







