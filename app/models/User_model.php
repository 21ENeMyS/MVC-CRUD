<?php 

class User_model{

  private $tabel = "user";
  private $db;
  public $username;
  public $password_hash;

  public function __construct()
  {
    $this -> db = new Database;
  }

  public function GetUserById($id)
  { 
    $query = 'SELECT * FROM '. $this -> tabel . ' WHERE id = :id';
    $this -> db -> query($query);
    $this -> db -> bind('id',$id);
    return $this -> db -> Single();
  }

  public function TambahUser($data)
  {
    $query = 'INSERT INTO '. $this -> tabel .' VALUES (" ",:email,:password_hash)';
    $this -> db -> query($query);
    $this -> db -> bind('id', $data['id']);
    $this -> db -> bind('email', $data['email']);
    $this -> db -> bind('password_hash', $data['password_hash']);

    $this -> db -> execute();
    return $this -> db -> Rowcount();
  }



}

?>