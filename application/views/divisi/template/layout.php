<?php
$data =[ 
  'index' => $index
];
$this->load->view('divisi/template/header',$data);
$this->load->view('divisi/template/navbar');
$this->load->view('divisi/template/sidebar',$data);
$this->load->view($content);
$this->load->view('divisi/template/footer');
 ?>
