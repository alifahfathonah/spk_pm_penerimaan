<?php 
class Peserta_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_peserta';
    $this->data['table_name'] = 'peserta';
  }


 
}

 ?>
