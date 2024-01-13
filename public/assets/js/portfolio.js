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
                });

                currentParent.dataset.status = "active" // to display the activeIndex (with CSS)
                // console.log(activeIndex);
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
            });

            currentParent.dataset.status = "active";
            // console.log(activeIndex);

        })
    });
    
}