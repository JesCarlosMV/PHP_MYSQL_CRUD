<?php

function componenteTarjeta($result, $tabla)
{
    echo "<section>";
    while ($row = $result->fetch_assoc()) {
        echo '<div class="tarjeta">';
        echo "<h1>" . $row["nombre"] . "</h1>";
        echo "<img src=' " . $row["img"] . "' width='200px' height='200px'> ";
        echo "<h1>" . $row["precio"] . " €uros </h1>";
        echo "<h1>Stock: " . $row["stock"] . "</h1>";
        echo "<a href='./mostrarEnDetalle.php?tabla=" . $tabla . "&codigo=" . $row["codigo"] . "'>Ver en detalle</a>";
        echo "</div>";
    }
    echo "</section>";
}

?>

<style>
    /* link para que parezca un boton */
    section a {
        text-decoration: none;
        color: black;
        padding: 5px;
        border: 1px solid black;
        border-radius: 5px;
        transition: all 0.5s ease;
    }

    section a:hover {
        background-color: lightcyan;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
    }
</style>