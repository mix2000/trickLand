<?php
const HTTP_LAND_PATH = 'http://x-out.ru/land';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа боевой акробатики X-OUT, школа трикинга в Санкт-Петербурге!</title>
    <meta name="description"
          content="Школа боевой акробатики X-OUT, школа трикинга в Санкт-Петербурге! У нас вы сможете научиться делать сальто назад, бить вертушку, ходить на руках ">
    <meta name="keywords"
          content="акробатика, трикинг, спб, вертушка, бессплатное занятия, петроградская">
    <!--
    TODO: заголовки
    -->
    <meta name="robots" content="index,follow">

    <meta property="og:title" content="Школа боевой акробатики X-OUT, школа трикинга в Санкт-Петербурге!">
    <meta property="og:url" content="https://x-out.ru">
    <meta property="og:site_name" content="X-OUT">
    <meta property="og:description"
          content="Школа боевой акробатики X-OUT, школа трикинга в Санкт-Петербурге! У нас вы сможете научиться делать сальто назад, бить вертушку, ходить на руках">
    <meta property="og:image" content="https://teampulse.nl/storage/app/media/Teampulse.jpg">

    <link rel="icon" type="image/png" href="<?= HTTP_LAND_PATH; ?>/ico/i_32_32.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="<?= HTTP_LAND_PATH; ?>/ico/i_32_32.jpg">
    <link href="<?= HTTP_LAND_PATH; ?>/ico/i_76_76.jpg" rel="apple-touch-icon" sizes="76x76">
    <link href="<?= HTTP_LAND_PATH; ?>/ico/i_120_120.jpg" rel="apple-touch-icon" sizes="120x120">
    <link href="<?= HTTP_LAND_PATH; ?>/ico/i_152_152.jpg" rel="apple-touch-icon" sizes="152x152">
    <link href="<?= HTTP_LAND_PATH; ?>/ico/i_180_180.jpg" rel="apple-touch-icon" sizes="180x180">
    <link href="<?= HTTP_LAND_PATH; ?>/ico/i_192_192.jpg" rel="icon" sizes="192x192">
    <link href="<?= HTTP_LAND_PATH; ?>/ico/i_128_128.jpg" rel="icon" sizes="128x128">

    <!-- Google Webfont -->
    <link href="<?= HTTP_LAND_PATH; ?>/dataFiles/css" rel="stylesheet" type="text/css">

    <link href="<?= HTTP_LAND_PATH; ?>/dataFiles/style2.css?ver=1"
          rel="stylesheet">

</head>

<body class="body loaded">

<!-- Header -->
<header class="header">
    <div class="header__top">
        <div class="header__top-container">

            <div class="header__nav">
                <nav class="nav">
                    <ul class="nav__list">

                        <li class="nav__list-item"><a href="<?='http://'.$_SERVER['SERVER_NAME'];?>/#over"
                                                      class="nav__list-item-link">Что же такое трикинг?</a></li>
                        <li class="nav__list-item"><a href="<?='http://'.$_SERVER['SERVER_NAME'];?>/#features"
                                                      class="nav__list-item-link">О
                                нас</a>
                        </li>
                        <li class="nav__list-item"><a href="<?='http://'.$_SERVER['SERVER_NAME'];?>/#contact"
                                                      class="nav__list-item-link">Контакты</a>
                        </li>
                        <li class="nav__list-item"><a href="<?='http://'.$_SERVER['SERVER_NAME'];?>/#registreer"
                                                      class="nav-list-item-btn btn--open">Записаться на бесплатное
                                занятие</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header__content">
        <div class="video_bg_container">
            <iframe id="video_bg_id" class="video_bg_player"
                    style="width: 100%; height: 1071px; left: 0px; top: -164px;" frameborder="0" allowfullscreen="1"
                    title="YouTube video player" width="1903" height="1071"
                    src="
                    https://www.youtube.com/embed/TP3nO0EQVSo?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=TP3nO0EQVSo&start=0"></iframe>
            <img src="<?=HTTP_LAND_PATH.'/img/main_bg_4.png'?>" id="img_bg_id" style="display: none;" alt="">
        </div>

        <div class="header__content-container" data-parallax="true" data-speed="0.1" data-direction="up"
             style="opacity: 0.6; transform: translate3d(0px, -60%, 0px);">
            <h1 class="header__content-title">Хотите научиться <span>крутить сальто</span>, бить вертушку?</h1>

            <div class="header__content-subtitle">
                <p>Тогда школа боевой акробатики, трикинга X-OUT для вас!!</p>
            </div>
            <a href="<?='http://'.$_SERVER['SERVER_NAME'];?>/#registreer" class="header__content-btn btn">Записаться на бесплатное
                занятие!</a>
        </div>
    </div>
    <a href="<?='http://'.$_SERVER['SERVER_NAME'];?>/#over" class="header__scrolldown"></a></header>

