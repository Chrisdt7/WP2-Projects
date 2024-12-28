<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-10 text-center">Tipe Mobil</h4>
            <div class="list-group">
                <?php foreach($kategori as $k) : ?>
                <a href="<?= base_url('customer/kategori/index/') . $k['id_type']; ?>"
                    class="list-group-item list-group-item-action">
                    <?= $k['nama_type']; ?> <span class="badge badge-secondary badge-pill float-right"><i
                            class="fa fa-tag"></i></span>
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
                <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-50 ml-3">
                    <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-50 ml-3">
                        <?php if ($kateid && is_array($kateid) && array_key_exists('nama_type', $kateid)) : ?>
                        Kategori Tipe <?= $kateid['nama_type']; ?>
                        <?php else : ?>
                        Kategori Tipe Not Found
                        <?php endif; ?>
                    </h4>

                </h4>
                <?php if(empty($mobil)) : ?>
                <div class="col-lg-12 col-md-12 mb-5">
                    <?php if (!empty($kateid) && is_array($kateid) && array_key_exists('nama_type', $kateid)) : ?>
                    <div class="alert alert-danger" role="alert">Kategori <b><?= $kateid['nama_type']; ?></b> Tidak
                        Ditemukan.</div>
                    <?php else : ?>
                    <div class="alert alert-danger" role="alert">Kategori Tidak Ditemukan.</div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php foreach($mobil as $m) : ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card h-100">
                        <a href="<?= base_url('home/detail/') . $m['id_mobil']; ?>"><img class="card-img-top"
                                src="<?= base_url('assets/assets_stisla/img/mobil/') . $m['gambar']; ?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title mb-0">
                                <a href="<?= base_url('home/detail/') . $m['id_mobil']; ?>"
                                    class="text-secondary"><?= $m['merk']; ?></a>
                            </h4>
                            <a href="<?= base_url('customer/type/') . $k['id_type']; ?>"
                                class="badge badge-dark"><?= $m['nama_type']; ?></a>
                            <h5><?= $m['no_plat']; ?></h5>
                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> -->
                        </div>
                        <div class="card-footer">
                            <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                            <?php if($m['status'] == '1') : ?>
                            <div><a href="<?= base_url('customer/rental/tambahRental/') . $m['id_mobil']; ?>"
                                    class="btn btn-warning text-light">Rental</a></div>
                            <?php else : ?>
                            <div class="btn btn-danger disabled">Di Sewa</div>
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