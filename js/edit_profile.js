//Profile information elements
const profileImg = document.getElementById('profile-img');
const profilePhoto = document.getElementById('profile-photo');

//Password elements
const show = document.getElementById('show');
const oldPassword = document.getElementById('old-password');
const newPassword = document.getElementById('new-password');
const newCPassword = document.getElementById('new-cpassword');
const message = document.getElementById('message');
const changePass = document.getElementById('change-password');
const changePassInputs = document.getElementById('change-pass-inputs');
const form = document.getElementById("form");
const PassInfo = document.getElementById("pass-info");
const PassLen = document.getElementById("pass-len");
const PassNum = document.getElementById("pass-num");
const PassLetter = document.getElementById("pass-letter");
const Strength = document.getElementById("pass-strength");

//Account elements
const deleteAccount = document.getElementById('delete-account');

//Password show/hide
show.onchange = function () {
    if (show.checked) {
        oldPassword.type = "text";
        newPassword.type = "text";
        newCPassword.type = "text";
    } else {
        oldPassword.type = "password";
        newPassword.type = "password";
        newCPassword.type = "password";
    }
}

function checkPasswordMatch() {
    if (!changePass.checked)
        return true;
    if (oldPassword.value == '' || newCPassword.value == '' || newCPassword == '') {
        message.innerText = "Please fill fields!";
        return false;
    }
    if (newPassword.value != newCPassword.value) {
        newCPassword.style.border = "2px solid red";
        message.innerText = "Password doesn't match!";
        return false;
    }
    message.style.display = "none";
    const letterExp = /[a-zA-Z]/g;
    const numExp = /\d/;
    if (newPassword.value.length < 8 || !letterExp.test(newPassword.value) || !numExp.test(newPassword.value)) {
        PassInfo.style.display = "block";
        form.style.height = "700px";
        return false;
    }
    form.style.height = "560px";

    return true;
}

//Enable/disable password changing
changePass.onchange = function () {
    if (changePass.checked)
        changePassInputs.style.display = "flex";
    else
        changePassInputs.style.display = "none";
}

profileImg.onclick = function () {
    profilePhoto.click();
}

//Sync profile image with file uploader
profilePhoto.onchange = function (evt) {
    const tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    if (FileReader && files && files.length) {
        const fr = new FileReader();
        fr.onload = function () {
            profileImg.src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
}

deleteAccount.onclick = function () {
    if (confirm("Are you sure to delete account? You have to confirm your email for deleting account!"))
        window.location.replace("delete_account.php");
}

newPassword.onfocus = function () {
    PassInfo.style.display = "block";
    form.style.height = "700px";
}

newPassword.addEventListener("focusout", (event) => {
    PassInfo.style.display = "none";
    form.style.height = "560px";
});

//Password validating
newPassword.onkeyup = function () {
    validatePassword(newPassword);
}

function validatePassword(element) {
    setTrueFalse(element.value.length < 8, PassLen);

    const letterExp = /[a-zA-Z]/g;
    setTrueFalse(!letterExp.test(element.value), PassLetter);

    const numExp = /\d/;
    setTrueFalse(!numExp.test(element.value), PassNum);

    setStrength(element.value.length > 8, letterExp.test(element.value), numExp.test(element.value));
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