<!-- About Section -->
<section id="over" class="about">
    <div class="supportbar">
        <div class="supportbar__container">
            <span class="supportbar__text">Узнайте больше!</span>

            <div class="supportbar__logos">
                <div class="supportbar__logo--knkv"></div>
                <div class="supportbar__logo--teamtv"></div>
            </div>
        </div>
    </div>
    <div class="feature">
        <div class="feature__text--left-bottom">
            <div class="feature__text-content">
                <h2 class="feature__text-title">Трикинг!</h2>


                <p>Трикинг — это свободная тренировочная дисциплина, которая совмещает в себе боевые искусства и акробатику. Это мощное спортивное движение.<br>
                    Хотите иметь гибкое тело, уметь стоять на руках, делать колесо и крутить вертушку?
                    Тогда школа трикинга X-OUTдля вас!
                    <br>
                    В X-OUT занимаются с каждым: независимо от пола, возраста и уровня подготовки.
                </p>
            </div>
        </div>
        <div class="feature__img--right">
            <div class="feature__img-wrapper">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/YPPSr27y-KM" frameborder="0"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features">
    <div class="feature">
        <div class="feature__img--left">
            <div class="feature__img-wrapper">
                <img height="795"
                     data-original="<?= HTTP_LAND_PATH; ?>/img/about.png"
                     alt="Teampulse opstelling" class="feature__image"
                     src="<?= HTTP_LAND_PATH; ?>/img/about.png"
                     style="display: block;    width: 100%;">
            </div>
        </div>
        <div class="feature__text--right">
            <div class="feature__text-content">
                <h2 class="feature__text-title">О нас</h2>

                <p>Все тренера имеют стаж тренерской работы от 10 и более лет.<br>
                    Являются постоянными участниками зарубежных мероприятий и семинаров, повышают свой уровень мастерства, получая опыт от первоисточников.<br>
                    В нашей школе X-OUT вы сможете быстро и безопасно освоить акробатические и ударные элементы
                </p>
            </div>
        </div>
    </div>
    <div class="feature">
        <div class="mp-slider" style="z-index: 1; overflow: hidden;">
            <ul class="items">
                <li>
                    <h3>Координация в пространстве</h3>
                    <img src="<?= HTTP_LAND_PATH; ?>/images/slide-1.jpg" alt="">
                </li>
                <li>
                    <h3>Развитие гибкости</h3>
                    <img src="<?= HTTP_LAND_PATH; ?>/images/slide-2.jpg" alt="">
                </li>
                <li>
                    <h3>Смелость</h3>
                    <img src="<?= HTTP_LAND_PATH; ?>/images/slide-3.jpg" alt="">
                </li>
                <li>
                    <h3>Зрелищность</h3>
                    <img src="<?= HTTP_LAND_PATH; ?>/images/slide-4.jpg" alt="">
                </li>
                <li>
                    <h3>Индивидуальность</h3>
                    <img src="<?= HTTP_LAND_PATH; ?>/images/slide-5.jpg" alt="">
                </li>
            </ul>
        </div>
    </div>
    <div class="feature">
        <div class="feature__text&#45;&#45;centered">
            <div class="feature__text-content">
                <h2 class="feature__text-title">Расписание</h2>

                <p>Наши занятия проходят по адресу: Санкт-Петербург. Профессора Попова ул. 38Щ <br>
                    (Вход напротив Профессора Попова ул. 41\2)<br>
                    ст.м.Петроградская \ ст.м.Чкаловская<br>
                    Вторник \\ Четверг с 18:00-до 20:00<br>

                    Индивидуальные занятия возможны только по предварительной записи по телефону!
                </p>
            </div>
        </div>
        <div class="feature__img&#45;&#45;centered">
            <div class="feature__img-wrapper">
                <img width="1340" height="763"
                     data-original="<?= HTTP_LAND_PATH; ?>/img/map.png"
                     alt="Школа акробатики, как добраться" class="feature__image"
                     src="<?= HTTP_LAND_PATH; ?>/img/map.png"
                     style="display: block;">
            </div>
        </div>
    </div>
