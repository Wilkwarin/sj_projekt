// Меню типа гамбургер
/* Добываем ссылку на элемент с айдишником мобайл-меню...
...добавляем к нему метод "слушатель событий", который имеет аргументы "событие"...
...и "что в этом случае сделать". Второй аргумент, функция, задан дальше. */
document.getElementById('mobile-menu').addEventListener('click', function () {
    /* Называем по имени нав-лист (это наша менюшка с 4 ссылками в HTML) */
    var navList = document.querySelector('.nav-list');

    /* Свойство classList позволяет взаимодействовать с классами элемента...
    ... а метод toggle добавляет класс, если его нет, и удаляет, если он уже присутствует...
    ... поэтому функция добавляет класс show, и меню делается видимым.
    Повторный клик обратно делает его невидимым.
    А невидимость по умолчанию ему обеспечивает display: none; в медиа для малых экранов. */
    navList.classList.toggle('show');
});

/* kreatívny bod - posuvná hláska */
//Анкетные данные, бегущие вдаль

const skrytyj = document.getElementById('Skrytyj').innerHTML;
const anketa = document.getElementById('anketa');
const stroki = skrytyj.split('<br>');

function printText(stroki, strokaIndex = 0, charIndex = 0) {
  // пока строки не кончатся
  if (strokaIndex < stroki.length) {
    // добавляем текущий символ строки к тексту параграфа
    anketa.innerHTML += stroki[strokaIndex][charIndex];
    charIndex++;

    // когда строка закончилась, переходим к следующей строке
    if (charIndex >= stroki[strokaIndex].length) {
      strokaIndex++;
      charIndex = 0;
      anketa.innerHTML += '<br>';
    }

    // родная функция JavaScript, устанавливающая задержку в 30 миллисекунд между вызовами
    setTimeout(() => printText(stroki, strokaIndex, charIndex), 30);
  }
}

// Вызываем функцию для начала печати
printText(stroki);

