<?php
session_start();

    if (isset($_SESSION['usuario']) && isset ($_SESSION ['Nombre'])) {
        
        include('conexion.php');

        if (isset($_POST['old_password']) && isset($_POST['new_password'])&& isset($_POST['c_np'])) {

            function validate($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                    return $data;
            }


            $op = validate($_POST['old_password']);
            $np = validate($_POST['new_password']);
            $c_np = validate($_POST['c_np']);
            
            if ($np !== $c_np) {
                echo '<script type="text/javascript">
                alert("Las contraseñas no coinciden");
                window.location.href="../pantallas/CambiarCont.php";
                </script>';
            }else {
                /*$op = md5($op);
                *$np = md5($np);*/
                $id = $_SESSION['usuario'];

                $sql= "SELECT clave FROM users WHERE usuario ='$id' AND clave ='$op'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) === 1) {
                    
                    $sql_UPDATE ="UPDATE users SET clave ='$np' WHERE usuario='$id'";
                    $result_2 = mysqli_query($con, $sql_UPDATE);
                    echo '<script type="text/javascript">
                    alert("Cambio la contraseña correctamente, inicie sesión nuevamente");
                    window.location.href="../index.php";
                    </script>';

                } else {
                    echo '<script type="text/javascript">
                    alert("Ocurrio un error inteente de nuevo");
                    window.location.href="../pantallas/CambiarCont.php";
                    </script>';
                }
            }
        } else{
            header("Location:../pantallas/Perfil.php");
            exit();
        }
    
    }else{
        header("Location:../index.php");
        exit();
    }
