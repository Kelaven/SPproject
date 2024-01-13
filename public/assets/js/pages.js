console.log('coucou');

// ! Variables

// * cursor on home
const cursor = document.querySelector('.cursor--pages'); // to select the div
console.log(cursor);



// ! Functions

// * to move the div's cursor with the mouse 
function cursorDivFollowsMouse(event) {
    cursor.setAttribute("style", `top:${event.pageY - 50}px; left:${event.pageX - 50}px;`);
    // to modify the position in the style with setAttribute
    // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
    // NB : -60 is to divise the div's 120px by 2 to place the cursor on the middle
}



// ! Event


// * animate div's cursor to follow the mouse
document.addEventListener("mousemove", cursorDivFollowsMouse); // to have event when the mouse moves

