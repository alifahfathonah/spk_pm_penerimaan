<?php
/**
 *
 */
class Daftar extends MY_Controller {
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
    $this->load->model('CalonAnggota_m');
  }
 

  public function index() { 
    if ($this->POST('daftar')) { 

        if ($this->Akun_m->get_num_row(['email' => $this->POST('email')]) != 0) {
              setcookie('namalengkap_temp', $this->POST('nama'), time() + 5, "/"); 

              $this->flashmsg('Email telah digunakan!', 'warning');
              redirect('beranda/daftar'); 
              exit();
        }

        if ($this->POST('password') != $this->POST('password2')) {
              setcookie('email_temp', $this->POST('email'), time() + 5, "/");
              setcookie('namalengkap_temp', $this->POST('nama'), time() + 5, "/");
              setcookie('namacalonanggota_temp', $this->POST('nama_calonanggota'), time() + 5, "/");
          $this->flashmsg('Kata sandi tidak sama!', 'warning');
              
              redirect('beranda/daftar'); 
              exit();
        }

             $data = [   
              'email' => $this->POST('email'), 
              'password' => md5($this->POST('password')),   
              'role' => 3 ,
              'last_login' => date('Y-m-d H:i:s')
              ]; 
            $this->Akun_m->insert($data);

            $id = $this->db->insert_id();

              $data = [   
                'id_calonanggota' => $id,
                'nama_lengkap' => $this->POST('nama'),  
                'email' =>  $this->POST('email') 
                ]; 
              $this->CalonAnggota_m->insert($data); 
              
              $user_session = [
                'email' => $this->POST('email'), 
                'id_role' => 3
              ];
              $this->session->set_userdata($user_session);
 
              $this->flashmsg('Selamat anda berhasil mendaftar, silahkan lengkapi data anda!', 'success');
              redirect('calonanggota/profil'); 
              exit();
            
          } 
  

    $this->load->view('daftar');
  }

    public function cekemail(){ echo $this->Akun_m->cekemail($this->input->post('email')); } 
    public function cekpasslama(){ echo $this->Akun_m->cekpasslama($this->data['email_peserta'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->Akun_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->Akun_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

}

?>
