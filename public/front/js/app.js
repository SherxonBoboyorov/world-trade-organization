const navbarToggler = document.querySelector(".navbar-toggler i");
const navbarContent = document.querySelector(".link-content");

const videoPlay = document.querySelector(".video-play");

navbarToggler?.addEventListener("click", () => {
  const open = navbarContent.className.includes("open");
  if (window.innerWidth <= 950) {
    if (!open) {
      navbarContent.classList.add("open");
    }
  }
});

navbarContent?.addEventListener("click", (e) => {
  if (window.innerWidth <= 950) {
    if (e.target.className.includes("open")) {
      navbarContent.classList.remove("open");
    }
  }
});

videoPlay?.addEventListener("click", () => {
  document.querySelector("#videoImg").click();
});

const p = document.querySelector("#home-wwd-paragraph");
for (let i = 0; i < p?.children.length; i++)
  if (p.children[i].localName == "img") console.log(p.children[i].remove());
