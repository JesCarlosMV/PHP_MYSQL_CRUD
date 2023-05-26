<?php include "./auxs/header.php" ?>
<?php include "./auxs/conexion.php"; ?>

<?php

$sql = "SELECT * FROM " . $_GET["tabla"] . " WHERE codigo = " . $_GET["codigo"];

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<section>";
    while ($row = $result->fetch_assoc()) {
        echo '<div class="tarjeta">';
        echo "<h1>" . $row["nombre"] . "</h1>";
        echo "<img src=' " . $row["img"] . "' width='200px' height='200px'> ";
        echo "<h1>" . $row["precio"] . "€uros </h1>";
        echo "<h1>Stock:" . $row["stock"] . "</h1>";

        echo "</div>";
    }
    echo "</section>";
} else {
    echo "0 results";
}

?>

<style>
    section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
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
        transform: scale(1.1);
    }

    section a:hover {
        background-color: lightcyan;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.75);
    }
</style>