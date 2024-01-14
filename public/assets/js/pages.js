
// ! Variables
const ball = document.querySelector('.cursor--pages');
let mouseX; // to store ball positions
let mouseY;
console.log(ball);



// ! Functions

// Function to update ball's position
function updateBall() {
    ball.style.transform = `translate(${mouseX}px, ${mouseY}px)`; // to update the stored ball position with the mouse's position
    requestAnimationFrame(updateBall); // web browser's function to have fluid animation at 60FPS. updateBall() is called here before it's impression => continuous animation loop
}
updateBall();
// Function to handle mousemove event
function ballFollowsMouse(event) {
    // console.log(event);
    // * to handle mousemove event
    mouseX = event.pageX - 12; // to affect the mouse position on the variables "mouseX" and "mouseY" (with a gap for the design)
    mouseY = event.pageY + 5;

    // * to change colors with divs
    const targetDiv1 = document.querySelector('.div1'); // div to change ball's color
    const targetRect1 = targetDiv1.getBoundingClientRect(); // method from interface "DOMRect" to have the targetDiv display informations like a 2D canvas rectangle (but with no border limits)
    const targetDiv2 = document.querySelector('.div2');
    const targetRect2 = targetDiv2.getBoundingClientRect();
    const targetDiv3 = document.querySelector('.div3');
    const targetRect3 = targetDiv3.getBoundingClientRect();
    const targetDivNavbar = document.querySelector('.navbar');
    const targetRectNavbar = targetDivNavbar.getBoundingClientRect();

    const ballRect = ball.getBoundingClientRect();

    if (
        (ballRect.right - 7 > targetRect1.left && // gap to change color with the mouse, not before
            ballRect.left + 12.85 < targetRect1.right &&
            ballRect.bottom - 24.99 > targetRect1.top &&
            ballRect.top - 2.8 < targetRect1.bottom) ||
        (
            ballRect.right + 7.8 > targetRect2.left &&
            ballRect.left + 12.85 < targetRect2.right &&
            ballRect.bottom - 24 > targetRect2.top &&
            ballRect.top - 2.8 < targetRect2.bottom
        ) ||
        (
            ballRect.right + 7.8 > targetRect3.left &&
            ballRect.left + 12.85 < targetRect3.right &&
            ballRect.bottom - 24 > targetRect3.top &&
            ballRect.top - 2.8 < targetRect3.bottom
        )||
        (
            ballRect.right + 7.8 > targetRectNavbar.left &&
            ballRect.left + 12.85 < targetRectNavbar.right &&
            ballRect.bottom - 24 > targetRectNavbar.top &&
            ballRect.top - 5 < targetRectNavbar.bottom
        )
    ) {
        ball.style.backgroundColor = 'blue'; // so if the ball is inside the targetDiv rectangle, change it's color
    } else {
        // Ball is outside the specific div, restore its default color
        ball.style.backgroundColor = 'red';
    }
}


// ! Event

// Add event listener for mousemove
document.addEventListener("mousemove", ballFollowsMouse);

