// ! Variables

// * to make carousel on paysages
const leftBtns = document.querySelectorAll('.div2');
const rightBtns = document.querySelectorAll('.div3');
const parents = document.querySelectorAll('.parent');
let activeIndex = 0;
let currentParent;





// ! Functions

// * to activate carousel on paysages
clickRightBtns()
clickLeftBtns()
function clickRightBtns() {
    rightBtns.forEach(rightBtn => {
        rightBtn.addEventListener('click', () => {

            activeIndex++;

            if (activeIndex >= parents.length) { // to reset carousel if we are at the end
                activeIndex = 0
            }

            currentParent = document.querySelector(`[data-index="${activeIndex}"]`) // to select the activeIndex
            // console.log(currentParent);

            parents.forEach(parent => { // to place others parents in the left (with CSS)
                parent.dataset.status = "inactive";

                let divs1 = parent.querySelectorAll(".div1");
                divs1.forEach(div1 => {
                    div1.classList.remove("fadeManual");
                });

            });

            currentParent.dataset.status = "active" // to display the activeIndex (with CSS)

            let currentdivs1 = currentParent.querySelectorAll(".div1");
            currentdivs1.forEach(currentdiv1 => {
                currentdiv1.classList.add("fadeManual");
            });
            
        })
    });
}
function clickLeftBtns() {
    leftBtns.forEach(leftBtn => {
        leftBtn.addEventListener('click', () => {

            activeIndex--;

            if (activeIndex < 0) { // if activeIndex became lower than 0
                activeIndex = parents.length - 1; // we get the index 3 which is the last of my parents
                // console.log(activeIndex);
            }

            currentParent = document.querySelector(`[data-index="${activeIndex}"]`);
            // console.log(currentParent);

            parents.forEach(parent => {
                parent.dataset.status = "inactive";

                let divs1 = parent.querySelectorAll(".div1");
                divs1.forEach(div1 => {
                    div1.classList.remove("fadeManual");
                });
                // parent.querySelector(".div1").classList.remove("fade");
            });

            currentParent.dataset.status = "active";

            let currentdivs1 = currentParent.querySelectorAll(".div1");
            currentdivs1.forEach(currentdiv1 => {
                currentdiv1.classList.add("fadeManual");
            });
            
            // currentParent.querySelector(".div1").classList.add("fade");
            // console.log(activeIndex);

        })
    });
}




// ! to adjust the page size on mobile !

function adjustHeight() {
    let vh = window.innerHeight * 0.01; // to have the viewport's height
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

adjustHeight(); // call the function when the page loads

// window.addEventListener('resize', adjustHeight); // call the function each time the window change size
