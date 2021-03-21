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
                        Detalle de la Categoria
                    </div>
                   
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        ID Categoria
                                    </th>
                                    <td>
                                        <?php echo $category->idcategory ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <td>
                                        <?php echo $category->name ?>
                                    </td>
                                </tr>
                        
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-secondary" href="?controller=Category&action=index">Cancelar</a>
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