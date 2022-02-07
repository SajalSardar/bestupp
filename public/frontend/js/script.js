
$(function () {
  "use strict"
  // Navbar Toggle Line Style add
  $('.toggle_btn').click(function () {
    $('.line1').toggleClass("active_line1");
    $('.line2').toggleClass("line_none");
    $('.line3').toggleClass("line_none");
    $('.line4').toggleClass("active_line2");
  });

  // Sticky Menu
  $(window).scroll(function () {
    var sticky = $(this).scrollTop();
    if (sticky > 100) {
      $('.header').addClass('add');
    } else {
      $('.header').removeClass('add');
    }
  });


  //Back to Top Scroll
  $(".back_to_top").click(function () {
    $("html,body").animate({
      scrollTop: 0
    }, 1500)
  })



  // Story Part VenuBox
  $('.venobox').venobox();

  // Feedback Slider js
  $('.courses_slider').slick({
    autoplay: true,
    infinite: true,
    arrows: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // Back To Top Button
  $(window).scroll(function () {
    var top = $(this).scrollTop();
    if (top > 100) {
      $(".back_to_top").addClass('show');
    } else {
      $(".back_to_top").removeClass('show');
    }
  })

  $(".back_to_top").click(function () {
    $("html,body").animate({
      scrollTop: 0
    }, 1000)
  })
// Modal
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})




});

var swiper = new Swiper(".mySwiper", {
  loop: true,
  spaceBetween: 30,
  effect: "fade",
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
$(".swiper-container").hover(function() {
  (this).swiper.autoplay.stop();
}, function() {
  (this).swiper.autoplay.start();
});



// Reset Files
function resetFile() {
  const file = document.querySelector('#admissionFile');
  const nationalId = document.querySelector('#nationalId');
  const eduCartificat = document.querySelector('#eduCartificat');
  file.value = '';
  nationalId.value = '';
  eduCartificat.value = '';
}
