<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Divisi extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 2))
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
    $this->data['divisi'] = $this->Divisi_m->get_row(['email' =>$this->data['email'] ]);
 

  }

public function index()
  {  
        
        $this->data['list_penerimaan'] = $this->Penerimaan_m->get_by_order('tgl_buat', 'desc' , ['status' => 2]);
        $this->data['index'] = 1;
        $this->data['content'] = 'divisi/dashboard';
        $this->template($this->data,'divisi');
  }
 

 public function laporan()
  {  
        
        $this->data['list_penerimaan'] = $this->Penerimaan_m->get_by_order('tgl_buat', 'desc' , ['status' => 3]);
        $this->data['index'] = 2;
        $this->data['content'] = 'divisi/laporan';
        $this->template($this->data,'divisi');
  }
 

   public function detaillaporan()
{     

   if ($this->uri->segment(3)) {
    if ($this->uri->segment(4) == 'pm'){
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]);  
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 

        
        $spk = $this->Penilaian_m->ProfileMatching($this->uri->segment(3), $this->data['divisi']->id_divisi);
        $this->data['list_peserta'] = $spk['list_peserta'];  
        $this->data['rank'] = $spk['rank'];
        $this->data['hasil_akhir'] = $spk['hasil_akhir'];
        $this->data['nilai_awal_gap'] = $spk['nilai_awal_gap'];
        $this->data['bobot_gap'] = $spk['bobot_gap'];
        $this->data['kelompok_bobot_gap'] = $spk['kelompok_bobot_gap']; 
        $this->data['content'] = 'divisi/pmlaporan';
         

        $this->data['index'] = 2;
        $this->template($this->data,'divisi');
    }else{
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]); 
        $this->data['list_peserta'] = $this->Peserta_m->get(['id_penerimaan' => $this->uri->segment(3)]); 
        $this->data['list_standar'] = $this->Standar_m->get(['id_penerimaan' => $this->uri->segment(3),'id_divisi' => $this->data['divisi']->id_divisi]); 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 

        
        $spk = $this->Penilaian_m->ProfileMatching($this->uri->segment(3), $this->data['divisi']->id_divisi);



        $this->data['rank'] = $spk['rank'];
        $this->data['content'] = 'divisi/detaillaporan';
         

        $this->data['index'] = 2;
        $this->template($this->data,'divisi');
    }
   
  }
  else { 
    redirect('divisi/');
    exit();  
  }
}

  
  public function penilaian()
{     

  if ($this->POST('input')) { 
          
    $list_kriteria = $this->Kriteria_m->get();

    foreach ($list_kriteria as $k) { 
        $list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);

        if (sizeof($list_sub) == 0) {
           $data = [   
            'id_penerimaan' => $this->POST('id_penerimaan'),  
            'id_peserta' => $this->POST('id_peserta'),  
            'id_divisi' => $this->data['divisi']->id_divisi,  
            'id_kriteria' => $k->id_kriteria, 
            'nilai' => $this->POST('kriteria_'.$k->id_kriteria)
          ];
          $this->Penilaian_m->insert($data);
        }else{
          foreach ($list_sub as $s) {
            $data = [   
              'id_penerimaan' => $this->POST('id_penerimaan'),  
              'id_peserta' => $this->POST('id_peserta'),  
              'id_kriteria' => $k->id_kriteria, 
              'id_divisi' => $this->data['divisi']->id_divisi,  
              'id_sub' => $s->id_sub, 
              'nilai' => $this->POST('kriteria_'.$k->id_kriteria.'_sub_'.$s->id_sub)
            ];
            $this->Penilaian_m->insert($data);
          }
        }
        
      

    }

    

    $this->flashmsg('Penilaian berhasil diinput', 'success');
    redirect('divisi/penilaian/'.$this->POST('id_penerimaan'));
    exit();  
  } 
  elseif ($this->POST('editnilai')) { 
        
    $this->Penilaian_m->delete_by(['id_peserta' => $this->POST('id_peserta'),'id_penerimaan' => $this->POST('id_penerimaan'), 'id_divisi' => $this->data['divisi']->id_divisi]);
     $list_kriteria = $this->Kriteria_m->get();

      foreach ($list_kriteria as $k) { 
          $list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);

          if (sizeof($list_sub) == 0) {
             $data = [   
              'id_penerimaan' => $this->POST('id_penerimaan'),  
              'id_peserta' => $this->POST('id_peserta'),  
              'id_divisi' => $this->data['divisi']->id_divisi,  
              'id_kriteria' => $k->id_kriteria, 
              'nilai' => $this->POST('kriteria_'.$k->id_kriteria)
            ];
            $this->Penilaian_m->insert($data);
          }else{
            foreach ($list_sub as $s) {
              $data = [   
                'id_penerimaan' => $this->POST('id_penerimaan'),  
                'id_peserta' => $this->POST('id_peserta'),  
                'id_kriteria' => $k->id_kriteria, 
                'id_divisi' => $this->data['divisi']->id_divisi,  
                'id_sub' => $s->id_sub, 
                'nilai' => $this->POST('kriteria_'.$k->id_kriteria.'_sub_'.$s->id_sub)
              ];
              $this->Penilaian_m->insert($data);
            }
          }
          
        

      }

    

    $this->flashmsg('Penilaian berhasil diedit', 'success');
    redirect('divisi/penilaian/'.$this->POST('id_penerimaan'));
    exit();  
  } 
  elseif ($this->POST('deletenilai')) { 
        
    $this->Penilaian_m->delete_by(['id_peserta' => $this->POST('id_peserta'),'id_penerimaan' => $this->POST('id_penerimaan'), 'id_divisi' => $this->data['divisi']->id_divisi]); 
    

    $this->flashmsg('Penilaian berhasil dihapus', 'success');
    redirect('divisi/penilaian/'.$this->POST('id_penerimaan'));
    exit();  
  } 

  elseif ($this->POST('selesai')) { 
        
    
    $spk = $this->Penilaian_m->ProfileMatching($this->POST('id_kinerja'));  
    $rank = $spk['rank']; 
    $detail = $spk['nilai_total_kompetensi'];

    for ($i=0; $i < sizeof($rank) ; $i++) { 
      $data = [
        'id_kinerja' => $this->POST('id_kinerja'),
        'id_guru' => $rank[$i]['id_guru'],
        'peringkat' => $i+1,
        'hasil_akhir' => $rank[$i]['ha']
      ];

      $this->Laporan_m->insert($data);
      $id = $this->db->insert_id(); 
      for ($j=0; $j < sizeof($detail[$i]['data']) ; $j++) { 

        $data2 = [
          'id_laporan' => $id,
          'kriteria' => $detail[$i]['data'][$j]['nk'],
          'bobot' => $detail[$i]['data'][$j]['bk'],
          'hasil' => $detail[$i]['data'][$j]['total']
        ];

        $this->DetailLaporan_m->insert($data2);
        
      }
 

    }
 

      $d = [ 
        'status' => 3
      ];

      if ($this->Kinerja_m->update($this->POST('id_kinerja'), $d)) {
         $this->flashmsg2('Penilaian selesai.', 'success');
        redirect('kepalasekolah/laporan/'.$this->POST('id_kinerja'));
        exit();  
      }else{

        $this->Laporan_m->delete_by(['id_kinerja' => $this->POST('id_kinerja')]);
        $this->flashmsg2('Gagal, Coba lagi!', 'warning'); 
        redirect('kepalasekolah/penilaian/'.$this->POST('id_kinerja'));
        exit();  
      } 

   
  } 
  elseif ($this->POST('simpanstandar')) {

      $list_kriteria = $this->Kriteria_m->get();
      $list_divisi = $this->Divisi_m->get();
      $this->Standar_m->delete_by(['id_penerimaan' => $this->POST('id_penerimaan'), 'id_divisi' => $this->data['divisi']->id_divisi]);
      foreach ($list_divisi as $d) {
        foreach ($list_kriteria as $k) { 
          $this->Standar_m->insert(['id_divisi' => $d->id_divisi, 'id_kriteria' => $k->id_kriteria, 'nilai' => $this->POST('standar_'.$k->id_kriteria), 'id_penerimaan' => $this->POST('id_penerimaan')]);
        }
      }

      $this->flashmsg('Nilai standar kriteria berhasil disimpan', 'success');
      redirect('divisi/penilaian/'.$this->POST('id_penerimaan'));
      exit();  
  }


  elseif ($this->uri->segment(3)) {
    if ($this->uri->segment(4) == 'pm'){
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]);  
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 

        
        $spk = $this->Penilaian_m->ProfileMatching($this->uri->segment(3), $this->data['divisi']->id_divisi);
        $this->data['list_peserta'] = $spk['list_peserta'];  
        $this->data['rank'] = $spk['rank'];
        $this->data['hasil_akhir'] = $spk['hasil_akhir'];
        $this->data['nilai_awal_gap'] = $spk['nilai_awal_gap'];
        $this->data['bobot_gap'] = $spk['bobot_gap'];
        $this->data['kelompok_bobot_gap'] = $spk['kelompok_bobot_gap']; 
        $this->data['content'] = 'divisi/pm';
         

        $this->data['index'] = 1;
        $this->template($this->data,'divisi');
    }else{
        $this->data['penerimaan'] = $this->Penerimaan_m->get_row(['id_penerimaan' => $this->uri->segment(3)]); 
        $this->data['list_peserta'] = $this->Peserta_m->get(['id_penerimaan' => $this->uri->segment(3)]); 
        $this->data['list_standar'] = $this->Standar_m->get(['id_penerimaan' => $this->uri->segment(3),'id_divisi' => $this->data['divisi']->id_divisi]); 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 

        
        $spk = $this->Penilaian_m->ProfileMatching($this->uri->segment(3), $this->data['divisi']->id_divisi);



        $this->data['rank'] = $spk['rank'];
        $this->data['content'] = 'divisi/penilaian';
         

        $this->data['index'] = 1;
        $this->template($this->data,'divisi');
    }
   
  }
  else { 
    redirect('divisi/');
    exit();  
  }
}


  // -----------------------------------------------------------------------------------------------------------------
       public function profil(){
       
        $this->data['title']  = 'Pengaturan';
        $this->data['index'] = 7;
        $this->data['content'] = 'divisi/profil';
        $this->template($this->data,'divisi');
     }
    public function proses_edit_profil(){
      if ($this->POST('edit')) {
      
          if ($this->Akun_m->get_num_row(['email' => $this->POST('email')]) != 0   && $this->POST('emailx') != $this->POST('email')) {
            $this->flashmsg('Email telah digunakan!', 'warning');
            redirect('divisi/profil');
            exit();  
          }


          if ($this->Akun_m->update($this->POST('emailx'),['email' => $this->POST('email')])) {
              
              $user_session = [
                'email' => $this->POST('email'),  
              ];
              $this->session->set_userdata($user_session);
     
      
              $this->flashmsg('Profil berhasil disimpan!', 'success');
              redirect('divisi/profil');
              exit();
           }else{
              $this->flashmsg('Gagal, Coba lagi!', 'warning');
              redirect('divisi/profil');
              exit();  
           }


          

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('pass1')) 
            ];
            
            $this->Akun_m->update($this->data['email'],$data);
        
            $this->flashmsg('Kati sandi berhasil diganti!', 'success');
            redirect('divisi/profil');
            exit();    
          }  

          else{

          redirect('divisi/profil');
          exit();
          }

    }
 
    public function cekpasslama(){ echo $this->Akun_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->Akun_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->Akun_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }


 
}

 ?>
