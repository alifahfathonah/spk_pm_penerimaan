<?php 
class IndikatorKriteria_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id';
    $this->data['table_name'] = 'indikator_kriteria';
  }
}

 ?>
