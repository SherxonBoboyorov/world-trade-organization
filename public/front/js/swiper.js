var swiper = new Swiper(".mySwiper", {
  cssMode: true,
  allowTouchMove: true,
  loop: true,
  direction: "horizontal",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  mousewheel: true,
  keyboard: true,
});

const mySwiper = new Swiper(".swiper-container", {
  slidesPerView: 1,
  slidesPerGroup: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    380: {
      slidesPerView: 2,
      slidesPerGroup: 2,
    },
   
  }
});
