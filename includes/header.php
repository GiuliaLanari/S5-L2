<?php

include_once __DIR__ . "/constants.php";
include_once __DIR__ . '/translations.php';
include_once __DIR__ . "/../db.php";





//PER DETERMINARE IL TEMA ESATTO DEL COOKIE
if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'light', $cookie_expiration);
    $isLight = true;
} else {
    $isLight = $_COOKIE['theme'] === 'light' ? true : false;
}

//PER DEFINIRE IL TIPO DI LINGUA DEL COOKIE

if (!isset($_COOKIE['language'])) {
    setcookie('language', 'it', $cookie_expiration);
    $language = "it";
} else {
    $language = $_COOKIE['language'] ;
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
    
<nav class="navbar navbar-expand-lg " <?= $isLight ? "" : 'data-bs-theme="dark"' ?>>
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= SITE_URL ?>"><?= $labels[$language]['site_name'] ?></a>
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
                <a href="<?= SITE_URL . '/change-theme.php' ?>" class=" me-5 <?= $isLight? "btn btn-dark" : "btn btn-warning"?>"><ion-icon name="moon-outline"></ion-icon></a>
                <form action="<?= SITE_URL . '/change-language.php' ?>" method="GET">
                    <select name="language" >
                    <option value="it"<?= $language === 'it' ? ' selected' : '' ?>>IT</option>
                        <option value="en"<?= $language === 'en' ? ' selected' : '' ?>>EN</option>
                        <option value="fr"<?= $language === 'fr' ? ' selected' : '' ?>>FR</option>
                    </select>
                    <button class="btn btn-success">change</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">