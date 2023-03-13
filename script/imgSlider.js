const imgSliderE = document.getElementsByClassName("img-slider");

const amountPhotos = 7;

var i = 2;
setInterval(() => {
    imgSliderE[0].style.backgroundImage = " url('../img/img-slider"+i+".jpg')";

    switch(i){
        case 1:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-bottom");
            break;
        case 2:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-center");
            break;
        case 3:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-center");
            break;
        case 4:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-center");
            break;
        case 5:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-center");
            break;
        case 6:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-center");
            break;
        case 7:
            clearClass(imgSliderE);
            imgSliderE[0].classList.add("back-center");
            break;
        default:
            console.log("default")
    }


    i++;
    if (i > amountPhotos) {
        i = 1;
    }
}, 3000);
  
function clearClass(p1) {
    p1[0].classList.remove("back-top")
    p1[0].classList.remove("back-center")
    p1[0].classList.remove("back-bottom")
  }