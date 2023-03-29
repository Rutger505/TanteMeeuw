// elemtes
const imgSliderE = document.getElementById("img-slider");
const imgSliderTitle = document.getElementById("img-slider-title");
const imgSliderDiscription = document.getElementById("img-slider-discription");

const imgSliderLeft = document.getElementById("img-slider-left");
const imgSliderRight = document.getElementById("img-slider-right");

const imgLoader = document.getElementById("img-loader");

// variables
var classesArray = [
  "back-top",
  "back-center",
  "back-bottom",
  "img-slider-animation",
];
const amountPhotos = 7;
let i = 1;

// load all imgages
loadImg(imgLoader);

// start
setSlider();

// each 4 seconds update slider
let myInterval = setInterval(setSlider, 4000);

// click events update slider and restart interval
imgSliderLeft.addEventListener("click", (e) => {
  // restarts interval
  clearInterval(myInterval);
  myInterval = setInterval(setSlider, 4000);

  i -= 2;
  setSlider();
});
imgSliderRight.addEventListener("click", (e) => {
  // restarts interval
  clearInterval(myInterval);
  myInterval = setInterval(setSlider, 4000);

  i++;
  setSlider();
});

// update slider
function setSlider() {
  if (i > amountPhotos) {
    i = 1;
  } else if (i <= 0) {
    i = amountPhotos;
  }

  clearClass(imgSliderE, classesArray);

  imgSliderE.style.backgroundImage = " url('../img/img-slider" + i + ".jpg')";

  setTimeout(() => {
    imgSliderE.classList.add("img-slider-animation");
  }, 0);

  switch (i) {
    case 1:
      imgSliderE.classList.add("back-bottom");
      imgSliderDiscription.innerHTML = "in je element";
      break;
    case 2:
      imgSliderE.classList.add("back-center");
      imgSliderDiscription.innerHTML = "je thuisvoelen";
      break;
    case 3:
      imgSliderE.classList.add("back-center");
      imgSliderDiscription.innerHTML = "met alles wat je nodig hebt";
      break;
    case 4:
      imgSliderE.classList.add("back-center");
      imgSliderDiscription.innerHTML = "in een stoere tent";
      break;
    case 5:
      imgSliderE.classList.add("back-center");
      imgSliderDiscription.innerHTML = "één duin verwijderd van zee";
      break;
    case 6:
      imgSliderE.classList.add("back-center");
      imgSliderDiscription.innerHTML = "op het heerlijke Vlieland";
      break;
    case 7:
      imgSliderE.classList.add("back-center");
      imgSliderDiscription.innerHTML = "voor een onvergetelijke tijd....";
      break;
    default:
      console.log("default");
  }
  i++;
}

// remove classes
function clearClass(element, classes) {
  for (j = 0; j < classes.length; j++) {
    element.classList.remove(classes[j]);
  }
}

function loadImg(element) {
  for (j = 1; j < amountPhotos; j++) {
    setTimeout(() => {
      element.style.backgroundImage = " url('../img/img-slider" + j + ".jpg')";
    }, 0);
  }
}
