<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class CalonAnggota extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 3))
          {
            $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus login terlebih dahulu', 'danger');
            redirect('beranda/login');
            exit;
          }  

          
    $this->load->model('Akun_m'); 
    $this->load->model('CalonAnggota_m');   
    $this->load->model('Divisi_m');    
    $this->load->model('Kriteria_m');   
    $this->load->model('Subkriteria_m');   
    $this->load->model('IndikatorKriteria_m');    
    $this->load->model('IndikatorSub_m');    
    $this->load->model('Penilaian_m');    
    $this->load->model('Penerimaan_m');    
    $this->load->model('Standar_m');   
    $this->load->model('Peserta_m');     
    
    $this->data['profil'] = $this->Akun_m->get_row(['email' =>$this->data['email'] ]);
    $this->data['calonanggota'] = $this->CalonAnggota_m->get_row(['email' =>$this->data['email'] ]);
 

  }

public function index()
  {  
        
        $this->data['list_penerimaan'] = $this->Penerimaan_m->get_by_order('tgl_buat', 'desc' , ['status' => 1]);
        $this->data['index'] = 1;
        $this->data['content'] = 'calonanggota/dashboard';
        $this->template($this->data,'calonanggota');
  }

  public function daftar(){
    if ($this->Penerimaan_m->get_num_row(['id_penerimaan' => $this->uri->segment(3)]) == 1) {

        if ($this->data['calonanggota']->tempat_lahir == NULL || $this->data['calonanggota']->tanggal_lahir == NULL || $this->data['calonanggota']->jk == NULL || $this->data['calonanggota']->alamat == NULL || $this->data['calonanggota']->hobi == NULL || $this->data['calonanggota']->pengalaman == NULL) {
            $this->flashmsg('Data diri anda belum lengkap, silahkan lengkapi terlebih dahulu.', 'warning');
            redirect('calonanggota/profil');
            exit();  
        }

        $data = [
          'id_calonanggota' => $this->data['calonanggota']->id_calonanggota,
          'id_penerimaan' => $this->uri->segment(3),
          'status' => 0
        ];

        $this->Peserta_m->insert($data);

         $this->flashmsg('Berhasil mendaftar', 'success');
            redirect('calonanggota/penerimaan/'.$this->uri->segment(3));
            exit(); 
      }else {
        redirect('calonanggota/');
        exit();
      }
  }

  
   public function penerimaan(){
     if ($this->uri->segment(3)) {
      if ($this->Penerimaan_m->get_num_row(['id_penerimaan' => $this->uri->segment(3)]) == 1) {
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]);   
        $this->data['peserta'] = $this->Peserta_m->get_row(['id_penerimaan' => $this->uri->segment(3), 'id_calonanggota' => $this->data['calonanggota']->id_calonanggota]);     

          
        $this->data['index'] = 1;
        $this->data['content'] = 'calonanggota/detailpenerimaan';
        $this->template($this->data,'calonanggota'); 
      }else {
        redirect('calonanggota/penerimaan');
        exit();
      }
    } 
    else {
      redirect('calonanggota/penerimaan');
        exit();
    }
  } 

  public function pengumuman(){
     if ($this->uri->segment(3)) {
      if ($this->Penerimaan_m->get_num_row(['id_penerimaan' => $this->uri->segment(3)]) == 1) {
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]);   
        $this->data['peserta'] = $this->Peserta_m->get_row(['id_penerimaan' => $this->uri->segment(3), 'id_calonanggota' => $this->data['calonanggota']->id_calonanggota]);     

          
        $this->data['index'] = 2;
        $this->data['content'] = 'calonanggota/detailpengumuman';
        $this->template($this->data,'calonanggota'); 
      }else {
        redirect('calonanggota/pengumuman');
        exit();
      }
    } 
    else { 

        $this->data['list_penerimaan'] = $this->Penerimaan_m->get_by_order('tgl_buat', 'desc' , ['status' => 4]);
        $this->data['index'] = 2;
        $this->data['content'] = 'calonanggota/pengumuman';
        $this->template($this->data,'calonanggota');
    }
  } 

  // -----------------------------------------------------------------------------------------------------------------
       public function profil(){
       
        $this->data['title']  = 'Pengaturan';
        $this->data['index'] = 7;
        $this->data['content'] = 'calonanggota/profil';
        $this->template($this->data,'calonanggota');
     }
    public function proses_edit_profil(){
      if ($this->POST('edit')) {
      
          if ($this->Akun_m->get_num_row(['email' => $this->POST('email')]) == 0   && $this->POST('emailx') != $this->POST('email')) {
            $this->flashmsg('Email telah digunakan!', 'warning');
            redirect('calonanggota/profil');
            exit();  
          }


          if ($this->Akun_m->update($this->POST('emailx'),['email' => $this->POST('email')])) {
             $data = [
                'nama_lengkap' => $this->POST('nama'),
                'jk' => $this->POST('jk'), 
                'alamat' => $this->POST('alamat'), 
                'tempat_lahir' => $this->POST('tempat_lahir'), 
                'tanggal_lahir' => $this->POST('tanggal_lahir'), 
                'hobi' => $this->POST('hobi'), 
                'pengalaman' => $this->POST('pengalaman') 
             ];
             $this->CalonAnggota_m->update($this->POST('id_calonanggota'), $data);
              $user_session = [
                'email' => $this->POST('email'),  
              ];
              $this->session->set_userdata($user_session);
     
      
              $this->flashmsg('Profil berhasil disimpan!', 'success');
              redirect('calonanggota/profil');
              exit();
           }else{
              $this->flashmsg('Gagal, Coba lagi!', 'warning');
              redirect('calonanggota/profil');
              exit();  
           }


          

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('pass1')) 
            ];
            
            $this->Akun_m->update($this->data['email'],$data);
        
            $this->flashmsg('Kati sandi berhasil diganti!', 'success');
            redirect('calonanggota/profil');
            exit();    
          }  

          else{

          redirect('calonanggota/profil');
          exit();
          }

    }
 
    public function cekpasslama(){ echo $this->Akun_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->Akun_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->Akun_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }


 
}

 ?>
