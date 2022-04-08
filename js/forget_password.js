const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
const show = document.getElementById('show');
const message = document.getElementById('message');

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
    return true;
}