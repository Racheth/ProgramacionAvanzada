<?php
include '../app/ProductsController.php';
include '../app/BrandsController.php';
$product = new ProductsController;
$products = $product->getProducts();

$brand = new BrandsController;
$brands = $brand->getbrands();

?>
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

						<?php foreach ($products as $product) : ?>

							<div class="col-md-4 col-sm-12">

								<div class="card mb-2">
									<img src="<?php echo $product->cover ?>" class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title"><?php echo  $product->name ?></h5>

										<p class="card-text"><?php echo $product->description ?></p>

										<div class="row">
											<a data="<?php echo json_encode($product); ?>" onclick="edit($product)" data-bs-toggle="modal" data-bs-target="#editproduct" href="#" class="btn btn-warning mb-1 col-6">
												Editar
											</a>
											<a onclick="eliminar(<?= $product->id ?>)" href="#" class="btn btn-danger mb-1 col-6">
												Eliminar
											</a>
											<a href="details.php?slug=<?php echo $product->slug ?>" class="btn btn-info col-12">
												Detalles
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
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
					<h5 class="modal-title" id="exampleModalLabel">ADD PRODUCTS</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="POST" action="../app/ProductsController.php" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group mb-3">
							<span class="input-group-text" id="basic-addon1">Nombre del producto</span>
							<input name="name" type="text" class="form-control form-control-lg">
						</div>
						<div class="form-group mb-3">
							<span class="input-group-text" id="basic-addon1">Descripcion</span>
							<input name="description" type="text" class="form-control form-control-lg">
						</div>
						<div class="form-group mb-3">
							<span class="input-group-text" id="basic-addon1">features</span>
							<input name="features" type="text" class="form-control form-control-lg">
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">brand_id</span>
							<select name="" id="">
								<?php foreach ($brands as $brand) : ?>
									<option value="<?= $brand->id ?>">
										<?= $brand->name ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="drop-zone">
							<input name="img_producto" type="file" class="form-control-file">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
					<input type="hidden" value="create" name="action">



				</form>

			</div>
		</div>
	</div>
	<!-- Modal EDIT-->
	<div class="modal fade" id="editproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">EDIT PRODUCTS</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="POST" action="../app/ProductsController.php" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group mb-3">
							<span class="input-group-text" id="basic-addon1">Nombre del producto</span>
							<input name="name" type="text" class="form-control form-control-lg">
						</div>
						<div class="form-group mb-3">
							<span class="input-group-text" id="basic-addon1">Descripcion</span>
							<input name="description" type="text" class="form-control form-control-lg">
						</div>
						<div class="form-group mb-3">
							<span class="input-group-text" id="basic-addon1">features</span>
							<input name="features" type="text" class="form-control form-control-lg">
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">brand_id</span>
							<select name="brand_id" id="">
								<?php foreach ($brands as $brand) : ?>
									<option value="<?= $brand->id ?>">
										<?= $brand->name ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
					<input id="inputOculto" type="hidden" name="action" value="update">
					




				</form>

			</div>
		</div>
	</div>
	<?php include('../layouts/scripts.templade.php')
	?>

	<script type="text/javascript">
		function eliminar(id) {
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
						var bodyFormData = new FormData();
						bodyFormData.append('id', id);
						bodyFormData.append('action', 'delete');
						axios.post('../app/ProductsController.php', bodyFormData)
							.then(function(response) {
								console.log(response);
								location.reload();
							})
							.catch(function(error) {
								console.log(error);
							});
					} else {
						swal("Your imaginary file is safe!");
					}
				});
		}

		function edit(data) {
			const elem = document.getElementById('inputOculto').value = 'update';
			let product = JSON.parse(data.getAttribute('data'));
			console.log(data)
			document.getElementById("id").value = product.id;
			document.getElementById("name").value = product.name;
			document.getElementById("description").value = product.description;
			document.getElementById("features").value = product.features;
			document.getElementById("brand_id").value = product.brand_id;

		}
	</script>
</body>

</html>