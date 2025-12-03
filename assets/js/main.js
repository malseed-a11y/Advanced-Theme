const generalMsgs = {
  invalidNumber: "الرقم غير صالح",
  onlyEnglishNumbers: "يمكنك إدخال ارقام انجليزية فقط",
  wrong_password: "كلمة المرور غير متطابقة",
  successful_login: "تم تسجيل الدخول بنجاح",
  successful_register: "تم تسجيل الدخول بنجاح",
  fill_inputs: "الرجاء تعبئة جميع الحقول",
  saved_successfully: "تم حفظ المعلومات بنجاح",
  subscription_cancel_alert_title: "هل أنت متأكد؟",
  subscription_cancel_alert_text: "سيتم إلغاء الاشتراك بشكل نهائي !",
  subscription_cancel_alert_confirm_btn_text: "نعم، إلغاء !",
  subscription_cancel_alert_cancel_btn_text: "لا تهتم",
  subscription_cancel_alert_cancel_success_mesg: "تم إلغاء الاشتراك بنجاح",
  has_been_followed: "تمت المتابعة",
  register_to_follow: "يرجى تسجيل الدخول للمتابعة",
  follow_has_been_cancelled: "تم الغاء المتابعة",
};

var isMobile = window.matchMedia("(max-width: 1024px)");

/* ===[Start Global Observer]=== */
function globalObserverLoader(
  action = null,
  elements = document.querySelectorAll("[data-observable]"),
  delay = 250
) {
  var elemnets_to_track = elements;

  const globalObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (action !== null) {
          if (delay !== 0) {
            setTimeout(() => {
              action();
            }, delay);
          }

          if (delay <= 0) {
            action();
          }
        }
      }
    });
  });

  elemnets_to_track.forEach((target) => {
    globalObserver.observe(target);
  });
}
/* ===[End Global Observer]=== */

/* ===[Start Run/Pause Slider]=== */
function autoplayController(e) {
  let currentSlider = e.closest(".swiper").swiper;
  let _this = e;
  let playBtn = _this.querySelector(".start-slider");
  let pauseBtn = _this.querySelector(".pause-slider");

  if (currentSlider.autoplay.running) {
    currentSlider.autoplay.pause();
    currentSlider.autoplay.running = false;
    pauseBtn.style.opacity = "0";
    playBtn.style.opacity = "1";
    return;
  }

  currentSlider.autoplay.start();
  pauseBtn.style.opacity = "1";
  playBtn.style.opacity = "0";
}
/* ===[End Run/Pause Slider]=== */

