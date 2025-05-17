<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Você naõ pode acessar esta página porque não está logado. <a href=\"index.php\" <button>Entrar</button></a>");
}

?>