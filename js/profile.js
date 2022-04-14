let logout = document.getElementById("logout");
let pp = document.getElementById("pp");

logout.onclick = function () {
    if (confirm("Are you sure to log out?")) {
        window.location.replace("private/logout.php");
    }
}