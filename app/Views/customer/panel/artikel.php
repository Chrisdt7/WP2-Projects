<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('customer/panel/'); ?>">
              <i class="fa fa-tachometer"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('customer/panel/artikel'); ?>">
              <i class="fa fa-list"></i>
              Artikel
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>  
      </div>
      <div class="row">
        <div class="col-md-6">
          <a href="<?= base_url('customer/panel/tambahartikel'); ?>" class="btn btn-primary mb-2"><i class="fa fa-plus-circle"></i> Buat Artikel</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <?= $session->getFlashdata('pesan'); ?>
        </div>
      </div> 
      <!-- Kolom Pencarian -->
      <div class="row">
        <div class="col-md-4 offset-md-8">
          <form action="<?= base_url('customer/panel/artikel/'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukan Keyword..." name="keyword" autocomplete="off" autofocus="on">
              <div class="input-group-append">
                <input type="submit" name="submit" class="btn btn-primary" value="Cari">
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Kolom Pencarian -->
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Tanggal Post</th>
              <th>Di Posting</th>
              <th>Terbit</th>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($artikel)) : ?>
            <tr>
              <td colspan="8">
                <div class="alert alert-danger text-center" role="alert"><i class="fa fa-info-circle"></i> Data Tidak Ditemukan!.</div>
              </td>
            </tr>
          <?php endif; ?>
          <?php 
          $no = 1;
          foreach($artikel as $a) : ?>
          <tr>
            <td><?= ++$start; ?></td>
            <td>
              <img src="<?= base_url('assets/berita/') . $a['foto_berita']; ?>" width="80">           
            </td>
            <td><?= $a['judul_berita']; ?></td>
            <td><?= substr($a['deskripsi'], 0, 20) . "..."; ?></td>
            <td><?= $a['nama_kategori']; ?></td>
            <td><?= date('d-m-Y', strtotime($a['tgl_post'])); ?></td>
            <td><?= $a['nama']; ?></td>
            <td>
              <a href="<?= base_url('customer/panel/lihat/') . $a['id_berita']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url('customer/panel/ubahartikel/') . $a['id_berita']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
              <a href="<?= base_url('customer/panel/hapusartikel/') . $a['id_berita']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
        <div class="row">
          <div class="col-md-6">
            <?= $pager->simpleLinks(); ?>
          </div>
        </div>
    </main>
  </div>
</div>

