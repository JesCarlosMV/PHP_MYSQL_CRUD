<?php include "./auxs/header.php" ?>
<?php include "./auxs/conexion.php" ?>
<?php include "./auxs/componenteProtegido.php" ?>

<h1>Ofertas</h1>
<section>
    <?php
    // fetch a la base de datos ofertas para sacar todos los productos de la categoria ofertas
    // y mostrarlos en la pagina
    
    $sql = "SELECT * FROM ofertas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<section>";
        while ($row = $result->fetch_assoc()) {
            echo '<div class="tarjeta">';
            echo "<h1>" . $row["nombre"] . "</h1>";
            echo "<img src=' " . $row["img"] . "' width='200px' height='200px'> ";
            echo "<h1>" . $row["precio"] . "€uros </h1>";
            echo "<h1>Stock:" . $row["stock"] . "</h1>";
            echo "<a href='./mostrarEnDetalle.php?tabla=ofertas&codigo=" . $row["codigo"] . "'>Ver en detalle</a>";
            echo "</div>";
        }
        echo "</section>";
    } else {
        echo "0 results";
    }

    ?>
</section>


<style>
    * {
        font-family: 'Rokkitt', serif;
        text-align: center;
    }

    section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .tarjeta {
        border: 1px solid black;
        width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 10px;
        padding: 5px;
        transition: all 0.5s ease;
    }

    .tarjeta:hover {
        background-color: rgb(255, 255, 255);
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
        scale: 1.1;
    }

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