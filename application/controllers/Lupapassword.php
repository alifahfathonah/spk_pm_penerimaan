<?php
/**
 *
 */
class Lupapassword extends MY_Controller {
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
          redirect('klinik');
          break;  
      }
      exit;
    }
    $this->load->model('login_m');
    $this->load->model('Klinik_m');
      date_default_timezone_set("Asia/Jakarta");  
  }
 

  public function index() { 
    
    $this->load->view('lupapassword');
  }


   public function kirimkode(){ 
 
            $email  = $this->POST('email'); 

          if ($this->login_m->get_num_row(['email' => $email]) == 0) {
            $this->flashmsg('Email tidak terdaftar', 'danger');
            redirect('lupapassword/');
            exit();  
          }


          $kode = rand(0,9);
          for ($j=1; $j <= 3 ; $j++) {
            $kode .= rand(0,9);
          }
          $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => '',  // Email gmail
            'smtp_pass'   => '',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
          ];

          // Load library email dan konfigurasinya
          $this->load->library('email', $config);

          // Email dan nama pengirim
          $this->email->from('', 'SPK. PEMILIHAN TEMPAT BERSALIN METODE TOPSIS');
 

            
          $this->email->to($email); 
          // Lampiran email, isi dengan url/path file
         
          // Subject email
          $this->email->subject('Kode Verifikasi Lupa Password - SPK. PEMILIHAN TEMPAT BERSALIN METODE TOPSIS');

          // Isi email
          $this->email->message('Hai, ' . $email . '<br>Kode Verifikasi anda : ' . $kode);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->login_m->update($email,['temp_kode' => $kode]);
            
            $this->session->set_userdata(['email_lupapassword' => $email]);
            $this->session->set_userdata(['waktu_kirimulang' => date('Y-m-d H:i:s')]);
            $this->flashmsg('Kode Verifikasi telah dikirim, silahkan cek email anda', 'success');
            redirect('lupapassword/verifikasi/');
            exit();  
        } else {
            $this->flashmsg('Gagal, coba lagi', 'danger');
            redirect('lupapassword/');
            exit();  
        } 
          
         
      }

    public function kirimkodeulang(){ 

          
 
            $email  = $_SESSION['email_lupapassword']; 

          if ($this->login_m->get_num_row(['email' => $email]) == 0) {
            $this->flashmsg('Email tidak terdaftar', 'danger');
            redirect('lupapassword/');
            exit();  
          }


          $kode = rand(0,9);
          for ($j=1; $j <= 3 ; $j++) {
            $kode .= rand(0,9);
          }
          $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'risiaokta@gmail.com',  // Email gmail
            'smtp_pass'   => 'okta@321',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
          ];

          // Load library email dan konfigurasinya
          $this->load->library('email', $config);

          // Email dan nama pengirim
          $this->email->from('risiaokta@gmail.com', 'SPK. PEMILIHAN TEMPAT BERSALIN METODE TOPSIS');
 

            
          $this->email->to($email); 
          // Lampiran email, isi dengan url/path file
         
          // Subject email
          $this->email->subject('Kode Verifikasi Lupa Password - SPK. PEMILIHAN TEMPAT BERSALIN METODE TOPSIS');

          // Isi email
          $this->email->message('Hai, ' . $email . '<br>Kode Verifikasi anda : ' . $kode);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->login_m->update($email,['temp_kode' => $kode]);
            
            $this->session->set_userdata(['email_lupapassword' => $email]);
            $this->session->set_userdata(['waktu_kirimulang' => date('Y-m-d H:i:s')]);
            $this->flashmsg('Kode Verifikasi telah dikirim, silahkan cek email anda', 'success');
            redirect('lupapassword/verifikasi/');
            exit();  
        } else {
            $this->flashmsg('Gagal, coba lagi', 'danger');
            redirect('lupapassword/');
            exit();  
        } 
          
         
      }

    public function verifikasi() { 
      if ($_SESSION['email_lupapassword']) { 
        $this->data['email'] = $_SESSION['email_lupapassword'];
        $this->load->view('verifikasi', $this->data);
      }else{
        redirect('lupapassword/');
        exit(); 
      } 
    }

    public function proses() { 
      if ($this->POST('proses')) { 
        $email = $this->POST('email');
        $kode = $this->POST('k1').$this->POST('k2').$this->POST('k3').$this->POST('k4');

        $user = $this->login_m->get_row(['email' => $email]);

        if ($kode == $user->temp_kode) {
          
          $this->session->set_userdata(['gantipassword' => 1]);
          $this->flashmsg('Verifikasi berhasil, silahkan ganti password anda', 'success');
          redirect('lupapassword/resetpassword');
          exit();
        }else{

          $this->flashmsg('Kode Verifikasi Salah', 'danger');
          redirect('lupapassword/verifikasi');
          exit();
        }

        $this->load->view('verifikasi', $this->data);
      }else{
        redirect('lupapassword/');
        exit(); 
      } 
    }

    public function resetpassword() { 
      if (isset($_SESSION['gantipassword']) && $_SESSION['gantipassword'] == 1) { 
        $this->data['email'] = $_SESSION['email_lupapassword']; 
        $this->load->view('resetpassword', $this->data);
      }else{
        redirect('lupapassword/');
        exit(); 
      } 
    }

    public function proresreset() { 
      if ($this->POST('proses')) { 
        $email = $this->POST('email');

        if ($this->POST('password') != $this->POST('password2')) {
           $this->flashmsg('Password tidak sama', 'danger');
          redirect('lupapassword/resetpassword');
          exit();
        }

        
        $user = $this->login_m->get_row(['email' => $email]);

        if ($this->login_m->update($email, ['password' => md5($this->POST('password')), 'temp_kode' => NULL])) {
          $this->session->unset_userdata('email_lupapassword');
          $this->session->unset_userdata('gantipassword');

          $user_session = [
            'email' => $user->email, 
            'id_role' => $user->role 
          ];
          $this->session->set_userdata($user_session);

          $this->flashmsg('Password berhasil diganti', 'success');
          redirect('klinik/');
          exit();
        } 
      }else{
        redirect('lupapassword/');
        exit(); 
      } 
    }
}

?>
