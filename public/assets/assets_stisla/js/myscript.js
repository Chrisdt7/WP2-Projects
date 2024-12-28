$(function() {
	// ------------------HALAMAN ARTIKEL ------------------
	$('.tombolTambahArtikel').on('click', function() {
		// mengubah judul tambah artikel yang di timpa di bawah
		$('#formArtikelModalLabel').html('Tambah Data Artikel');
		$('.modal-footer button[type=submit]').html('Tambah Data');

        $('#judul').val('');
        $('#kategori').val('');
        $('#deskripsi').val('');
        $('#foto').val('');
        $('#id_berita').val('');
        $('#inputfoto').val('');
        $('#foto').val('');
	});

	$('.formModalUbah').on('click', function() {
		// mengubah judul tambah artikel menjadi ubah artikel
		$('#formArtikelModalLabel').html('Ubah Data Artikel');

		// mengembali tombol modal tambah menjadi ubah
		$('.modal-footer button[type=submit]').html('Ubah Data');

		// mengubah form attr action
		$('.modal-body form').attr('action', 'http://localhost/rental-mobil-ci/admin/artikel/ubahartikel');



		// mengambali id berdasarkan yg di klik, data('id'), didapatkan di tombol ubah berita.
		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/rental-mobil-ci/admin/artikel/getubah',
			data: {id: id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// console.log(data);
				$('#id_berita').val(data.id_berita);
				$('#kategori').val(data.id_kategori);
				$('#judul').val(data.judul_berita);
				$('#deskripsi').val(data.deskripsi);
				$('#inputfoto').val(data.foto_berita);
				$('#tampilFoto').attr('src', 'http://localhost/rental-mobil-ci/assets/berita/' + data.foto_berita);
			}
		});
	});

	// ------------------ HALAMAN KATEGORI ADMIN----------------------------

	$('.formModalTambahArtikel').click(function() {
		$('#formModalLabel').html('Tambah Data Kategori');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#kategori').val('');
		$('#id_kategori').val('');
	});

	$('.formModalUbahArtikel').click(function() {
		$('#formModalLabel').html('Ubah Data Kategori');
		$('.modal-footer button[type=submit]').html('Ubah');

		$('.modal-body form').attr('action', 'http://localhost/rental-mobil-ci/admin/kategori/ubahkategori')

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/rental-mobil-ci/admin/kategori/getkategoriartikel',
			data: {id: id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// console.log(data);
				$('#id_kategori').val(data.id_kategori);
				$('#kategori').val(data.nama_kategori);
			}
		});
	});


	// ------------------ HALAMAN BANK ADMIN-------------
	$('.tombolTambahBank').click(function() {
		$('#formBankModalLabel').html('Tambah Data Bank');
		$('button[type=submit]').html('Tambah');
	});

	$('.tombolUbahBank').click(function() {
		$('#formBankModalLabel').html('Ubah Data Bank');
		$('button[type=submit]').html('Ubah');

		$('.modal-body form').attr('action', 'http://localhost/rental-mobil-ci/admin/bank/ubahbank');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/rental-mobil-ci/admin/bank/getubahbank',
			method: 'post',
			data: {id: id},
			dataType: 'json',
			success: function(data) {
				// console.log(data);
				$('#nama').val(data.nama_rek);
				$('#id_bank').val(data.id_bank);
				$('#no').val(data.no_rek);
			}
		});
	});

});