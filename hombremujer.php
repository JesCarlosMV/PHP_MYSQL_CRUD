<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "./auxs/header.php"; ?>
    <?php include "./auxs/conexion.php" ?>
    <?php include "./auxs/componenteTarjeta.php" ?>

    <?php if (isset($_GET["categoria"])) {
        $categoria = $_GET["categoria"];

        if ($categoria == "hombre") {

            // fetch a la base de datos ropahombre para sacar todos los productos de la categoria hombre
            // y mostrarlos en la pagina
            $sql = "SELECT * FROM ropahombre";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h1>Ropa de Hombre:</h1>";
                componenteTarjeta($result, "ropahombre");
            } else {
                echo "0 results";
            }

        } else if ($categoria == "mujer") {
            // fetch a la base de datos ropamujer para sacar todos los productos de la categoria mujer
            // y mostrarlos en la pagina
            $sql = "SELECT * FROM ropamujer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h1>Ropa de mujer:</h1>";
                componenteTarjeta($result, "ropamujer");
            } else {
                echo "0 results";
            }
        }
    } ?>

    <h2>Tambien te puede interesar esto :</h2>
    <?php
    // fetch a la base de datos ofertas para sacar todos los productos de la categoria ofertas
    // y mostrarlos en la pagina
    $sql = "SELECT * FROM ofertas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        componenteTarjeta($result, "ofertas");
    } else {
        echo "0 results";
    }

    ?>

</body>

</html>

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
</style>