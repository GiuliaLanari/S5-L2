<?php
//cambiare tema alla pagina collegato al bottone
$cookie_expiration= time() + 60*60*24*365*5;//con questo stabilisco la durata del mio cookie time()-> corrisponde con il tempo attuale, secondi/minuti/ore/giorni/anni in questo caso durerà 5 anni

//con questo if vedo se il tema è cambiato collegamento al bottone per cambiare
// if(isset($_GET["changetheme"])){
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
// }