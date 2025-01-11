<?php
ob_start();
?>

<html lang="fr">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <title>Suivi de Colis</title>



    <link rel="stylesheet" type="text/css" href="views/assets/min_202411221352_app.css">
    <link rel="stylesheet" type="text/css" href="views/assets/min_202411221352_smartbanner.css">

    <style>
        .main {
            max-width: 400px;
            margin: 0 auto;
        }

        .info-container {
            white-space: wrap !important;
        }
    </style>


</head>

<body class="suivi-colis" style="visibility: visible;">
    <div class="smartbanner js_smartbanner smartbanner--ios smartbanner--android" style="display: none;">
        <a href="javascript:void();" class="smartbanner__exit js_smartbanner__exit"></a>
        <div class="smartbanner__icon"></div>
        <div class="smartbanner__info">
            <div>
                <div class="smartbanner__info__title">Suivez et envoyez tous vos colis avec l'app!</div>
            </div>
        </div>
        <a href="market://details?id=com.mondialrelay.mobile" target="_blank" class="smartbanner__button">
            <span class="smartbanner__button__label">Télécharger</span>
        </a>
    </div>
    <div class="smartbanner__whitness" style="display:none"></div>
    <script>
        $(document).ready(function() {
            var e;


            if (/android/i.test(userAgent) || (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream)) {
                configureBanner();
                const pathsToShowBanner = ["/"];

                if (!getCookie("smartbanner_exited") && pathsToShowBanner.includes(window.location.pathname)) {
                    $(".smartbanner").show();
                    $(".smartbanner__whitness").show();
                    $(".btn-send-pedago").css("margin-top", "100px");
                }

                $(".smartbanner__exit").click(event => {
                    event.preventDefault();
                    setCookie("smartbanner_exited", true, 365);
                    $(".smartbanner").hide();
                    $(".smartbanner__whitness").hide();
                    $(".btn-send-pedago").css("margin-top", "unset");
                });


                if (getCookie("smartbanner_exited")) {
                    $(".smartbanner").hide();
                    $(".smartbanner__whitness").hide();
                    $(".btn-send-pedago").css("margin-top", "unset");
                }

            }

        });
        var setCookie = (e, n, t) => {
                var a = new Date,
                    a = "expires=" + new Date(a.getTime() + 24 * t * 60 * 60 * 1e3).toUTCString();
                document.cookie = e + "=" + n + "; " + a + "; path=/"
            },
            getCookie = e => {
                const n = e + "=";
                e = decodeURIComponent(document.cookie).split("; ");
                let t;
                return e.forEach(e => {
                    0 === e.indexOf(n) && (t = e.substring(n.length))
                }), t
            };
        const userAgent = navigator.userAgent || navigator.vendor || window.opera;

        function configureBanner() {
            let e;
            if (/android/i.test(userAgent)) e = "market://details?id=com.mondialrelay.mobile", $(".smartbanner").addClass("smartbanner--android");
            else {
                if (!/iPad|iPhone|iPod/.test(userAgent) || window.MSStream) return;
                e = "", window.location.pathname.includes("suivi-de-colis") && (e = ""), $(".smartbanner").addClass("smartbanner--ios")
            }
            $(".smartbanner__button").attr("href", e)
        }
    </script>
    <div class="content new" id="one">
        <header class="">
            <div class="grid header-top">
                <div class="header-content">
                    <div class="pr-0 nav container">
                        <div class="nav__group">
                            <button id="mobile-btn" class="visible-xs nav__menu">
                                <span class="sr-only">Ouvrir le menu</span>
                                <span class="burger-menu"></span>
                            </button>
                            <a id="mobile-search" class="visible-xs nav__search" href="#/faq/">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6649 23.8299C19.7266 23.8299 23.8299 19.7266 23.8299 14.665C23.8299 9.60331 19.7266 5.5 14.6649 5.5C9.60328 5.5 5.5 9.60331 5.5 14.665C5.5 19.7266 9.60328 23.8299 14.6649 23.8299Z" stroke="#96154A" stroke-width="1.3" stroke-linejoin="round"></path>
                                    <path d="M21.6782 20.5996L29.5001 28.4214" stroke="#96154A" stroke-width="1.3" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                        <a href="#/" title="Mondial Relay e-livraison de vos colis" id="logo">
                            <span class="sr-only">Mondial Relay e-livraison de vos colis</span>
                            <img src="views/assets/logomondial-relay.svg" height="60" alt="Logo Mondial Relay">
                        </a>
                        <div class="nav__group">
                            <a class="mobile-basket visible-xs nav__basket nav__basket--hp" href="#/envoi-de-colis/valider-mon-panier/">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M28.5 15.6116H4.5" stroke="#96154A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.95264 15.9031L9.47336 26.2827H23.6104L27.2428 15.6116" stroke="#96154A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.36182 15.6115L15.2855 7.5" stroke="#96154A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M23.6661 15.6115L17.6882 7.5" stroke="#96154A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <a class="mobile-account visible-xs callconex nav__connect" href="#/mon-profil-mondial-relay/">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.9795 27.4157H7.82494C7.65112 27.4157 7.48447 27.3458 7.36156 27.2214C7.23865 27.097 7.16962 26.9283 7.16962 26.7523V24.0406C7.13972 22.8611 7.34339 21.6875 7.76866 20.589C8.19393 19.4904 8.83217 18.4892 9.64577 17.6443C10.4594 16.7993 11.4318 16.1278 12.5059 15.6693C13.5799 15.2108 14.7337 14.9746 15.8994 14.9746C17.065 14.9746 18.2188 15.2108 19.2929 15.6693C20.3669 16.1278 21.3394 16.7993 22.153 17.6443C22.9666 18.4892 23.6048 19.4904 24.0301 20.589C24.4553 21.6875 24.6591 22.8611 24.6292 24.0406V26.7523C24.6299 26.8392 24.6137 26.9253 24.5814 27.0057C24.5491 27.0862 24.5013 27.1594 24.4409 27.2211C24.3805 27.2827 24.3086 27.3317 24.2294 27.3651C24.1502 27.3985 24.0653 27.4157 23.9795 27.4157ZM8.45738 26.0948H23.3011V24.0406C23.3011 23.0541 23.1092 22.0772 22.7362 21.1657C22.3632 20.2543 21.8165 19.4261 21.1273 18.7285C20.4381 18.0309 19.62 17.4775 18.7195 17.1C17.819 16.7225 16.8539 16.5281 15.8792 16.5281C14.9046 16.5281 13.9395 16.7225 13.039 17.1C12.1385 17.4775 11.3204 18.0309 10.6312 18.7285C9.94201 19.4261 9.39529 20.2543 9.02231 21.1657C8.64933 22.0772 8.45738 23.0541 8.45738 24.0406V26.0948Z" fill="#96154A"></path>
                                    <path d="M15.8579 13.9968C14.93 13.9968 14.0231 13.7183 13.2516 13.1965C12.4802 12.6748 11.8789 11.9332 11.5238 11.0655C11.1688 10.1979 11.0759 9.24313 11.2569 8.32203C11.4379 7.40093 11.8846 6.55485 12.5407 5.89077C13.1968 5.2267 14.0327 4.77446 14.9427 4.59124C15.8527 4.40803 16.7959 4.50205 17.6531 4.86145C18.5103 5.22084 19.2429 5.82945 19.7584 6.61032C20.2739 7.39119 20.549 8.30925 20.549 9.24839C20.5475 10.5073 20.0528 11.7141 19.1733 12.6043C18.2939 13.4945 17.1016 13.9952 15.8579 13.9968ZM15.8579 5.82094C15.1882 5.82094 14.5335 6.02196 13.9766 6.39857C13.4198 6.77518 12.9858 7.31047 12.7295 7.93676C12.4732 8.56304 12.4061 9.25219 12.5368 9.91705C12.6674 10.5819 12.99 11.1926 13.4636 11.672C13.9371 12.1513 14.5404 12.4777 15.1973 12.61C15.8541 12.7422 16.535 12.6744 17.1537 12.4149C17.7724 12.1555 18.3012 11.7162 18.6733 11.1526C19.0454 10.5889 19.244 9.92628 19.244 9.24839C19.2425 8.33985 18.8853 7.46895 18.2506 6.82651C17.6159 6.18408 16.7555 5.82248 15.8579 5.82094Z" fill="#96154A"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div id="menuMobile" class="pr-0">
                        <nav class="menu">
                            <ul class="navigation">
                                <li class=" selected "><a class="" href="#/suivi-de-colis/">Suivi
                                        de colis</a></li>
                                <li class=" "><a class="" href="#/envoi-de-colis/">Envoi
                                        de colis</a></li>
                                <li class=" "><a class="" href="#/trouver-le-point-relais-le-plus-proche-de-chez-moi/">Points
                                        Relais®<br>et Lockers</a></li>
                                <li class=" "><a class="" href="#/faq/">Aide</a></li>
                                <li class=" "><a class="btn btn-primary btn-light mt0" href="#/solutionspro/">Solutions
                                        Pro</a></li>
                                <li class="visible-xs">
                                    <a class="callconex" href="javascript:void(0)" onclick="callConnexionMobile()"> Se
                                        connecter </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="menuMobileOpacity" class="col-xs-12 pr-0 hidden-sm hidden-ld hidden-md mobopacity" style="display:none!important">
                    </div>
                </div>
            </div>
            <div id="identification" class="ident-bg hidden-xs">
                <div class="grid grid--identification">
                    <div class="row">
                        <div class="col-md-12">
                            <ul>
                                <li>
                                    <a class="list-countries" onclick="callCountries()" href="javascript:void(0)">
                                        <img class="icon languages" src="views/assets/earth.svg" alt="icone langue">
                                        France </a>
                                </li>
                                <li>
                                    <div id="panier">
                                        <a class="list-basket" onclick="callBasket()" href="javascript:void(0)">
                                            <img class="icon languages" src="views/assets/cart.svg" alt="icone panier"> Mon panier (<span>0,00 €</span>) </a>
                                        <div id="basket" class="center">
                                            <div class="element">
                                                <ul class="articles">
                                                    <li class="center">Votre panier est actuellement vide</li>
                                                </ul>
                                                <a href="#/envoi-de-colis/valider-mon-panier/" class="btn btn-primary center-block mt25 mb25 w100">Voir mon
                                                    panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div id="encartconnect" class="connexion center">
                                        <div class="element mt15">
                                            <div class="hidden-sm hidden-md hidden-lg">
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">



            <?php
            return ob_get_clean();
