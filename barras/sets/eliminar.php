    <?php
    session_start();
    include('conexion.php');

if (isset($_POST['borrar'])) {
    
    $id = $con->real_escape_string($_POST['Agregado']);

    $sql = "DELETE FROM Pacientes WHERE Agregado LIKE '%$id%'";
    $query = mysqli_query($con, $sql);

    if (!$query) {
            echo '<script type="text/javascript">
            alert("Ocurrio un error en la conexion, intente de nuevo");
            window.location.href="../pantallas/Inicio.php";
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