document.body.style.backgroundColor = "#9A4747";

let bouton = document.querySelector(".bouton_desktop");
bouton.style.backgroundColor = "#FCF7EC";

let boutonText = document.querySelector(".bouton_desktop a");
boutonText.style.color = "#9A4747";

document.body.style.overflow = "hidden";


let bloc1lien = document.querySelector(".bloc1_lien_first_child")
let width = document.body.clientWidth;
let boutonResp = document.querySelector(".bouton_responsive");
if (width < 450) {
    boutonResp.style.display = "none";
    bloc1lien.innerHTML = "Email"
}

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