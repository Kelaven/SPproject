// ! Variable
const cursor = document.querySelector(".cursor"); // to select the div
console.log(cursor);

// ! Event
// * animate div's cursor to follow the mouse
document.addEventListener("mousemove", (event) => { // to have event when the mouse moves
    cursor.setAttribute("style", `top:${event.pageY - 60}px; left:${event.pageX - 60}px;`);
    // to modify the position in the style with setAttribute
    // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
    // NB : -60 is to divise the div's 120px by 2 to place the cursor on the middle
});



