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
							<a class="btn btn-success" style="color: white" href="?controller=Comments&action=create&id=<?php echo $fkidpublication; ?>">
								Agregar Nuevo Comentario
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
												Commentario
											</th>
											<th>
												Usuario
											</th>
											<th>
												Fecha de Comentario
											</th>
											<th>
												Acciones
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($comments as $key => $item) {
											?>
											<tr data-entry-id=<?php echo $key + 1; ?>>
												<td>
													<?php echo $key + 1; ?>
												</td>
												<th>
													<?php echo $item->getComment(); ?>
												</th>
												<th>
													<?php echo $item->getUsersUsername(); ?>
												</th>
												<td>
													<?php echo $item->getDateComment(); ?>
												</td>
												<td>
													<a class="btn btn-xs btn-primary" href="?controller=Comments&action=edit&id=<?php echo $item->getIdcomments(); ?>">
														Editar
													</a>
													<form action="?controller=Comments&action=destroy&id=<?php echo $item->getIdcomments(); ?>" method="POST" onsubmit="return confirm('¿Esta seguro que desea eliminar?');" style="display: inline-block;">
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
					<div>
						<a class="btn btn-info" href="?controller=Publication&action=index">Atras</a>
					</div>
				</div>
			</main>
		</div>
	</div>
	</div>
	<?php include('views/partials/footer.php'); ?>
</body>


</html>