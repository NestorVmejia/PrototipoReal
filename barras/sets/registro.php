<?php
    session_start();
    include('conexion.php');

    if (isset($_POST['Insertar'])) {

        $nss = $_POST["nss1"];
        $Agregado = $_POST["agre"];
        $Vigente =  $_POST["cond"];

        $nombre_paciente =  $_POST["nom"];
        $Apellido_Paterno = $_POST["ap"];
        $Apellido_Materno = $_POST ["am"];

        $UMF = $_POST["dhu"];
        $consultorio = $_POST["con"];
        $turno = $_POST ["tur"];

        $telefono = $_POST ["tel"];
        $RegistroPatronal = $_POST ["reg"];
        $direccion = $_POST ["dire"];

        $enfermedad = $_POST ["Enfermedad"];
        $riesgo = $_POST ["Riesgo"];
        $fecha = $_POST ["fecha"];

        $sql_insertDatos = "INSERT  INTO Pacientes 
                            Values ('$nss','$Agregado','$Vigente','$nombre_paciente','$Apellido_Paterno','$Apellido_Materno','$UMF','$consultorio','$turno','$telefono','$RegistroPatronal','$direccion','$enfermedad','$riesgo','$fecha')";
        $ejecucion_Insertar = mysqli_query($con,$sql_insertDatos);

        if (!$ejecucion_Insertar) {
            echo '<script type="text/javascript">
            alert("Ocurrio un error en la conexion, intente de nuevo");
            window.location.href="../pantallas/Editar.php";
            </script>';
        }
        else {

            echo '<script type="text/javascript">
            alert("Se registro correctamente el usuario en la tabla ");
            window.location.href="../pantallas/Inicio.php";
            </script>';
        }

        

    }
?>