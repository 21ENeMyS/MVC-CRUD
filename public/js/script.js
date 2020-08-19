$(function () {
	$('.TombolTambah').on('click',function () {
		$('#JudulModal').html('Tambah Data Mahasiswa');
		$('.modal-footer button[type = submit ]').html('Tambah Data Mahasiswa');
				$('#nama').val('');
				$('#nim').val('');
				$('#email').val('');
				$('#id').val('');
	});

	$('.TampilModalUbah').on('click',function () {
		$('#JudulModal').html('Ubah Data Mahasiswa');
		$('.modal-footer button[type = submit ]').html('Ubah Data Mahasiswa');
		$('.modal-body form').attr('action','http://localhost/portfolio/public/mahasiswa/edit');
	
	const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/portfolio/public/mahasiswa/getedit',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function (data) {
console.log(data);

				$('#nama').val(data.nama);
				$('#nim').val(data.nim);
				$('#email').val(data.email);
				$('#jurusan').val(data.jurusan);
				$('#id').val(data.id);
			}
		});

	});
});