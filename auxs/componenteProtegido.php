<?php

if (!isset($_SESSION["adminLogueado"]) && !isset($_SESSION["usuarioLogueado"])) {
    echo "No puedes entrar si no estas logueado como admin o como usuario";
    echo "<br>Redireccionando en 2 segundos...";
    header("refresh:2;url=./index.php");
    die();
}

?>