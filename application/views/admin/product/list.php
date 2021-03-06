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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
                                        <th>ID Barang</th>
										<th>Nama</th>
										<th>Harga (Rp.)</th>
										<th>Photo</th>
										<th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Warna</th>
                                        <th>Panjang (cm)</th>
                                        <th>Tinggi (cm)</th>
										<th>Berat (gram)</th>
										<th>Merek</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($produk as $produkku): ?>
									<tr>
										<td width="150">
                                            <?php echo $produkku->produk_id ?>
                                        </td>
                                        <td>
											<?php echo $produkku->produk_nama ?>
										</td>
										<td>
											<?php echo $produkku->produk_harga ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/product/'.$produkku->produk_gambar) ?>" width="64" />
										</td>
                                        <td>
											<?php echo $produkku->produk_kategori ?>
										</td>
										<td class="small">
											<?php echo substr($produkku->produk_deskripsi, 0, 120) ?>
                                        </td>
                                        <td>
											<?php echo $produkku->produk_warna ?>
										</td>
                                        <td>
											<?php echo $produkku->produk_panjang ?>
										</td>
                                        <td>
											<?php echo $produkku->produk_tinggi ?>
										</td>
                                        <td>
											<?php echo $produkku->produk_berat ?>
										</td>
                                        <td>
											<?php echo $produkku->produk_merek ?>
										</td>
										<td width="100">
											<a href="<?php echo site_url('admin/products/edit/'.$produkku->produk_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$produkku->produk_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

    <script>
        function deleteConfirm(url){
	        $('#btn-delete').attr('href', url);
	        $('#deleteModal').modal();
        }
    </script>

</body>

</html>