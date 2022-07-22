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
      edgePadding: 150,
      gutter: 24,
      fixedWidth: 744,
      loop: false,
      center: true
    });

    var info = slider.getInfo();
    var prev = 0;

    info.slideItems[prev].classList.add('active-slide');

    var customizedFunction = function (info, eventName) {
      var activeSlides = new Array();
      
      const slides = Object.values(info.slideItems);
      Object.values(slides).forEach((val, index) => {
        val.classList.remove('active-slide');
        if (val['className'] == 'testimonial tns-item tns-slide-active') {
          activeSlides.push(index);
        }
      });

      if (activeSlides.length == 2) {
        if (activeSlides[0] == 0) {
          info.slideItems[activeSlides[0]].classList.add('active-slide');
        } else {
          info.slideItems[activeSlides[1]].classList.add('active-slide');
        }
      } else if (activeSlides.length == 3) {
        info.slideItems[activeSlides[1]].classList.add('active-slide');
      }
    };

    slider.events.on('transitionStart', customizedFunction);
  });
})();
