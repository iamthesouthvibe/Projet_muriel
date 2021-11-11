var swiper = new Swiper(".carousel_maison .mySwiper", {
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

var swiper3 = new Swiper(".carousel_maison_03 .mySwiper", {
    loop: true,
    resizeObserver: false,
    navigation: {
        nextEl: ".swiper-button-next",
    },
});

let swiperHoverRight = document.querySelector('.swiperHover .swiper-button-next ')

swiperHoverRight.addEventListener('mouseenter', function (e) {
    cursor.classList.add('cursor_active_right_maison');
    cursor2.classList.add('cursor2_active_right');
})

swiperHoverRight.addEventListener('mouseleave', function (e) {
    cursor.classList.remove('cursor_active_right_maison');
    cursor2.classList.remove('cursor2_active_right');
})



let swiperHoverLeft = document.querySelector('.swiperHover .swiper-button-prev ')

swiperHoverLeft.addEventListener('mouseenter', function (e) {
    cursor.classList.add('cursor_active_left_maison');
    cursor2.classList.add('cursor2_active_left');
})

swiperHoverLeft.addEventListener('mouseleave', function (e) {
    cursor.classList.remove('cursor_active_left_maison');
    cursor2.classList.remove('cursor2_active_left');
})


let pagination = document.querySelectorAll('.swiper-pagination-bullet');

for (let i = 0; i < pagination.length; i++) {
    pagination[i].style.backgroundColor = "white";
}

let swiperButtonNext = document.querySelector('.swiper-button-next')
swiperButtonNext.style.width = "50%";

let swiperButtonPrev = document.querySelector('.swiper-button-prev')
swiperButtonPrev.style.width = "50%";

let swiperContainerHeight = document.querySelector('.swiper-container')
swiperContainerHeight.style.height = "90vh";

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