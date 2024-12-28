<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-10 text-center">Tipe Mobil</h4>
      <div class="list-group">
        <?php foreach($kategori as $k) : ?>
        <a href="<?= base_url('customer/kategori/index/') . $k['id_type']; ?>" class="list-group-item list-group-item-action">
          <?= $k['nama_type']; ?> <span class="badge badge-secondary badge-pill float-right"><i class="fa fa-tag"></i></span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="row">
        <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-50 ml-3">Rental Mobil <?= $mobil['merk']; ?></h4>
        <div class="col-lg mb-4">
          <form action="<?= base_url('customer/rental/tambahRental/') . $mobil['id_mobil']; ?>" method="post">
            <div>
              <label for="id_mobil">Merk Mobil : <?= $mobil['merk']; ?></label>
              <input type="hidden" name="id_mobil" value="<?= $mobil['merk']; ?>">
            </div>
            <div>
              <label for="id_customer">Nama Customer : <?= $customer['nama']; ?></label>
              <input type="hidden" name="id_customer" value="<?= $customer['nama']; ?>">
            </div>
            <div class="form-group">
              <label for="harga">Harga Sewa / Hari</label>
              <input type="text" name="harga" id="harga" class="form-control" value="<?= $mobil['harga_mobil']; ?>" readonly>
              <small class="text-muted text-danger">
                <?php if (isset($validation) && $validation->getError('harga')) : ?>
                  <?= $validation->getError('harga'); ?>
                <?php endif; ?>
              </small>
            </div>
            <div class="form-group">
              <label for="denda">Biaya Denda / hari<div class="alert alert-danger mb-0" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i> Jika pengembalian mobil terlambar 1 hari akan di denda sebesar <b>Rp.<?= number_format($mobil['denda'], 0, ',', '.'); ?></b> dan akan di tambahkan setiap harinya.</div></label>
              <input type="text" name="denda" id="denda" class="form-control" value="<?= $mobil['denda']; ?>" readonly>
              <small class="text-muted text-danger">
                <?php if (isset($validation) && $validation->getError('denda')) : ?>
                  <?= $validation->getError('denda'); ?>
                <?php endif; ?>
              </small>
            </div>
            <div class="form-group">
              <label for="tgl_rental">Tanggal Rental</label>
              <input type="date" name="tgl_rental" id="tgl_rental" class="form-control" required>
              <small class="muted text-danger">
                <?php if (isset($validation) && $validation->getError('tgl_rental')) : ?>
                  <?= $validation->getError('tgl_rental'); ?>
                <?php endif; ?>
              </small>
            </div>
            <div class="form-group">
              <label for="tgl_kembali">Tanggal Kembali</label>
              <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
              <small class="muted text-danger">
                <?php if (isset($validation) && $validation->getError('tgl_rental')) : ?>
                  <?= $validation->getError('tgl_kembali'); ?>
                <?php endif; ?>
              </small>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Pesan</button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>
</div>