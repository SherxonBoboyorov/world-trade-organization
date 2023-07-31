const navbarToggler = document.querySelector(".navbar-toggler i");
const navbarContent = document.querySelector(".navbar-content");
const closeVideo = document.querySelector(".close-video i");
const videoSection = document.querySelector(".video-section");
const videoBoxImg = document.querySelector(".video-box img");
const videoBoxVideo = document.querySelector("video");
const videoPlay = document.querySelector(".video-play");

navbarToggler?.addEventListener("click", () => {
  console.log(1);
  const open = navbarContent.className.includes("open");
  if (window.innerWidth <= 950) {
    if (open) {
      navbarContent.classList.remove("open");
      navbarToggler.classList.remove("fa-xmark");
      navbarToggler.classList.add("fa-bars");
    } else {
      navbarContent.classList.add("open");
      navbarToggler.classList.add("fa-xmark");
      navbarToggler.classList.remove("fa-bars");
    }
  }
});

console.log(closeVideo);
closeVideo?.addEventListener("click", () => {
  videoSection.classList.remove("active-video");
  videoBoxVideo.pause();
});

videoBoxImg?.addEventListener("click", () => {
  videoSection.classList.add("active-video");
  setTimeout(() => {
    videoBoxVideo.currentTime = 0;
    videoBoxVideo.play();
  }, 1000);
});

videoPlay?.addEventListener("click", () => {
  videoSection.classList.add("active-video");

  setTimeout(() => {
    videoBoxVideo.currentTime = 0;
    videoBoxVideo.play();
  }, 1000);
});

const p = document.querySelector("#home-wwd-paragraph");
for (let i = 0; i < p.children.length; i++)
  if (p.children[i].localName == "img") console.log(p.children[i].remove());
