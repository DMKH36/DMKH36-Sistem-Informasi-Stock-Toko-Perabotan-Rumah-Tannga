<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('pengguna') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Halaman Utama</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Lihat Produk:</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('pengguna/products') ?>">Daftar Barang</a>
            <a class="dropdown-item" href="<?php echo site_url('pengguna/perusahaan') ?>">Daftar Perusahaan</a>
            <a class="dropdown-item" href="<?php echo site_url('pengguna/tipe') ?>">Tipe Barang</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Pesanan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tentang Kami</span></a>
    </li>
</ul>
