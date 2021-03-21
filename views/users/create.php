<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/partials/header.php'); ?>
</head>


<body>
    <div class="container-fluid" id="wrapper">
        <div class="row">
            <?php include('views/partials/sidebar.php'); ?>
            <main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
                <?php include('views/partials/main_header.php'); ?>
                <div class="card">
                    <div class="card-header">
                        Crear Usuario
                    </div>
                    <div class="card-body">
                        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="?controller=Users&action=store">
                            <div class="form-group">
                                <label for="code">Codigo*</label>
                                <input type="number" id="code" name="code" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nombres*</label>
                                <input type="text" id="name" name="name" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Apellidos*</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="user_name">Nombre de Usuario*</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña*</label>
                                <input type="password" id="password" name="password" class="form-control" value="" required>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="Guardar">
                                <a class="btn btn-secondary" href="?controller=Users&action=index">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    </div>
    <?php include('views/partials/footer.php'); ?>
</body>


</html>