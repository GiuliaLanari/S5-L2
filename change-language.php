<?php

$cookie_expiration= time() + 60*60*24*365*5;

if(isset($_GET["language"])){
    setcookie("language", $_GET["language"], $cookie_expiration);
}
header("Location: $_SERVER[HTTP_REFERER]");
exit;
