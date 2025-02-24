
let header = document.querySelector("header");

window.addEventListener("scroll",() =>{
    header.classList.toggle ("shadow",window.scrollY > 0)
})

$(document).ready(function () {
        $(".filter-item").click(function () {
            const value = $(this).attr("data-filter");
            if(value == "all" ){
                $(".post-box").show("1000")
            } else{
                $(".post-box")
                    .not("."+value)
                    .hide(1000);
                    $(".post-box")
                    .filter("." + value)
                    .show("1000")
            }
        })
        $(".filter-item").click(function () {
            $(this).addClass("active-filter").siblings().removeClass("active-filter")
        });
});

window.addEventListener('resize', function() {
    if (window.innerWidth < 600) {
        document.body.style.fontSize = '14px';
        document.querySelector('.sidebar').style.display = 'none';
        document.querySelector('.menu-button').style.display = 'block';
    } else {
        document.body.style.fontSize = '16px';
        document.querySelector('.sidebar').style.display = 'block';
        document.querySelector('.menu-button').style.display = 'none';
    }
});
/*
const images = document.querySelectorAll('.imgBx img');
let currentIndex = 0;

images.forEach((img, index) => {
    img.addEventListener('click', () => {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
    });
});
*/