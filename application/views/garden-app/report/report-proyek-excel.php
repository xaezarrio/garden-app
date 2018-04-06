<?php 
		include APPPATH.'third_party/PHPExcel.php';

		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')->setLastModifiedBy('Smartsoft Studio')->setTitle("Report Proyek")->setSubject("Report Proyek")->setDescription("Report Proyek")->setKeywords("Report Proyek");


		$style_col = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			),
				'fill' => array(
            	'type' => PHPExcel_Style_Fill::FILL_SOLID,
            	'color' => array('rgb' => 'DDDDDD')
        	),

		);

		
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);


		$style_row2 = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			)
		);

		$red = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			),
				'fill' => array(
            	'type' => PHPExcel_Style_Fill::FILL_SOLID,
            	// 'color' => array('rgb' => 'ff0000')
        	),'font'  => array(
		        'bold'  => true,
		        'color' => array('rgb' => 'FF0000'),
		        // 'size'  => 15,
		        // 'name'  => 'Verdana'
		    )
		);


		$header = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER ,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER 
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
			),
				'fill' => array(
            	'type' => PHPExcel_Style_Fill::FILL_SOLID,
            	// 'color' => array('rgb' => 'ff0000')
        	),'font'  => array(
		        'bold'  => true,
		        'color' => array('rgb' => '000000'),
		        'size'  => 15,
		        // 'name'  => 'Verdana'
		    )
		);
 
		$excel->setActiveSheetIndex(0)->setCellValue('A1', $matters->pr_nama." (".$matters->pr_tgl_mulai." s/d ".$matters->pr_tgl_selesai.")")->mergeCells('A1:J1');

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($header);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($header);


		$excel->setActiveSheetIndex(0)->setCellValue('A2', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B2', "Tanggal"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C2', "Karyawan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D2', "Aktivitas"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E2', "Sub Aktivitas"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F2', "Item"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G2', "Qty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H2', "Masuk");
		$excel->setActiveSheetIndex(0)->setCellValue('I2', "Keluar");
		$excel->setActiveSheetIndex(0)->setCellValue('J2', "Keterangan");



		$excel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J2')->applyFromArray($style_col);

// ----------------------------------------------------------------------------------------

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "Modal")->mergeCells('A3:J3');
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);

// ---------------------------------------------------------------MODAL-------------------------------------------
		
		$sumber =  json_decode($matters->pr_sumber);
		$nominal = json_decode($matters->pr_modal);
		$bunga = json_decode($matters->pr_bunga);
		$m = 0;
		$modal = array_sum($nominal);
		$m += $modal;
		
		$excel->setActiveSheetIndex(0)->setCellValue('A4', "1"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B4', $matters->pr_tgl_mulai); 
		$excel->setActiveSheetIndex(0)->setCellValue('C4', ""); 
		$excel->setActiveSheetIndex(0)->setCellValue('D4', ""); 
		$excel->setActiveSheetIndex(0)->setCellValue('E4', ""); 
		$excel->setActiveSheetIndex(0)->setCellValue('F4', ""); 
		$excel->setActiveSheetIndex(0)->setCellValue('G4', ""); 
		$excel->setActiveSheetIndex(0)->setCellValue('H4', $modal);
		$excel->setActiveSheetIndex(0)->setCellValue('I4', "");
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "Total Modal");



		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_row);
// ----------------------------------------------------------------------------------------

		$excel->setActiveSheetIndex(0)->setCellValue('A5', "Aktivitas")->mergeCells('A5:J5');
		$excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);

