// Гамбургер

document.getElementById('mobile-menu').addEventListener('click', function () {
    var navList = document.querySelector('.nav-list');
    navList.classList.toggle('show');
});

// Karousel

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

document.getElementById('nextBtn').addEventListener('click', () => {
  if (currentIndex < totalItems - 1) {
    currentIndex++;
  } else {
    currentIndex = 0;
  }
  updateCarousel();
});

document.getElementById('prevBtn').addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
  } else {
    currentIndex = totalItems - 1;
  }
  updateCarousel();
});

function updateCarousel() {
// каждый элемент будет смещаться на 100% своей ширины
  const newTransformValue = -currentIndex * 100 + '%';
// Устанавливает "carousel-inner" свойство transform, чтобы сместить содержимое карусели на величину newTransformValue
  document.querySelector('.carousel-inner').style.transform = 'translateX(' + newTransformValue + ')';
}

// Alert video

const videoElement = document.getElementById('toVideo');

videoElement.addEventListener('play', function alertMysi() {
    videoElement.removeEventListener('play', alertMysi);
    videoElement.pause();
    alert('Pozor, video obsahuje týranie myší!');
    videoElement.load();
});
