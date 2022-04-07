<?= $this->extend('main'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-th-list"></i>
            <p>
                Master
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('supplier'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Supplier</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('barang'); ?>" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang</p>
                </a>
            </li>
            <?php if (session()->get('userLevel') == 0) { ?>
                <li class="nav-item">
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-th-list"></i>
            <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('pegawai'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang Masuk</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('tujuan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang Keluar</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-th-list"></i>
            <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('pegawai'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Master</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('tujuan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Transaksi</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('profile'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-user"></i>
            <p>
                Profile
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('logout'); ?>" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
</ul>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Barang</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Barang</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Tambah data</h5>
        </div>
        <form action="<?= base_url('barang/save'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= old('kode'); ?>" required placeholder="Masukan kode barang">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" required placeholder="Masukan nama barang">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" required placeholder="Masukan password">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Satuan Barang</label>
                            <input type="text" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" id="satuan" name="satuan" value="<?= old('satuan'); ?>" required placeholder="Masukan satuan barang">
                            <div class="invalid-feedback">
                                <?= $validation->getError('satuan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" onkeypress="return onlyNumber(event)" class="form-control <?= ($validation->hasError('beli')) ? 'is-invalid' : ''; ?>" id="beli" name="beli" value="<?= old('beli'); ?>" required placeholder="Masukan harga beli">
                            <div class="invalid-feedback">
                                <?= $validation->getError('beli'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" onkeypress="return onlyNumber(event)" class="form-control <?= ($validation->hasError('jual')) ? 'is-invalid' : ''; ?>" id="jual" name="jual" value="<?= old('jual'); ?>" required placeholder="Masukan harga jual">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jual'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="<?= base_url('barang'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

<?= $this->endSection(); ?>