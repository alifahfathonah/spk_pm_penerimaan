<?php 
class Penerimaan_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_penerimaan';
    $this->data['table_name'] = 'penerimaan';
  }


 
}

 ?>
