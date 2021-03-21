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
                        Editar Reserva
                    </div>
                    <div class="card-body">
                        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="?controller=Reserve&action=update&id=<?php echo $reserve->idreserve; ?>">
                            <div class="form-group">
                                <label for="state_reserve">Autor*</label>
                                <select name="state_reserve" id="state_reserve" class="form-control ">
                                    <option value=<?php echo $reserve->state_reserve; ?>>
                                        <?php echo ($reserve->state_reserve == 1) ? 'En proceso' : 'Terminado'; ?>
                                    </option>
                                    <option value="0">
                                        Terminado
                                    </option>
                                    <option value="1">
                                        En proceso
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="users">Usuario*</label>
                                <input type="text" id="users" name="users" class="form-control" value="<?php echo $reserve->users_name.' '.$reserve->users_lastname; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="comment">Libro*</label>
                                <input type="text" id="comment" name="comment" class="form-control" value="<?php echo $reserve->book_title; ?>" readonly>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="Guardar">
                                <a class="btn btn-secondary" href="?controller=Reserve&action=index">Cancelar</a>
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