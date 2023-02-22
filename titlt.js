
VanillaTilt.init(document.querySelector(".jsTilt"), {
    max: 15,
    scale: 1.1,
    speed: 2500,
    reverse: true,
    glare: true,
    "max-glare": .4,
});

//It also supports NodeList
VanillaTilt.init(document.querySelectorAll(".jsTilt"));