<?php 

class About extends Controller{

  public function index($nama = "Muhamad Farhan", $pekerjaan = "Programmer Dan Fullstack Developer")
  {

    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['judul'] = "About Me";
    $this -> view('templates/header',$data);
    $this -> view('about/index',$data);  
    $this -> view('templates/footer');
  }

  public function page()
  {
    $data['judu'] = 'Services';
    $this -> view('templates/header',$data);
    $this -> view('about/page');
    $this -> view('templates/footer');
  }
}

?>