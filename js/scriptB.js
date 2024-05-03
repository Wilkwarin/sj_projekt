document.getElementById('mobile-menu').addEventListener('click', function () {
    var navList = document.querySelector('.nav-list');
    navList.classList.toggle('show');
});

/* kreatívny bod - tlačidlo "hore" */

const vverh = document.getElementById('Vverh');
const footer = document.getElementById('footer');

window.onscroll = function() {

/* window.scrollY - это число пикселей, на которое страница прокручена вниз от верхней границы окна
window.innerHeight - высота видимой области окна, меняется вместе с окном браузера
footer.offsetTop - расстояние от верхней границы ближайшего не-статик предка до верхней границы футера */

  const scrollPosition = window.scrollY + window.innerHeight;
  // вертикальная позиция нижней границы видимой области
  const footerPosition = footer.offsetTop;
  // вертикальная позиция верхней границы футера

  if (scrollPosition >= footerPosition) {
    // Если экран пытается прокрутиться ниже футера:
    vverh.style.bottom = `${scrollPosition - footerPosition + 20}px`;
    /* нижняя граница кнопки будет на 20 пикселей выше разницы футера и прокрученного
    формула ${...}px преобразует число в строку и добавляет "px" к концу
    в CSS значения свойств типа боттом или лефт ожидают строку с припиской единиц измерения */

  } else {
    vverh.style.bottom = '20px';
  }

// Если мы прокрутили текст 
  if (window.scrollY > window.innerHeight) {
    vverh.style.display = 'block';
  } else {
    vverh.style.display = 'none';
  }
};

vverh.addEventListener('click', function () {
    document.documentElement.scrollTop = 0;
});

/* kreatívny bod - tlačidlo "Zväčšiť veľkosť písma" */

const resizeButton = document.getElementById('changeSize');
const resizeElements = document.querySelectorAll('.resizeText');

resizeButton.addEventListener('click', function () {
  resizeElements.forEach(function (element) {
    // метод .forEach используется для применения функции к каждому элементу
    let currentSize = window.getComputedStyle(element).fontSize;
    /* в переменную "текущий размер" будет уложено значение размера шрифта,
    полученное через метод window.getComputedStyle(element) */
    currentSize = parseFloat(currentSize);
    //перевели строку в число для следующих вычислений
    element.style.fontSize = `${currentSize + 2}px`;
  });
});
