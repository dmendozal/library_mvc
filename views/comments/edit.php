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
                        Editar Comentario
                    </div>
                    <div class="card-body">
                        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="?controller=Comments&action=update&id=<?php echo $comment->idcomments; ?>">
                            <div class="form-group">
                                <label for="comment">Comentario*</label>
                                <input type="text" id="comment" name="comment" class="form-control" value="<?php echo $comment->comment; ?>" required>
                            </div>
                            <input type="number" id="fkidpublication" name="fkidpublication" value="<?php echo $comment->fkidpublication; ?>" hidden>
                            <div>
                                <input class="btn btn-danger" type="submit" value="Guardar">
                                <a class="btn btn-secondary" href="?controller=Comments&action=index&id=<?php echo $comment->fkidpublication; ?>">Cancelar</a>
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