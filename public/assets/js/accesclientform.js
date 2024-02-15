// !!!!!!! to hive or not password !!!!!!! //
console.log('jhsdbvejsbs');
// ! Variables
// eyes to change passwords visibility on signup form
const pwdEye = document.getElementById('pwd-eye-gallery')
const pwdEyeSlash = document.getElementById('pwd-eye-slash-gallery')
const pwdInput = document.getElementById('passwordAccess')




// ! Functions
// to hide or not pwd in form
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

// ! Event

// display password into the signup form's input
pwdEye.addEventListener('click', activePwdVisibility)
pwdEyeSlash.addEventListener('click', disablePwdVisibility)