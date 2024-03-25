document.getElementById('mobile-menu').addEventListener('click', function () {

    var navList = document.querySelector('.nav-list');
    navList.classList.toggle('show');
});

//Кнопка Вверх

const vverh = document.getElementById('Vverh');
const footer = document.getElementById('footer');

window.onscroll = function() {

  const scrollPosition = window.scrollY + window.innerHeight;
  const footerPosition = footer.offsetTop;

  if (scrollPosition >= footerPosition) {
    vverh.style.bottom = `${scrollPosition - footerPosition + 20}px`;
  } else {
    vverh.style.bottom = '20px';
  }

  if (window.scrollY > window.innerHeight) {
    vverh.style.display = 'block';
  } else {
    vverh.style.display = 'none';
  }
};

vverh.addEventListener('click', function() {
    document.documentElement.scrollTop = 0;
});

//Аккордеон

document.addEventListener('DOMContentLoaded', function () {

  const accordionItems = document.querySelectorAll('.accordion-item');

  accordionItems.forEach(function (item) {
    const header = item.querySelector('.accordion-header');

    header.addEventListener('click', function () {
      item.classList.toggle('active');

      const content = item.querySelector('.accordion-content');
      if (item.classList.contains('active')) {
        content.style.display = 'block';
      } else {
        content.style.display = 'none';
      }
    });
  });
});


