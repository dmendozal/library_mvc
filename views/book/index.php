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
				<div class="container">
					<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" style="color: white" href="?controller=Book&action=create">
								Agregar Nuevo Libro
							</a>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover datatable">
									<thead>
										<tr>
											<th width="10">
												Nro
											</th>
											<th>
												Codigo
											</th>
											<th>
												Titulo
											</th>
											<th>
												Cantidad
											</th>
											<th>
												Puntuacion
											</th>
											<th>
												Imagen
											</th>
											<th>
												Año
											</th>
											<th>
												Categoria
											</th>
											<th>
												Autor
											</th>
											<th>
												Acciones
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($books as $key => $item) {
											?>
											<tr data-entry-id=<?php echo $key; ?>>
												<td>
													<?php echo $key + 1; ?>
												</td>
												<td>
													<?php echo $item->getIdbook(); ?>
												</td>
												<th>
													<?php echo $item->getTitle(); ?>
												</th>
												<th>
													<?php echo $item->getStock(); ?>
												</th>
												<td>
													<?php echo $item->getLikes(); ?>
												</td>
												<td>
													<img src="views/assets/image_books/<?php echo $item->getImage(); ?>" style="height: 100px; width: 100px" alt="">
												</td>
												<td>
													<?php echo $item->getYear(); ?>
												</td>
												<td>
													<?php echo $item->getCategoryName(); ?>
												</td>
												<td>
													<?php echo $item->getAuthorName(); ?>
												</td>
												<td>
													<a class="btn btn-xs btn-primary" href="?controller=Book&action=show&id=<?php echo $item->getIdbook(); ?>">
														Mostrar
													</a>
													<a class="btn btn-xs btn-info" href="?controller=Book&action=edit&id=<?php echo $item->getIdbook(); ?>">
														Editar
													</a>
													<form action="?controller=Book&action=destroy&id=<?php echo $item->getIdbook(); ?>" method="POST" onsubmit="return confirm('¿Esta seguro que desea eliminar?');" style="display: inline-block;">
														<input type="hidden" name="_method" value="DELETE">
														<input type="submit" class="btn btn-xs btn-danger" value="eliminar">
													</form>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
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