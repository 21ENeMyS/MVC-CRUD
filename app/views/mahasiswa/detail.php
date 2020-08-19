<div class="container mt-5">
<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title"><?= $data['mhs']['nama'];?></h5>
			<h6 class="card-subtitle text-muted"><?= $data['mhs']['nim'];?></h6>
			<p class="card-text"><?= $data['mhs']['email']; ?></p>
			<p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
			<a href="<?= URL; ?>/mahasiswa" class="badge badge-primary">BACK</a>
		</div>
	</div>
</div>