
const form = document.getElementById("form");
const title = document.getElementById("title");
const subtitle = document.getElementById("subtitle");
const lieu = document.getElementById("lieu");
const date = document.getElementById("date");
const file = document.getElementById("file");
const file2 = document.getElementById("file2");
const file3 = document.getElementById("file3");
const description = document.getElementById("description");


//Show input error message

function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = "form-control error";
    const small = formControl.querySelector("small");
    small.innerText = message;
    return input;
}

//show success message

function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
    return input;
}

//check required fields
/*
  function checkRequired(inputArr) {
    inputArr.forEach(function(input) {
      if (input.value.trim() === "") {
        return showError(input, `${getFieldName(input)} Filed is required`);
      } else {
        return showSuccess(input);
      }
    });
  } */

function checkRequired(input) {
    if (input.value.trim() === "") {
        return showError(input, `${getFieldName(input)} Filed is required`);
    }
    return showSuccess(input);
}

//get field name
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//check length

function checkLength(input, min, max) {
    if (input.value.length < min) {
        return showError(
            input,
            `${getFieldName(input)} must be atleast ${min} characters`
        );
    } else if (input.value.length > max) {
        return showError(
            input,
            `${getFieldName(input)} must be less than ${max} characters`
        );
    } else {
        return showSuccess(input);
    }
}

function validate() {
    let checkValue = checkRequired(title);
    let checkSub = checkRequired(subtitle);
    let checkDate = checkRequired(date);
    let checkLieu = checkRequired(lieu);
    let checkFile = checkRequired(file);
    let checkFile2 = checkRequired(file2);
    let checkFile3 = checkRequired(file3);
    let checkDesc = checkRequired(description);
    let checkLengthTitle = checkLength(title, 3, 45);
    let checkLengthDes = checkLength(description, 50, 800);
 
    if (checkValue.value && checkLengthTitle.value && checkLengthDes.value && checkSub.value && checkDate.value && checkLieu.value && checkFile.value && checkFile2.value && checkFile3.value && checkDesc.value) {
        return true;
    } else {
        return false;
    }
}