<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Kategori</h1>
      <div class="list-group">
        <?php foreach($kategori as $k) : ?>
        <a href="<?= base_url('customer/type/') . $k['id_type']; ?>" class="list-group-item"><?= $k['nama_type']; ?></a>
        <?php endforeach; ?>
      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9 mt-5">
      <h3>Ganti Password</h3>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
            <form action="" method="post">
              <div class="form-group">
                <label for="passlama">Password Lama</label>
                <input type="password" name="passlama" id="passlama" class="form-control">
                <small class="muted text-danger"><?= form_error('passlama'); ?></small>
              </div>
              <div class="form-group">
                <label for="passbaru1">Password Baru</label>
                <input type="password" name="passbaru1" id="passbaru1" class="form-control">
                <small class="muted text-danger"><?= form_error('passbaru1'); ?></small>
              </div>
              <div class="form-group">
                <label for="passbaru2">Konfirmasi Password</label>
                <input type="password" name="passbaru2" id="passbaru2" class="form-control">
                <!-- <small class="muted text-danger"><?= form_error('passbaru2'); ?></small> -->
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Ganti Password</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->




