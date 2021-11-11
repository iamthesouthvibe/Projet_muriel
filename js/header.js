let navBar = document.querySelector('.menu_nav');
let navBarRight = document.querySelector('.menu_nav_right');
let menuBurger = document.querySelector('.burger-menu');
let headerButton = document.querySelector('.bouton_responsive')
menuBurger.addEventListener("click", (event) => {
    if (event.currentTarget.classList.contains("open")) {
        event.currentTarget.classList.remove("open");
        navBar.classList.remove("active");
        navBarRight.classList.remove("active_snd");
        headerButton.style.display = ""
        console.log(headerButton)
        document.body.style.overflow = ""
    } else {
        event.currentTarget.classList.add("open");
        navBar.classList.add("active");
        navBarRight.classList.add("active_snd");
        headerButton.style.display = "none"
        document.body.style.overflow = "hidden"
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