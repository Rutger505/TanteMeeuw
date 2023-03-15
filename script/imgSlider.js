const imgSliderE = document.getElementsB("img-slider");

const amountPhotos = 7;
var classesArray = ["back-top", "back-center", "back-bottom"]

var i = 2;
setInterval(() => {
    imgSliderE[0].style.backgroundImage = " url('../img/img-slider"+i+".jpg')";

    clearClass(imgSliderE, classesArray);
    switch(i){
        case 1:
            imgSliderE[0].classList.add("back-bottom");
            break;
        case 2:
            imgSliderE[0].classList.add("back-center");
            break;
        case 3:
            imgSliderE[0].classList.add("back-center");
            break;
        case 4:
            imgSliderE[0].classList.add("back-center");
            break;
        case 5:
            imgSliderE[0].classList.add("back-center");
            break;
        case 6:
            imgSliderE[0].classList.add("back-center");
            break;
        case 7:
            imgSliderE[0].classList.add("back-center");
            break;
        default:
            console.log("default");
    }

    i++;
    if (i > amountPhotos) {
        i = 1;
    }
}, 1000);
  
function clearClass(element, classes) {
    for (i = 0; i < classes.length; i++){
        element[0].classList.remove(classes[i])
    }
}