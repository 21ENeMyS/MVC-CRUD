<?php 

class Mahasiswa extends Controller {

  public function index()
  {
    $data['judul'] = 'Mahasiswa';
    $data['mhs'] = $this -> model('Mahasiswa_model') -> GetAllMahasiswa();
    $this -> view('templates/header',$data);
    $this -> view('mahasiswa/index',$data); 
    $this -> view('templates/footer');
  }

  public function detail($id)
  {

    $data['judul'] = 'Daftar Mahasiswa Baru';
    $data['mhs'] = $this -> model('Mahasiswa_model') -> GetMahasiswaById($id);
    $this -> view('templates/header',$data);
    $this -> view('mahasiswa/detail',$data);
    $this -> view('templates/footer');
  }

  public function tambah()
  {
    if ($this -> model('Mahasiswa_model') -> TambahDataBaru($_POST) > 0) {
      Flasher::SetFlash('berhasil','ditambahkan','success');
      header('Location: ' . URL . '/mahasiswa');
      exit;
    }else {
      Flasher::SetFlash('gagal','ditambahkan','danger');
      header('Location: ' . URL . '/mahasiswa');
      exit;
    }
  }

  public function hapus($id)
  {
    if ($this -> model('Mahasiswa_model') -> HapusDataMahasiswa($id) > 0) {
      Flasher::SetFlash('berhasil','dihapus','success');
      header('Location: ' . URL . '/mahasiswa');
      exit;
    }else {
      Flasher::SetFlash('gagal','dihapus','warning');
      header('Location: ' . URL . '/mahasiswa');
      exit;
    }
  }

  public function getedit()
  {
    echo json_encode($this -> model('Mahasiswa_model') -> GetMahasiswaById($_POST['id']));
  }

  public function edit()
  {
    if ($this -> model('Mahasiswa_model') -> EditDataMahasiswa($_POST) > 0 ) {
      Flasher::SetFlash('berhasil','di edit','success');
      header('Location: ' . URL . '/mahasiswa');
      exit;
    }else {
      Flasher::SetFlash('gagal','di edit','warning');
      header('Location: ' . URL . '/mahasiswa');
      exit;
    }
  }

  public function cari()
  {
    $data['judul'] = "Daftar Mahasiswa Baru";
    $data['mhs'] = $this -> model('Mahasiswa_model') -> CariDataMahasiswa();
    $this -> view('templates/header',$data);
    $this -> view('mahasiswa/index', $data);
    $this -> view('templates/footer');
  }
}

?>