<?php 
class Penilaian_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id';
    $this->data['table_name'] = 'penilaian';
  }


  public function ProfileMatching($id_penerimaan,$id_divisi){

  	$penerimaan = $this->Penerimaan_m->get_row(['id_penerimaan'=> $id_penerimaan]);
  	$list_kriteria = $this->Kriteria_m->get(); 
  	//$data = $this->Penilaian_m->get(['id_penerimaan' => $id_penerimaan]); 
  	$list_peserta = $this->Peserta_m->get(['id_penerimaan' => $id_penerimaan]);

  	$nilai_awal_gap = array();
  	foreach ($list_peserta as $g) {
  		$a = array();
  		foreach ($list_kriteria as $k) {

	 		  $b = array();
	  		$c = array();
	  		$list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);
	 		  

        if (sizeof($list_sub) == 0) {

          if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $id_penerimaan, 'id_peserta' => $g->id_peserta, 'id_kriteria' => $k->id_kriteria,'id_divisi' => $id_divisi]) == 0) {
            $nilai = 0;
          }else{
            $nilai = $this->Penilaian_m->get_row(['id_penerimaan' => $id_penerimaan, 'id_peserta' => $g->id_peserta, 'id_kriteria' => $k->id_kriteria,'id_divisi' => $id_divisi])->nilai;
          }
          

          $indikator  = $this->IndikatorKriteria_m->get(['id_kriteria' => $k->id_kriteria]);


          foreach ($indikator as $idr) {
            if ($nilai >= $idr->min && $nilai <= $idr->max) {
              $x = $idr->nilai;
            }
          }

          $ns = $this->Standar_m->get_row(['id_penerimaan' => $id_penerimaan, 'id_divisi' => $id_divisi, 'id_kriteria' => $k->id_kriteria])->nilai;

          $gap = $x - $ns;

          $z = [
            'id_kriteria' => $k->id_kriteria,
            'id_sub' => NULL,
            'jenis' => $k->jenis,
            'aspek' => $k->aspek,
            'standar' => $ns,
            'awal' => $x,
            'gap' => $gap
          ];
          
          array_push($b, $z);  

        }else{
          $h = 0;
          foreach ($list_sub as $s) {

            if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $id_penerimaan, 'id_peserta' => $g->id_peserta, 'id_kriteria' => $k->id_kriteria, 'id_sub' => $s->id_sub ,'id_divisi' => $id_divisi]) == 0) {
              $nilai = 0;
            }else{
              $nilai = $this->Penilaian_m->get_row(['id_penerimaan' => $id_penerimaan, 'id_peserta' => $g->id_peserta, 'id_kriteria' => $k->id_kriteria, 'id_sub' => $s->id_sub ,'id_divisi' => $id_divisi])->nilai;
            }
            


            $indikator  = $this->IndikatorSub_m->get(['id_sub' => $s->id_sub]);


            foreach ($indikator as $idr) {
              if ($nilai >= $idr->min && $nilai <= $idr->max) {
                $x = $idr->nilai;
              }
            }
            $h = $h +  $x;
          
          }

          $nilai = $h/sizeof($list_sub);
          
          $ns = $this->Standar_m->get_row(['id_penerimaan' => $id_penerimaan, 'id_divisi' => $id_divisi, 'id_kriteria' => $k->id_kriteria])->nilai;

          $gap = $x - $ns;

           $z = [
            'id_kriteria' => $k->id_kriteria,
            'id_sub' => $s->id_sub,
            'jenis' => $k->jenis,
            'aspek' => $k->aspek,
            'standar' => $ns,
            'awal' => $x,
            'gap' => $gap
          ];
            
           array_push($b, $z);  
	  		 }
	  		array_push($a, ['id_kriteria' => $k->id_kriteria,  'aspek' => $k->aspek, 'nk' => $k->nama_kriteria, 'nilai' => $b, 'gap' => $c]);
	  	}
	  	array_push($nilai_awal_gap, ['id_peserta' => $g->id_peserta, 'data' => $a]);
  	}

    //var_dump($nilai_awal_gap[1]['data'][3]);
    //exit();

    
  	$bobot_gap = array();

  	for ($i=0; $i < sizeof($nilai_awal_gap) ; $i++) {  
  		$b = array();
  		for ($j=0; $j < sizeof($nilai_awal_gap[$i]['data']) ; $j++) { 
	  	$c = array();
  			for ($k=0; $k < sizeof($nilai_awal_gap[$i]['data'][$j]['nilai']) ; $k++) { 
  				if ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 0) {
	  				$x = 5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 1) {
	  				$x = 4.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -1) {
	  				$x = 4;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 2) {
	  				$x = 3.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -2) {
	  				$x = 3;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 3) {
	  				$x = 2.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -3) {
	  				$x = 2;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == 4) {
	  				$x = 1.5;
	  			}elseif ($nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['gap'] == -4) {
	  				$x = 1;
	  			}
	  			$z = [
	  				'id_sub' => $nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['id_sub'],
	  				'jenis' => $nilai_awal_gap[$i]['data'][$j]['nilai'][$k]['jenis'],
	  				'bobot_gap' => $x 
	  			];
	  			array_push($c, $z);
  			}
	  		array_push($b, ['id_kriteria' => $nilai_awal_gap[$i]['data'][$j]['id_kriteria'] , 'nk' => $nilai_awal_gap[$i]['data'][$j]['nk'], 'aspek' => $nilai_awal_gap[$i]['data'][$j]['aspek'], 'nilai' => $c]); 
  		}
	  	array_push($bobot_gap, ['id_peserta' => $nilai_awal_gap[$i]['id_peserta'], 'data' => $b]);
  	}
    

   
   


  	$kelompok_bobot_gap = array();
  	for ($i=0; $i < sizeof($bobot_gap) ; $i++) {   
  		$b = array();
      $core_wawancara = 0;
      $x_core_wawancara = 0;
      $secondary_wawancara = 0;
      $x_secondary_wawancara = 0;
      $core_fgd = 0;
      $x_core_fgd = 0;
      $secondary_fgd = 0;
      $x_secondary_fgd = 0;
  		for ($j=0; $j < sizeof($bobot_gap[$i]['data']) ; $j++) { 
      


  			for ($k=0; $k < sizeof($bobot_gap[$i]['data'][$j]['nilai']) ; $k++) { 

          if ($bobot_gap[$i]['data'][$j]['aspek']  == 'Wawancara') {
            if ($bobot_gap[$i]['data'][$j]['nilai'][$k]['jenis'] == 'Core Factor') {
              $core_wawancara = $core_wawancara + $bobot_gap[$i]['data'][$j]['nilai'][$k]['bobot_gap'];
              $x_core_wawancara++;
            }
            else{ 
              $secondary_wawancara = $secondary_wawancara + $bobot_gap[$i]['data'][$j]['nilai'][$k]['bobot_gap'];
              $x_secondary_wawancara++;
            }
          }else{
            if ($bobot_gap[$i]['data'][$j]['nilai'][$k]['jenis'] == 'Core Factor') {
              $core_fgd = $core_fgd + $bobot_gap[$i]['data'][$j]['nilai'][$k]['bobot_gap'];
              $x_core_fgd++;
            }
            else{ 
              $secondary_fgd = $secondary_fgd + $bobot_gap[$i]['data'][$j]['nilai'][$k]['bobot_gap'];
              $x_secondary_fgd++;
            }
          }
  				
	  		}
         
  			
  		} 
	  	array_push($kelompok_bobot_gap, [
        'id_peserta' => $bobot_gap[$i]['id_peserta'], 
        'ncf_wawancara' => $core_wawancara/$x_core_wawancara, 
        'nsf_wawancara' => $secondary_wawancara/$x_secondary_wawancara,  
        'ncf_fgd' => $core_fgd/$x_core_fgd, 
        'nsf_fgd' => $secondary_fgd/$x_secondary_fgd
      ]);
  	}

   

 
  	$hasil_akhir = array();
  	for ($i=0; $i < sizeof($kelompok_bobot_gap) ; $i++) {  
  		 
      $n1 = (($kelompok_bobot_gap[$i]['ncf_wawancara']*0.6) + ($kelompok_bobot_gap[$i]['nsf_wawancara']*0.4)); 
      $n2 = (($kelompok_bobot_gap[$i]['ncf_fgd']*0.6) + ($kelompok_bobot_gap[$i]['nsf_fgd']*0.4)); 
      $n = $n1 + $n2;
  		$d = [
    		'n' => $n,
  			'id_peserta' => $kelompok_bobot_gap[$i]['id_peserta'], 
  			'n1' => $n1,
        'n2' => $n2
  		];
	  	array_push($hasil_akhir, $d);
  	}
 

  	//var_dump($bobot_gap[4]['data'][0] );
  	//var_dump($nilai_total_kompetensi[4] );
  	//var_dump($hasil_akhir[4] );
  	//var_dump($kelompok_bobot_gap[4] );

	//var_dump($nilai_awal_gap[0]['data'][0]['nilai'][0]['gap']);
  	 

  	$this->data['nilai_awal_gap'] = $nilai_awal_gap;
  	$this->data['bobot_gap'] = $bobot_gap;
  	$this->data['kelompok_bobot_gap'] = $kelompok_bobot_gap; 
  	$this->data['hasil_akhir'] = $hasil_akhir;
  	rsort($hasil_akhir);
  	$this->data['rank'] = $hasil_akhir;
  	$this->data['list_peserta'] = $list_peserta;
 

	
  	return $this->data;
  	

  }
 
}

 ?>
