<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylePerfil.css">
    <script src="https://kit.fontawesome.com/378d6c7b46.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="../src/icono.ico">
    <title>Perfil Demo</title>
</head>

<body id="body-pd" style="background-image:url('../src/init.jpg');">
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
                    <a href="../pantallas/Inicio.php" class="nav_link "><i class="fa-solid fa-database"></i> <span class="nav_name">Pacientes</span> </a>
                    <a href="../pantallas/Editar.php" class="nav_link"> <i class="fa-solid fa-file-pen"></i> <span class="nav_name">Editar datos</span> </a>
                    <a href="#" class="nav_link"> <i class="fa-solid fa-file-lines"></i> <span class="nav_name">Generar documento</span> </a>
                </div>
            </div> <a href="../sets/LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Salir</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100">
        <section class="vh-100">
            <div class="container py-5 h-250">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="../src/user.png" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <h5><?php echo $_SESSION['Nombre'] ?></h5>
                                    <p><?php echo $_SESSION['rol'] ?></p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>Datos del perfil</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-15 mb-4">
                                                <h6>Correo</h6>
                                                <p class="text-muted"><?php echo $_SESSION['correo'] ?></p>
                                            </div>
                                            <div class="col-8 mb-4">
                                                <h6>Matricula</h6>
                                                <p class="text-muted"><?php echo $_SESSION['usuario'] ?></p>
                                            </div>
                                        </div>
                                        <h6>Datos extras</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Turno</h6>
                                                <p class="text-muted"><?php echo $_SESSION['Turno'] ?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>DhUMF</h6>
                                                <p class="text-muted"><?php echo $_SESSION['UMF'] ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2">
                                        <a href="CambiarCont.php"><button class="btn btn-warning w-100 p-3" type="button" >Cambiar Contraseña</button></a>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="scripts.js"></script>
</body>

</html>