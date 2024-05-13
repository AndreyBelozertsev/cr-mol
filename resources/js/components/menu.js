  
  //menu sticky
  if (document.querySelector(".header")) {
    // инициализируем top Navigation
    const topNavigation = document.querySelector(".header");
    // попап меню - блок
    const popupMenu = document.getElementById("popup-menu");
    // Функция добавляет класс элементу в зависимости от координат окна
    function checkСoordinatesElem(elem) {
      // запуск функции по движению скролла
      window.addEventListener("scroll", function () {
        var body = document.body,
        html = document.documentElement;

        var height = Math.max( body.scrollHeight, body.offsetHeight, 
                          html.clientHeight, html.scrollHeight, html.offsetHeight );

        // инициализируем координаты окна по Y
        const coordWindow = window.scrollY;
        if(height > (window.screen.height + 180)){
            coordWindow > 80 
              ? (elem.classList.add("active"),
                popupMenu.classList.add("top-scroll"))
              : (elem.classList.remove("active"),
                popupMenu.classList.remove("top-scroll"));
        
        }
      });
    }
  
    checkСoordinatesElem(topNavigation);
  }
  
  // menu
  if (document.querySelector("#popup-menu")) {
    // бургер
    const burger = document.querySelector(".burger");
    // body
    const body = document.querySelector("body");
    // попап меню - блок
    const popupMenu = document.getElementById("popup-menu");
  
    // при клике на бургер выполняются действия
    burger.addEventListener("click", () => {
      // добавяем/удаляем класс active у элемента
      popupMenu.classList.toggle("active");
      // добавяем/удаляем класс active бургеру
      burger.classList.toggle("active");
      // добавяем/удаляем класс noscroll у body
      body.classList.toggle("noscroll");
    });
  }



if (document.querySelector(".user-block")) {
  const userBlock = document.querySelector(".user-block");
  const userNav = document.querySelector(".user-nav");

  userBlock.addEventListener("click", function () {
    userNav.classList.toggle("show");
  });

  document.addEventListener("click", function (e) {
    if (!e.target.classList.contains("user-block")){
      userNav.classList.remove("show");
    }
  });
}
  
  
  