// ! Variables

// * cursor on home
const cursor = document.querySelector('.cursor'); // to select the div

// * eyes to change passwords visibility on signup form
const pwdEye = document.getElementById('pwd-eye')
const pwdEyeSlash = document.getElementById('pwd-eye-slash')
const pwdInput = document.getElementById('password')

const pwdEyeCheck = document.getElementById('pwd-eye-check')
const pwdEyeSlashCheck = document.getElementById('pwd-eye-slash-check')
const pwdInputCheck = document.getElementById('passwordCheck')



// ! Functions

// * to move the div's cursor with the mouse 
function cursorDivFollowsMouse(event) {
    cursor.setAttribute("style", `top:${event.pageY - 60}px; left:${event.pageX - 60}px;`);
    // to modify the position in the style with setAttribute
    // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
    // NB : -60 is to divise the div's 120px by 2 to place the cursor on the middle
}

// * to hide or not pwd in form
function activePwdVisibility() {
        pwdInput.type = 'text'
        pwdEye.classList.add('d-none')
        pwdEyeSlash.classList.remove('d-none')
}
function disablePwdVisibility() {
        pwdInput.type = 'password'
        pwdEyeSlash.classList.add('d-none')
        pwdEye.classList.remove('d-none')
}
function activePwdCheckVisibility() {
        pwdInputCheck.type = 'text'
        pwdEyeCheck.classList.add('d-none')
        pwdEyeSlashCheck.classList.remove('d-none')
}
function disablePwdCheckVisibility() {
        pwdInputCheck.type = 'password'
        pwdEyeSlashCheck.classList.add('d-none')
        pwdEyeCheck.classList.remove('d-none')
}



// ! carousel paysages

const leftBtns = document.querySelectorAll('.carousel__btn--left');
const rightBtns = document.querySelectorAll('.carousel__btn--right');
const parents = document.querySelectorAll('.parent');
console.log(leftBtns);
console.log(rightBtns);
console.log(parents);

let activeIndex = 0;
let currentParent;

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














// function clickRightBtns() {
//     rightBtns.forEach(rightBtn => {
//         rightBtn.addEventListener('click', () => {
//             console.log("hello");

//             if (activeIndex +1 <= parents.length - 1) {
//                 nextIndex = activeIndex +1
//             } else {
//                 nextIndex = 0
//             }

//             let currentParent = document.querySelector(`[data-index="${activeIndex}"]`)
//             let nextParent = document.querySelector(`[data-index="${nextIndex}"]`)

//             currentParent.dataset.status = "after" // currentParent become after
//             nextParent.dataset.status = "active" // nextParent become active

//             activeIndex = nextIndex

    
//         })
//     });
// }




// ! Event


// * animate div's cursor to follow the mouse
document.addEventListener("mousemove", cursorDivFollowsMouse); // to have event when the mouse moves

// * display password into the signup form's input
pwdEye.addEventListener('click', activePwdVisibility)
pwdEyeSlash.addEventListener('click', disablePwdVisibility)
pwdEyeCheck.addEventListener('click', activePwdCheckVisibility)
pwdEyeSlashCheck.addEventListener('click', disablePwdCheckVisibility)