document.body.style.backgroundColor = "#9A4747";

let bouton = document.querySelector(".bouton_desktop");
bouton.style.display = "none";

let boutonText = document.querySelector(".bouton_desktop a");
boutonText.style.display = "none";

document.body.style.overflow = "hidden";

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