
// about us page 

// const slides = document.querySelector(".slider").children;
// const indicatorImages = document.querySelector(".slider-indicator").children;

// for (let i = 0; i < indicatorImages.length; i++) {
// indicatorImages[i].addEventListener("click", function () {

//     for (let j = 0; j < indicatorImages.length; j++) {
//         indicatorImages[j]
//             .classList
//             .remove("active");
//     }
//     this
//         .classList
//         .add("active");
//     const id = this.getAttribute("data-id");
//     for (let j = 0; j < slides.length; j++) {
//         slides[j]
//             .classList
//             .remove("active");
//     }

//     slides[id]
//         .classList
//         .add("active");

// })
// }



// home page 
$(".logo-slider").slick({
    slidesToShow:5,
    slidesToScroll:1,
    dots:false,
    arrow:false,
    autoplay:true,
    autoplaySpeed:3000,
    infinite:true,
    pauseOnHover: true,
    responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        }
      ]
});

$(".testimonial-slider").slick({
    slidesToShow:3,
    slidesToScroll:1,
    dots:false,
    arrow:false,
    autoplay:true,
    autoplaySpeed:3000,
    infinite:true,
    pauseOnHover: true,
    responsive: [       
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});


$('.counter').counterUp({
  delay: 10,
  time: 1000
});

