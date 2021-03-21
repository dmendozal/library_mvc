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
                        Realizar Publicacion
                    </div>
                    <div class="card-body">
                        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="?controller=Publication&action=store">
                            <div class="form-group">
                                <label for="description">Descripcion*</label>
                                <input type="text" id="description" name="description" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="fkidbook">Libro*</label>
                                <select name="fkidbook" id="fkidbook" class="form-control">
                                    <?php foreach ($books as $key => $book) { ?>
                                        <option value=<?php echo $book->getIdbook(); ?>>
                                            <?php echo  $book->getTitle(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="Guardar">
                                <a class="btn btn-secondary" href="?controller=Publication&action=index">Cancelar</a>
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