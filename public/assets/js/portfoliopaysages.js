// ! Variables

// * to make carousel on paysages
const leftBtns = document.querySelectorAll('.carousel__btn--left');
const rightBtns = document.querySelectorAll('.carousel__btn--right');
const parents = document.querySelectorAll('.parent');
let activeIndex = 0;
let currentParent;




// ?? refaire les modals moi-même
// const divchilds = document.querySelectorAll('.divchild');

// divchilds.forEach(divchild => {

//         divchild.addEventListener('click', () => {
//             let imgs = document.querySelectorAll('.test')

//             imgs.forEach(img => {
//                 img.classList.remove('d-none')
//             });
//         })
// });



const nextCarousel = document.querySelectorAll('.fa-circle-right');
const previousCarousel = document.querySelectorAll('.fa-circle-left');
const modals = document.querySelectorAll('.slide0modal');
const imgPaths = [
    '/public/assets/img/jpegpaysages/modalsize/vercors-france-snow-tree-1920-80.jpg',
    '/public/assets/img/jpegpaysages/modalsize/italie-sea-storm-rain-1440-80.jpg',
    '/public/assets/img/normandie-france-sunset-on-beach-picture-1920-50.jpg',
    '/public/assets/img/jpegpaysages/modalsize/grenoble-france-lac-sunset-1440-80.jpg',
    '/public/assets/img/jpegpaysages/desktopsize/vercors-france-panorama-mountains-1260-60.jpg',
    '/public/assets/img/jpegpaysages/modalsize/st-valery-sur-somme-infrared-1920-100.jpg',
];
console.log(imgPaths[0]);
console.log(modals);
let activeModalIndex = 0;

nextCarousel.forEach(next => {
    next.addEventListener('click', () => {
        console.log('Next button clicked');

        activeModalIndex++;

        if (activeModalIndex >= modals.length) {
            activeModalIndex = 0;
        }
        console.log(typeof(activeModalIndex));



        const currentModal = document.querySelector(`[data-modal-index="${activeModalIndex}"]`);
        const currentModalImg = currentModal.querySelector('img');
        console.log(currentModal);
        console.log(currentModalImg);
        
        const currentModalImgData = currentModalImg.getAttribute('data-pic');
        console.log(typeof(currentModalImgData), currentModalImgData);

        if (currentModalImgData === '1') {
            console.log('coucou');
            currentModalImg.src = imgPaths[0];
            console.log('Image changed');
            console.log('New image source:', currentModalImg.src);
        } else {
            console.log('Condition not met. currentModalImgData:', currentModalImgData);
        }



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

