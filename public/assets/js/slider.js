const swipera = new Swiper('.benefits-slider .swiper', {

    pagination: {
      el: '.benefits-slider .swiper-pagination',
    },
    navigation: {
      nextEl: '.benefits-slider .swiper-button-next',
      prevEl: '.benefits-slider .swiper-button-prev',
    },
  });

  var swiper1 = new Swiper('.inf', {
    // slidesPerView: 'auto',



//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },
});

var paginationItems = document.querySelectorAll('#infs .pagination-item');

paginationItems.forEach(function(item, index) {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    paginationItems.forEach(function(item){
        console.log(item.style)
         item.style.borderBottom = "0px";
            }
        )

    this.style.borderBottom = "1px solid white";

    swiper1.slideTo(index);
  });
});


const swiper2 = new Swiper('.rares .swiper', {
slidesPerView: 3,
  pagination: {
      el: '.rares .swiper-pagination',
  },
  navigation: {
      nextEl: '.rares .swiper-button-next',
      prevEl: '.rares .swiper-button-prev',
  },
});


var swiper3 = new Swiper('.slider-finish', {
  // slidesPerView: 'auto',

navigation: {
  nextEl: '.slider-finish .swiper-button-next',
  prevEl: '.slider-finish .swiper-button-prev',
},
});

var paginationItems = document.querySelectorAll('.slider-finish .pagination-item');

paginationItems.forEach(function(item, index) {
item.addEventListener('click', function() {
  swiper3.slideTo(index);
  for (let j = 0; j < paginationItems.length; j++) {
      paginationItems[j].style.backgroundColor = '';
      paginationItems[j].style.color = '';
  }
// console.log(this.className)
  // Tıklanan düğmenin arka plan rengini değiştirin
  this.style.backgroundColor = '#605348';
  this.style.color = '#fff';
});
});



var innerSliders = document.querySelectorAll('.finish .inner-slider');

innerSliders.forEach(function (slider) {
new Swiper(slider, {
  // direction: 'vertical',
  autoplay: {
    delay: 2500,
  },
loop: true,

// If we need pagination
pagination: {
  el: '.finish .inner-slider .swiper-pagination',
},

// Navigation arrows
navigation: {
  nextEl: '.finish .inner-slider .swiper-button-next',
  prevEl: '.finish .inner-slider .swiper-button-prev',
},
});
});

var swiper4 = new Swiper('.slider-galary', {
  slidesPerView: 'auto',
loop: true,
autoplay: {
  delay: 3000,
},

// If we need pagination
pagination: {
  el: '.swiper-pagination',
},

navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},
});

