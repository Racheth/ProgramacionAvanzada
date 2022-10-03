<!DOCTYPE html>
<html>

<head>
	<?php include('../layouts/head.templade.php')
	?>
</head>

<body>

	<!-- NAVBAR -->
	<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
		<?php include('../layouts/nav.templade.php')
		?>
	</nav>
	<!-- NAVBAR -->

	<div class="container-fluid">

		<div class="row">

			<!-- SIDEBAR -->
			<div class="col-sm-2 d-sm-block d-none bg-light sidebar">

				<?php include('../layouts/sidebar.templade.php') ?>

			</div>
			<!-- SIDEBAR -->

			<div class="col-md-10 col-lg-10 col-sm-12">

				<section>
					<div class="row bg-light m-2">
						<div class="col">
							<label>
								/Productos
							</label>
						</div>
						<div class="col">
							<button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
								Añadir producto
							</button>
						</div>
					</div>
				</section>

				<section>

					<div class="row">



						<div class="col-md-4 col-sm-12">

							<div class="card mb-2">
								<img src="../products/img/fresita.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

									<div class="row">
										<a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
											Editar
										</a>
										<a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
											Eliminar
										</a>

									</div>

								</div>
							</div>

						</div>



					</div>

				</section>


			</div>

		</div>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<form>

					<div class="modal-body">



					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">
							Save changes
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
	<?php include('../layouts/scripts.templade.php')
	?>

	<script type="text/javascript">
		function eliminar(target) {
			swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this imaginary file!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
					} else {
						swal("Your imaginary file is safe!");
					}
				});
		}
	</script>
</body>

</html>