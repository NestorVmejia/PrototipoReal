<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../sets/conexion.php");
$sql = "SELECT * FROM Pacientes";
if (isset($_POST['buscar'])) {
    $nss = $_POST['nss'];
    $sql = "SELECT*FROM Pacientes WHERE nss LIKE '%$nss%'";
}
$query = mysqli_query($con, $sql);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/378d6c7b46.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="../src/icono.ico">
    <title>PRUEBA</title>
</head>

<body id="body-pd" style="background-color:aliceblue;">
    <header class="header" id="header">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img">
            <a href="../pantallas/Perfil.php"><img src="../src/user.png" alt="user" width="45" height="45" class="rounded-circle"></a>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="../pantallas/Inicio.php" class="nav_logo"> <img src="../src/logo.png" width="30" height="30" alt="Logo" class="d-inline-block align-text-top"> <span class="nav_logo-name">IMSS</span> </a>
                <div class="nav_list">
                    <a href="../pantallas/Editar.php" class="nav_link "> <i class="fa-solid fa-file-pen"></i> <span class="nav_name">Verificar Vigencia</span> </a>
                    <a href="../pantallas/Inicio.php" class="nav_link active"><i class="fa-solid fa-database"></i> <span class="nav_name">Pacientes</span> </a>
                    <a href="#" class="nav_link"> <i class="fa-solid fa-file-lines"></i> <span class="nav_name">Generar documento</span> </a>
                </div>
            </div> <a href="../sets/LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Salir</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <main>
        <center>
            <h4>Pacientes</h4>
        </center>
        <div class="container py-4 text-center">
            <div class="row g-4">
                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                </div>
                <div class="col-auto">
                    <select name="num_registros" id="num_registros" class="form-select">

                        <option value="10">
                            <center>10</center>
                        </option>
                        <option value="25">
                            <center>25</center>
                        </option>
                        <option value="50">
                            <center>50</center>
                        </option>
                        <option value="100">
                            <center>100</center>
                        </option>
                    </select>
                </div>
                <div class="col-auto">
                </div>
                <div class="col-5"></div>
                <div class="col-auto">
                    <label for="campo" class="col-form-label"><i class="fa-solid fa-magnifying-glass"></i>: </label>
                </div>
                <div class="col-auto w-55">
                    <input type="text" name="campo" id="campo" class="form-control">
                </div>
            </div>
            <div class="row py-4">
                <div class="col">
                    <table class="table table-sm table-bordered border-white table-dark table-striped container-fluid"">
                        <thead>
                            <tr class=" table-dark">
                        <th class="sort asc">NSS</th>
                        <th class="sort asc">Nombre(s)</th>
                        <th class="sort asc">Enfermedad </th>
                        <th class="sort asc">Riesgo</th>
                        <th>Acciones</th>

                        </tr>
                        </thead>
                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label id="lbl-total"></label>
                </div>
                <div class="col-6" id="nav-paginacion"></div>
                <input type="hidden" id="pagina" class="btn btn-outline-dark" value="1">
                <input type="hidden" id="orderCol" class="btn btn-outline-dark" value="0">
                <input type="hidden" id="orderType" class="btn btn-outline-dark" value="asc">
            </div>

        </div>

    </main>
    <?php
        include 'Opciones.php';
    ?>
    <script>
        /* Llamando a la función getData() */
        getData()
        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("campo").addEventListener("keyup", function() {
            getData()
        }, false)
        document.getElementById("num_registros").addEventListener("change", function() {
            getData()
        }, false)
        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let num_registros = document.getElementById("num_registros").value
            let content = document.getElementById("content")
            let pagina = document.getElementById("pagina").value
            let orderCol = document.getElementById("orderCol").value
            let orderType = document.getElementById("orderType").value
            if (pagina == null) {
                pagina = 1
            }
            let url = "../sets/load.php"
            let formaData = new FormData()
            formaData.append('campo', input)
            formaData.append('registros', num_registros)
            formaData.append('pagina', pagina)
            formaData.append('orderCol', orderCol)
            formaData.append('orderType', orderType)
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data.data
                    document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                        ' de ' + data.totalRegistros + ' registros'
                    document.getElementById("nav-paginacion").innerHTML = data.paginacion
                }).catch(err => console.log(err))
        }

        function nextPage(pagina) {
            document.getElementById('pagina').value = pagina
            getData()
        }
        let columns = document.getElementsByClassName("sort")
        let tamanio = columns.length
        for (let i = 0; i < tamanio; i++) {
            columns[i].addEventListener("click", ordenar)
        }

        function ordenar(e) {
            let elemento = e.target
            document.getElementById('orderCol').value = elemento.cellIndex
            if (elemento.classList.contains("asc")) {
                document.getElementById("orderType").value = "asc"
                elemento.classList.remove("asc")
                elemento.classList.add("desc")
            } else {
                document.getElementById("orderType").value = "desc"
                elemento.classList.remove("desc")
                elemento.classList.add("asc")
            }
            getData()
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>

</html>