// ---------------------------------------------------------------Aktivitas-------------------------------------------
		$at = $this->mymodel->selectWhere('aset_transaksi',array('proyek_id'=>$id));
		$no = 2; 
		$numrow = 6; 
		
		$total=0; 
		$k = 0;
		$i = 2;
		foreach ($ap->result() as $v){
		
		$file = $this->mymodel->selectdataOne("file",array("table"=>'aktivitas_proyek',"table_id"=>$v->ap_id));
		// print_r($file)
		$sub = $this->mymodel->selectdataOne("aktivitas",array("id"=>$v->ap_idsubaktivitas));
		if($sub['kategori']=="Masuk"){
			$masuk = $v->ap_nominal;
			$keluar = 0;
			$type = "IN";
		}else{
			$keluar = $v->ap_nominal;
			$masuk = 0;
			$type = "OUT";

		}
			$m += $masuk;
			$k += $keluar;
		
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $v->ap_tanggal);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, "-");
			$akt = $this->mmodel->selectWhere("aktivitas",array("id"=>$v->ap_idaktivitas))->row()->name;
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow,  $akt );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $sub['name']);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, "-");
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, "-");
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $keluar);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $v->ap_keterangan);

			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);


			
			$no++; 
			$numrow++; 
		}



		// ----------------------------------------------------------------------------------------
		$numrow = $numrow;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Kantor")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_col);

		// ---------------------------------------------------------------Kantor-------------------------------------------
		$numrow = $numrow+1;
		$kantor = $this->mymodel->selectWhere('pengeluaran',array('proyek_id'=>$id,'kategori'=>'Kantor'));
		foreach ($kantor as $ktr) {
		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$ktr['aktivitas_sub']));
		$akt = $this->mymodel->selectdataOne('aktivitas',array('id'=>$sub['parent']));
		if($sub['kategori']=="Masuk"){
		$masuk = $ktr['nominal'];
		$keluar = 0;	
		}else if($sub['kategori']=="Keluar"){
		$masuk = $ktr['nominal'];
		$keluar = 0;	
		// $total[] = $rec['nominal']; 
		}else{
			$masuk = 0;
			$keluar = $ktr['nominal'];
		}
		$m += $masuk;
		$k += $keluar;

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ktr['date']);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, '-');
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow,  $akt['name'] );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $sub['name'] );
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,$ktr['item']);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $ktr['qty']);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $keluar);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $ktr['keterangan']);

			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

			$numrow++;
		}

		// ----------------------------------------------------------------------------------------
		$numrow = $numrow;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Aset")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_col);

		// ---------------------------------------------------------------Aset-------------------------------------------
		$at = $this->mymodel->selectWhere('aset_transaksi',array('proyek_id'=>$id));
		$numrow = $numrow+1;
		foreach ($at as $astr) {
			$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$astr['karyawan_id']));  
			$ad = $this->mymodel->selectWhere('aset_transaksi_detail',array('transaksi_id'=>$astr['id']));
			foreach ($ad as $detail) {
			$aset = $this->mymodel->selectdataOne('aset',array('id'=>$detail['aset_id']));  
			if($astr['tipe']=="OUT"){
				$in = 0;
				$out = 0;
				$statusin = "Peminjaman";
				$statusout = "";
			}else{
				$out = 0;
				$in = 0;
				$statusin = "";
				$statusout = "Pengembalian";
			}
			$m+=$in;
			$k+=$out;

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $astr['date']);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $karyawan['name']);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, "-" );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, "-");
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $aset['name']);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $detail['qty']);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $statusin);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $statusout);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $astr['desc']);

			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

			$numrow++;
			$no++; 
			}	
		} 


		$numrow = $numrow;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Pegawai")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_col);

		$kp = $this->mymodel->selectWhere('karyawan_proyek',array('proyek_id'=>$id));
		$numrow = $numrow+1;

		foreach ($kp as $rec) {
			$bulan = date('m',strtotime($rec['date']));
			$tahun = date('Y',strtotime($rec['date']));

			$gaji = $this->mymodel->gaji($id,$bulan,$tahun,$rec['karyawan_id']);
			// echo $gaji['gaji'];
			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pegawai'));
			$sub = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Gaji','parent'=>$akt['id']));
			$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$rec['karyawan_id']));
				$k += $gaji['gaji'];

				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $rec['date']);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $karyawan['name']);
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, "Pegawai" );
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $sub['name']);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, '-');
				$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, '-');
				$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, 0);
				$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $gaji['gaji']);
				$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, 'Gaji '.$karyawan['name']);

				
				
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

			$numrow++;
			$no++; 

		}

// ================================================================================================================
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Total")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $m);
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $k);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$mo = $m-$k;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Saldo Akhir")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $mo);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Rekap Profit")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($red);



		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;

		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Nilai Kontrak")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $matters->pr_nilai_kontrak);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);


		$numrow = $numrow+1;
		$modalbunga = array_sum($nominal)+array_sum($bunga);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Hutang")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $modalbunga);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$kp = $matters->pr_nilai_kontrak-$modalbunga-$k;
		
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Profit")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $kp);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		// -----------------------------------------------------------------------------------------------
		
		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Rekap Pembayaran")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($red);



		// -----------------------------------------------------------------------------------------------

		$numrow = $numrow+1;
		$tp = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id,'type'=>'Pembayaran Proyek'));
		$totaltp = array();
		foreach ($tp as $tpp) {
			# code...
			$totaltp[] = $tpp['total'];
		}
		$stp = array_sum($totaltp);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Invoice")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $stp);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$tps = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id,'status'=>'Lunas','type'=>'Pembayaran Proyek'));
		$totaltps = array();
		
		foreach ($tps as $tpps) {
			# code...
			$totaltps[] = $tpps['total'];
		}
		$stps = array_sum($totaltps);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Invoice Dibayar")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $stps);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

	// -----------------------------------------------------------------------------------------------
		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);

		$numrow = $numrow+1;
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Rekap Pembayaran Tambahan")->mergeCells('A'.$numrow.':J'.$numrow);
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($red);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($red);




		$numrow = $numrow+1;
		$totalpp = array();
			            		
		$tp = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id,'type'=>'Penambahan Proyek'));
		foreach ($tp as $tpp) {
			# code...
			$totalpp[] = $tpp['total'];
		}
		$stpp = array_sum($totalpp);
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Invoice Tambahan")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $stpp);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);


		$numrow = $numrow+1;
		$totaltpp = array();
		$tpp = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id,'status'=>'Lunas','type'=>'Penambahan Proyek'));
		foreach ($tpp as $tpps) {
			# code...
			$totaltpp[] = $tpps['total'];
		}
		$ttpp = array_sum($totaltpp);
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Invoice Tambahan Dibayar")->mergeCells('A'.$numrow.':G'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "");
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $ttpp);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "");

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);



		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(TRUE);

		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Report Proyek");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Report Proyek Report.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
?>