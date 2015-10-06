"use strict";

function focusColor(myElement) {
    myElement.parentNode.style.textDecoration = "underline";
    myElement.style.backgroundColor = "#FFFF99";
    myElement.style.fontStyle = "italic";

}

function blurColor(myElement) {
    myElement.parentNode.style.textDecoration = "none";
    myElement.style.backgroundColor = "#FFFFFF";
    myElement.style.fontStyle = "normal";
}

function validForm() {
    var formIsValid = true;
    for (var i = 0; i < textBoxes.length; i++) {
        if (textBoxes[i].value === "") {
            formIsValid = false;
            textBoxes[i].style.borderColor = "red";
        }
    }
    if (!termsAgreement.checked) {
        formIsValid = false;
        document.getElementById("termsError").style.visibility = "visible";
    }
    return formIsValid;
}

var textBoxes = document.getElementsByClassName("textBox");
var termsAgreement = document.getElementById("termsAccept");

for (var i = 0; i < textBoxes.length; i++) {
    console.log(i);
    textBoxes[i].addEventListener("click", function () {
        focusColor(this);
    });
}

for (var i = 0; i < textBoxes.length; i++) {
    textBoxes[i].addEventListener("blur", function () {
        blurColor(this);
    });
}

// WILL NOT WORK!!!!!
document.getElementById("testForm").addEventListener("submit", function (event) {
    if(validForm()) {
        return true;
    } else {
        event.preventDefault();
    }
});