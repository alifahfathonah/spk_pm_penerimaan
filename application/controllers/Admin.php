<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends MY_Controller
{

  function __construct(){
    parent::__construct();
  
    $this->data['email'] = $this->session->userdata('email');
    $this->data['id_role']  = $this->session->userdata('id_role'); 
    if (!$this->data['email'] || ($this->data['id_role'] != 1))
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
    
    date_default_timezone_set("Asia/Jakarta");
  }

  public function index(){  
    $this->data['index'] = 1;
    $this->data['content'] = 'admin/dashboard';
    $this->template($this->data,'admin');
  }



  public function penerimaan(){
    if ($this->POST('tambah')) {   
      $data = [   
        'nama' => $this->POST('nama') , 
        'tgl_buat' => date('Y-m-d H:i:s'), 
        'status' => 1 
      ];
      $this->Penerimaan_m->insert($data);

      $id = $this->db->insert_id();


      $this->flashmsg('Sesi Penerimaan Calon Anggota baru berhasil dibuat!', 'success');
      redirect('admin/penerimaan/'.$id);
      exit();    
    }     
    elseif ($this->POST('edit')) { 
      $data = [    
        'nama' => $this->POST('nama') 
      ];

      $this->Penerimaan_m->update($this->POST('id_penerimaan'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/penerimaan/'.$this->POST('id_penerimaan'));
      exit();    
    } 

    elseif ($this->POST('pilih')) { 
      $data = [    
        'status' => 1,
        'keterangan' => $this->POST('id_divisi') 
      ];

      $this->Peserta_m->update($this->POST('id_peserta'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/penerimaan/'.$this->POST('id_penerimaan'));
      exit();    
    } 
    elseif ($this->POST('batal')) { 
      $data = [    
        'status' => 0,
        'keterangan' => NULL
      ];

      $this->Peserta_m->update($this->POST('id_peserta'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/penerimaan/'.$this->POST('id_penerimaan'));
      exit();    
    } 

    elseif ($this->POST('hapus')) { 
      $id_penerimaan = $this->POST('id_penerimaan'); 
      $this->Penerimaan_m->delete($id_penerimaan);

      $this->flashmsg('Penerimaan berhasil dihapus!', 'success');
      redirect('admin/penerimaan/');
      exit();    
    } 
    elseif ($this->POST('tutup')) { 
      $data = [    
        'status' => 2
      ];

      $list_kriteria = $this->Kriteria_m->get();
      $list_divisi = $this->Divisi_m->get();

      $this->Standar_m->delete_by(['id_penerimaan' => $this->POST('id_penerimaan')]);
      foreach ($list_divisi as $d) {
        foreach ($list_kriteria as $k) { 
          $this->Standar_m->insert(['id_divisi' => $d->id_divisi, 'id_kriteria' => $k->id_kriteria, 'nilai' => 3, 'id_penerimaan' => $this->POST('id_penerimaan')]);
        }
      }
 
      $this->Penerimaan_m->update($this->POST('id_penerimaan'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/penerimaan/'.$this->POST('id_penerimaan'));
      exit();    
    }
    elseif ($this->POST('tutup2')) { 
      $data = [    
        'status' => 3
      ];

      $this->Penerimaan_m->update($this->POST('id_penerimaan'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/penerimaan/'.$this->POST('id_penerimaan'));
      exit();    
    } 

    elseif ($this->POST('selesai')) { 
      $data = [    
        'status' => 4
      ];

      $this->Penerimaan_m->update($this->POST('id_penerimaan'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/penerimaan/'.$this->POST('id_penerimaan'));
      exit();    
    }   


    elseif ($this->uri->segment(3)) {
      if ($this->Penerimaan_m->get_num_row(['id_penerimaan' => $this->uri->segment(3)]) == 1) {
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]);   
        $this->data['list_peserta'] = $this->Peserta_m->get(['id_penerimaan' => $this->uri->segment(3)]);     
        $this->data['list_divisi'] = $this->Divisi_m->get();     

          
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/detailpenerimaan';
        $this->template($this->data,'admin'); 
      }else {
        redirect('admin/penerimaan');
        exit();
      }
    } 
    else {
      $this->data['list_penerimaan'] = $this->Penerimaan_m->get();  


      $this->data['index'] = 2;
      $this->data['content'] = 'admin/penerimaan';
      $this->template($this->data,'admin');
    }
  } 
 
  public function kriteria(){
    if ($this->POST('tambah')) {   
      $data = [   
        'nama_kriteria' => $this->POST('nama_kriteria') , 
        'aspek' => $this->POST('aspek') , 
        'jenis' => $this->POST('jenis') , 
        'sub' => $this->POST('sub') 
      ];
      $this->Kriteria_m->insert($data);

      $id = $this->db->insert_id();


      $this->flashmsg('KRITERA BERHASIL DITAMBAH!', 'success');
      redirect('admin/kriteria/'.$id);
      exit();    
    }   
    elseif ($this->POST('tambah_indikator')) {   
      $data = [   
        'keterangan' => $this->POST('keterangan') , 
        'min' => $this->POST('minimal') , 
        'max' => $this->POST('maksimal'),
        'nilai' => $this->POST('nilai'),
        'id_kriteria' => $this->POST('id_kriteria')
      ];
      $this->IndikatorKriteria_m->insert($data);

      $id = $this->db->insert_id();
 
      $this->flashmsg('Indikator berhasil ditambah!', 'success');
      redirect('admin/kriteria/'.$this->POST('id_kriteria'));
      exit();    
    }   
    elseif ($this->POST('edit')) { 
      $data = [    
        'nama_kriteria' => $this->POST('nama_kriteria') , 
        'aspek' => $this->POST('aspek') , 
        'jenis' => $this->POST('jenis') 
      ];

      $this->Kriteria_m->update($this->POST('id_kriteria'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/kriteria/'.$this->POST('id_kriteria'));
      exit();    
    }  
    elseif ($this->POST('edit_indikator')) {   
      $data = [   
        'keterangan' => $this->POST('keterangan') , 
        'min' => $this->POST('minimal') , 
        'max' => $this->POST('maksimal'),
        'nilai' => $this->POST('nilai') 
      ];
      $this->IndikatorKriteria_m->update($this->POST('id'), $data);


      $this->flashmsg('Indikator berhasil disimpan!', 'success');
      redirect('admin/kriteria/'.$this->POST('id_kriteria'));
      exit();    
    }   
    elseif ($this->POST('hapus')) { 
      $id_kriteria = $this->POST('id_kriteria'); 
      $this->Kriteria_m->delete($id_kriteria);

      $this->flashmsg('Kriteria berhasil dihapus!', 'success');
      redirect('admin/kriteria/');
      exit();    
    }  
    elseif ($this->POST('hapus_indikator')) { 
      $id = $this->POST('id'); 
      $this->IndikatorKriteria_m->delete($id);

      $this->flashmsg('Indikator berhasil dihapus!', 'success');
      redirect('admin/kriteria/'.$this->POST('id_kriteria'));
      exit();    
    }  
    elseif ($this->uri->segment(3)) {
      if ($this->Kriteria_m->get_num_row(['id_kriteria' => $this->uri->segment(3)]) == 1) {
        $this->data['kriteria'] = $this->Kriteria_m->get_row(['id_kriteria' => $this->uri->segment(3)]);   
        $this->data['list_sub'] = $this->Subkriteria_m->get(['id_kriteria' => $this->uri->segment(3) ]);     

          
        $this->data['index'] = 5;
        $this->data['content'] = 'admin/detailkriteria';
        $this->template($this->data,'admin'); 
      }else {
        redirect('admin/penerimaan');
        exit();
      }
    } 
    else {
      $this->data['list_kriteria'] = $this->Kriteria_m->get();  


      $this->data['index'] = 5;
      $this->data['content'] = 'admin/kriteria';
      $this->template($this->data,'admin');
    }
  } 

  public function subkriteria(){
    if ($this->POST('tambah')) {   
      $data = [   
        'nama_sub' => $this->POST('nama_sub'),  
        'id_kriteria' => $this->POST('id_kriteria') 
      ];
      $this->Subkriteria_m->insert($data);

      $id = $this->db->insert_id();

      $this->flashmsg('SUB KRITERA BERHASIL DITAMBAH!', 'success');
      redirect('admin/subkriteria/'.$id);
      exit();    
    }  
    elseif ($this->POST('tambah_indikator')) {   
      $data = [   
        'keterangan' => $this->POST('keterangan') , 
        'min' => $this->POST('minimal') , 
        'max' => $this->POST('maksimal'),
        'nilai' => $this->POST('nilai'),
        'id_sub' => $this->POST('id_sub')
      ];
      $this->IndikatorSub_m->insert($data);

      $id = $this->db->insert_id();


      $this->flashmsg('Indikator berhasil ditambah!', 'success');
      redirect('admin/subkriteria/'.$this->POST('id_sub'));
      exit();    
    }  
    elseif ($this->POST('edit')) { 
      $data = [   
        'nama_sub' => $this->POST('nama_sub')
      ];

      $this->Subkriteria_m->update($this->POST('id_sub'),$data);

      $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
      redirect('admin/subkriteria/'.$this->POST('id_sub'));
      exit();    
    }  
    elseif ($this->POST('edit_indikator')) {   
      $data = [   
        'keterangan' => $this->POST('keterangan') , 
        'min' => $this->POST('minimal') , 
        'max' => $this->POST('maksimal'),
        'nilai' => $this->POST('nilai') 
      ];
      $this->IndikatorSub_m->update($this->POST('id'), $data);


      $this->flashmsg('Indikator berhasil disimpan!', 'success');
      redirect('admin/subkriteria/'.$this->POST('id_sub'));
      exit();    
    }   
    elseif ($this->POST('hapus')) {   
      $this->Subkriteria_m->delete($this->POST('id_sub'));
      $this->flashmsg('DATA SUB KRITERA BERHASIL DIHAPUS!', 'success');
      redirect('admin/kriteria/'.$this->POST('id_kriteria'));
      exit();    
    } 
    elseif ($this->POST('hapus_indikator')) { 
      $id = $this->POST('id'); 
      $this->IndikatorSub_m->delete($id);

      $this->flashmsg('Indikator berhasil dihapus!', 'success');
      redirect('admin/subkriteria/'.$this->POST('id_sub'));
      exit();    
    }  
    elseif ($this->uri->segment(3)) {
      if ($this->Subkriteria_m->get_num_row(['id_sub' => $this->uri->segment(3)]) == 1) {
        $this->data['sub'] = $this->Subkriteria_m->get_row(['id_sub' => $this->uri->segment(3)]);  
        $this->data['kriteria'] = $this->Kriteria_m->get_row(['id_kriteria' => $this->data['sub']->id_kriteria]);   
        $this->data['list_indikator'] = $this->IndikatorSub_m->get(['id_sub' => $this->uri->segment(3) ]);     

          
        $this->data['index'] = 5;
        $this->data['content'] = 'admin/detailsubkriteria';
        $this->template($this->data,'admin'); 
      }else {
        redirect('sekretariat/kriteria');
        exit();
      }
    }
    else{
      redirect('sekretariat/kriteria');
      exit();
    } 
  } 
       
  public function calonanggota(){ 
    if ($this->uri->segment(3)) {
      $id = $this->uri->segment(3);
      $this->data['calonanggota'] = $this->CalonAnggota_m->get_row(['id_calonanggota' => $id]);   
      $this->data['index'] = 3;
      $this->data['content'] = 'admin/detailcalonanggota';
      $this->template($this->data,'admin');
    }else{
      $this->data['list_calonanggota'] = $this->CalonAnggota_m->get();   
      $this->data['index'] = 3;
      $this->data['content'] = 'admin/calonanggota';
      $this->template($this->data,'admin');
    } 
  } 

  public function tambahcalonanggota(){ 
    if ($this->POST('edit')) {
      $email_x = $this->POST('emailx');
      $email = $this->POST('email');
      $id_calonanggota = $this->POST('id_calonanggota');
      if ($this->Akun_m->get_num_row(['email' => $email]) != 0 && $email_x != $email) { 
        $this->flashmsg('Email telah digunakan!', 'warning');
        redirect('admin/calonanggota/'.$id_calonanggota);
        exit();    
      }

      $data = [
        'email' => $email 
      ];

      $this->Akun_m->update($email_x,$data); 
      $data2 = [ 
        'nama_lengkap' => $this->POST('nama'),
              'jk' => $this->POST('jk'), 
              'alamat' => $this->POST('alamat'), 
              'tempat_lahir' => $this->POST('tempat_lahir'), 
              'tanggal_lahir' => $this->POST('tanggal_lahir'), 
              'hobi' => $this->POST('hobi'), 
              'pengalaman' => $this->POST('pengalaman') 
      ];

      $this->CalonAnggota_m->update($id_calonanggota,$data2); 

      $this->flashmsg('data calon anggota berhasil disimpan!', 'success');
      redirect('admin/calonanggota/'.$id_calonanggota);
      exit(); 
    } 
    elseif ($this->POST('hapus')) {
      $this->Akun_m->delete($this->POST('email'));
      $this->flashmsg('Data calon anggota berhasil dihapus!', 'success');
      redirect('admin/calonanggota/');
      exit();
    }
    else{
      redirect('admin');
      exit();
    } 
  }  

  public function divisi(){      
    if ($this->POST('tambah')) { 
          
      if ($this->Akun_m->get_num_row(['email' => $this->POST('email')]) != 0) {
        $this->flashmsg('Email telah digunakan!', 'warning');
        redirect('admin/divisi/');
        exit();  
      }

       
      $data = [
        'email' => $this->POST('email'), 
        'role' => 2,
        'password' => md5($this->POST('password')) 
      ];

      if ($this->Akun_m->insert($data)) {

        $data = [
          'email' => $this->POST('email'),  
          'nama_divisi' => $this->POST('nama'),  
          'deskripsi' => $this->POST('deskripsi') 
        ];


        if ($this->Divisi_m->insert($data)) {
          $this->flashmsg('Divisi berhasil ditambah', 'success');
          redirect('admin/divisi/');
          exit();  

        }else{
          $this->Akun_m->delete($this->POST('email'));
          $this->flashmsg('Gagal, Coba lagi!', 'warning');
          redirect('admin/divisi/');
          exit();  
        }

        
      }else{
        $this->flashmsg('Gagal, Coba lagi!', 'warning');
        redirect('admin/divisi/');
        exit();  
      }
    }
    elseif ($this->POST('edit')) {  
      if ($this->Akun_m->get_num_row(['email' => $this->POST('email')]) != 0 && $this->POST('emailx') != $this->POST('email')) {
        $this->flashmsg('Email telah digunakan!', 'warning');
        redirect('stafftu/admin/'.$this->POST('id_divisi'));
        exit();  
      } 
      $data = [
        'email' => $this->POST('email') 
      ];
       
      if ($this->Akun_m->update($this->POST('id_divisi'),$data)) {
        $data = [  
          'nama_divisi' => $this->POST('nama'),  
          'deskripsi' => $this->POST('deskripsi') 
        ];


        if ($this->Divisi_m->update($this->POST('id_divisi'),$data)) {
          $this->flashmsg('Data divisi berhasil disimpan', 'success');
          redirect('admin/divisi/'.$this->POST('id_divisi'));
          exit();  

        }else{
           
          $this->flashmsg('Gagal, Coba lagi!', 'warning');
          redirect('admin/divisi/'.$this->POST('id_divisi'));
          exit();  
        } 
      }else{
        $this->flashmsg('Gagal, Coba lagi!', 'warning');
        redirect('admin/divisi/'.$this->POST('id_divisi'));
        exit();  
      }
    } 
    elseif ($this->POST('hapus')) {
      if ($this->Akun_m->delete($this->POST('email'))) {
        $this->flashmsg('Divisi berhasil dihapus.', 'success');
        redirect('admin/divisi/');
        exit();  
      }else{
        $this->flashmsg('Gagal, Coba lagi!', 'warning');
        redirect('admin/divisi/');
        exit();  
      }
    }
    elseif ($this->uri->segment(3)) {
          $id = $this->uri->segment(3);
          $this->data['divisi'] = $this->Divisi_m->get_row(['id_divisi' => $id]);   
          $this->data['index'] = 4;
          $this->data['content'] = 'admin/detaildivisi';
          $this->template($this->data,'admin');
    }
    else {
      $this->data['list_divisi'] = $this->Divisi_m->get();
      $this->data['index'] = 4;
      $this->data['content'] = 'admin/divisi';
      $this->template($this->data,'admin');
    }
  }

  public function profil(){ 
    $this->data['index'] = 7;
    $this->data['content'] = 'admin/profil';
    $this->template($this->data,'admin');
  }

  public function proses_edit_profil(){
    if ($this->POST('edit')) { 
        $this->Akun_m->update($this->POST('emailx'),['email' => $this->POST('email'),
          'nama_pengguna' => $this->POST('nama'),  ]);    
        $user_session = [
          'email' => $this->POST('email'),  
        ];
        $this->session->set_userdata($user_session);
        $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
        redirect('admin/profil');
        exit();
    }  
    elseif ($this->POST('edit2')) { 
      $data = [ 
        'password' => md5($this->POST('pass1')) 
      ];
      
      $this->Akun_m->update($this->data['email'],$data);
  
      $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
      redirect('admin/profil');
      exit();    
    }   
    else{ 
      redirect('admin/profil');
      exit();
    } 
  }

    
  public function cekemail(){ echo $this->Akun_m->cekemail($this->input->post('email')); } 
  public function cekpasslama(){ echo $this->Akun_m->cekpasslama($this->data['email_peserta'],$this->input->post('pass')); } 
  public function cekpass(){ echo $this->Akun_m->cek_password_length($this->input->post('pass1')); }
  public function cekpass2(){ echo $this->Akun_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

 
}

 ?>
