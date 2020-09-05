<?php 

class Login extends Controller{
  
  public function index()
  {

    $data = [
      'username' => '',
      'password' => '',
      'usernameError' => '',
      'passwordError' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'usernameError' => '',
        'passwordError' => ''
  
      ];

      if (empty($data['username'])) {
        $data['usernameError'] = "Masukan username anda";
      }

      if (empty($data['password'])) {
        $data['passwordError'] = "Masukan password anda";
      }

      if (empty($data['username']) && empty($data['password'])) {
        $loggedInUser = $this -> model('User_model') -> login($data['username'],$data['password']);
        if ($loggedInUser) {
          $this -> createUserSession($loggedInUser);
        }else {
          $data['passwordError'] = "Password atau username tidak valid";
          $this -> view('login/index',$data);
        }
      }
    }else {
      $data = [
        'judul' => 'Login',
        'username' => '' ,
        'password' => '',
        'usernameError' => '',
        'passwordError' => ''
      ];
    }
      $this -> view('templates/header',$data);
      $this -> view('login/index',$data);
      $this -> view('templates/footer');
    }

    public function createUserSession($user)
    {
      $_SESSION['id'] = $user -> id;
      $_SESSION['username'] = $user -> username;
      $_SESSION['email'] = $user -> email;
      header('Location: '. URL .'/');
    }

    public function logout()
    {
      unset($_SESSION['id']);
      unset($_SESSION['username']);
      unset($_SESSION['email']);
      header('Location: '. URL .'/login');
    }


  public function register()
  {
    $data = [
      'judul' => 'Register',
      'username' => '',
      'email' => '',
      'password' => '',
      'password_confirm' => '',
      'usernameError' => '',
      'emailError' => '',
      'passwordError' => '',
      'password_confirmError' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data = [
        'judul' => 'Register',
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'password_confirm' => trim($_POST['password_confirm']),
        'usernameError' => '',
        'emailError' => '',
        'passwordError' => '',
        'password_confirmError' => '' 
      ];

      $validationUsername = "/^[a-zA-Z0-9]*$/";
      $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

      if (empty($data['username'])) {
        $data['usernameError'] = "Masukan nama anda";
      }elseif (!preg_match($validationUsername,$data['username'])) {
        $data['usernameError'] = "Nama harus ada angkanya";
      }

      if (empty($data['email'])) {
        $data['emailError'] = "Mohon masukan email anda";
      }elseif (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
        $data['emailError'] = "correct format";
      }else {
        if ($this -> model('User_model') -> UserbyEmail($data['email'])) {
          $data['emailError'] = 'maaf email sudah terpakai';
        }
      }

      if (empty($data['password'])) {
        $data['passwordError'] = "Masukan password anda";
      }elseif (strlen($data['password']) < 6) {
        $data['passwordError'] = "Password tidak boleh lebih dari 8 karakter";
      }elseif (!preg_match($passwordValidation, $data['password'])) {
        $data['passwordError'] = "password tidak boleh berupa angka";
      }

      if (empty($data['password_confirm'])) {
        $data['password_confirmError'] = 'Please enter password.';
    } else {
        if ($data['password'] != $data['password_confirm']) {
        $data['password_confirmError'] = 'Passwords do not match, please try again.';
        }
    }

    if (empty($data['usernameError']) && (empty($data['emailError'])) && (empty($data['passwordError'])) && (empty($data['password_confirmError']))) {

      // Hash password
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

      //Register user from model function
      if ($this -> model('User_model') -> Register($data)) {
          //Redirect to the login page
          header('location: ' . URL . '/login');
      }
  }
}
    $this -> view('templates/header',$data);
    $this -> view('login/register',$data);
    $this -> view('templates/footer');
  }
}
?>