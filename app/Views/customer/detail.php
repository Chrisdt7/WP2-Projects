<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-light text-center">Tipe Mobil</h4>
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
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <p class="badge badge-info float-right">Tipe <?= $detail['nama_type']; ?></p>
                    <h4><?= $detail['merk']; ?></h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <img src="<?= base_url('assets/assets_stisla/img/mobil/') . $detail['gambar']; ?>" alt=""
                                class="img-thumbnail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-md mt-4">
                                <tr>
                                    <th>Merk</th>
                                    <td><?= $detail['merk']; ?></td>
                                </tr>
                                <tr>
                                    <th>No.Plat</th>
                                    <td><?= $detail['no_plat']; ?></td>
                                </tr>
                                <tr>
                                    <th>Warna</th>
                                    <td><?= $detail['warna']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tahun</th>
                                    <td><?= $detail['tahun']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php if(session('id_role')) : ?>
                                        <?php if($detail['status'] == '1') : ?>
                                        <a href="<?= base_url('customer/rental/tambahRental/') . $detail['id_mobil']; ?>"
                                            class="btn btn-outline-primary btn-sm">Rental Sekarang</a>
                                        <?php else : ?>
                                        <div class="badge badge-danger">Sedang Di Sewa</div>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <div class="badge badge-info p-1">Login, Jika Ingin Rental Mobil.</div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->