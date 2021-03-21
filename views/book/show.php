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
                        Detalle del Libro
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        Codigo
                                    </th>
                                    <td>
                                        <?php echo $book->idbook ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Titulo
                                    </th>
                                    <td>
                                        <?php echo $book->title ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Cantidad
                                    </th>
                                    <td>
                                        <?php echo $book->stock ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Puntuacion
                                    </th>
                                    <td>
                                        <?php echo $book->likes ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Imagen
                                    </th>
                                    <td>
                                        <img src="views/assets/image_books/<?php echo $book->image; ?>" style="height: 100px; width: 100px" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Año
                                    </th>
                                    <td>
                                        <?php echo $book->year ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Categoria
                                    </th>
                                    <td>
                                        <?php echo $book->category_name ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Autor
                                    </th>
                                    <td>
                                        <?php echo $book->author_name ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-secondary" href="?controller=Book&action=index">Cancelar</a>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
    </div>
    <?php include('views/partials/footer.php'); ?>
</body>


</html>