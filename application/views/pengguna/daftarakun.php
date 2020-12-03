<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Nimaz Perabot</h1>
                <p class="lead">Silahkan Daftarkan Diri Anda</p>
            </div>
        </div>

        <?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php endif; ?>

        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-5">
                <form action="<?= site_url('pengguna/daftarakun') ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="pengguna_nama">Nama Lengkap</label>
                        <input class="form-control <?php echo form_error('pengguna_nama') ? 'is-invalid':'' ?>"
                         type="text" name="pengguna_nama" placeholder="Nama lengkap anda..."  />
                        <div class="invalid-feedback">
							<?php echo form_error('pengguna_nama') ?>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="pengguna_username">Username</label>
                        <input class="form-control <?php echo form_error('pengguna_username') ? 'is-invalid':'' ?>"
                         type="text" name="pengguna_username" placeholder="Isikan username..."  />
                        <div class="invalid-feedback">
							<?php echo form_error('pengguna_username') ?>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="pengguna_email">Email</label>
                        <input class="form-control <?php echo form_error('pengguna_email') ? 'is-invalid':'' ?>"
                         type="text" name="pengguna_email" placeholder="Isikan email..."  />
                        <div class="invalid-feedback">
							<?php echo form_error('pengguna_email') ?>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="pengguna_password">Password</label>
                        <input class="form-control <?php echo form_error('pengguna_password') ? 'is-invalid':'' ?>"
                         type="password"name="pengguna_password" placeholder="Isikan Password..."  />
                        <div class="invalid-feedback">
							<?php echo form_error('pengguna_password') ?>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="pengguna_hp">No HP</label>
                        <input class="form-control <?php echo form_error('pengguna_hp') ? 'is-invalid':'' ?>"
                         type="number" name="pengguna_hp" placeholder="Hanya angka..."  />
                        <div class="invalid-feedback">
							<?php echo form_error('pengguna_hp') ?>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="pengguna_alamat">Alamat Lengkap</label>
                        <textarea class="form-control <?php echo form_error('pengguna_alamat') ? 'is-invalid':'' ?>"
                         type="text" name="pengguna_alamat" placeholder="Isikan alamat lengkap anda..."  ></textarea>
                        <div class="invalid-feedback">
							<?php echo form_error('pengguna_alamat') ?>
						</div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('pengguna/login') ?>">Login</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success w-100" type="submit" name="btn" value="Save" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>