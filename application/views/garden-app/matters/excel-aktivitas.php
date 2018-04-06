<?php 
		include APPPATH.'third_party/PHPExcel.php';

		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')->setLastModifiedBy('Smartsoft Studio')->setTitle("Aktivitas")->setSubject("Aktivitas")->setDescription("Aktivitas")->setKeywords("Aktivitas");


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
 
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Tanggal"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Aktivitas"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Sub Aktivitas"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Masuk"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Keluar"); 



		
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);


		$id = $matters->pr_id;
		

		$no = 1; 
		$m = 0;
		$k = 0;

		//--------------------------------------------------------------------------------------------------------------------------
		//--Saldo--
		$numrow = 2; 
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Modal")->mergeCells('A'.$numrow.':G'.$numrow);

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);


		$numrow = $numrow+1; 


		$nominals = json_decode($matters->pr_modal);
		$modals = array_sum($nominals);
		$m+=$modals; 

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow,  $matters->pr_tgl_mulai);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow,  'Total Modal');
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 	'-' );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow,  '-');
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,  $modals);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow,  0);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		//--------------------------------------------------------------------------------------------------------------------------
		//--Aktivitas--
		$numrow = $numrow+1; 
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Aktivitas")->mergeCells('A'.$numrow.':G'.$numrow);

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);

		$no = $no+1; 
		$numrow = $numrow+1; 
		foreach ($ap->result() as $v):	            		
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
			$akt = $this->mmodel->selectWhere("aktivitas",array("id"=>$v->ap_idaktivitas))->row()->name;
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $v->ap_tanggal );
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow,  $akt);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 	$sub['name'] );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow,  $v->ap_keterangan );
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,  $masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow,  $keluar);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);


			$numrow++;$no++; 
		endforeach;
		//--------------------------------------------------------------------------------------------------------------------------
		//--Kantor--
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Kantor")->mergeCells('A'.$numrow.':G'.$numrow);

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);



		$no = $no+1; 
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
		}else{
			$masuk = 0;
			$keluar = $ktr['nominal'];
		}
		$m += $masuk;
		$k += $keluar;


			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ktr['date'] );
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow,  $akt['name']);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 	$sub['name'] );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow,  $ktr['keterangan'] );
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,  $masuk);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow,  $keluar);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);

			$numrow++;$no++; 
			
		}
		//--------------------------------------------------------------------------------------------------------------------------
		//--Pegawai--
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Pegawai")->mergeCells('A'.$numrow.':G'.$numrow);

		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col);

		$no = $no+1; 
		$numrow = $numrow+1; 
		$kp = $this->mymodel->selectWhere('karyawan_proyek',array('proyek_id'=>$id));
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
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $rec['date'] );
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow,  $akt['name']);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 	$sub['name'] );
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow,  "Gaji ".$karyawan['name'] );
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,  0);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow,  $gaji['gaji']);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$numrow++;$no++; 


		}


		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Total")->mergeCells('A'.$numrow.':E'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,  $m);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow,  $k);
		
		
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);


		
		$numrow = $numrow+1; 
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, "Saldo")->mergeCells('A'.$numrow.':F'.$numrow);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $m-$k);


		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);


		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(TRUE);

		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Aktivitas");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$matters->pr_nama.' - Aktivitas Report.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
?>