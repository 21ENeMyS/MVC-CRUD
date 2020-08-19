<?php 

class Mahasiswa_model{

  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    $this -> db = new Database;
  }

  public function GetAllMahasiswa()
  {
    $this -> db -> query("SELECT * FROM ". $this -> table );
    return $this -> db -> ResulSet();
  }

  public function GetMahasiswaById($id)
  {
    $this -> db -> query('SELECT * FROM '. $this -> table .' WHERE id = :id');
    $this -> db -> bind('id',$id);
    return $this -> db -> Single();
  }

  public function TambahDataBaru($data)
  {
    $query = 'INSERT INTO '. $this -> table . ' VALUES (" ",:nama,:nim,:email,:jurusan)';
    $this -> db -> query($query);
    $this -> db -> bind('nama', $data ['nama']);
    $this -> db -> bind('nim', $data ['nim']);
    $this -> db -> bind('email', $data ['email']);
    $this -> db -> bind('jurusan', $data ['jurusan']);

    $this -> db -> execute();
    return $this -> db -> Rowcount();
  }

  public function HapusDataMahasiswa($id)
  {
    $query = 'DELETE FROM ' . $this -> table . ' WHERE id = :id';
    $this -> db -> query($query);
    $this -> db -> bind('id',$id);

    $this -> db -> execute();  
    return $this -> db -> Rowcount();  
  }

  public function EditDataMahasiswa($data)
  {
    $query = 'UPDATE ' . $this -> table .' SET nama = :nama,
                                                nim = :nim,
                                                email = :email,
                                                jurusan = :jurusan
                                              WHERE id = :id'; 
      $this -> db -> query($query);
      $this -> db -> bind('nama', $data['nama']);
      $this -> db -> bind('nim', $data['nim']);
      $this -> db -> bind('email', $data['email']);
      $this -> db -> bind('jurusan', $data['jurusan']);
      $this -> db -> bind('id', $data['id']);

      $this -> db -> execute();
      return $this -> db -> Rowcount();
  }

  public function CariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = 'SELECT * FROM '. $this -> table . ' WHERE nama LIKE :keyword OR
                                                        nim LIKE :keyword OR
                                                        email LIKE :keyword OR
                                                        jurusan LIKE :keyword';
    $this -> db ->  query($query);
    $this -> db -> bind('keyword',"%$keyword%");
    return $this -> db -> ResulSet();
  }
}

?>