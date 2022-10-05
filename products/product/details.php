<?php
include '../app/ProductsController.php';
$product = new ProductsController;
$slug = $_GET['slug'];
$products = $product->details($slug);
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

					<div class="row">

						<div class="col-md-4 col-sm-12">

							<div class="card mb-2 mt-2">
								<img src="<?php echo $products->cover ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?php echo  $products->name ?></h5>

									<p class="card-text"><?php echo $products->description ?></p>
									<p>Etiquetas:</p>
									<ol>
										<?php foreach ($products->tags as $tag): ?>
											<li> <?php echo $tag->name ?> </li>
										<?php endforeach ?>
									</ol>
									<p>Categorias:</p>
									<ol>
										<?php foreach ($products->categories as $category) : ?>
											<li> <?php echo $category->name ?> </li>
										<?php
										endforeach ?>
									</ol>
									<p>Funciones: </p><?php echo $products->features ?>
									
								</div>
							</div>

						</div>


					</div>

				</section>


			</div>

		</div>

	</div>

	<!-- Modal -->

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