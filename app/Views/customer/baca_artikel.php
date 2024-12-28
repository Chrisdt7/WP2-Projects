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
                <?php if(empty($berita)) : ?>
                <div class="col-lg-12 col-md-12 mb-5">
                    <div class="alert alert-danger" role="alert">Kategori <b><?= $kategori['id_kategori']; ?></b> Tidak
                        Ditemukan.</div>
                </div>
                <?php endif; ?>
                <div class="col-lg-12 col-md-5 mb-5  mt-4">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h4><?= $berita['judul_berita']; ?></h4>
                        </div>
                        <div class="card-body">
                            <img src="<?= base_url('assets/berita/') . $berita['foto_berita']; ?>"
                                class="img-fluid img-thumbnail">
                            <p class="blockquote-footer mt-1">Penulis : <?= $berita['nama']; ?> |
                                <?= date('d-m-Y', strtotime($berita['tgl_post'])); ?> | <a href=""
                                    class="badge badge-secondary pt-1 pr-1"><i class="fa fa-tag"></i>
                                    <?= $berita['nama_kategori']; ?></a></p>
                            <hr>
                            <?= $berita['deskripsi']; ?>
                            <!-- Profil -->
                            <div class="card mb-3" style="max-width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <?php if (session()->get('username')): ?>
                                        <img src="<?= base_url('assets/img/client/client-pic-1.jpg'); ?>" class="card-img"
                                            alt="Penyemangat">
                                        <?php else: ?>
                                        <img src="<?= base_url('assets/img/profile/guest-profile.svg'); ?>"
                                            class="card-img" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-8 d-flex align-items-center">
                                        <div class="card-body">
                                            <?php if ($customer): ?>
                                            <h5 class="card-title"><?= $customer['nama']; ?></h5>
                                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur, adipisicing
                                                elit. Magnam illo aperiam ut eveniet nihil autem ?</p>
                                            <p class="card-text"><small class="text-muted">pengagum rahasia</small></p>
                                            <?php else: ?>
                                            <p class="card-text text-center">Customer information not available.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profil -->
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->