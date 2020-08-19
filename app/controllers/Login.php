<?php 

class Login extends Controller{
  
  public function index()
  {

    $data['judul'] = 'Login';
    if (isset($_POST['submit'])) {
    }else {
      $this -> view('templates/header',$data);
      $this -> view('login/index');
      $this -> view('templates/footer');
    }
  }

  public function register()
  {
    $data['judul'] = 'register';
    if (isset($_POST['submit'])) {
      $data = $this -> model('User_model') -> TambahUser($_POST['email']);
      if ($data == null && $_POST['password'] == $_POST['password_confirm']) {
        $data -> email = $_POST['email'];
        $data -> password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $data -> TambahUser();
        Flasher::SetFlash('Akun','Anda Sudah Terdaftar','success');
        header('Location: '.  URL . '/login');
        exit;
      }
    }else{
          $this -> view('templates/header',$data);
          $this -> view('login/register');
          $this -> view('templates/footer');
      }

    }

    public function wdad()
    {
      return $this -> wdad();
    }
}


?>