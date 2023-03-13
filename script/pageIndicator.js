// get page name
const path = window.location.pathname;
const page = path.split("/").pop();

// get page buttons
const pageButton = document.getElementsByClassName("page-button");
// get img slider
const imgSlider = document.getElementsByClassName("img_slider");

// set background color
if (page == "index.php") {
  pageButton[0].classList.add("current-page");
} else if (page == "deTent.php") {
  pageButton[1].classList.add("current-page");
} else if (page == "omgeving.php") {
  pageButton[2].classList.add("current-page");
} else if (page == "beschikbaarheid.php") {
  pageButton[3].classList.add("current-page");
} else if (page == "contact.php") {
  pageButton[4].classList.add("current-page");
} else if (page == "links.php") {
  pageButton[5].classList.add("current-page");
} else if (page == "gasten.php") {
  pageButton[6].classList.add("current-page");
} else if (page == "nieuws.php") {
  pageButton[7].classList.add("current-page");
} else if (page == "login.php") {
  pageButton[8].classList.add("current-page");
  imgSlider[0].style.display = "none";
} else {
  pageButton[0].classList.add("current-page");
}