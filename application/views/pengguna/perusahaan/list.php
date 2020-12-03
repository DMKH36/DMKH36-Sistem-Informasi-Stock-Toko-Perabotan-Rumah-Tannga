<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pengguna/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("pengguna/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("pengguna/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("pengguna/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Perusahaan</th>
										<th>Logo Perusahaan</th>
										<th>Lokasi</th>
										<th>Deskripsi Perusahaan</th>
                                        <!-- <th>Action</th> -->
									</tr>
								</thead>
								<tbody>
									<?php foreach ($merek as $perusahaan): ?>
									<tr>
										<td width="150">
                                            <?php echo $perusahaan->produk_merek ?>
                                        </td>
										<td>
											<img src="<?php echo base_url('upload/perusahaan/'.$perusahaan->merek_logo) ?>" width="64" />
										</td>
                                        <td>
											<?php echo $perusahaan->merek_lokasi ?>
										</td>
										<td class="small">
											<?php echo substr($perusahaan->merek_deskripsi, 0, 120) ?>
                                        </td>
										<!-- <td width="250">
											<a href="<//?php echo site_url('pengguna/perusahaan/edit/'.$perusahaan->merek_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<//?php echo site_url('pengguna/perusahaan/delete/'.$perusahaan->merek_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td> -->
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
			<?php $this->load->view("pengguna/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("pengguna/_partials/scrolltop.php") ?>
	<?php $this->load->view("pengguna/_partials/modal.php") ?>

	<?php $this->load->view("pengguna/_partials/js.php") ?>

</body>

</html>