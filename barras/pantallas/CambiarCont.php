<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/378d6c7b46.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/stylechPass.css">
    <link rel="icon" href="../src/icono.ico">
    <title>Cambiar Contraseña</title>
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
                
            </div> <a href="../sets/LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Salir</span> </a>
        </nav>
    </div>

    <div class="container py-5" style="position: fixed;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="card-title text-uppercase">Cambiar Contraseña</h4>
                    </div>
                    <div class="card-body">
                        <form action="../sets/passwCh.php" method="POST" class="needs-validation"">
                                <div class=" row">
                                <?php if (isset($_GET['error'])) { ?>
                                            <p style="background-color: red;"><?php echo $_GET['error']; ?> </p>
                                       <?php } ?>
                            <div class="col-sm-6 col-md-12 col-xs-12">
                                <div class="form-group mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Contraseña Actual:</span>
                                        <input type="text" id="old_password" name="old_password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-xs-12">
                                <div class="form-group mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Nueva contraseña:</span>
                                        <input type="text"  id="new_password" name="new_password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-xs-12">
                                <div class="form-group mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Confirma la nueva contraseña:</span>
                                        <input type="text"  id="c_np" name="c_np" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div >
                            <input type="button" value="Regresar" onClick="history.go(-1);" class="btn btn-dark">
				            <input style="float: right;" type="submit" name="Insertar" value="Cambiar contraseña " class="btn btn-danger">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="scripts.js"></script>
</body>

</html>