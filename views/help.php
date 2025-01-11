<?php

$header = require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/header.php');
$footer = require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/footer.php');
$html = (function () {
    global $rez;
    ob_start();
?>

    <form method="post">
        <div class="breadcrumb">
            <div class="grid">
                <div class="row">
                    <ul>
                        <li><a href="#/">
                                Accueil</a></li>
                        <li class="active">Suivi de colis</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="internal-page suivi">
            <div class="grid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-5 center">
                    </div>
                </div>
            </div>
            <div class="main">

                <div data-v-67007474="" id="tracking-wrapper" class="app-wrapper">
                    <div data-v-577ebd12="" data-v-67007474="">
                        <div class="suivi-colis-page">
                            <div data-v-577ebd12="" class="input-zone">
                                <center>
                                    <h2 data-v-577ebd12="">Colis numéro: <?= $rez["suivi"] ?>

                                    </h2>
                                    <h1>
                                        Agissez sur votre livraison

                                    </h1>
                                    <span>
                                        Date de livraison : <br> <strong>Le <?= date("d/m/Y") ?></strong>
                                    </span>
                                </center> <br>
                                <p>
                                    Votre colis a eu un problème lors de sa livraison ou vous souhaitez reprogrammer une livraison
                                    ?<br /><br />
                                    Si votre colis a rencontré un problème, a du retard, ou s'il y a eu un incident de livraison, vous pouvez effectuer plusieurs actions en passant à l'étape suivante :
                                </p>
                                <ul class="cards-list">
                                    <li class="cards-card cards-card-hp">
                                        <a href="./creneau">
                                            <img src="views/assets/calendar.svg" alt="">

                                            <span class="cards-card__text">Choisir une date de livraison</span>
                                        </a>
                                    </li>

                                    <li class="cards-card cards-card-hp">
                                        <a href="./points">
                                            <img src="views/assets/find.svg" alt="">

                                            <span class="cards-card__text">Choisir un points de proximité</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

    </form>
    <div id="loader-div-new" class="hidden-class-new">
        <div id="mask-id-new"></div>
        <div class="spinner-class-new"></div>
    </div>
    <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            document.getElementById("loader-div-new").style.visibility = "visible";
            document.getElementById("mask-id-new").style = "opacity: 1; bottom: -500px;"
        })
    </script>
    </div>
    </div>

    </div>
    </div>
    </form>
<?php
    return ob_get_clean();
})();

$html = $header . $html . $footer;
require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/base.php');
?>