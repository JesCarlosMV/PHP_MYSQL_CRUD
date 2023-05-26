<?php session_start(); ?>
<header>
    <a href="./hombremujer.php?categoria=hombre">Hombre</a>
    <a href="./hombremujer.php?categoria=mujer">Mujer</a>
    <a href="./ofertas.php">Ofertas</a>
    <a href="./index.php">Inicio</a>
    <a href="./loginregistro.php">LOGIN O REGISTRO</a>
    <!-- si hay sesssion adminLogueado significa que hay admin y podra administrar la web (añadir ropa) -->
    <?php if (isset($_SESSION["adminLogueado"])) {
        echo '<a href="./administrarWeb.php">ADMINISTRARWEB</a>';
        echo '<a href="./auxs/inserciones.php?logout=true">LOGOUT</a>';
    }
    ?>
</header>

<style>
    header {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: #f1f1f1;
        padding: 20px;

    }

    header a {
        text-decoration: none;
        color: black;
        font-size: 20px;
        transition: 0.5s;
        padding: 5px;
    }

    header a:hover {
        color: #f1f1f1;
        background-color: cadetblue;
        border-radius: 5px;
        scale: 1.2;
    }

    header a:nth-child(5):hover,
    header a:nth-child(6):hover {
        scale: 1.2;
        background-color: lightslategray;
    }

    header a:nth-child(7):hover {
        scale: 1.2;
        background-color: tomato;
    }

    header
</style>