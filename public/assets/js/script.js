// !!!! animate div's cursor to follow the mouse !!!! //


// ! Variables
const cursor = document.querySelector(".cursor"); // to select the div

// ! Event
document.addEventListener("mousemove", (event) => { // to have event when the mouse moves
    cursor.setAttribute("style", `top:${event.pageY}px; left:${event.pageX}px;`);
     // to modify the position in the style with setAttribute
     // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
});
