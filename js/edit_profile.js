const show = document.getElementById('show');
const oldPassword = document.getElementById('old-password');
const newPassword = document.getElementById('new-password');
const newCPassword = document.getElementById('new-cpassword');
const message = document.getElementById('message');
const changePass = document.getElementById('change-password');
const changePassInputs = document.getElementById('change-pass-inputs');
const profileImg = document.getElementById('profile-img');
const profilePhoto = document.getElementById('profile-photo');

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

function checkPasswordMatch () {
    if (!changePass.checked)
        return true;
    if (oldPassword.value == '' || newCPassword.value == '' || newCPassword == '')
    {
        message.innerText = "Please fill fields!";
        message.style.color = "red";
        return false;
    }
    if (newPassword.value != newCPassword.value)
    {
        newCPassword.style.border = "2px solid red";
        message.innerText = "Password doesn't match!";
        message.style.color = "red";
        return false;
    } else
        return true;
}

changePass.onchange = function () {
    if (changePass.checked){
        changePassInputs.style.display = "flex";
    } else
        changePassInputs.style.display = "none";
}

profileImg.onclick = function () {
    profilePhoto.click();
}