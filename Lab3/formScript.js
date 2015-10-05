"use strict";

var textBoxes = document.getElementsByClassName("textBox");


function focusColor(myElement) {
    myElement.style.backgroundColor = "#FFFF99";
}

function blurColor(myElement) {
    myElement.style.backgroundColor = "#FFFFFF";
}

for (var i = 0; i < textBoxes.length; i++) {
    textBoxes[i].addEventListener("focus", function() {
        focusColor(this);
        console.log("listener added");
    })
}

for (var i = 0; i < textBoxes.length; i++) {
    textBoxes[i].addEventListener("blur", function() {
        blurColor(this);
    })
}