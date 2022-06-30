<?php
$data =[ 
  'index' => $index
];
$this->load->view('calonanggota/template/header',$data);
$this->load->view('calonanggota/template/navbar');
$this->load->view('calonanggota/template/sidebar',$data);
$this->load->view($content);
$this->load->view('calonanggota/template/footer');
 ?>
