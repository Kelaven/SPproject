// ! Variables

// * to make carousel on paysages
const leftBtns = document.querySelectorAll('.carousel__btn--left');
const rightBtns = document.querySelectorAll('.carousel__btn--right');
const parents = document.querySelectorAll('.parent');
let activeIndex = 0;
let currentParent;







const nextCarousel = document.querySelectorAll('.fa-circle-right');
const previousCarousel = document.querySelectorAll('.fa-circle-left');
const modals = document.querySelectorAll('.slide0modal');
console.log(modals);
let activeModalIndex = 0;

nextCarousel.forEach(next => {
    next.addEventListener('click', () => {

        activeModalIndex++;

        if (activeModalIndex >= modals.length) {
            activeModalIndex = 0;
        }

        currentModal = document.querySelector(`[data-modal-index="${activeModalIndex}"`);
        console.log(currentModal);

        


    })
});


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



// ! Event