window.addEventListener("DOMContentLoaded", function () {
  /* ===[Start Mobile Header]=== */
  if (isMobile.matches) {
    // Toggle Menu by burger
    let burgerMenu = document.querySelector(".burger-menu");

    burgerMenu.addEventListener("click", function () {
      this.classList.toggle("burger-toggled");
      let navHeader = this.closest(".top-header").nextElementSibling;
      navHeader.classList.toggle("nav-opened");
    });

    // Handle open sub menus
    let mobileMenuNav = document.querySelector(".bottom-header");

    document.querySelectorAll(".sub-menu .sub-menu").forEach((subMenu) => {
      subMenu.classList.add("next-level");
    });

    mobileMenuNav.addEventListener("click", function (e) {
      e.stopPropagation();
      let clickedItem = e.target;

      if (clickedItem.tagName === "A") {
        document.querySelector(".nav-opened")?.classList.remove("nav-opened");
        document
          .querySelector(".burger-toggled")
          ?.classList.remove("burger-toggled");
        document.querySelectorAll(".sub-menu")?.forEach((subMenu) => {
          subMenu.style.display = "none";
          mobileMenuNav
            .querySelectorAll(".menu-item-has-children .dropdown-arrow")
            ?.forEach((e) => {
              e.style.transform = "rotateX(0deg)";
            });
        });
      }

      if (clickedItem.classList.contains("dropdown-arrow")) {
        // In case of clicking outside but not the nested level of sub menu
        if (!clickedItem.nextElementSibling.classList.contains("next-level")) {
          document.querySelectorAll(".sub-menu").forEach((subMenu) => {
            subMenu.style.display = "none";
            mobileMenuNav
              .querySelectorAll(".menu-item-has-children .dropdown-arrow")
              .forEach((e) => {
                e.style.transform = "rotateX(0deg)";
              });
          });

          document.querySelectorAll(".next-level").forEach((nextLevel) => {
            nextLevel.classList.remove("opened");
            clickedItem.style.transform = "rotateX(0deg)";
          });
        }

        // In case of opening already opened sub menu (It will close)
        if (clickedItem.nextElementSibling.classList.contains("opened")) {
          // To change arrow direction for nested opened sub menus
          clickedItem
            .closest(".menu-item-has-children")
            .querySelectorAll(".sub-menu .dropdown-arrow")
            .forEach((e) => (e.style.transform = "rotateX(0deg)"));

          // Close sub menus when close their parent
          clickedItem
            .closest(".menu-item-has-children")
            .querySelectorAll(".sub-menu")
            .forEach((subMenu) => {
              subMenu.style.display = "none";
              subMenu.classList.remove("opened");
            });

          clickedItem.nextElementSibling.style.display = "none";
          clickedItem.nextElementSibling.classList.remove("opened");
          clickedItem.style.transform = "rotateX(0deg)";
        }

        // In case of click the arrow to open a closed sub menu (It will open) (SIBLINGS)
        else {
          if (
            document.querySelectorAll(".sub-menu.opened").length > 0 &&
            !clickedItem.nextElementSibling.classList.contains("next-level")
          ) {
            document
              .querySelectorAll(".sub-menu.opened")
              .forEach((subMenuOpened) => {
                subMenuOpened.classList.remove("opened");
              });
          }

          if (
            !clickedItem.nextElementSibling.classList.contains("next-level")
          ) {
            document
              .querySelectorAll(".menu-arrow")
              .forEach(
                (menuArrow) => (menuArrow.style.transform = "rotateY(0deg)")
              );
          }

          clickedItem.nextElementSibling.style.display = "block";
          clickedItem.nextElementSibling.classList.add("opened");
          clickedItem.style.transform = "rotate(180deg)";
        }
      }

      // In case if the click isn't on the arrow
      else {
        // if the clicked element isn't containing menu-item class which is the <li> then close any opened sub menus
        if (!clickedItem.parentElement.classList.contains("sub-menu")) {
          document
            .querySelectorAll(".dropdown-arrow")
            .forEach(
              (menuArrow) => (menuArrow.style.transform = "rotateY(0deg)")
            );

          document.querySelectorAll(".sub-menu").forEach((subMenu) => {
            subMenu.style.display = "none";
            subMenu.classList.remove("opened");
          });
        }
      }
    });
    /* ===[End Mobile Header]=== */
  }

  /* ===[Start Hero Section]=== */
  if (Swiper) {
    var heroSectionSwiper = new Swiper(".hero-section-swiper", {
      rewind: true,

      autoplay: {
        delay: 3000,
      },

      pagination: {
        el: ".hero-section-pagination",
        clickable: true,
      },
    });
  }
  /* ===[End Hero Section]=== */

  /* ===[Start Custom File Upload]=== */
  document
    .querySelector("input[type=file]")
    ?.addEventListener("change", (e) => {
      let currentFileUpload = e.target;
      let filename = currentFileUpload.files[0]?.name;
      let fileUploadText = currentFileUpload
        .closest("label")
        .querySelector(".upload-file-text");

      if (currentFileUpload.files.length > 0) {
        fileUploadText.innerHTML = filename;
      } else {
        fileUploadText.innerHTML = "ارفع ملف او صورة";
      }
    });
  /* ===[End Custom File Upload]=== */

  /* ===[Start Count the header for scroll to anchor]=== */
  function correctScrollToAnchor() {
    let links = document.querySelectorAll('header nav a[href^="#"]');
    let headerHeight = document.querySelector("header").clientHeight;

    links?.forEach((link) => {
      link.addEventListener("click", function (ele) {
        let anchorTarget = this.getAttribute("href");

        if (anchorTarget && anchorTarget.length <= 1) {
          return;
        }

        if (anchorTarget && anchorTarget.length > 1) {
          ele.preventDefault();
          let anchorTargetPosition = document?.querySelector(anchorTarget);
          let scrollToCalc =
            anchorTargetPosition?.getBoundingClientRect().top +
            window.scrollY -
            headerHeight -
            20;
          window.location.hash = anchorTarget;
          window.scrollTo(0, scrollToCalc);
        }
      });
    });
  }

  correctScrollToAnchor();

  window.addEventListener("resize", correctScrollToAnchor());
  /* ===[End Count the header for scroll to anchor]=== */

  /* ===[Start only number validation]=== */
  let numInputs = document.querySelectorAll(".only-number");
  let pressedKey;
  let inputValLength = 0;
  let isPlusRequired = true;

  numInputs.forEach((theInput) => {
    theInput.addEventListener("input", function (e) {
      pressedKey = e.data?.charCodeAt(0);
      inputValLength = e.target.value.length;

      if (isPlusRequired) {
        if (e.target.value.length <= 1 && e.data !== null) {
          e.target.value = `+${e.target.value}`;
        }

        if (e.target.value.length > 1) {
          if (
            !(
              (pressedKey >= 48 && pressedKey <= 57) ||
              (pressedKey >= 1632 && pressedKey <= 1641)
            )
          ) {
            e.target.value = e.target.value.replace(e.data, "");
          }
        }
      } else {
        if (
          !(
            (pressedKey >= 48 && pressedKey <= 57) ||
            (pressedKey >= 1632 && pressedKey <= 1641)
          )
        ) {
          e.target.value = e.target.value.replace(e.data, "");
        }
      }
    });

    theInput.addEventListener("paste", function (e) {
      e.preventDefault();
      inputValLength = e.target.value.length;

      let pastedText = e.clipboardData.getData("text/plain").replace(/\D/g, "");

      if (isPlusRequired) {
        if (e.data !== null) {
          e.target.value = `+${pastedText}`;
        }
      }
    });
  });
  /* ===[End only number validation]=== */

  /* ===[Start Counter Animation]=== */
  let counterAnimation = document.querySelectorAll(".statistic-item");

  if (counterAnimation.length > 0) {
    function animateOdometer(
      elemnetsClass,
      duration,
      bigNumbersConsidration = false
    ) {
      let targetNumber = 0;
      let targettedElements = document.querySelectorAll(elemnetsClass);

      targettedElements.forEach((singleElement) => {
        singleElement.closest(".item-value").style.opacity = "1";
        let startNumber =
          parseInt(singleElement.textContent.replace(/,/g, "")) || 0;
        let startTime = performance.now();

        function updateNumber(currentTime) {
          targetNumber = singleElement.dataset.value;
          let elapsed = currentTime - startTime;
          let progress;

          if (bigNumbersConsidration) {
            if (targetNumber > 100000) {
              progress = Math.min(elapsed / (duration * 2), 1);
            } else {
              progress = Math.min(elapsed / duration, 1);
            }
          } else {
            progress = Math.min(elapsed / (duration * 2), 1);
          }

          let currentNumber = Math.round(
            startNumber + progress * (targetNumber - startNumber)
          );
          let formattedNumber = currentNumber.toLocaleString();

          singleElement.textContent = `${formattedNumber}`;

          if (progress < 1) {
            requestAnimationFrame(updateNumber);
          }
        }

        requestAnimationFrame(updateNumber);
      });
    }

    globalObserverLoader(
      animateOdometer(".statistic-item .odometer", 2000, true),
      document.querySelectorAll(".statistic-item"),
      0
    );
  }
  /* ===[End Counter Animation]=== */

  /* ===[Start Dynamic Statistics Layout]=== */
  if (!window.matchMedia("(max-width: 991px)").matches) {
    console.log("dsadsa");

    var statistics_elements = document.querySelectorAll(
      ".statistics-box .statistic-item"
    );
    var statistics_elements_length = statistics_elements.length;

    if (statistics_elements_length % 3 === 0) {
      statistics_elements.forEach((element) => {
        element.style.borderBottomLeftRadius = "8px";
        statistics_elements[
          statistics_elements_length - 2
        ].style.borderBottomLeftRadius = "64px";
      });
    }

    if (statistics_elements_length % 3 === 1) {
      statistics_elements.forEach((element) => {
        element.style.borderBottomLeftRadius = "8px";
      });

      statistics_elements[statistics_elements_length - 1].style.gridColumn =
        "span 2";
      statistics_elements[
        statistics_elements_length - 1
      ].style.borderBottomLeftRadius = "64px";
    }

    if (statistics_elements_length % 3 === 2) {
      statistics_elements.forEach((element) => {
        element.style.borderBottomLeftRadius = "8px";
      });

      statistics_elements[statistics_elements_length - 1].style.flexDirection =
        "row";
      statistics_elements[
        statistics_elements_length - 1
      ].style.borderBottomLeftRadius = "64px";
    }
  }

  /* ===[End Dynamic Statistics Layout]=== */
});

