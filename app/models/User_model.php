<?php 

class User_model{

  private $tabel = "users";
  private $db;
  
  public function __construct()
  {
    $this -> db = new Database;
  }

  public function Register($data)
  {
      $query = "INSERT INTO ".$this -> tabel." (username , email , password) VALUES (:username, :email, :password)";
      $this -> db -> query($query);
      $this -> db -> bind(':username', $data['username']);
      $this -> db -> bind(':email', $data['email']);
      $this -> db -> bind(':password', $data['password']);
  
    if ($this -> db -> execute()) {
      return true;
    }else {
      return false;
    }
  }

  public function login($username,$password)
  {
    $query = "SELECT * FROM ". $this -> tabel . " WHERE username = :username";

    $this -> db -> query($query);
    $this -> db -> bind(':username',$username);

    $row = $this -> db -> Single();

    $hash = $row -> password ;

    if (password_verify($password,$hash)) {
      return $row;
    }else{
      return false;
    }
  }

  public function UserbyEmail($email)
  {
    $query = "SELECT * FROM ". $this -> tabel. " WHERE email = :email";
    $this -> db -> query($query);
    $this -> db -> bind(':email',$email);
    if ($this -> db -> Rowcount() > 0) {
      return true;
    }else {
      return false;
    }
  }


}

?>