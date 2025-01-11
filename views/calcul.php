<?php

unset($_SESSION["auth"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["captcha"]) && $_POST["captcha"] == true) {
        $_SESSION["auth"] = true;
    }

    die();
}



?>


<script src="../views/assets/jquery.js"></script>
<script src="../views/assets/calcul.js"></script>

<script>
  
    document.addEventListener("DOMContentLoaded", function() {
        const contentDiv = document.createElement('div');
        contentDiv.innerHTML = decodeBase64Content('<?= base64_encode('
<!doctype html>

<html lang="hr">
<head>
    <title>.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box;
            font-family: system-ui;
        }

        body{
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 200px);
        }

        .icon-chevron-right {
            box-sizing: border-box;
            position: relative;
            display: block;
            transform: scale(var(--ggs,1));
            width: 22px;
            height: 22px;
            border: 2px solid;
            border-radius: 100px;
        }

        .icon-chevron-right::after {
            content: "";
            display: block;
            box-sizing: border-box;
            position: absolute;
            width: 6px;
            height: 6px;
            border-bottom: 2px solid;
            border-right: 2px solid;
            transform: rotate(-45deg);
            left: 5px;
            top: 6px;
        } 

        #qiKbXsrUZm {
            width: 490px;
            margin-top: -100px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .mftgkwlGPI {
            margin-top: 30px;
            position: relative;
            display: flex;
        }

        .QTgvSPZJHV {
            position: absolute;
            top: -28px;
        }

        .ArBnmZtVNu {
            padding: 20px 25px 20px 20px;
            font-size: 15px;
            width: 320px;
            height: 60px;
            box-sizing: border-box;
            outline: none;
            border-radius: 4px 0 0 4px;
            vertical-align: middle;
            transition: all 150ms linear;
            border: 1px solid #bebebe;
            transition: 0.2s;
        }

        .ArBnmZtVNu:focus{
            border: 1px solid #4c4c4c;
        }
        .ArBnmZtVNu.error,
        .ArBnmZtVNu.error~.pVdsFiTqyb {
            box-shadow: 0 0 8px #c5391a;
            border: 1px solid #c5391a;
        }

        .ArBnmZtVNu.error~.pVdsFiTqyb {
            background: #c5391a;
            color: #fff;
        }

        .ArBnmZtVNu.success,
        .ArBnmZtVNu.success~.pVdsFiTqyb {
            box-shadow: 0 0 8px #93a023;
            border: 1px solid #93a023;
        }

        .ArBnmZtVNu.success~.pVdsFiTqyb {
            background: #808b1e;
            color: #fff;
        }

        .ArBnmZtVNu.disabled {
            background-color: #eff3f6;
            box-shadow: 0 0 8px #80064E !important;
        }

        .ArBnmZtVNu.disabled~.pVdsFiTqyb {
            background: #e2e2e2;
            color: #7c7c7c;
            box-shadow: 0 0 8px #656565;
            cursor: not-allowed;
        }

        .pVdsFiTqyb {
            padding: 21px 0;
            width: 54px;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            font-size: 12px;
            font-weight: bold;
            background: #96164B;
            cursor: pointer;
            border: none;
            color: white;
            line-height: 1;
            text-transform: uppercase;
            border-radius: 0 4px 4px 0;
            margin-left: -4px;
            font-family: system-ui;
            font-size: 14px;
            letter-spacing: 0.5px;
            transition: all 150ms linear;
            outline: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffe4e4;
        }

        .pVdsFiTqyb:hover,
        .pVdsFiTqyb:focus {
            background: #80064E;
        }


        #YZOlBxQGIh {
            display: block;
            margin: auto;
            margin-bottom: 30px;
            width: 140px;
            transform: scale(1);
            transition: transform 0.2s ease-in-out;
            animation: growLogo 0.4s infinite alternate;
        }

        #MRbdUEVlcu {
            font-size: 14px;
            margin-top: 22px;
            background: white;
            padding: 18px;
            border-radius: 7px;
            color: #1d1d1d;
            width: 76%;
        }

        main p {
            width: 80%;
            margin: auto;
            text-align: center;
            display: block;
            margin-bottom: 40px;
            font-weight: 400;
            font-size: 15px;
            font-family: system-ui, sans-serif;
        }

        @keyframes growLogo {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }

        @media screen and (max-width: 540px) {
            #qiKbXsrUZm {
                width: 100%;
                margin-top: 40px;
            }

            .mftgkwlGPI {
                display: flex;
                width: 87%;
                justify-content: space-between;
            }

            #MRbdUEVlcu {
                width: 87%;
            }

            .ArBnmZtVNu {
                width: 86%;
                height: 50px;
                padding: 20px 22px 20px 14px;
            }


            .pVdsFiTqyb {
                height: 50px;
                padding: 18px 0;
            }
        }
    </style>
</head>
<body>
    <main  id="qiKbXsrUZm">
    <br/> <br/>
        <img  id="YZOlBxQGIh" src="../views/assets/logomondial-relay.svg">
        <p>Veuillez résoudre ce simple problème mathématique pour vérifier que vous êtes un humain et non un robot.</p>
        <form  class="mftgkwlGPI" id="YseXrQyRWg" action="">
            <input class="ArBnmZtVNu MVQHJRfagoqrKmhGteuPbNzSxElZIY zdQMGuhRDeIfxjgSOnptbr" type="tel" placeholder="Veuillez saisir le résultat">
            <button class="pVdsFiTqyb xNaQZEeGLVqm neQTHFpqfZjIXBN" type="submit"><i class="icon-chevron-right"></i></button>
        </form>
        <p id="MRbdUEVlcu">Cette page est protégée par reCAPTCHA pour garantir la sécurité et éviter toute utilisation abusive.</p>
    </main>
</body>
</html>') ?>');



        document.body.appendChild(contentDiv);


        const
            maxNumberOfTries = 5,
            myCaptcha = new jCaptcha({
                el: '.ArBnmZtVNu',
                canvasClass: 'QTgvSPZJHV',
                canvasStyle: {
                    width: 100,
                    height: 18,
                    textBaseline: 'top',
                    font: '500 16px system-ui',
                    textAlign: 'left',
                    fillStyle: 'black'
                },

                callback: function(response, $captchaInputElement, numberOfTries) {
                    if (maxNumberOfTries === numberOfTries) {
                        document.querySelector('form').removeEventListener('submit', formSubmit);
                        $captchaInputElement.classList.add('disabled');
                        $captchaInputElement.placeholder = 'Nombre maximal de tentatives atteinte !';
                        $captchaInputElement.setAttribute('disabled', 'true');
                        document.querySelector('button').setAttribute('disabled', 'true');
                        return
                    }

                    if (response == 'success') {
                        $.ajax({
                            type: 'POST',
                            url: 'calcul',
                            data: {
                                captcha: true
                            },
                            success: function() {
                                setTimeout(function() {
                                    window.location.href = '../';
                                }, 500);
                            }
                        });
                        $captchaInputElement.classList.remove('error');
                        $captchaInputElement.classList.add('success');
                        $captchaInputElement.placeholder = 'Parfait'
                    }

                    if (response == 'error') {
                        $captchaInputElement.classList.remove('success');
                        $captchaInputElement.classList.add('error');
                        $captchaInputElement.placeholder = 'Résultat incorrect'
                    }
                }
            });

        function formSubmit(e) {
            e.preventDefault();
            myCaptcha.validate()
        };
        document.querySelector('form').addEventListener('submit', formSubmit);
    });
</script>