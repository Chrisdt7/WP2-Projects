<div class="container mt-5 py-5">
    <h2 style="color: #007bff; text-align: center; text-shadow: 1px 2px 2px black; border-radius: 20px;">
        <?= $judul; ?>
    </h2>
    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('customer/panel/tambahartikel') ?>" method="post" enctype="multipart/form-data">
                <div class="row d-flex">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" name="judul" id="judul" class="form-control" required>
                            <?php if (isset($validation) && $validation->hasError('judul')): ?>
                            <small class="muted text-danger"><?= $validation->getError('judul') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php if (!empty($kategori)): ?>
                                    <?php foreach ($kategori as $k): ?>
                                        <?php if (isset($k['id_kategori']) && isset($k['nama_kategori'])): ?>
                                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" disabled>Tidak ada kategori tersedia !</option>
                                <?php endif; ?>
                            </select>
                            <?php if (isset($validation) && $validation->hasError('kategori')): ?>
                                <small class="muted text-danger"><?= $validation->getError('kategori') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <textarea name="deskripsi" id="editor1" rows="10" cols="80" required></textarea>
                        <?php if (isset($validation) && $validation->hasError('deskripsi')): ?>
                        <small class="muted text-danger"><?= $validation->getError('deskripsi') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('editor1');
</script>