const dropdownMenu = document.querySelector(".dropdown-menu");
const dropdownButton = document.querySelector(".dropdown-button");

if (dropdownButton) {
  dropdownButton.addEventListener("click", () => {
    dropdownMenu.classList.toggle("show");
  });
}




const navIcon = document.querySelector(".icon");
const navMenu = document.querySelector(".app__navbar-small-screen");
const navBar = document.querySelector(".app__navbar")
if (navIcon) {
  navIcon.addEventListener("click", () => {
    navBar.classList.toggle("responsive")
    navMenu.classList.toggle("show")
  })
}


