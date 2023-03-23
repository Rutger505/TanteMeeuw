const imgSliderE = document.getElementById("img-slider");
const imgSliderTitle = document.getElementById("img-slider-title");
const imgSliderDiscription = document.getElementById("img-slider-discription");

const imgSliderLeft = document.getElementById("img-slider-left");
const imgSliderRight = document.getElementById("img-slider-right");

var classesArray = [
  "back-top",
  "back-center",
  "back-bottom",
  "opacity-1",
  "opacity-0",
];
const amountPhotos = 7;

let i = 1;
setSlider();

setInterval(() => {
  setSlider();
}, 4000);

imgSliderLeft.addEventListener("click", (e) => {
  console.log("this is left one");
  i -= 2;
  setSlider();
});

imgSliderRight.addEventListener("click", (e) => {
  console.log("this is right one");
  i++;
  setSlider();
});

function setSlider() {
  if (i > amountPhotos) {
    i = 1;
  } else if (i <= 0) {
    i = amountPhotos;
  }

  imgSliderE.style.backgroundImage = " url('../img/img-slider" + i + ".jpg')";

  clearClass(imgSliderE, classesArray);
  switch (i) {
    case 1:
      imgSliderE.classList.add("back-bottom");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "in je element";
      break;
    case 2:
      imgSliderE.classList.add("back-center");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "je thuisvoelen";
      break;
    case 3:
      imgSliderE.classList.add("back-center");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "met alles wat je nodig hebt";
      break;
    case 4:
      imgSliderE.classList.add("back-center");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "in een stoere tent";
      break;
    case 5:
      imgSliderE.classList.add("back-center");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "één duin verwijderd van zee";
      break;
    case 6:
      imgSliderE.classList.add("back-center");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "op het heerlijke Vlieland";
      break;
    case 7:
      imgSliderE.classList.add("back-center");
      imgSliderE.classList.add("opacity-0");
      imgSliderE.classList.add("opacity-1");
      imgSliderDiscription.innerHTML = "voor een onvergetelijke tijd....";
      break;
    default:
      console.log("default");
  }
  i++;
}

function clearClass(element, classes) {
  for (j = 0; j < classes.length; j++) {
    element.classList.remove(classes[j]);
  }
}
