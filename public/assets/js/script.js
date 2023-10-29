// ! Variable
const cursor = document.querySelector(".cursor"); // to select the div

// ! Event
// * animate div's cursor to follow the mouse
document.addEventListener("mousemove", (event) => { // to have event when the mouse moves
    cursor.setAttribute("style", `top:${event.pageY - 40}px; left:${event.pageX - 40}px;`);
    // to modify the position in the style with setAttribute
    // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
    // NB : -40 is to divise the div's 80px by 2 to place the cursor on the middle
});

// * animate document to get the cursor's scale animation on click
document.addEventListener("click", () => {
    cursor.classList.add("expand"); // to add the CSS class

    setTimeout(() => { // to remove the class after a defined time
        cursor.classList.remove("expand");
    }, 500); // the defined time is 500ms
});

