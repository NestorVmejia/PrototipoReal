<?php
session_start();
include('conexion.php');

if (isset($_POST['usuario']) && isset($_POST['clave'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $Usuario = validate($_POST['usuario']);
    $Clave = validate($_POST['clave']);

    if (empty($Usuario)) {
        header("Location: ../index.php?error=El Usuario Es Requerido");
        exit();
    } elseif (empty($Clave)) {
        header("Location: ../index.php?error=La clave Es Requerida");
        exit();
    } else {
        $clave = md5($Clave);
        $Sqlu = "SELECT * FROM users WHERE usuario = '$Usuario' AND clave='$Clave'";
        $result = mysqli_query($con, $Sqlu);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['usuario'] === $Usuario && $row['clave'] === $Clave) {
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['Nombre'] = $row ['Nombre'];
                $_SESSION['correo']=$row ['correo'];
                $_SESSION['UMF']=$row ['UMF'];
                $_SESSION['Turno']=$row ['Turno'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['clave'] = $row['clave'];
                //$_SESSION['id'] = $row['id'];
                if ($_SESSION['rol'] == "admin") {
                    header("Location:../pantallas/inicio.php");
                    exit();
                } elseif ($_SESSION['rol'] == "assist") {
                    header("Location:../Vista2.php");
                    exit();
                }
            } else {
                echo '<script type="text/javascript">
                    alert("Las credenciales son incorrectas");
                    window.location.href="../index.php";
                    </script>';
            }
        } else {
            echo '<script type="text/javascript">
                    alert("Las credenciales son incorrectas");
                    window.location.href="../index.php";
                    </script>';      
                }
    }
} else {
    header("Location: ../index.php");
    exit();
}
