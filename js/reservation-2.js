grecaptcha.ready(function () {
    grecaptcha.execute('6LewOlodAAAAAC2IoZg-Ye76rGW_Pgrh8weg7tm-', {
        action: 'submit'
    }).then(function (token) {
        // console.log(token);
        document.getElementById('g-recaptcha-response').value = token;
    });
});


// ###### Check si la valeur des champs inputs est vide ou non ##########
// Renvoie une erreur si vide sinon submit le form

document.getElementById('bouton_responsive').style.display = 'none';

const form = document.getElementById("form");
const name = document.getElementById("name");
const date1 = document.getElementById("txtFromDate1");
const date2 = document.getElementById('txtFromDate2');
const people = document.getElementById('people');
const child = document.getElementById('child');
const email = document.getElementById('email');
const phone = document.getElementById('phone');


//Show input error message

function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = "input_row error";
    const small = formControl.querySelector("small");
    small.innerText = message;
    return input;
}

//show success message

function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = "input_row success";
    return input;
}

function checkRequired(input) {
    if (input.value.trim() === "") {
        return showError(input, `Ce champ est obligatoire`);
    }
    return showSuccess(input);
}

//get field name
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function validate() {
    let checkValue = checkRequired(name);
    let checkDate1 = checkRequired(date1);
    let checkDate2 = checkRequired(date2);
    let checkPeople = checkRequired(people);
    let checkChild = checkRequired(child);
    let checkEmail = checkRequired(email);
    let checkPhone = checkRequired(phone);

    if (checkValue.value && checkSub.value && checkDate1 && checkDate2 && checkPeople && checkChild && checkEmail && checkPhone) {
        return true;
    } else {
        return false;
    }
}
//


$(document).ready(function () {
    $('form').submit(function (e) {
        var hours = parseInt(prompt('Combien font 2+2'));
        if (hours != '4') {
            e.preventDefault();
        } else {
            $(this).unbind('submit').submit()
        }
    });
});
