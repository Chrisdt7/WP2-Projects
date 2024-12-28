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
        <div class="col-lg col-md mb-5">
          <?= $session->getflashdata('pesan'); ?>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Merk Mobil</th>
                    <th>No.Plat</th>
                    <th>Harga Sewa</th>
                    <th><i class="fa fa-cog" aria-hidden="true"></i></th>
                  </tr>
                  <?php if(empty($transaksi)) : ?>
                    <tr>
                      <td colspan="5">
                        <div class="alert alert-warning text-center" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i>
                        Peringatan <b><?= $customer['nama']; ?></b> Belum Melakukan Transaksi Rental Mobil.</div>
                      </td>
                    </tr>
                  <?php endif; ?>
                  <?php $no = 1; foreach($transaksi as $t) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $t['nama']; ?></td>
                      <td><?= $t['merk']; ?></td>
                      <td><?= $t['no_plat']; ?></td>
                      <td>Rp.<?= number_format($t['harga_mobil'], 0, ',', '.'); ?></td>
                      <td>
                        <?php if($t['status_rental'] == 'Selesai') : ?>
                          <div class="badge badge-success p-2"><i class="fa fa-info" aria-hidden="true"></i> Rental Selesai</div>
                          <?php else : ?>
                            <a href="<?= base_url('customer/transaksi/pembayaran/') . $t['id_rental']; ?>" class="btn btn-primary btn-sm">Cek Pembayaran</a>
                            <a href="<?= base_url('customer/transaksi/batal/') . $t['id_rental']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Batalkan Pesanan">Batal</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>