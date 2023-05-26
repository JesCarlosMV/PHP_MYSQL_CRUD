<?php include "./auxs/header.php" ?>

<section>

    <?php if (!isset($_GET["olvideContrasenya"])) { ?>
        <!--FORM PARA REGISTRAR EN BBDD USUARIOS -->
        <form action="./auxs/inserciones.php" method="post">
            <h3>Quiero registrarme</h3>
            <!-- esto es para que el isset($_POST["registro"]) de inserciones.php funcione <-->
            <input type="hidden" name="registro">

            <label for="email">email
                <input type="text" name="email" id="email" placeholder="email">
            </label>
            <label for="password">Contraseña
                <input type="password" name="password" id="password" placeholder="Contraseña">
            </label>
            <label for="telefono">Telefono
                <input type="text" name="telefono" id="telefono" placeholder="telefono">
            </label>
            <label for="direccion">Direccion
                <input type="text" name="direccion" id="direccion" placeholder="direccion">
            </label>
            <label for="rol">rol
                <select name="rol" id="rol">
                    <option value="cliente">Cliente</option>
                    <option value="administrador">Administrador</option>
                </select>
            </label>
            <input type="submit" value="Enviar">

        </form>

        <!-- FORM PARA LOGUEARSE -->
        <form action="./auxs/inserciones.php" method="post">
            <H3>Tengo cuenta</H3>
            <!-- esto es para que el isset($_POST["login"]) de inserciones.php funcione <-->
            <input type="hidden" name="login">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Enviar">
            <a href="./auxs/inserciones.php?olvideContrasenya=true">Olvide contraseña</a>
        </form>

        <!-- EN EL CASO DE QUE HAYA OLVIDADO LA CONTRASEÑA,APARECERA EL FORM con el email para enviar un correo  -->
    <?php } else if ($_GET["olvideContrasenya"]) {
        ?>
            <!-- FORM PARA RECUPERAR CONTRASEÑA -->
            <form action="./auxs/inserciones.php" method="post">
                <h3>Recuperar contrasenya, introduce tu email y la enviamos al correo</h3>
                <!-- esto es para que el isset($_POST["olvideContrasenya"]) de inserciones.php funcione <-->
                <input type="hidden" name="olvideContrasenya">

                <label for="email">email
                    <input type="text" name="email" id="email" placeholder="email">
                </label>
                <input type="submit" value="Enviar">
            </form>
    <?php } ?>
</section>

<style>
    section {
        display: flex;
        height: 100vh;
        justify-content: space-evenly;
        align-items: center;
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