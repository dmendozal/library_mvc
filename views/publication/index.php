<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('views/partials/header.php'); ?>
</head>

<body>
	<section class="container-fluid" id="wrapper">
		<section class="row">
			<?php include('views/partials/sidebar.php'); ?>
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<?php include('views/partials/main_header.php'); ?>
				<section class="row">
					<section class="col-sm-12">
						<section class="row" style="text-align:center;">
							<div class="col-lg-12" style="margin-bottom: 50px">
								<a class="btn btn-success" style="color: white" href="?controller=Publication&action=create">
									Realizar una Publicacion
								</a>
								<br>
							</div>
							<table class="table" style="width: auto; margin: 0 auto;">
								<tbody>
									<?php foreach ($publications as $key => $item) { ?>
										<tr>
											<td class="card card-outline-danger" style="width: 22rem; height: 40rem; ">
												<div class="card card-outline-success" style="width: 20rem; height: 40rem; text-align: center; ">
													<div class="card-header" style="text-align: left;">
														<strong> Usuario: <?php echo $item->getUsersUsername(); ?></strong>
													</div>
													<img class="card-img-top center" src="views/assets/image_books/<?php echo $item->getBookImage(); ?>" style="height: 50%; width: 100%;" alt="Card image cap">
													<div class="card-body">
														<br>
														<h5 class="card-title"><?php echo $item->getBookTitle(); ?></h5>
														<p class="card-text"><?php echo $item->getDescription(); ?></p>
														<label class="text-muted small left" for="likes">Likes: <?php echo $item->getBookLikes(); ?></label>
														<label class="text-muted small left" for="stock">Cantidad: <?php echo $item->getBookStock(); ?></label>
														<br>
														<label class="text-muted small" for="date_publication"> <?php echo $item->getDatePublication(); ?></label>
													</div>
													<div class="card-block card-footer">
														<a href="?controller=Comments&action=index&id=<?php echo $item->getIdpublication(); ?>"><em class="fa fa-comment"> Comentarios </em></a>
														<a href="?controller=Book&action=show&id=<?php echo $item->getFkidbook(); ?>"><em class="fa fa-search"> Detalles </em></a>
														<a href="?controller=Reserve&action=create&id=<?php echo $item->getFkidbook(); ?>"><em class="fa fa-shopping-cart"> Reservar </em></a>
														<a href="?controller=Publication&action=likeBook&id=<?php echo $item->getIdpublication(); ?>"><em class="fa fa-hand-o-up"> Me gusta </em></a>
														<?php if ($item->getFkidusers() == $currentUser->idusers) {  ?>
															<a href="?controller=Publication&action=edit&id=<?php echo $item->getIdpublication(); ?>"><em class="fa fa-edit"> Editar </em></a>
															<a href="?controller=Publication&action=destroy&id=<?php echo $item->getIdpublication(); ?>" onclick="return confirm('¿Esta seguro que desea eliminar?');"><em class="fa fa-remove"> Eliminar </em></a>
														<?php } ?>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</section>
					</section>
				</section>
			</main>
		</section>
		</table>
		<?php include('views/partials/footer.php'); ?>
</body>

</html>