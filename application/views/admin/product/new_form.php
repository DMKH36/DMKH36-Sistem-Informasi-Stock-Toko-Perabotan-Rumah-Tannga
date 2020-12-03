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
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/products/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="produk_nama">Nama Produk*</label>
								<input class="form-control <?php echo form_error('produk_nama') ? 'is-invalid':'' ?>"
								 type="text" name="produk_nama" placeholder="Nama produk..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="produk_harga">Harga (Rp.)*</label>
								<input class="form-control <?php echo form_error('produk_harga') ? 'is-invalid':'' ?>"
								 type="number" name="produk_harga" min="0" placeholder="Hanya angka..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_harga') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="produk_gambar">Foto Produk</label>
								<input class="form-control-file <?php echo form_error('produk_gambar') ? 'is-invalid':'' ?>"
								 type="file" name="produk_gambar" />
								<div class="invalid-feedback">
									<?php echo form_error('produk_gambar') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="produk_kategori">Kategori*</label>
								<input class="form-control <?php echo form_error('produk_kategori') ? 'is-invalid':'' ?>"
								 type="text" name="produk_kategori" min="0" placeholder="Kategori produk..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_kategori') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="produk_deskripsi">Deskripsi Produk*</label>
								<textarea class="form-control <?php echo form_error('produk_deskripsi') ? 'is-invalid':'' ?>"
								 name="produk_deskripsi" placeholder="Deskripsi produk..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('produk_deskripsi') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="produk_warna">Warna*</label>
								<input class="form-control <?php echo form_error('produk_warna') ? 'is-invalid':'' ?>"
								 type="text" name="produk_warna" min="0" placeholder="Warna produk..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_warna') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="produk_panjang">Panjang (cm)*</label>
								<input class="form-control <?php echo form_error('produk_panjang') ? 'is-invalid':'' ?>"
								 type="number" name="produk_panjang" min="0" placeholder="Hanya angka (cm)..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_panjang') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="produk_tinggi">Tinggi (cm)*</label>
								<input class="form-control <?php echo form_error('produk_tinggi') ? 'is-invalid':'' ?>"
								 type="number" name="produk_tinggi" min="0" placeholder="Hanya angka (cm)..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_tinggi') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="produk_berat">Berat (gram)*</label>
								<input class="form-control <?php echo form_error('produk_berat') ? 'is-invalid':'' ?>"
								 type="number" name="produk_berat" min="0" placeholder="Hanya angka (gram)..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_berat') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="produk_merek">Merek*</label>
								<input class="form-control <?php echo form_error('produk_merek') ? 'is-invalid':'' ?>"
								 type="text" name="produk_merek" min="0" placeholder="Merek produk..." />
								<div class="invalid-feedback">
									<?php echo form_error('produk_merek') ?>
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