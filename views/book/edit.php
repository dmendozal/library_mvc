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
                        Editar Libro
                    </div>
                    <div class="card-body">
                        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="?controller=Book&action=update&id=<?php echo $author->idauthor; ?>">
                            <div class="form-group">
                                <label for="title">Titulo*</label>
                                <input type="text" id="title" name="title" class="form-control" value="<?php echo  $book->title; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="stock">Cantidad*</label>
                                <input type="number" id="stock" name="stock" class="form-control" value="<?php echo  $book->stock; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image*</label>
                                <input type="file" id="image" name="image" class="form-control" value="<?php echo  $book->image; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="year">Año*</label>
                                <input type="number" id="year" name="year" class="form-control" value="<?php echo  $book->year; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="fkidcategory">Categoria*</label>
                                <select name="fkidcategory" id="fkidcategory" class="form-control">
                                    <option value=<?php echo $category->idcategory; ?>>
                                        <?php echo $category->name; ?>
                                    </option>
                                    <?php foreach ($categories as $key => $category) { ?>
                                        <option value=<?php echo $category->getIdcategory(); ?>>
                                            <?php echo  $category->getName(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fkidauthor">Autor*</label>
                                <select name="fkidauthor" id="fkidauthor" class="form-control ">
                                    <option value=<?php echo $author->idauthor; ?>>
                                        <?php echo $author->name; ?>
                                    </option>
                                    <?php foreach ($authors as $key => $author) { ?>
                                        <option value=<?php echo $author->getIdauthor(); ?>>
                                            <?php echo $author->getName(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="Guardar">
                                <a class="btn btn-secondary" href="?controller=Book&action=index">Cancelar</a>
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