/* ===[Start Clock Widget]=== */
(function ($) {
  /**
   * Clock Class.
   */
  class Clock {
    /**
     * Constructor
     */
    constructor() {
      this.initializeClock();
    }

    /**
     * initializeClock
     */
    initializeClock() {
      setInterval(() => this.time(), 1000);
    }

    /**
     * Numpad
     *
     * @param {String} str String
     *
     * @return {string} String
     */
    numPad(str) {
      const cStr = str.toString();
      if (2 > cStr.length) {
        str = 0 + cStr;
      }
      return str;
    }

    /**
     * Time
     */
    time() {
      const currDate = new Date();
      const currSec = currDate.getSeconds();
      const currMin = currDate.getMinutes();
      const curr24Hr = currDate.getHours();
      const ampm = 12 <= curr24Hr ? "pm" : "am";
      let currHr = curr24Hr % 12;
      currHr = currHr ? currHr : 12;

      const stringTime =
        currHr + ":" + this.numPad(currMin) + ":" + this.numPad(currSec);
      const timeEmojiEl = $("#time-emoji");

      if (5 <= curr24Hr && 17 >= curr24Hr) {
        timeEmojiEl.text("🌞");
      } else {
        timeEmojiEl.text("🌜");
      }

      $("#time").text(stringTime);
      $("#ampm").text(ampm);
    }
  }

  new Clock();
})(jQuery);
/* ===[End Clock Widget]=== */
