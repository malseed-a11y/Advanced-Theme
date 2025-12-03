<?php /* Template Name: HomePage */ ?>
<?php get_header(); ?>

<!-- Start Here Section -->
<section class="hero-section">
    <div class="hero-section-decor"></div>
    <div class="container-fluid">
        <div class="swiper custom-swiper hero-section-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <?php
                    if (is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))) { ?>
                        <img rel="preload" as="image" src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-1-mobile.png?v=1'; ?>" class="lazyload" />
                    <?php } else { ?>
                        <img rel="preload" as="image" src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-1.png?v=1'; ?>" class="lazyload" />
                    <?php }
                    ?>
                </div>

                <div class="swiper-slide">
                    <?php
                    if (is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))) { ?>
                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-2-mobile.png?v=1'; ?>" class="lazyload" />
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-2.png?v=1'; ?>" class="lazyload" />
                    <?php }
                    ?>
                </div>

                <div class="swiper-slide">
                    <?php
                    if (is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))) { ?>
                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-3-mobile.png?v=1'; ?>" class="lazyload" />
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-3.png?v=1'; ?>" class="lazyload" />
                    <?php }
                    ?>                    
                </div>

                <div class="swiper-slide">
                    <?php
                    if (is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))) { ?>
                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-4-mobile.png?v=1'; ?>" class="lazyload" />
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/hero-section-slide-4.png?v=1'; ?>" class="lazyload" />
                    <?php }
                    ?>
                </div>
            </div>

            <!-- Pagination -->
            <div class="slider-controllers">
                <div class="start-or-pause" onclick="autoplayController(this)">
                    <span class="controller-btn start-slider"><i class="fa-solid fa-play"></i></span>
                    <span class="controller-btn pause-slider"><i class="fa-solid fa-pause"></i></span>
                </div>

                <div class="swiper-pagination hero-section-pagination custom-swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- End Here Section -->

<!-- Start About Us Section -->
<section id="about-us" class="about-us-section my-5">
    <div class="container">
        <div class="about-us-holder">
            <h2 class="growink-title large-title primary-title-color bold-title">حول الشركة</h2>
            <p class="growink-paragraph mb-2">انطلقت Growink في أوائل عام 2021 كمظلة لمشاريع التجارة الإلكترونية التي تأسست من قبل 2P ابتداءً من عام 2016. تهدف الشركة إلى الاستثمار والتوسع في مختلف القطاعات التجارية، وتسعى لتحقيق مزيد من النمو والتوسع من خلال مبادرات ومشاريع متنوعة تستهدف العديد من الأسواق المحلية والعالمية.</p>

            <div class="about-us-cards my-5">
                <div class="decor top-decor">
                    <?php include get_template_directory() . '/dist/imgs/green-rec-decor.svg' ?>
                </div>

                <div class="decor bottom-decor">
                    <?php include get_template_directory() . '/dist/imgs/green-cir-decor.svg' ?>
                </div>


                <div class="about-us-item about-message blurry-bg">
                    <div class="about-us-item-title">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/message-icon.png'; ?>" alt="" class="lazyload">
                        <span>الرسالة</span>
                    </div>

                    <div class="about-us-item-desc">
                        <span class="growink-paragraph">التوسع الاستثماري في مختلف قطاعات التجارة، وتحقيق مزيد من النمو من خلال مبادرات ومشاريع متنوعة تستهدف العديد من الأسواق المحلية والعالمية</span>
                    </div>
                </div>

                <div class="about-us-item about-vision blurry-bg">
                    <div class="about-us-item-title">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/vision-icon.png'; ?>" alt="" class="lazyload">
                        <span>الرؤية</span>
                    </div>

                    <div class="about-us-item-desc">
                        <span class="growink-paragraph">نطمح لابتكار مشاريع تجارية ذات كفاءة عالية، متبعين أفضل نماذج العمل نجاحاً</span>
                    </div>
                </div>

                <div class="about-us-item about-mission blurry-bg">
                    <div class="about-us-item-title">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/mission-icon.png'; ?>" alt="" class="lazyload">
                        <span>الأهداف</span>
                    </div>

                    <div class="about-us-item-desc">
                        <span class="growink-paragraph">تهدف الشركة إلى الاستثمار والتوسع في مختلف القطاعات التجارية، وتسعى لتحقيق مزيد من النمو والتوسع من خلال مبادرات ومشاريع متنوعة تستهدف العديد من الأسواق المحلية والعالمية.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us Section -->

<!-- Start Our Values Section -->
<section id="our-values" class="our-values normal-margin">
    <div class="container">
        <h2 class="growink-title large-title primary-title-color bold-title">قيمنا</h2>

        <div class="values-box-holder" style="--clr: #01AE9D;">
            <div class="decor top-decor">
                <?php include get_template_directory() . '/dist/imgs/yellow-rec-decor.svg' ?>
            </div>

            <div class="decor bottom-decor">
                <?php include get_template_directory() . '/dist/imgs/yellow-cir-decor.svg' ?>
            </div>

            <div class="values-box blurry-bg">
                <div class="value-item">
                    <span>الجودة</span>
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/quality-icon.png'; ?>" alt="" class="lazyload">
                </div>

                <div class="value-item">
                    <span>الثقة</span>
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/trustability-icon.png'; ?>" alt="" class="lazyload">
                </div>

                <div class="value-item">
                    <span>الكفاءة</span>
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/efficiency-icon.png'; ?>" alt="" class="lazyload">
                </div>

                <div class="value-item">
                    <span>الريادة</span>
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/leadership-icon.png'; ?>" alt="" class="lazyload">
                </div>

                <div class="value-item">
                    <span>الإبداع</span>
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/creativity-icon.png'; ?>" alt="" class="lazyload">
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Our Values Section -->

<!-- Start Growink Statistics -->
<section id="statistics" class="growink-statistics-section normal-margin">
    <div class="section-decor"></div>
    <div class="container">
        <h2 class="growink-title large-title primary-title-color bold-title">الشركة في ارقام</h2>

        <div class="statistics-holder">
            <div class="decor top-decor">
                <?php include get_template_directory() . '/dist/imgs/green-rec-decor.svg' ?>
            </div>

            <div class="decor bottom-decor">
                <?php include get_template_directory() . '/dist/imgs/blue-cir-decor.svg' ?>
            </div>

            <div class="statistics-box my-4 my-md-5">
                <div class="statistic-item happy-clients">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="1000">0</span>
                        </span>
                        <span class="item-title">عميل سعيد</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/happy-customer.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>

                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>

                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
                <div class="statistic-item high-quality-products">
                    <div class="statistic-item-info">
                        <span class="item-value">
                            <span>+</span>
                            <span class="odometer" data-value="4000">0</span>
                        </span>
                        <span class="item-title">منتج عالي الجودة</span>
                    </div>

                    <div class="statistic-item-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/high-quality-product.png'; ?>" alt="" class="lazyload">
                    </div>
                </div>   
           
           
                 
            </div>
        </div>

    </div>
</section>
<!-- End Growink Statistics -->

<!-- Start Contact us section -->
<section id="contact-us" class="contact-us-section">
    <div class="container">
        <h2 class="growink-title large-title primary-title-color bold-title">اتصل بنا</h2>
        <?php echo do_shortcode('[contact-form-7 id="7f79f34" title="Contact Form"]'); ?>
    </div>
</section>
<!-- End Contact us section -->

<?php get_footer(); ?>