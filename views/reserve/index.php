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
												Descripcion
											</th>
											<th>
												Fecha
											</th>
											<th>
												Estado
											</th>
											<th>
												Usuario
											</th>
											<th>
												Libro
											</th>
											<th>
												Acciones
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($reserves as $key => $item) {
											?>
											<tr data-entry-id="{$key}">
												<td>
													<?php echo $key + 1; ?>
												</td>
												<td>
													<?php echo $item->getDescription(); ?>
												</td>
												<td>
													<?php echo $item->getDateReserve(); ?>
												</td>
												<td>
													<?php echo ($item->getStateReserve() == 1) ? 'En proceso' : 'Terminado'; ?>
												</td>
												<td>
													<?php echo $item->getUsersFullname(); ?>
												</td>
												<td>
													<?php echo $item->getBookTitle(); ?>
												</td>
												<td>
													<a class="btn btn-xs btn-info" href="?controller=Reserve&action=edit&id=<?php echo $item->getIdreserve(); ?>">
														Editar
													</a>
													<form action="?controller=Reserve&action=destroy&id=<?php echo $item->getIdreserve(); ?>" method="POST" onsubmit="return confirm('¿Esta seguro que desea eliminar?');" style="display: inline-block;">
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