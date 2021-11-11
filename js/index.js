var swiper = new Swiper(".mySwiper", {
    /*autoHeight: true,*/
    loop: true,
    resizeObserver: false,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
    }
});


let swiperHoverRight = document.querySelector('.swiperHover .swiper-button-next ')

swiperHoverRight.addEventListener('mouseenter', function (e) {
    cursor.classList.add('cursor_active_right');
    cursor2.classList.add('cursor2_active_right');
})

swiperHoverRight.addEventListener('mouseleave', function (e) {
    cursor.classList.remove('cursor_active_right');
    cursor2.classList.remove('cursor2_active_right');
})



let swiperHoverLeft = document.querySelector('.swiperHover .swiper-button-prev ')

swiperHoverLeft.addEventListener('mouseenter', function (e) {
    cursor.classList.add('cursor_active_left');
    cursor2.classList.add('cursor2_active_left');
})

swiperHoverLeft.addEventListener('mouseleave', function (e) {
    cursor.classList.remove('cursor_active_left');
    cursor2.classList.remove('cursor2_active_left');
})

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