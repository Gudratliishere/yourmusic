//Login elements
const Login = document.getElementById("Login");
const LShowPass = document.getElementById("LShowPass");
const LPassword = document.getElementById("LPassword");
const LoginForm = document.getElementById("LoginForm");

//Register elements
const Register = document.getElementById("Register");
const RShowPass = document.getElementById("RShowPass");
const RPassword = document.getElementById("RPassword");
const RCPassword = document.getElementById("RCPassword");
const ErrorMessage = document.getElementById("ErrorMessage");
const RegisterForm = document.getElementById("RegisterForm");
const PassInfo = document.getElementById("pass-info");
const PassLen = document.getElementById("pass-len");
const PassNum = document.getElementById("pass-num");
const PassLetter = document.getElementById("pass-letter");

//Global elements
const Indicator = document.getElementById("Indicator");
const FormContainer = document.getElementById("FormContainer");

//Toggle menu
Register.onclick = function () {
    RegisterForm.style.transform = "translateX(0px)";
    FormContainer.style.height = "560px";
    LoginForm.style.transform = "translateX(0px)";
    Indicator.style.transform = "translateX(130px)";
}

Login.onclick = function () {
    RegisterForm.style.transform = "translateX(300px)";
    FormContainer.style.height = "380px";
    LoginForm.style.transform = "translateX(300px)";
    Indicator.style.transform = "translateX(0px)";

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const register = urlParams.get('request');
    if (register == 'register')
        Register.click();
}

//Show password functions
LShowPass.onclick = function () {
    if (LShowPass.checked)
        LPassword.type = "text";
    else
        LPassword.type = "password";
}

RShowPass.onclick = function () {
    if (RShowPass.checked) {
        RPassword.type = "text";
        RCPassword.type = "text";
    } else {
        RPassword.type = "password";
        RCPassword.type = "password";
    }
}

//Password verifying functions
function verifyPassword() {
    if (RPassword.value != RCPassword.value) {
        RCPassword.style.border = "2px solid red";
        ErrorMessage.style.display = "block";
        ErrorMessage.innerText = "Password doesn't match!";
        return false;
    }
    ErrorMessage.style.display = "none";
    const letterExp = /[a-zA-Z]/g;
    const numExp = /\d/;
    if (RPassword.value.length < 8 || !letterExp.test(RPassword.value) || !numExp.test(RPassword.value)) {
        PassInfo.style.display = "block";
        return false;
    }
    return true;
}

RPassword.onfocus = function () {
    PassInfo.style.display = "block";
}

RPassword.addEventListener("focusout", (event) => {
    PassInfo.style.display = "none";
});

RPassword.onkeyup = function () {
    setTrueFalse(RPassword.value.length < 8, PassLen);

    const letterExp = /[a-zA-Z]/g;
    setTrueFalse(!letterExp.test(RPassword.value), PassLetter);

    const numExp = /\d/;
    setTrueFalse(!numExp.test(RPassword.value), PassNum);
}

function setTrueFalse(condition, element) {
    if (condition)
        setFalseImg(element);
    else
        setTrueImg(element);
}

function setFalseImg(element) {
    element.src = "image/false.png";
}

function setTrueImg(element) {
    element.src = "image/true.png";
}

RCPassword.onkeyup = function () {
    if (RPassword.value != RCPassword.value) {
        RCPassword.style.border = "2px solid red";
        ErrorMessage.style.display = "block";
        ErrorMessage.innerText = "Password doesn't match!";
    } else
    {
        ErrorMessage.style.display = "none";
        RCPassword.style.border = "1px solid silver";
    }
}

//To show login menu when page loading first time
Login.click();