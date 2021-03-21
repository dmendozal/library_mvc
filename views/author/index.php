<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('views/partials/header.php'); ?>
</head>

<body >
	<div class="container-fluid"  id="wrapper">
		<div class="row" >
			<?php include('views/partials/sidebar.php'); ?>
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4"  >
				<?php include('views/partials/main_header.php'); ?>
				<div class="container">
					<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" style="color: white" href="?controller=Author&action=create">
								Agregar Nuevo Autor
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
												ID Author
											</th>
											<th>
												Nombre
											</th>
											<th>
												Nacionalidad
											</th>
											<th>
												Fecha de Nacimiento
											</th>
											<th>
												Acciones
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($authors as $key => $item) {
											?>
											<tr data-entry-id=<?php echo $key; ?>>
												<td>
													<?php echo $key + 1; ?>
												</td>
												<td>
													<?php echo $item->getIdauthor(); ?>
												</td>
												<th>
													<?php echo $item->getName(); ?>
												</th>
												<th>
													<?php echo $item->getNacionality(); ?>
												</th>
												<td>
													<?php echo $item->getDateBirth(); ?>
												</td>
												<td>
													<a class="btn btn-xs btn-primary" href="?controller=Author&action=show&id=<?php echo $item->getIdauthor(); ?>">
														Mostrar
													</a>
													<a class="btn btn-xs btn-info" href="?controller=Author&action=edit&id=<?php echo $item->getIdauthor(); ?>">
														Editar
													</a>
													<form action="?controller=Author&action=destroy&id=<?php echo $item->getIdauthor(); ?>" method="POST" onsubmit="return confirm('¿Esta seguro que desea eliminar?');" style="display: inline-block;">
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