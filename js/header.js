const MenuItems = document.getElementById("MenuItems");
const Menu = document.getElementById("Menu");
MenuItems.style.maxHeight = "0px";

Menu.onclick = function () {
    if (MenuItems.style.maxHeight === "0px")
        MenuItems.style.maxHeight = "200px";
    else
        MenuItems.style.maxHeight = "0px";
}