<div class="container mt-5">

	<div class="row">
		<div class="col-md">
			<div class="card">
				<div class="card-header bg-warning text-dark">
					<h3><?= $berita['judul_berita']; ?></h3>
				</div>
				<div class="card-body">
					<?php if($berita['terbit'] == '0') : ?>
					  	<span class="badge badge-primary mb-1 text-light p-2"><i class="fa fa-eye"></i> Belum Di Publikasikan, Menunggu Persetujuan Admin.</span>
					  	<?php else: ?>
					    <span class="badge badge-success">Telah Di Post</span>
					<?php endif; ?>
					<div class="row">
						<div class="col-md text-center">
							<img src="<?= base_url('assets/berita/') . $berita['foto_berita']; ?>" class="img-thumbnail mt-1 mb-1">
						</div>
					</div>
					<?= $berita['deskripsi']; ?>
				</div>
			</div>
		</div>
	</div>
	
</div>

<script>
	CKEDITOR.replace('editor1');
</script>

