const toggleMenuElement = document.getElementsByClassName("toggle-menu")[0];
const toggleMenuButton =
  document.getElementsByClassName("toggle-menu-button")[0];

function toggleMenu() {
  toggleMenuElement.classList.contains("active")
    ? toggleMenuElement.classList.remove("active")
    : toggleMenuElement.classList.add("active");
}

let isMouseHover = false;
toggleMenuElement.addEventListener("mouseleave", function () {
  isMouseHover = false;
});
toggleMenuElement.addEventListener("mouseover", function () {
  isMouseHover = true;
});

toggleMenuButton.addEventListener("click", () => {
  toggleMenu();
  toggleMenuElement.focus();
});
toggleMenuElement.addEventListener("blur", () => {
  if (!isMouseHover) {
    toggleMenu();
  }
});
