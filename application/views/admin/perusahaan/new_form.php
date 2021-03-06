<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/perusahaan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/perusahaan/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="produk_merek">Nama Perusahaan*</label>
								<input class="form-control <?php echo form_error('produk_merek') ? 'is-invalid':'' ?>"
								 type="text" name="produk_merek" placeholder="Nama perusahaan..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_merek') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="merek_logo">Logo Perusahaan</label>
								<input class="form-control-file <?php echo form_error('merek_logo') ? 'is-invalid':'' ?>"
								 type="file" name="merek_logo" />
								<div class="invalid-feedback">
									<?php echo form_error('merek_logo') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="merek_lokasi">Lokasi*</label>
								<input class="form-control <?php echo form_error('merek_lokasi') ? 'is-invalid':'' ?>"
								 type="text" name="merek_lokasi" placeholder="Kota Perusahaan..." />
								<div class="invalid-feedback">
									<?php echo form_error('merek_lokasi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="merek_deskripsi">Deskripsi Perusahaan*</label>
								<textarea class="form-control <?php echo form_error('merek_deskripsi') ? 'is-invalid':'' ?>"
								 name="merek_deskripsi" placeholder="Deskripsi perusahaan..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('merek_deskripsi') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>