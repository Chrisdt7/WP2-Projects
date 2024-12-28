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
      <!-- <div class="list-group">
        
        <a href="" class="list-group-item"></a>
        
      </div> -->

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
      <div class="row">
        <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-50 ml-3">Semua Artikel</h4>
          <?php if(empty($berita)) : ?>
            <div class="col-lg-12 col-md-12 mb-5">
              <div class="alert alert-danger" role="alert">Kategori <b><?= $kateid['nama_type']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
        <?php foreach($berita as $b) : ?>
        <div class="col-lg-12 col-md-5 mb-5">
          <div class="media">
            <img src="<?= base_url('assets/berita/') . $b['foto_berita']; ?>" class="mr-3" width="250">
            <div class="media-body">
              <h5 class="mt-0"><a href="<?= base_url('artikel/baca/') . $b['id_berita']; ?>"><?= $b['judul_berita']; ?></a></h5>
              <a href="<?= base_url('artikel/kategori/') . $b['id_kategori']; ?>"><span class="badge badge-secondary"><?= $b['nama_kategori']; ?></span></a>
              <?= substr($b['deskripsi'], 0,200); ?>... <a href="<?= base_url('artikel/baca/') . $b['id_berita']; ?>" class="btn btn-warning text-light btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->