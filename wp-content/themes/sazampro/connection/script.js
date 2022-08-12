document.addEventListener("DOMContentLoaded", () => {
  // Слайдер
  new Swiper(".mainSwiper", {
    slidesPerView: "auto",
    spaceBetween: 45,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".mainSwiper-btn-next",
      prevEl: ".mainSwiper-btn-prev",
    },
    breakpoints: {
      0: {
        spaceBetween: 15,
      },
      651: {
        spaceBetween: 45,
      },
    },
  });

  // Каталог попап
  var sidebarCatalog = document.querySelectorAll(".sidebar-catalog-menu"),
    el = document.querySelectorAll(
      ".sidebar-catalog-menu .wc-block-product-categories-list-item"
    ),
    phoneCatalogBtn = document.querySelectorAll("button[name='phoneCatalog']"),
    phoneCatalog = document.querySelector(".phone-catalog");
  for (let i = 0; i < phoneCatalogBtn.length; i++) {
    const element = phoneCatalogBtn[i];
    element.addEventListener("click", () => {
      if (window.innerWidth >= 1145) {
        if (sidebarCatalog[i].classList.contains("open")) {
          element.classList.remove("open");
          sidebarCatalog[i].classList.remove("open");
        } else {
          element.classList.add("open");
          sidebarCatalog[i].classList.add("open");
        }
      } else {
        if (phoneCatalog.classList.contains("open")) {
          element.classList.remove("open");
          phoneCatalog.classList.remove("open");
        } else {
          element.classList.add("open");
          phoneCatalog.classList.add("open");
          disableScroll();
        }
      }
    });
  }
  for (var i = 0; i < el.length; i++) {
    el[i].addEventListener("mouseenter", showSub, false);
    el[i].addEventListener("mouseleave", hideSub, false);
  }
  function showSub(e) {
    if (this.children.length > 1) {
      this.parentNode.style.border = "none";
      this.children[0].classList.add("open");
      this.children[1].classList.add("open");
    } else {
      return false;
    }
  }
  function hideSub(e) {
    if (this.children.length > 1) {
      this.children[0].classList.remove("open");
      this.children[1].classList.remove("open");
    } else {
      return false;
    }
  }

  // Шапка летающая, навигация на телефоне
  var headerFly = document.querySelectorAll(".header-fly"),
    header = document.querySelector("header").clientHeight;
  function scrollPage() {
    if (window.pageYOffset > header + 20) {
      for (let i = 0; i < headerFly.length; i++) {
        headerFly[i].classList.add("open");
      }
    } else {
      for (let i = 0; i < headerFly.length; i++) {
        headerFly[i].classList.remove("open");
      }
    }
  }
  window.addEventListener("scroll", () => {
    scrollPage();
  });
  scrollPage();

  // Характеристики
  var characteristicsBtn = document.querySelector(".characteristics-wrapper a"),
    characteristicsWrapper = document.querySelector(".characteristics-wrapper"),
    characteristics = document.querySelector(
      ".characteristics-wrapper .some-class"
    );
  if (characteristics) {
    characteristicsWrapper.classList.add("open");
    characteristicsBtn.addEventListener("click", () => {
      if (characteristicsWrapper.classList.contains("open")) {
        characteristicsWrapper.classList.remove("open");
        gsap.to(characteristics, { height: 0, duration: 0.75 });
      } else {
        characteristicsWrapper.classList.add("open");
        gsap.to(characteristics, { height: "auto", duration: 0.75 });
      }
    });
  }

  // Сортировка и фильтры
  function catalog() {
    var select = document.querySelector(".select"),
      selectWrapper = document.querySelector(".select-wrapper"),
      catalogBtnColumn = document.querySelector(".catalog_block-btn-column"),
      catalogBtnRow = document.querySelector(".catalog_block-btn-row"),
      productsCards = document.querySelector(".products-cards"),
      selectOption = document.querySelectorAll(".select-option"),
      selectBtn = document.querySelector(".select-text");
    if (catalogBtnColumn) {
      catalogBtnColumn.addEventListener("click", () => {
        productsCards.classList.remove("products-cards-row");
        productsCards.classList.add("products-cards-column");
      });
      catalogBtnRow.addEventListener("click", () => {
        productsCards.classList.remove("products-cards-column");
        productsCards.classList.add("products-cards-row");
      });
    }
    function closeSelect() {
      select.classList.remove("open");
      gsap.to(selectWrapper, { height: 0, y: -20, duration: 0.65 });
    }
    if (selectBtn) {
      selectBtn.addEventListener("click", () => {
        if (select.classList.contains("open")) {
          closeSelect();
        } else {
          select.classList.add("open");
          gsap.to(selectWrapper, { height: "auto", y: 0, duration: 0.65 });
        }
      });
    }
    selectOption.forEach((el) => {
      el.addEventListener("click", (e) => {
        selectBtn.innerHTML = e.target.innerText;
        closeSelect();
      });
    });
  }
  catalog();
  let observer = new MutationObserver(() => {
    catalog();
  });
  if (document.querySelector(".products-cards")) {
    observer.observe(document.querySelector(".products-cards"), {
      childList: true, // наблюдать за непосредственными детьми
      subtree: true, // и более глубокими потомками
    });
  }
  var headingFilters = document.querySelectorAll(
      ".filters-wrapper .searchandfilter ul h4"
    ),
    filtersBtn = document.querySelector(".filters-btn"),
    filtersWrapper = document.querySelector(".filters-wrapper"),
    filtersClose = document.querySelector(".filters-close");
  if (filtersWrapper) {
    for (let i = 0; i < headingFilters.length; i++) {
      const element = headingFilters[i];
      element.addEventListener("click", (e) => {
        console.log(e.target.nextElementSibling);
        if (e.target.classList.contains("close")) {
          e.target.classList.remove("close");
          gsap.to(e.target.nextElementSibling, {
            height: "auto",
            opacity: 1,
            duration: 0.65,
          });
        } else {
          e.target.classList.add("close");
          gsap.to(e.target.nextElementSibling, {
            height: 0,
            opacity: 0,
            duration: 0.65,
          });
          if (!e.target.nextElementSibling.classList.contains("gsapOverflow")) {
            e.target.nextElementSibling.classList.add("gsapOverflow");
          }
        }
      });
    }
    filtersBtn.addEventListener("click", () => {
      filtersWrapper.classList.add("open");
    });
    filtersClose.addEventListener("click", () => {
      filtersWrapper.classList.remove("open");
    });
  }

  // Блокировка скролла
  var check = false;
  let disableScroll = function () {
    let pagePosition = window.scrollY;
    document.body.classList.add("disable-scroll");
    document.body.dataset.position = pagePosition;
    document.body.style.top = -pagePosition + "px";
    check = false;
  };
  let enableScroll = function () {
    let pagePosition = parseInt(document.body.dataset.position, 10);
    document.body.style.top = "auto";
    document.body.classList.remove("disable-scroll");
    window.scroll({ top: pagePosition, left: 0 });
    document.body.removeAttribute("data-position");
    check = true;
  };

  // Удаление уведомления
  var woocommerceMessage = document.querySelectorAll(".woocommerce-message");
  if (document.querySelector(".woocommerce-message")) {
    setTimeout(() => {
      for (let i = 0; i < woocommerceMessage.length; i++) {
        const element = woocommerceMessage[i];
        element.remove();
      }
    }, 5000);
  }

  // Меню, попапы
  var closePhonePopup = document.querySelectorAll(".close-phone-popup");
  var phonePopup = document.querySelectorAll(".phone-popup");
  var phoneMenu = document.querySelector("button[name='phoneMenu']");
  var phoneSearch = document.querySelector("button[name='phoneSearch']");
  phoneSearch.addEventListener("click", () => {
    document.querySelector(".phone-search").classList.add("open");
    disableScroll();
  });
  phoneMenu.addEventListener("click", () => {
    document.querySelector(".phone-menu").classList.add("open");
    disableScroll();
  });
  for (let i = 0; i < closePhonePopup.length; i++) {
    closePhonePopup[i].addEventListener("click", () => {
      for (let i = 0; i < phonePopup.length; i++) {
        phonePopup[i].classList.remove("open");
        for (let i = 0; i < phoneCatalogBtn.length; i++) {
          phoneCatalogBtn[i].classList.remove("open");
        }
        if (check == false) {
          enableScroll();
        }
      }
    });
  }

  var phoneCatalogLink = document.querySelectorAll(".phone-catalog a");
  var phoneCatalogBack = document.querySelector(
    "button[name='phoneCatalogBack']"
  );
  let arr = [];
  let arrText = [];
  for (let i = 0; i < phoneCatalogLink.length; i++) {
    const element = phoneCatalogLink[i];
    if (element.nextElementSibling) {
      element.classList.add("arrow");
    }
    element.addEventListener("click", (e) => {
      if (e.target.nextElementSibling) {
        e.preventDefault();
        e.target.nextElementSibling.classList.add("open");
        document.querySelector(".phone-popup-heading").innerHTML =
          e.target.innerHTML;
        document.querySelector(".phone-popup-heading").classList.add("fz16");
        document.querySelector(".phone-popup-back").style.display = "block";
        arr.push(e.target.nextElementSibling.classList[1]);
        arrText.push(e.target.innerHTML);
      }
    });
  }
  phoneCatalogBack.addEventListener("click", () => {
    var arrlist = document.querySelectorAll(`.${arr[arr.length - 1]}`);
    for (let i = 0; i < arrlist.length; i++) {
      const element = arrlist[i];
      if (element.classList.contains("open")) {
        element.classList.remove("open");
        if (arrText[arrText.length - 2]) {
          document.querySelector(".phone-popup-heading").innerHTML =
            arrText[arrText.length - 2];
        } else {
          document.querySelector(".phone-popup-heading").innerHTML = "Каталог";
          document
            .querySelector(".phone-popup-heading")
            .classList.remove("fz16");
          document.querySelector(".phone-popup-back").style.display = "none";
        }
        arr.pop();
        arrText.pop();
      }
    }
  });
});
