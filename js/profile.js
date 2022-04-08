var logout = document.getElementById("logout");

logout.onclick = function() {
    if (confirm("Are you sure to log out?")) {
        window.location.replace("private/logout.php");
    }
}