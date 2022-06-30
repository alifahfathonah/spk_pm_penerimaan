<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
  class Beranda extends MY_Controller
  {

    function __construct(){
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
   
      date_default_timezone_set("Asia/Jakarta");   
 
    }

    public function index(){ 

 
        $this->data['index'] = 1;
   
        $this->data['content'] = 'pengguna/dashboard';
        $this->template($this->data,'pengguna');
    }
  

    public function divisi(){ 

    $this->load->model('Divisi_m');    
        $this->data['list_divisi'] = $this->Divisi_m->get();
        $this->data['index'] = 2;
   
        $this->data['content'] = 'pengguna/divisi';
        $this->template($this->data,'pengguna');
    }
  
 
 

    public function login() {   
        $this->data['index'] = 4; 
        $this->data['content'] = 'pengguna/login';
        $this->template($this->data,'pengguna');
    }

    public function daftar() {   
        $this->data['index'] = 4; 
        $this->data['content'] = 'pengguna/daftar';
        $this->template($this->data,'pengguna');
    }

 
 
  
  }
?>
