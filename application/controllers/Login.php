<?php
/**
 *
 */
class Login extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->data['email'] = $this->session->userdata('email');
    $this->data['id_role']  = $this->session->userdata('id_role');
    if (isset($this->data['email'], $this->data['id_role']))
    {
      switch ($this->data['id_role'])
      {
        case 1:
          redirect('admin');
          break;
        case 2:
          redirect('divisi');
          break;  
        case 3:
          redirect('calonanggota');
          break;  
      }
      exit;
    }
    $this->load->model('Akun_m');
  }

  public function cek(){
      $email = $this->POST('email');
      $password = $this->POST('password');
      if($this->Akun_m->cek_login($email,$password) == 0){
        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Email tidak terdaftar!', 'danger');
        
        redirect('beranda/login');
        exit;
      }else if($this->Akun_m->cek_login($email,$password) == 1){
        setcookie('email_temp', $email, time() + 5, "/");
        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Password Salah!', 'danger');
        
    redirect('beranda/login');
        exit;
      }
    redirect('beranda/login');
  }

  public function index() { 
    $this->data[ 'content' ] = 'login';
    $this->load->view('sign-in');
  }
}

?>
