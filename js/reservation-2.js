// ###### Check si la valeur des champs inputs est vide ou non ##########
// Renvoie une erreur si vide sinon submit le form


function checkForm() {
    var username = document.forms["register"]["name"].value;
    if (username == null || username == "") {
        alert("Please enter> the username. Can’t be blank or empty !!!");
        return false;
    }
}