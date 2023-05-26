<?php include "./conexion.php";


//! inserciones de ROPA EN BBDD
if (isset($_POST["insercion"])) {
    // lo que llega desde administrarWeb.php es un formulario con los datos del producto a insertar
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $codigo = $_POST["codigo"];
    $dondeGuardar = $_POST["dondeGuardar"];
    //$imagen = $_POST["imagen"];



    // insertamos el producto segun el valor de $dondeGuardar (mujeres, hombres u ofertas)
    if ($dondeGuardar == "mujer") {
        $sql = "INSERT INTO ropamujer (nombre, precio, stock, codigo) VALUES ('$nombre', '$precio', '$stock', '$codigo')";
        if ($conn->query($sql) === TRUE) {
            echo "Producto añadido correctamente";
            //redirect a administrarWeb.php despues de 2 segundos
            header("refresh:2;url=../administrarWeb.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if ($dondeGuardar == "hombre") {
        $sql = "INSERT INTO ropahombre (nombre, precio, stock, codigo) VALUES ('$nombre', '$precio', '$stock', '$codigo')";
        if ($conn->query($sql) === TRUE) {
            echo "Producto añadido correctamente";
            header("refresh:2;url=../administrarWeb.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if ($dondeGuardar == "ofertas") {
        $sql = "INSERT INTO ofertas (nombre, precio, stock, codigo) VALUES ('$nombre', '$precio', '$stock', '$codigo')";
        if ($conn->query($sql) === TRUE) {
            echo "Producto añadido correctamente";
            header("refresh:2;url=../administrarWeb.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

//! inserciones de USUARIOS EN BBDD(ADMINISTRADORES INCLUIDOS)
if (isset($_POST["registro"])) {
    // lo que llega desde loginregistro.php es un formulario con los datos del usuario a insertar
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];
    $direccion = $_POST["direccion"];


    //comprobar si el email ya existe en la bbdd
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El email YA EXISTE EN LA BBDD";
        //temporizador para volver a la pagina de registro de 5 segundos
        echo "<br>Redireccionando en 3 segundos...";
        header("refresh:3;url=../loginregistro.php");
    } else {
        //email NO existe e insertamos el usuario
        $sql = "INSERT INTO usuarios (codigo,email, password, rol, telefono,direccion) 
                        VALUES (null,'$email', '$password', '$rol','$telefono','$direccion')";
        if ($conn->query($sql) === TRUE) {
            echo "Usuario añadido correctamente";
            echo "<br>Redireccionando en 3 segundos...";
            header("refresh:3;url=../loginregistro.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

//! COMPROBACIONES DE USUARIO Y CONTRASEÑA PARA LOGIN
if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //si existe el usuario y la contraseña es correcta
        // comprobar el rol del usuario logueado
        $rol = $result->fetch_assoc()["rol"];

        if ($rol == "administrador") {
            // almacenamos en log.txt el intento de login
            $log = fopen("../log.txt", "a");
            fwrite($log, "LOGIN: " . date("d-m-Y H:i:s") . " - " . $email . " - ROL: " . $rol . "\n");

            echo "LOGUEADO COMO ADMINISTRADOR";
            // crear session adminLogueado para que se muestre el boton de administrarWeb.php
            session_start();
            $_SESSION["adminLogueado"] = true;

            echo "<br>Redireccionando en 3 segundos...";
            header("refresh:3;url=../index.php");
        } else {
            // almacenamos en log.txt el intento de login
            $log = fopen("../log.txt", "a");
            fwrite($log, "LOGIN: " . date("d-m-Y H:i:s") . " - " . $email . " - ROL: " . $rol . "\n");

            //si es usuario normal
            echo "LOGUEADO user normal";
            // crear session usuarioLogueado para que se muestre el boton de administrarWeb.php
            session_start();
            $_SESSION["usuarioLogueado"] = true;

            echo "<br>Redireccionando en 3 segundos...";
            header("refresh:3;url=../index.php");
        }

    } else {
        // almacenamos en log.txt el intento de login
        $log = fopen("../log.txt", "a");
        fwrite($log, "Intento de login FALLIDO: " . date("d-m-Y H:i:s") . " - " . $email . " - ROL: " . $rol . "\n");

        //si no existe el usuario o la contraseña es incorrecta
        echo "USUARIO O CONTRASEÑA INCORRECTOS";
        //temporizador para volver a la pagina de registro de 5 segundos
        echo "<br>Redireccionando en 3 segundos...";
        header("refresh:3;url=../loginregistro.php");
    }

}

//!DESTRUIR SESSION CON $LOGOUT = url parameter que llega desde index.php al hacer click en el link de logout
if (isset($_GET["logout"])) {
    // destruir la session
    session_start();
    session_destroy();

    echo "SESSION DESTRUIDA";
    //temporizador para volver a la pagina de registro de 5 segundos
    echo "<br>Redireccionando en 3 segundos...";
    header("refresh:3;url=../index.php");
}

//! OLVIDE CONTRASEÑA (NO FUNCIONA)
// primero redirigir a la pagina de registro para que el usuario introduzca su email
if (isset($_GET["olvideContrasenya"])) {
    echo "osea que olvidaste la contraseña... redirigiendote a la pagina de registro para que la cambies";
    header("refresh:3;url=../loginregistro.php?olvideContrasenya=true.php");
}
// luego comprobar si el email existe en la bbdd y cambiar la contraseña
if (isset($_POST["olvideContrasenya"])) {
    $email = $_POST["email"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // enviar un email al usuario con la nueva contraseña
        $to = $email;
        $subject = "Nueva contraseña";
        $txt = "Tu nueva contraseña es: 1234";
        $port = 25;

        mail($to, $subject, $txt, $port);

        //cambiar la contraseña en la bbdd
        $sql = "UPDATE usuarios SET password='1234' WHERE email='$email'";

        echo "EMAIL ENVIADO CON LA NUEVA CONTRASEÑA";

    } else {

    }
}

// cerrar la conexion
$conn->close();


?>