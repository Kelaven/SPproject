// ! Variable

// * cursor on home
const cursor = document.querySelector('.cursor'); // to select the div

// * eyes to change passwords visibility on signup form
const pwdEye = document.getElementById('pwd-eye')
const pwdEyeSlash = document.getElementById('pwd-eye-slash')
const pwdInput = document.getElementById('password')

const pwdEyeCheck = document.getElementById('pwd-eye-check')
const pwdEyeSlashCheck = document.getElementById('pwd-eye-slash-check')
const pwdInputCheck = document.getElementById('passwordCheck')

// ! Event

// * animate div's cursor to follow the mouse
document.addEventListener("mousemove", (event) => { // to have event when the mouse moves
    cursor.setAttribute("style", `top:${event.pageY - 60}px; left:${event.pageX - 60}px;`);
    // to modify the position in the style with setAttribute
    // pageY and pageX = position of the mouse
    //  so .cursor get the top and left mouse's position
    // NB : -60 is to divise the div's 120px by 2 to place the cursor on the middle
});


// * display password into the signup form's input
pwdEye.addEventListener('click', () => {
    pwdInput.type = 'text'
    pwdEye.classList.add('d-none')
    pwdEyeSlash.classList.remove('d-none')
})
pwdEyeSlash.addEventListener('click', () => {
    pwdInput.type = 'password'
    pwdEyeSlash.classList.add('d-none')
    pwdEye.classList.remove('d-none')
})
pwdEyeCheck.addEventListener('click', () => {
    pwdInputCheck.type = 'text'
    pwdEyeCheck.classList.add('d-none')
    pwdEyeSlashCheck.classList.remove('d-none')
})
pwdEyeSlashCheck.addEventListener('click', () => {
    pwdInputCheck.type = 'password'
    pwdEyeSlashCheck.classList.add('d-none')
    pwdEyeCheck.classList.remove('d-none')
})