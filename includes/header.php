<?php

include_once __DIR__ . "/constants.php";

//cambiare tema alla pagina collegato al bottone
$cookie_expiration= time() + 60*60*24*365*5;//con questo stabilisco la durata del mio cookie time()-> corrisponde con il tempo attuale, secondi/minuti/ore/giorni/anni in questo caso durerà 5 anni

//con questo if vedo se il tema è cambiato collegamento al bottone per cambiare
if(isset($_GET["changetheme"])){
//se non esite il cookie di default prende light (generando un cookie)
    if(!isset($_COOKIE["theme"])){
        setcookie("theme", "light", $cookie_expiration);
    } else{
        //in caso contrario già esiste un cookie vedo che tipo è in modo da settare la paggina con il theme giusto già scelto dal cliente
        setcookie("theme", $_COOKIE["theme"]=== "light"? "dark": "light", $cookie_expiration);
    }
    //con questo mi rindirizzo alla pagina stessa dove ho fatto il cambiamento
    header("Location: $_SERVER[HTTP_REFERER]");
    //così chiudo l'azione
    exit;
}

//PER DETERMINARE IL TEMA ESATTO DEL COOKIE
if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'light', $cookie_expiration);
    $isLight = true;
} else {
    $isLight = $_COOKIE['theme'] === 'light' ? true : false;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="assets/<?= $isLight ? 'style.light.css' : 'style.dark.css' ?>" />
</head>
<body>
    
<nav class="navbar navbar-expand-lg <?= $isLight ? 'bg-body-tertiary' : 'bg-body-dark text-white' ?>">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= SITE_URL ?>">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= SITE_URL . "/contacts.php" ?>">Contact</a>
                    </li>
                </ul>
                <a href="?changetheme" class="btn btn-primary">Change theme</a>
                <!-- <form >
                    <select >
                       
                    </select>
                    <button>change</button>
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container">