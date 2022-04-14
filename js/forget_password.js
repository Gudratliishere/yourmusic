const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
const show = document.getElementById('show');
const message = document.getElementById('message');
const PassInfo = document.getElementById("pass-info");
const PassLen = document.getElementById("pass-len");
const PassNum = document.getElementById("pass-num");
const PassLetter = document.getElementById("pass-letter");
const Strength = document.getElementById("pass-strength");
const form = document.getElementById("form");

show.onchange = function () {
    if (show.checked) {
        password.type = "text";
        cpassword.type = "text";
    } else
    {
        password.type = "password";
        cpassword.type = "password";
    }
}

function passwordMatch() {
    if (password.value != cpassword.value)
    {
        cpassword.style.borderColor = "red";
        message.innerHTML = "Password doesn't match!";
        message.style.color = "red";
        return false;
    }
    message.style.display = "none";
    const letterExp = /[a-zA-Z]/g;
    const numExp = /\d/;
    if (password.value.length < 8 || !letterExp.test(password.value) || !numExp.test(password.value)) {
        PassInfo.style.display = "block";
        form.style.height = "700px";
        return false;
    }
    form.style.height = "560px";
    return true;
}

password.onfocus = function () {
    PassInfo.style.display = "block";
    form.style.height = "380px";
}

password.addEventListener("focusout", (event) => {
    PassInfo.style.display = "none";
    form.style.height = "250px";
});

//Password validating
password.onkeyup = function () {
    validatePassword(password);
}

function validatePassword(element) {
    setTrueFalse(element.value.length < 8, PassLen);

    const letterExp = /[a-zA-Z]/g;
    setTrueFalse(!letterExp.test(element.value), PassLetter);

    const numExp = /\d/;
    setTrueFalse(!numExp.test(element.value), PassNum);

    setStrength(element.value.length >= 8, letterExp.test(element.value), numExp.test(element.value));
}

function setStrength(lengthCondition, letterCondition, numCondition) {
    let strength = 0;
    if (lengthCondition)
        strength++;
    if (letterCondition)
        strength++;
    if (numCondition)
        strength++;
    Strength.value = strength;
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
