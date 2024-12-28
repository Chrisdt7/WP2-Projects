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
        <h4 class="mt-4 list-group-item list-group-item-action bg-warning text-black-50 ml-3"><?= $judul; ?> <b><?= $customer['nama']; ?></b></h4>
        <div class="col-lg-8">
          <div class="card mb-2">
            <div class="card-header alert alert-success">
              <h6>Invoice Pembayaran Anda</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <?php foreach($transaksi as $t) : ?>
                  <tr>
                    <th>Merk Mobil</th>
                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></td>
                    <td><?= $t['merk']; ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Rental</th>
                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></td>
                    <td><?= $t['tgl_rental']; ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Kembali</th>
                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></td>
                    <td><?= $t['tgl_kembali']; ?></td>
                  </tr>
                  <tr>
                    <th>Biaya Sewa/Hari</th>
                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></td>
                    <td>Rp.<?= number_format($t['harga_mobil'], 0, ',', '.'); ?></td>
                  </tr>
                  <tr>
                    <?php 
                    $x = strtotime($t['tgl_kembali']);
                    $y = strtotime($t['tgl_rental']);
                    $jmlHari = abs(($x - $y) / (60*60*24));
                    ?>
                    <th>Jumlah Hari</th>
                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></td>
                    <td><?= $jmlHari; ?> Hari</td>
                  </tr>
                  <tr>
                    <!-- JUmlah hari * harga_mobil di table mobil -->
                    <th>Jumlah Pembayaran</th>
                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></td>
                    <td><span class="btn btn-primary btn-sm">Rp.<?= number_format($t['harga_mobil'] * $jmlHari, 0, ',', '.'); ?></span></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><a href="<?= base_url('customer/transaksi/cetakInvoice/') . $t['id_rental']; ?>" class="btn btn-secondary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a></td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header alert alert-primary">
              Informasi Pembayaran
            </div>
            <div class="card-body">
              <p>Silahkan melakukan pembayaran melalui no.rekening berikut.</p>
              <ul class="list-group list-group-flush">
                <?php foreach($bank as $b) : ?>
                  <li class="list-group-item"><?= $b['nama_rek']; ?> - <?= $b['no_rek']; ?></li>
                <?php endforeach; ?>
              </ul>
              <?php if(empty($t['bukti_pembayaran'])) { ?>
                <button type="button" class="btn btn-info btn-sm w-100" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-upload" aria-hidden="true"></i> Bukti Pembayaran
                </button>
              <?php } else if($t['status_pembayaran'] == "0") { ?>
                <button class="btn btn-warning btn-sm mt-1 w-100"><i class="fa fa-clock-o" aria-hidden="true"></i> Menunggu Konfirmasi</button>
              <?php } else if($t['status_pembayaran'] == "1") { ?>
                <button class="btn btn-success btn-sm mt-1 w-100"><i class="fa fa-check" aria-hidden="true"></i> Pembayaran Selesai</button>
              <?php } ?>  
              <!-- jika di table transaksi (status_pembayarannya kosong atau null), tampilkan tombol untuk mengirim upload pembayaran -->
              <!-- jika belum upload bukti pembayaran -->
              <!-- <?php if(empty($t['bukti_pembayaran']) && $t['status_pembayaran']) : ?>
                <button type="button" class="btn btn-info btn-sm w-100" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-upload" aria-hidden="true"></i> Bukti Pembayaran
                </button>
              <?php endif; ?> -->
              <!-- jika status_pembayaran 0, artinya admin belum melihat bukti uploadnya -->
                <!-- <?php if($t['status_pembayaran'] == "0") : ?>
                  <button class="btn btn-warning btn-sm mt-1 w-100"><i class="fa fa-clock-o" aria-hidden="true"></i> Menunggu Konfirmasi</button>
                <?php endif; ?> -->
              <!-- jika bukti pembayaran sudah di upload dan status pembayan bernilai 1 -->
              <!-- <?php if($t['status_pembayaran'] == "1") : ?>
                  <button class="btn btn-success btn-sm mt-1 w-100"><i class="fa fa-check" aria-hidden="true"></i> Pembayaran Selesai</button>
                <?php endif; ?> -->
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



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('customer/transaksi/uploadbuktii'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_rental" value="<?= $t['id_rental']; ?>">
          <div class="form-group">
            <label for="bukti">Bukti</label>
            <input type="file" name="bukti" id="bukti" class="form-control-file">
			<?php if (session()->has('errors')) : ?>
            	<small class="muted text-danger"><?= session('errors') ?></small>
			<?php endif; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
