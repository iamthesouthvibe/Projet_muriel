const form = document.getElementById("add_user");
const fullName = document.getElementById("fullname");
const email = document.getElementById("email");
const file = document.getElementById("file");
const role = document.getElementById("permission");
const pass = document.getElementById("password");
const pass2 = document.getElementById("password2");



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
 
    let checkName = checkRequired(fullName);
    let checkEmail = checkRequired(email);
    let checkFile = checkRequired(file);
    let checkRole = checkRequired(role);
    let checkPass = checkRequired(pass);
    let checkPass2 = checkRequired(pass2);
    let checkLengthPass = checkLength(pass, 6, 30);

    console.log(checkName);
    console.log(checkEmail);
    console.log(checkFile);
    console.log(checkRole);

 
    if (checkName && checkEmail && checkFile && checkRole && checkPass && checkPass2 && checkLengthPass) {
        return true;
    } else {
        return false;
    }
}

