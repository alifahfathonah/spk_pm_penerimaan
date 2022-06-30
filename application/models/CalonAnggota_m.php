<?php 
class CalonAnggota_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_calonanggota';
    $this->data['table_name'] = 'calonanggota';
  }
}

 ?>
