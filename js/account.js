var Login = document.getElementById("Login");
var Register = document.getElementById("Register");
var LShowPass = document.getElementById("LShowPass");
var LPassword = document.getElementById("LPassword");
var RShowPass = document.getElementById("RShowPass");
var RPassword = document.getElementById("RPassword");
var RCPassword = document.getElementById("RCPassword");
var ErrorMessage = document.getElementById("ErrorMessage");

const LoginForm = document.getElementById("LoginForm");
const RegisterForm = document.getElementById("RegisterForm");
const Indicator = document.getElementById("Indicator");
const FormContainer = document.getElementById("FormContainer");


Register.onclick = function() {
    RegisterForm.style.transform = "translateX(0px)";
    FormContainer.style.height = "540px";
    LoginForm.style.transform = "translateX(0px)";
    Indicator.style.transform = "translateX(130px)";
}

Login.onclick = function() {
    RegisterForm.style.transform = "translateX(300px)";
    FormContainer.style.height = "400px";
    LoginForm.style.transform = "translateX(300px)";
    Indicator.style.transform = "translateX(0px)";
}

LShowPass.onclick = function() {
    if (LShowPass.checked)
        LPassword.type = "text";
    else
        LPassword.type = "password";
}

RShowPass.onclick = function() {
    if (RShowPass.checked) {
        RPassword.type = "text";
        RCPassword.type = "text";
    } else {
        RPassword.type = "password";
        RCPassword.type = "password";
    }
}

function verifyPassword() {
    if (RPassword.value != RCPassword.value) {
        RCPassword.style.border = "2px solid red";
        ErrorMessage.style.display = "block";
        return false;
    }
    return true;
}

Login.click();