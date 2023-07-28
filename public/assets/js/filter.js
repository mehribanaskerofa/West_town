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

// price filter
const minPriceSlider = document.getElementById('min-price');
const maxPriceSlider = document.getElementById('max-price');
const minPriceLabel = document.getElementById('min-price-label');
const maxPriceLabel = document.getElementById('max-price-label');
const cardList = document.getElementById('card-list');
const cards = document.getElementsByClassName('card');

function filterCards() {
  const minPrice = parseInt(minPriceSlider.value);
  const maxPrice = parseInt(maxPriceSlider.value);

  minPriceLabel.textContent =  minPrice;
  maxPriceLabel.textContent =  maxPrice;

  for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    const cardPrice = parseInt(card.getAttribute('data-price'));
    if (cardPrice >= minPrice && cardPrice <= maxPrice) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  }
}

minPriceSlider.addEventListener('input', filterCards);
maxPriceSlider.addEventListener('input', filterCards);

// İlk başta filtrelemeyi uygula
filterCards();

