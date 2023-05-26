<?php include "./auxs/header.php" ?>
<?php include "./auxs/componenteProtegido.php" ?>


<div>
    <form action="./auxs/inserciones.php?insercion=insercion" method="post">

        <!-- esto es para que el isset($_POST["insercion"]) de inserciones.php funcione <-->
        <input type="hidden" name="insercion">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <label for="stock">stock</label>
        <input type="text" name="stock" id="stock" required>
        <label for="codigo">codigo</label>
        <input type="text" name="codigo" id="codigo" required>
        <input type="file" name="imagen" id="imagen">
        <select name="dondeGuardar" id="dondeGuardar">
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
            <option value="ofertas">Ofertas</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

</div>



<style>
    div {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input {
        margin: 10px;
    }
</style>