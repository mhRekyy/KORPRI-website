// Hero Swiper
(function () {
  const el = document.querySelector('#heroSwiper');
  if (!el) return;

  const captionEl = document.getElementById('heroCaption');

  const swiper = new Swiper('#heroSwiper', {
    loop: true,
    speed: 600,
    spaceBetween: 16,
    slidesPerView: 1,
    grabCursor: true,

    // autoplay
    autoplay: {
      delay: 3500,
      disableOnInteraction: false, 
      
      allowTouchMove: true,
      simulateTouch: true,
      touchRatio: 1,
      resistanceRatio: 0.85,
    },

    // tombol manual
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },

    // optional: titik pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    }
  });

  function updateCaption() {
    const activeSlide = swiper.slides[swiper.activeIndex];
    const caption = activeSlide?.dataset?.caption || '';
    if (captionEl) captionEl.textContent = caption;
  }

  updateCaption();
  swiper.on('slideChange', updateCaption);
})();


document.addEventListener("DOMContentLoaded", function() {
    
    // Inisialisasi Swiper
    var swiper = new Swiper(".gallerySwiper", {
        // Mode 3D Coverflow
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto", // Biarkan CSS width 300px yang atur
        
        // Loop Setting
        loop: true,
        loopedSlides: 6, // Buffer slide duplikat
        
        // PENTING: Aktifkan ini untuk deteksi posisi slide
        watchSlidesProgress: true, 
        
        // Setting Efek 3D
        coverflowEffect: {
            rotate: 20,      // Tidak miring
            stretch: 10,    // Jarak tarik antar slide
            depth: 300,     // Efek jauh
            modifier: 1,
            slideShadows: false, // Matikan shadow hitam default
        },

        // Autoplay
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        

        
        // LOGIKA FIX: Hanya Tampilkan 5 Slide (2 Kiri, 1 Tengah, 2 Kanan)
        // Slide yang lebih jauh akan di-hide total
        on: {
            progress: function(s) {
                // Loop setiap slide untuk cek posisinya
                for (var i = 0; i < s.slides.length; i++) {
                    var slide = s.slides[i];
                    var progress = slide.progress; 
                    var absProgress = Math.abs(progress); // Jarak mutlak dari tengah
                    
                    // Jika jarak <= 2.5 (artinya slide Tengah, +2 Kiri, +2 Kanan) -> TAMPILKAN
                    if (absProgress <= 2.5) {
                        slide.style.opacity = 1;
                        slide.style.visibility = "visible";
                    } 
                    // Sisanya -> SEMBUNYIKAN
                    else {
                        slide.style.opacity = 0;
                        slide.style.visibility = "hidden";
                    }
                }
            },
            setTransition: function(s, duration) {
                for (var i = 0; i < s.slides.length; i++) {
                    s.slides[i].style.transition = duration + "ms";
                    s.slides[i].querySelector(".gallery-card").style.transition = duration + "ms";
                }
            }
        }
    });

});