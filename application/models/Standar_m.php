<?php 
class Standar_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id';
    $this->data['table_name'] = 'standar_divisi';
  }


  public function trancate(){ 
	 $this->db->query('TRUNCATE TABLE `standar_divisi` ');
		 
  }

 
}

 ?>
