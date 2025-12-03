const generalMsgs = {
    invalidNumber: "الرقم غير صالح",
    onlyEnglishNumbers: "يمكنك إدخال ارقام انجليزية فقط",
    wrong_password: "كلمة المرور غير متطابقة",
    successful_login: "تم تسجيل الدخول بنجاح",
    successful_register: "تم تسجيل الدخول بنجاح",
    fill_inputs: "الرجاء تعبئة جميع الحقول",
    saved_successfully: "تم حفظ المعلومات بنجاح",
    subscription_cancel_alert_title: 'هل أنت متأكد؟',
    subscription_cancel_alert_text: 'سيتم إلغاء الاشتراك بشكل نهائي !',
    subscription_cancel_alert_confirm_btn_text: 'نعم، إلغاء !',
    subscription_cancel_alert_cancel_btn_text: 'لا تهتم',
    subscription_cancel_alert_cancel_success_mesg: 'تم إلغاء الاشتراك بنجاح',
    has_been_followed: 'تمت المتابعة',
    register_to_follow: 'يرجى تسجيل الدخول للمتابعة',
    follow_has_been_cancelled: 'تم الغاء المتابعة',
    number_should_start_with_plus: 'الرقم يجب أن يبدأ بإشارة +'
};

window.addEventListener('DOMContentLoaded', function () {
    
    /* ===[Start Mobile Header]=== */
    var isMobile = window.matchMedia("(max-width: 1024px)");
    if (isMobile.matches) {
        // Toggle Menu by burger
        let burgerMenu = document.querySelector('.burger-menu');

        burgerMenu.addEventListener('click', function () {
            this.classList.toggle('burger-toggled');
            let navHeader = this.closest('.top-header').nextElementSibling;
            navHeader.classList.toggle('nav-opened');
        });

        // Handle open sub menus
        let mobileMenuNav = document.querySelector('.bottom-header');

        document.querySelectorAll('.sub-menu .sub-menu').forEach((subMenu) => {
            subMenu.classList.add('next-level');
        });

        mobileMenuNav.addEventListener('click', function (e) {
            e.stopPropagation();
            let clickedItem = e.target;

            if (clickedItem.tagName === "A") {
                document.querySelector('.nav-opened')?.classList.remove('nav-opened');
                document.querySelector('.burger-toggled')?.classList.remove('burger-toggled');
                document.querySelectorAll('.sub-menu')?.forEach((subMenu) => {
                    subMenu.style.display = 'none';
                    mobileMenuNav.querySelectorAll('.menu-item-has-children .dropdown-arrow')?.forEach((e) => {
                        e.style.transform = 'rotateX(0deg)';
                    });
                });
            }

            if (clickedItem.classList.contains('dropdown-arrow')) {

                // In case of clicking outside but not the nested level of sub menu
                if (!clickedItem.nextElementSibling.classList.contains('next-level')) {
                    document.querySelectorAll('.sub-menu').forEach((subMenu) => {
                        subMenu.style.display = 'none';
                        mobileMenuNav.querySelectorAll('.menu-item-has-children .dropdown-arrow').forEach((e) => {
                            e.style.transform = 'rotateX(0deg)';
                        })
                    });

                    document.querySelectorAll('.next-level').forEach((nextLevel) => {
                        nextLevel.classList.remove('opened');
                        clickedItem.style.transform = 'rotateX(0deg)';
                    })
                }

                // In case of opening already opened sub menu (It will close)
                if (clickedItem.nextElementSibling.classList.contains('opened')) {

                    // To change arrow direction for nested opened sub menus
                    clickedItem.closest('.menu-item-has-children')
                        .querySelectorAll('.sub-menu .dropdown-arrow')
                        .forEach((e) => e.style.transform = 'rotateX(0deg)');

                    // Close sub menus when close their parent
                    clickedItem.closest('.menu-item-has-children').querySelectorAll('.sub-menu').forEach((subMenu) => {
                        subMenu.style.display = 'none';
                        subMenu.classList.remove('opened');
                    });

                    clickedItem.nextElementSibling.style.display = 'none';
                    clickedItem.nextElementSibling.classList.remove('opened');
                    clickedItem.style.transform = 'rotateX(0deg)';
                }

                // In case of click the arrow to open a closed sub menu (It will open) (SIBLINGS)
                else {
                    if (document.querySelectorAll('.sub-menu.opened').length > 0 && !clickedItem.nextElementSibling.classList.contains('next-level')) {
                        document.querySelectorAll('.sub-menu.opened').forEach((subMenuOpened) => {
                            subMenuOpened.classList.remove('opened');
                        })
                    }

                    if (!clickedItem.nextElementSibling.classList.contains('next-level')) {
                        document.querySelectorAll('.menu-arrow').forEach((menuArrow) => menuArrow.style.transform = 'rotateY(0deg)');
                    }

                    clickedItem.nextElementSibling.style.display = 'block';
                    clickedItem.nextElementSibling.classList.add('opened');
                    clickedItem.style.transform = 'rotate(180deg)';
                }
            }

            // In case if the click isn't on the arrow
            else {
                // if the clicked element isn't containing menu-item class which is the <li> then close any opened sub menus
                if (!clickedItem.parentElement.classList.contains('sub-menu')) {
                    document.querySelectorAll('.dropdown-arrow').forEach((menuArrow) => menuArrow.style.transform = 'rotateY(0deg)');

                    document.querySelectorAll('.sub-menu').forEach((subMenu) => {
                        subMenu.style.display = 'none';
                        subMenu.classList.remove('opened');
                    });
                }
            }
        });
        /* ===[End Mobile Header]=== */
    }

   

    

    
    

    /* ===[Start only number validation]=== */
    let numInputs = document.querySelectorAll('.only-number');
    
    numInputs.forEach((theInput) => {
        theInput.addEventListener('input', function(e){
            var pressedKey = e.data.charCodeAt(0);

            if (e.target.value.length <= 1) {
                e.target.value = `+${e.target.value}`;
            }

            if (e.target.value.length > 1) {
                if ((pressedKey >= 48 && pressedKey <= 57) || (pressedKey >= 1632 && pressedKey <= 1641)) {
                } else {
                    e.target.value = e.target.value.slice(0, -1);
                }
            }
        });
    });
    /* ===[End only number validation]=== */
});

// ============== Non Document Ready Based =============
/* ===[Start Run/Pause Slider]=== */
function autoplayController(e) {
    let currentSlider = e.closest('.swiper').swiper;
    let _this = e;
    let playBtn = _this.querySelector('.start-slider');
    let pauseBtn = _this.querySelector('.pause-slider');

    if (currentSlider.autoplay.running) {
        currentSlider.autoplay.pause();
        currentSlider.autoplay.running = false;
        pauseBtn.style.opacity = '0';
        playBtn.style.opacity = '1';
        return;
    }

    currentSlider.autoplay.start();
    pauseBtn.style.opacity = '1';
    playBtn.style.opacity = '0';
}
/* ===[End Run/Pause Slider]=== */