const show = document.getElementById('show');
const oldPassword = document.getElementById('old-password');
const newPassword = document.getElementById('new-password');
const newCPassword = document.getElementById('new-cpassword');
const message = document.getElementById('message');
const changePass = document.getElementById('change-password');
const changePassInputs = document.getElementById('change-pass-inputs');
const profileImg = document.getElementById('profile-img');
const profilePhoto = document.getElementById('profile-photo');
const deleteAccount = document.getElementById('delete-account');

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
        return false;
    }
    if (newPassword.value != newCPassword.value)
    {
        newCPassword.style.border = "2px solid red";
        message.innerText = "Password doesn't match!";
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