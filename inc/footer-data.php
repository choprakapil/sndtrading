<!-- JS here -->
<script src="<?=SITE_URL?>assets/js/vendor/jquery.js"></script>
   <!--<script src="">assets/js/three.js"></script>-->
   <script src="<?=SITE_URL?>assets/js/gsap.js"></script>
   <script src="<?=SITE_URL?>assets/js/gsap-scroll-to-plugin.js"></script>
   <script src="<?=SITE_URL?>assets/js/gsap-scroll-trigger.js"></script>
   <!-- <script src="assets/js/gsap-scroll-smoother.js"></script> -->
   <script src="<?=SITE_URL?>assets/js/gsap-split-text.js"></script>
   <script src="<?=SITE_URL?>assets/js/hover-effect.umd.js"></script>
   <script src="<?=SITE_URL?>assets/js/vendor/waypoints.js"></script>
   <script src="<?=SITE_URL?>assets/js/bootstrap-bundle.js"></script>
   <script src="<?=SITE_URL?>assets/js/ajax-form.js"></script>
   <script src="<?=SITE_URL?>assets/js/imagesloaded-pkgd.js"></script>
   <script src="<?=SITE_URL?>assets/js/isotope-pkgd.js"></script>
   <script src="<?=SITE_URL?>assets/js/jarallax.js"></script>
   <script src="<?=SITE_URL?>assets/js/magnific-popup.js"></script>
   <script src="<?=SITE_URL?>assets/js/nice-select.js"></script>
   <script src="<?=SITE_URL?>assets/js/purecounter.js"></script>
   <script src="<?=SITE_URL?>assets/js/range-slider.js"></script>
   <script src="<?=SITE_URL?>assets/js/jequery-knob.js"></script>
   <script src="<?=SITE_URL?>assets/js/jquery-appear.js"></script>
   <script src="<?=SITE_URL?>assets/js/wow.js"></script>
   <script src="<?=SITE_URL?>assets/js/slick.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"
      integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="<?=SITE_URL?>assets/js/main.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
   <script>
      var Swipes = new Swiper('.tp-service-active', {
         loop: true,
         speed: 1000,
         autoplay: {
            delay: 4000,
         },
         navigation: {
            nextEl: '.service-next',
            prevEl: '.service-prev',
         },
         
         breakpoints: {
            
            // when window width is >= 320px
            768: {
               slidesPerView: 2,
               spaceBetween: 10
            },
            // when window width is >= 480px
            1024: {
               slidesPerView: 2,
               spaceBetween: 10
            },
            // when window width is >= 640px
            1280: {
               slidesPerView: 3,
               spaceBetween: 10
            }
         }
      });

   </script>
    <script>
      var Swipes = new Swiper('.tp-brand-active', {
         loop: true,
         speed: 1000,
         autoplay: {
            delay: 4000,
         },
         navigation: {
            nextEl: '.service-next',
            prevEl: '.service-prev',
         },
         
         breakpoints: {
            // when window width is >= 430px
           0: {
               slidesPerView: 2,
               spaceBetween: 10
            },
            // when window width is >= 320px
            768: {
               slidesPerView: 3,
               spaceBetween: 30
            },
            // when window width is >= 480px
            1024: {
               slidesPerView: 4,
               spaceBetween: 10
            },
            // when window width is >= 640px
            1280: {
               slidesPerView: 5,
               spaceBetween: 10
            }
         }
      });

   </script>
   <script>
      var Swipes = new Swiper('.tp-turnkey-active', {
         loop: true,
 speed: 1000,
         autoplay: {
            delay: 4000,
         },
         navigation: {
            nextEl: '.turnkey-next',
            prevEl: '.turnkey-prev',
         },
       
         breakpoints: {
              0: {
               slidesPerView: 2,
               spaceBetween: 10
            },
            // when window width is >= 320px
            768: {
               slidesPerView: 3,
               spaceBetween: 10
            },
            // when window width is >= 480px
            1024: {
               slidesPerView: 4,
               spaceBetween: 10
            },
            // when window width is >= 640px
            1280: {
               slidesPerView: 4,
               spaceBetween: 10
            }
         }
      });

   </script>
      <script>
         var Swipes = new Swiper('.tp-product-2-active', {
            loop: true,
    speed: 1000,
         autoplay: {
            delay: 4000,
         },
            navigation: {
               nextEl: '.product-next',
               prevEl: '.product-prev',
            },
          
            breakpoints: {
                0: {
               slidesPerView: 2,
               spaceBetween: 10
            },
               // when window width is >= 320px
               768: {
                  slidesPerView: 3,
                  spaceBetween: 10
               },
               // when window width is >= 480px
               1024: {
                  slidesPerView: 4,
                  spaceBetween: 10
               },
               // when window width is >= 640px
               1280: {
                  slidesPerView: 4,
                  spaceBetween: 10
               }
            }
         });
   


         $(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('.tp-header-area').addClass('fixed-header');
    }
    else {
        $('.tp-header-area').removeClass('fixed-header');
    }
});


      </script>
      
      <script>
    
    const myCarousel = new Carousel(document.querySelector("#myCarousel"), {
preload: 1
});

Fancybox.assign('[data-fancybox="carousel-gallery"]', {
closeButton: "top",
Thumbs: false,
Carousel: {
Dots: true,
on: {
change: (that) => {
myCarousel.slideTo(myCarousel.getPageforSlide(that.page), {
friction: 0
});
}
}
}
});
</script>
<script>
    const enquiryForm = (ele) => {
        $('#enquire-modal').modal('show');
        $('#enquire-modal').find('input[name="product"]').val($(ele).data('pname'));
    }
</script>

<script>
    var slider1 = new Swiper('.tp-slider-3-active', {
        
        autoplay: {
        delay: 10000,  // Autoplay delay (5 seconds) 
        speed: 1800  // Transition speed (ms)
        
    });
</script>