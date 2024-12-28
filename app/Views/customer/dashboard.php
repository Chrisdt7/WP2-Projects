<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <?= $session->getflashdata('pesan'); ?> 
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3">
      <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-light text-center">Tipe Mobil</h4>
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

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" style="height: 500px;width: 100%;" src="<?= base_url('assets/img/banner.jpg'); ?>" alt="First slide">
            <div class="carousel-caption d-none d-md-block shadow p-3 mb-5 bg-warning rounded mb-5">
              <blockquote class="blockquote text-center">
                <h3 class="mb-0 text-white">Perjalanan Aman, Nyaman & Efisien</h3>
                <footer class="blockquote-footer text-light">Memberi Kenyaman Kepada Pengguna Rental Mobil, <cite title="Source Title">Hingga Perjalanan Terakhir.</cite></footer>
              </blockquote>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" style="height: 500px;width: 100%;" src="<?= base_url('assets/img/slider-img/slider-img-2.jpg'); ?>" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <blockquote class="blockquote text-center shadow-lg p-3 mb-5 rounded">
                <h3 class="mb-0 text-white">Wisata</h3>
                <footer class="blockquote-footer text-light">Menerima Jasa Wisata Luar Kota, <cite title="Source Title">Rental Mobil Dua Putra.</cite></footer>
              </blockquote>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" style="height: 500px;width: 100%;" src="<?= base_url('assets/img/article/arti-thumb-4.jpg'); ?>" alt="Third slide">
            <div class="carousel-caption d-none d-md-block shadow p-3 mb-5 bg-warning rounded">
              <blockquote class="blockquote text-center">
                <h3 class="mb-0 text-white">Selalu Di Service</h3>
                <footer class="blockquote-footer text-light">Pelayanan Rental Mobil Kami, Selalu Mengecek Keadaan Mesin, <cite title="Source Title">Sebelum Di Rental.</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">
        <?php foreach($mobil as $m) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="<?= base_url('home/detail/') . $m['id_mobil']; ?>"><img class="card-img-top" src="<?= base_url('assets/assets_stisla/img/mobil/') . $m['gambar']; ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title mb-1">
                <a href="<?= base_url('home/detail/') . $m['id_mobil']; ?>" class="text-warning text-secondary"><?= $m['merk']; ?></a>
              </h4>
              <a href="<?= base_url('customer/kategori/index/') . $m['id_type']; ?>" class="badge badge-dark mb-1"><?= $m['nama_type']; ?></a>
              <h6>Rp.<?= number_format($m['harga_mobil'], 0, ',', '.'); ?> / Hari</h6>
              <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> -->
              <!-- AC -->
              <?php if($m['ac'] == '1') : ?>
                <small class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Tersedia"><i class="fa fa-check-circle" aria-hidden="true"></i> AC</small>
                <?php else : ?>
                  <small class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Tidak Tersedia"><i class="fa fa-times-circle" aria-hidden="true"></i> AC</small>
              <?php endif; ?>

              <!-- MP3 -->
              <?php if($m['mp3_player'] == '1') : ?>
                <small class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Tersedia"><i class="fa fa-check-circle" aria-hidden="true"></i> MP3 Player</small>
                <?php else : ?>
                  <small class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Tidak Tersedia"><i class="fa fa-times-circle" aria-hidden="true"></i> MP3 Player</small>
              <?php endif; ?>

              <!-- Supir -->
              <?php if($m['supir'] == '1') : ?>
                <small class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Tersedia"><i class="fa fa-check-circle" aria-hidden="true"></i> Supir</small>
                <?php else : ?>
                  <small class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Tidak Tersedia"><i class="fa fa-times-circle" aria-hidden="true"></i> Supir</small>
              <?php endif; ?>

              <!-- Center Lock -->
              <?php if($m['central_lock'] == '1') : ?>
                <small class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top" title="Tersedia"><i class="fa fa-check-circle" aria-hidden="true"></i> Central Lock</small>
                <?php else : ?>
                  <small class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top" title="Tidak Tersedia"><i class="fa fa-times-circle" aria-hidden="true"></i> Central Lock</small>
              <?php endif; ?>
            </div>
            <div class="card-footer">
              <?php if ($session->get('id_role') == 2) : ?>
                <?php if($m['status'] == '1') : ?>
                  <div><a href="<?= base_url('customer/rental/tambahRental/') . $m['id_mobil']; ?>"class="btn btn-warning text-light"><i class="fa fa-cart-plus" aria-hidden="true"></i> Rental</a></div>
                <?php else : ?>
                  <div class="btn btn-danger disabled btn-sm"><i class="fa fa-road" aria-hidden="true"></i> Sedang Di Sewa</div>
                <?php endif; ?>
              <?php else : ?>
                <?php if($m['status'] == '1') : ?>
                  <div><a href="<?= base_url('customer/rental/tambahRental/') . $m['id_mobil']; ?>"class="btn btn-warning text-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> Rental</a></div>
                <?php else : ?>
                  <div class="btn btn-danger disabled btn-sm"><i class="fa fa-road" aria-hidden="true"></i> Sedang Di Sewa</div>
                <?php endif; ?>
              <?php endif; ?>
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