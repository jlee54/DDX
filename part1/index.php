<?php
$uri = $_SERVER["REQUEST_URI"];
$request_type = $_SERVER["REQUEST_METHOD"];

if ($uri == "/") {
    echo "Hit Homepage";
} elseif ($uri == "/winningPrimaryCandidatesByCounty" && $request_type == "GET") {
    require_once "getWinningPrimaryCandidatesByCounty.php";
} else {
    header("HTTP/1.1 404 Not Found");
    exit();
}
