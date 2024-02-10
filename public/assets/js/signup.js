// !!!!!!! to hive or not password !!!!!!! //

// ! Variables
// eyes to change passwords visibility on signup form
const pwdEye = document.getElementById('pwd-eye')
const pwdEyeSlash = document.getElementById('pwd-eye-slash')
const pwdInput = document.getElementById('password')

const pwdEyeCheck = document.getElementById('pwd-eye-check')
const pwdEyeSlashCheck = document.getElementById('pwd-eye-slash-check')
const pwdInputCheck = document.getElementById('passwordCheck')




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

// display password into the signup form's input
pwdEye.addEventListener('click', activePwdVisibility)
pwdEyeSlash.addEventListener('click', disablePwdVisibility)
pwdEyeCheck.addEventListener('click', activePwdCheckVisibility)
pwdEyeSlashCheck.addEventListener('click', disablePwdCheckVisibility)




// !!!!!!!! to control password's strengh !!!!!!!! //

// ! variables 
const passwordWeak = /^[a-z0-9]+$/;  // 'abcde123'
const passwordMedium = /^(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/;  // 'Abcde123'
const passwordStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\-])[^<>]{8,}$/;  // 'Abcde123!@'

const weak = nudge.querySelector('span:nth-child(1)');
const medium = nudge.querySelector('span:nth-child(2)');
const strong = nudge.querySelector('span:nth-child(3)');


// ! functions
function isStrengh() {
    const nudgeWeak = passwordWeak.test(password.value);
    console.log(nudgeWeak);
    const nudgeMedium = passwordMedium.test(password.value);
    console.log(nudgeMedium);
    const nudgeStrong = passwordStrong.test(password.value);
    console.log(nudgeStrong);
    if (nudgeWeak) {
        weak.classList.remove('d-none');
        medium.classList.add('d-none');
        strong.classList.add('d-none');
    } else if (nudgeMedium) {
        weak.classList.add('d-none');
        medium.classList.remove('d-none');
        strong.classList.add('d-none');
    } else if (nudgeStrong) {
        weak.classList.add('d-none');
        medium.classList.add('d-none');
        strong.classList.remove('d-none');
    } else {
        weak.classList.remove('d-none');
        medium.classList.add('d-none');
        strong.classList.add('d-none');
    }
}


// ! events
password.addEventListener("keyup", isStrengh)