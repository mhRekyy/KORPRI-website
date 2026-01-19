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


