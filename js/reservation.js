document.getElementById('bouton_responsive').style.display = 'none';


let input = document.querySelector('.test');
let button = document.querySelector('.button');


button.addEventListener('click', function (event) {
    if (input.value === "") {
        event.preventDefault();
    }
});

function waitBeforeNavigate(ev) {
    ev.preventDefault(); // prevent default anchor behavior
    const goTo = this.getAttribute("href"); // store anchor href

    setTimeout(function () {
        window.location = goTo;
    }, 1000); // time in ms

    document.body.style.opacity = "0"
};

document.querySelectorAll(".waitBeforeNavigate")
    .forEach(EL => EL.addEventListener("click", waitBeforeNavigate));