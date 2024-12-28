<div class="container mt-5 py-5">
	<h2><?= $judul; ?></h2>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<form action="" method="post" enctype="multipart/form-data">
						<input type="text" name="id_berita" value="<?= $berita['id_berita']; ?>">
						<div class="form-group">
							<label for="judul">Judul Artikel</label>
							<input type="text" name="judul" id="judul" class="form-control" value="<?= $berita['judul_berita']; ?>">
							<small class="muted text-danger"><?= form_error('judul'); ?></small>
						</div>
						
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control">
							<option value="">Pilih Kategori</option>
							<?php foreach($kategori as $k) : ?>
								<?php if($k['id_kategori'] == $berita['id_kategori']) : ?>
									<option value="<?= $k['id_kategori']; ?>" selected><?= $k['nama_kategori']; ?></option>
									<?php else : ?>
										<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
							<small class="muted text-danger"><?= form_error('kategori'); ?></small>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="foto">Foto</label>
						<img src="<?= base_url('assets/berita/') . $berita['foto_berita']; ?>" class="img-thumbnail" width="80">
						<input type="file" name="foto" id="foto" class="form-control-file">
						<input type="text" name="fotoLama" value="<?= $berita['foto_berita']; ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" class="btn btn-primary mt-4">Simpan</button>
					</div>
				</div>
				
		</div>
		<div class="row">
			<div class="col-md">
				<textarea name="deskripsi" id="editor1" rows="10" cols="80"><?= $berita['deskripsi']; ?></textarea>
				<small class="muted text-danger"><?= form_error('deskripsi'); ?></small>
			</div>
		</div>
		</form>
	</div>
			</div>
</div>

<script>
	CKEDITOR.replace('editor1');
</script>

