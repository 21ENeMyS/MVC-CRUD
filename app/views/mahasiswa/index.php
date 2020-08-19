<div class="container mt-5">

<div class="row">
  <div class="col-lg-6">
  <?php Flasher::flash(); ?>

  </div>
</div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary TombolTambah" data-toggle="modal" data-target="#forModal">
      Tambahkan Mahasiswa Baru
      </button>
    </div>
  </div>  

  <div class="row mb-3">
      <div class="col-lg-6">
            <form class="form-inline" action="<?= URL; ?>/mahasiswa/cari" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="TombolCari">Cari</button>
            </form>
      </div>
  </div>


  <div class="row">
    <div class="col-6">
      <h1>Data Mahasiswa</h1>
        <?php foreach ($data['mhs'] as $mhs) :?>
          <ul class="list-group">
              <li class="list-group-item"><?= $mhs['nama']; ?>
                <a href="<?= URL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge badge-danger float-right ml-2" onclick="return confirm(' Apakah Anda Yakin ingin menghapus <?= $mhs['nama'] ?> ?');" >Hapus</a>	

                <a href="<?= URL; ?>/mahasiswa/edit/<?= $mhs['id'] ?>" class="badge badge-primary float-right ml-2 TampilModalUbah" data-toggle="modal" data-target="#forModal" data-id="<?= $mhs['id']; ?>">Edit</a> 
                
                <a href="<?= URL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge badge-success float-right ">Detail</a>   	
              </li>
          </ul>
        <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="forModal" tabindex="-1" role="dialog"   aria-labelledby="JudulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="JudulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= URL; ?>/mahasiswa/tambah" method="POST">
            <input type="hidden" name="id" id="id">

          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Mahasiswa" required autocomplete="off" autofocus>
            </div>

          <div class="form-group">
              <label for="nim">Nim</label>
              <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukan Nim Mahasiswa" required autocomplete="off" maxlength="10" autofocus>
            </div>  

          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Mahasiswa" required autocomplete="off" autofocus>
          </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                  <option value="Teknik Informatika">Teknik Informatika S1</option>
                  <option value="Sistem Informasi">Sistem Informasi S1</option>
                  <option value="Sistem Informasi">Sistem Informasi D3</option>
                  <option value="Tataboga">Tataboga S1</option>
                  <option value="Perawat">Perawat S1</option>
                  <option value="Dokter">Dokter S2</option>
                </select>
            </div> 

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
      </form>
    </div>
  </div>
</div>

