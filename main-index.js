var x = true;
let menu = document.getElementById("menu-items");
let navbar = document.querySelector(".navbar");
let humberger = document.getElementById("humberger");
let category = document.getElementById("category");
// let  category_array=[...category.children];
let right = document.getElementById("right");
let hidden = document.querySelectorAll(".hidden");
let contact = document.getElementById("contact");
let sociale = document.getElementById("sociale");
let center = document.getElementById("center");
let point = document.querySelector(".point");
let red_point = document.getElementById("red-point");
let left = document.getElementById("left");
let camera = document.getElementById("camera");
let intro = document.querySelector(".intro");





window.onload = function () {
    let start = sessionStorage.getItem("start");
    start = parseInt(start);
    if (start) {

    }
    else {
        sessionStorage.setItem("start", 1);
    }
}
if (sessionStorage.getItem("start") == 1) {
    inStart();
    document.body.classList.add("body-hidden");
}
else {
    setTimeout(() => {
        red_point.classList.add("red3")
    }, 500);
    var mo = setInterval(() => {
        red_point.classList.add("red2");
        setTimeout(() => {
            red_point.classList.remove("red2");
        }, 750);
    }, 1500);
    setTimeout(() => {
        clearInterval(mo);
        red_point.classList.add("red4");
    }, 3000);
    setTimeout(() => {
        inStart();
    }, 4500);
}

function inStart() {
    red_point.parentElement.style.display = "none";
    setTimeout(() => {
        camera.children[0].classList.add("camera-logo2");
    }, 500);
}
// gsap.to(red_point,
//     {
//         background:"transparent",
//         delay:1,
//         repeat:-1,
//         yoyo:true
// })

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
        // hidden.forEach(div => {
        //     div.classList.remove("hidden2")
        // });
        // contact.classList.remove("contact5");
        // socialeChildren.forEach(div=>{
        //     div.classList.remove("img2");
        // });
        x = true;
    }
}

document.body.addEventListener("mousemove", function (e) {
    // let PX=(point.getBoundingClientRect().left) + (point.clientWidth/2);
    // let PY=(point.getBoundingClientRect().top) + (point.clientHeight/2);
    // let radian=Math.atan2(e.x - PX , e.y - PY);
    // let rot =(radian * (180/Math.PI) * -1) + 270;
    // point.style.transform="rotate("+ rot +"deg)"; 
    let PX = (e.x * 100 / window.innerWidth + "%");
    let PY = (e.y * 100 / window.innerHeight + "%");
    point.style.left = PX / 2;
    point.style.top = PY / 2;
    point.style.transform = "translate(" + PX + "," + PY + ")";
})
// ------------------------------------------------------------
function pointball(e) {

    // let PX=(Event.clientX*100/window.innerWidth+"%");
    // let PY=(Event.clientY*100/window.innerHeight+"%");
    // point.style.left=PX/2;
    // point.style.top=PY/2;
    // point.style.transform="translate("+PX+","+PY+")";
}




