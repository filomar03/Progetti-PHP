let inputfieldMaxLength = 16;

//get refence
let inputfields = document.querySelectorAll("input[type=text]");
let submitBtns = document.querySelectorAll("input[type=button]");
let forms = document.querySelectorAll("form");

//callbacks
let textCallback = function (e) {
    let targetStr = Capitalize(e.srcElement.value.trim());

    if (targetStr.length > inputfieldMaxLength) 
        targetStr = targetStr.slice(0, inputfieldMaxLength);

    e.srcElement.value = targetStr;
}

let numericTextCallback = function (e) {
    let targetStr = e.srcElement.value.trim();

    if (targetStr.length > 10) 
        targetStr = targetStr.slice(0, 10);

    if (isNaN(targetStr.charAt(targetStr.length - 1)))
        targetStr = targetStr.slice(0, targetStr.length - 1);

    e.srcElement.value = targetStr;
}

let submitCallback = function (e) {
    if (inputfields[0].value.length != 0 && inputfields[1].value.length != 0 && inputfields[2].value.length == 10)
        forms[0].submit();
}

let filterCallback = function (e) {
    if (inputfields[3].value.length != 0)
        forms[1].submit();
}

//adding listener
inputfields.forEach(element => {
    if (element.name == "number") {
        element.addEventListener("input", numericTextCallback);
    } else {
        element.addEventListener("input", textCallback);
    }
});

submitBtns.forEach(element => {
    if (element.value == "Submit") {
        element.addEventListener("click", submitCallback);
    } else if (element.value == "Filter") {
        element.addEventListener("click", filterCallback);
    }
});

function Capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
}