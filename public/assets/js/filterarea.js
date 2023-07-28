// // filter
// price filter
function filterCardsByRoomCount(roomCount) {
  var cards = document.getElementsByClassName("card");

  for (var i = 0; i < cards.length; i++) {
    var card = cards[i];
    var cardRoomCount = parseInt(card.getAttribute("data-rooms"));
    if (cardRoomCount === roomCount) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  }
}

const minPriceSlider = document.getElementById('min-price');
const maxPriceSlider = document.getElementById('max-price');
const minAreaSlider = document.getElementById('min-area');
const maxAreaSlider = document.getElementById('max-area');
const minPriceLabel = document.getElementById('min-price-label');
const maxPriceLabel = document.getElementById('max-price-label');
const minAreaLabel = document.getElementById('min-area-label');
const maxAreaLabel = document.getElementById('max-area-label');
const roomFilters = document.getElementsByClassName('room-filter');
const cardList = document.getElementById('card-list');
const cards = document.getElementsByClassName('card');

function filterCards() {
  const minPrice = parseInt(minPriceSlider.value);
  const maxPrice = parseInt(maxPriceSlider.value);
  const minArea = parseInt(minAreaSlider.value);
  const maxArea = parseInt(maxAreaSlider.value);
  const selectedRooms = [];

  // for (let i = 0; i < roomFilters.length; i++) {
  //   if (roomFilters[i].classList.contains('selected')) {
  //
  //   }
  // }

  minPriceLabel.textContent =  minPrice;
  maxPriceLabel.textContent =  maxPrice;
  minAreaLabel.textContent = minArea ;
  maxAreaLabel.textContent = maxArea ;

  for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    const cardPrice = parseInt(card.getAttribute('data-price'));
    const cardArea = parseInt(card.getAttribute('data-area'));
    const cardRooms = parseInt(card.getAttribute('data-rooms'));

    console.log(cardRooms);

    if (
      cardPrice >= minPrice &&
      cardPrice <= maxPrice &&
      cardArea >= minArea &&
      cardArea <= maxArea &&
      (selectedRooms.length === 0 || selectedRooms.includes(cardRooms))
    ) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  }
}

function handleRoomFilterClick() {
  this.classList.toggle('selected');
  filterCards();
}

minPriceSlider.addEventListener('input', filterCards);
maxPriceSlider.addEventListener('input', filterCards);
minAreaSlider.addEventListener('input', filterCards);
maxAreaSlider.addEventListener('input', filterCards);

for (let i = 0; i < roomFilters.length; i++) {
  roomFilters[i].addEventListener('click', handleRoomFilterClick);
}

// İlk başta filtrelemeyi uygula
filterCards();
