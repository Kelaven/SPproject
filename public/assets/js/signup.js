// ! Variables

// * eyes to change passwords visibility on signup form
const pwdEye = document.getElementById('pwd-eye')
const pwdEyeSlash = document.getElementById('pwd-eye-slash')
const pwdInput = document.getElementById('password')

const pwdEyeCheck = document.getElementById('pwd-eye-check')
const pwdEyeSlashCheck = document.getElementById('pwd-eye-slash-check')
const pwdInputCheck = document.getElementById('passwordCheck')




// ! Functions

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



// ! Event

// * display password into the signup form's input
pwdEye.addEventListener('click', activePwdVisibility)
pwdEyeSlash.addEventListener('click', disablePwdVisibility)
pwdEyeCheck.addEventListener('click', activePwdCheckVisibility)
pwdEyeSlashCheck.addEventListener('click', disablePwdCheckVisibility)