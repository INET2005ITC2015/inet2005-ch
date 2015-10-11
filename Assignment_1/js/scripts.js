"use strict";

$(document).ready(function () {
// check to ensure the name consists of only alphabetical characters
    function validateName(name) {
        var regexPattern = /^[a-zA-Z]{2,15}$/,
            isValid = true;
        if (!regexPattern.test(name)) {
            isValid = false;
        }
        return isValid;
    }

// check to ensure the date is formatted properly
    function validateDate(date) {
        var regexPattern = /^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/,
            isValid = true;
        if (!regexPattern.test(date)) {
            isValid = false;
        } else {
            isValid = dateExists(date);
        }
        return isValid;
    }

// check to ensure the date actually exists
    function dateExists(date) {
        var theDate = date.split("-"),
            isValid = true,
            year = new Date().getFullYear();
        if (theDate[0] > year) {
            isValid = false;
        } else if (theDate[1] < 1 || theDate[1] > 12) {
            isValid = false;
        } else if (theDate[2] < 1 || theDate[2] > 31) {
            isValid = false;
        }
        return isValid;
    }

// validate each section of the forms input
    function validateFormInput() {
        var fName = $("#fName"),
            fNameEr = $("#fNameError"),
            lName = $("#lName"),
            lNameEr = $("#lNameError"),
            birthDate = $("#birthDate"),
            birthDateEr = $("#birthDateError"),
            hireDate = $("#hireDate"),
            hireDateEr = $("#hireDateError"),
            isValid = true,
            myColor = "#FF6F6F";

        if (!validateName(fName.val())) {
            fName.css({"border-color": myColor});
            fNameEr.css({"visibility": "visible"});
            isValid = false;
        }

        if (!validateName(lName.val())) {
            lName.css({"border-color": myColor});
            lNameEr.css({"visibility": "visible"});
            isValid = false;
        }

        if (!validateDate(birthDate.val())) {
            birthDate.css({"border-color": myColor});
            birthDateEr.css({"visibility": "visible"});
            isValid = false;
        }

        if (!validateDate(hireDate.val())) {
            hireDate.css({"border-color": myColor});
            hireDateEr.css({"visibility": "visible"});
            isValid = false;
        }

        return isValid;
    }

    function resetErrorDisplay(element) {
        var id = $(element).attr('id') + "Error",
            errorField = $("#" + id);
        $(element).css({"border-color": "white"});
        $(errorField).css({"visibility": "hidden"});
    }

    $("input").focus(function (event) {
        resetErrorDisplay(this);
    });


    $("#insertEmployee").on("submit", function (event) {
        if (validateFormInput()) {
            return true;
        } else {
            event.preventDefault();
        }
    });

    $("#updateEmployee").on("submit", function (event) {
        if (validateFormInput()) {
            return true;
        } else {
            event.preventDefault();
        }
    });

});