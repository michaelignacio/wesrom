(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    let main_navigation = document.querySelector("#primary-menu");
    document.querySelector("#primary-menu-toggle").addEventListener("click", function(e) {
      e.preventDefault();
      main_navigation.classList.toggle("hidden");
    });

    var slider = tns({
      container: '.my-slider',
      slideBy: 'page',
      gutter: 24,
      slideBy: 1,
      speed: 1000,
      controlsText: [
        '<svg width="38" height="22" viewBox="0 0 38 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.8849 21.5173L12.6527 19.7496L5.15289 12.2498L37.75 12.2498L37.75 9.74975L5.15313 9.74975L12.6527 2.25022L10.8849 0.482488L0.367349 10.9999L10.8849 21.5173Z" fill="black"/> </svg>',
        '<svg width="38" height="22" viewBox="0 0 38 22" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M27.1151 0.482666L25.3473 2.2504L32.8471 9.75017L0.25 9.75017L0.25 12.2502L32.8469 12.2502L25.3473 19.7498L27.1151 21.5175L37.6327 11.0001L27.1151 0.482666Z" fill="black"/> </svg> ',
      ],
      responsive: {
        320: {
          edgePadding: 0,
          fixedWidth: 300,
          center: true,
        },
        768: {
          edgePadding: 100,
          fixedWidth: 550,
          center: false,
        },
        1024: {
          edgePadding: 150,
          fixedWidth: 744,
        },
      },
    });

    var info = slider.getInfo();
    function activateSlide() {
      var activeSlides = new Array();

      const slides = Object.values(info.slideItems);
      Object.values(slides).forEach((val, index) => {
        val.classList.remove('active-slide');
        if (val['className'] == 'testimonial tns-item tns-slide-active') {
          activeSlides.push(index);
        }
      });

      info.slideItems[activeSlides[1]].classList.add('active-slide');
    }

    slider.events.on('transitionStart', activateSlide);
    activateSlide();

  });
})();
