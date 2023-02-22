var x = true;
let menu = document.getElementById("menu-items");
let navbar = document.querySelector(".navbar");
let humberger = document.getElementById("humberger");
let right = document.getElementById("right");
let category = document.getElementById("category");
// let category_array=[...category.children];
let hidden = document.querySelectorAll(".hidden");
let contact = document.getElementById("contact");
let sociale = document.getElementById("sociale");
let center = document.getElementById("center");
let point = document.querySelector(".point");
let red_point = document.getElementById("red-point");
let left = document.getElementById("left");
let mo = document.getElementById("left");




window.onload = function () {
    navbar.children[0].classList.add("logo2");
    humberger.classList.add("humberger2");
    document.body.classList.add("body-hidden");

    let start = localStorage.getItem("start");
    start = parseInt(start);
    if (start) {

    }
    else {
        localStorage.setItem("start", 1);
    }
    setInterval(() => {
        if (start) {
            localStorage.removeItem("start");
        }
    }, 3600000);
}


humberger.onclick = function () {
    if (x == true) {
        menu.classList.add("menu-items-open");
        navbar.classList.add("navbar-open");
        navbar.classList.add("navbar-open5");
        humberger.classList.add("open");
        // hidden.forEach(div => {
        //     div.classList.add("hidden2")
        // });
        gsap.to(hidden, {
            stagger: .2,
            y: 0
        })
        let socialeChildren = [...sociale.children];
        contact.classList.add("contact5");
        socialeChildren.forEach(div => {
            div.classList.add("img2");
        });
        x = false;
    }
    else {
        menu.classList.remove("menu-items-open");
        humberger.classList.remove("open");
        navbar.classList.remove("navbar-open5");
        navbar.classList.remove("navbar-open");

        x = true;
    }
}





