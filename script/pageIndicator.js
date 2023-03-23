// get page name
const path = window.location.pathname;
const page = path.split("/").pop();

// get page buttons
const pageButton = document.getElementsByClassName("page-button");
// get img slider
const imgSlider = document.getElementById("img-slider");


// set background color
if (page == "index.php") {
  setCurrentPage(pageButton[0]);
} else if (page == "deTent.php") {
  setCurrentPage(pageButton[1]);
} else if (page == "omgeving.php") {
  setCurrentPage(pageButton[2]);
} else if (page == "beschikbaarheid.php") {
  setCurrentPage(pageButton[3]);
} else if (page == "contact.php") {
  setCurrentPage(pageButton[4]);
} else if (page == "links.php") {
  setCurrentPage(pageButton[5]);
} else if (page == "gasten.php") {
  setCurrentPage(pageButton[6]);
} else if (page == "nieuws.php") {
  setCurrentPage(pageButton[7]);
} else if (page == "login.php" || page == "register.php") {
  setCurrentPage(pageButton[8]);
  hideImgSlider();
} else if (page == "admin.php") {
  hideImgSlider();
  setCurrentPage(pageButton[9]);
} else {
  setCurrentPage(pageButton[0]);
}

function setCurrentPage(element) {
  element.classList.add("current-page");
}
function hideImgSlider() {
  imgSlider.style.display = "none";
}