</section>

<!-- Register Section -->
<section id="registreer" class="register">
    <div class="register__container">
        <div class="register__content">
            <h2 class="register__title">Запишитесь на пробное занятие уже сейчас!</h2>

            <p>Оставьте номер телефона. Мы обязательно перезвоним Вам, ответим на все вопросы!</p>

            <form class="register__form" id="subscribe-form" data-request="mailSignup::onSignup"
                  data-request-update="&#39;resultaat&#39;: &#39;#subscribe-form&#39">
                <div class="register__input-container--name">
                    <input class="register__input" required="" type="text" name="phone" id="phone"
                           placeholder="Ваш номер">
                </div>
                <div class="register__input-container--email">
                    <input class="register__input" required="" type="text" name="name" id="name"
                           placeholder="Ваше имя">
                </div>
                <input class="register__submit btn" type="submit" id="submitValue" value="Записаться!">
            </form>
        </div>
    </div>
    <div class="register__bottom">
        <span class="register__bottom-line--red"></span>
        <span class="register__bottom-line--orange"></span>
        <span class="register__bottom-line--yellow"></span>
        <span class="register__bottom-line--blue"></span>
        <span class="register__bottom-line--green"></span>
    </div>
</section>

<!-- Contact Section -->
<footer id="contact" class="footer">
    <div class="footer__container">
        <h2 class="footer__title">Контакты</h2>

        <div class="footer__columns">
            <div class="footer__column">
                <p>
                    <a href="tel:+79216563932" class="footer__link--phone">+7 921 - 656 - 39 - 32 Михаил</a><br>
                    <a href="tel:+79216563932" class="footer__link--phone">+7 950 - 021 - 22 - 82 Дмитрий</a><br>
                </p>
            </div>
            <div class="footer__column">
                <div class="profile__content">
                    <img src="<?= HTTP_LAND_PATH; ?>/img/vk_ico.png" class="vkLogo" alt="">
                    <a target="blank" href="https://vk.com/id9040088" class="vkLink">Михаил</a>
                    <a target="blank" href="https://vk.com/id4183242" class="vkLink" style="    padding-left: 36px;">Дмитрий</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

<!-- Scripts -->
<script src="<?= HTTP_LAND_PATH; ?>/dataFiles/script2.js"></script>
<!--<script src="https://yastatic.net/jquery/2.2.3/jquery.min.js"></script>-->

<script src="<?= HTTP_LAND_PATH; ?>/dataFiles/framework.js"></script>
<script src="<?= HTTP_LAND_PATH; ?>/dataFiles/framework.extras.js"></script>
<link rel="stylesheet" property="stylesheet"
      href="<?= HTTP_LAND_PATH; ?>/dataFiles/framework.extras.css">

<div class="stripe-loading-indicator loaded">
    <div class="stripe"></div>
    <div class="stripe-loaded"></div>
</div>
<script>
    $(document).ready(function () {


        function reloadIframe() {
            var width = $(document).width(),
                height = width * 720 / 1280;
            $('#video_bg_id').height(height);
        }

        reloadIframe();
        function getMobileOperatingSystem() {
            var userAgent = navigator.userAgent || navigator.vendor || window.opera;

            // Windows Phone must come first because its UA also contains "Android"
            if (/windows phone/i.test(userAgent)) {
                return "Windows Phone";
            }

            if (/android/i.test(userAgent)) {
                return "Android";
            }

            // iOS detection from: http://stackoverflow.com/a/9039885/177710
            if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
                return "iOS";
            }

            return "unknown";
        }
        if(getMobileOperatingSystem()!='unknown'){
            $('#video_bg_id').remove();
            $('#img_bg_id').show();
        }
        $('#submitValue').click(function(){
           var phone  =$('#phone').val();
           var name  =$('#name').val();
            $.ajax({
                type: 'POST',
                url: '/land/phoneGet.php',
                data: {
                    'phone': phone,
                    'name': name
                },
                success: function (msg) {
                    alert('Заявка принята!');
                }
            });

        });
    });
</script>
</body>
</html>