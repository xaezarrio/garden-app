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
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Karyawan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Qty"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Status"); 



		
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);



		

		$no = 1; 
		$numrow = 2; 
		$at = $this->mymodel->selectWhere('aset_transaksi',array('proyek_id'=>$id));
		foreach ($at as $astr) {
			$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$astr['karyawan_id']));  
			$ad = $this->mymodel->selectWhere('aset_transaksi_detail',array('transaksi_id'=>$astr['id']));
			$i = 1;
			foreach ($ad as $detail) {
			$aset = $this->mymodel->selectdataOne('aset',array('id'=>$detail['aset_id']));  
			if($astr['tipe']=="OUT"){
				$in = 0;
				$class ="danger";
				$text = "Peminjaman";
				$out = $detail['price']*$detail['qty'];
			}else{
				$in = $detail['price']*$detail['qty'];
				$out = 0;
				$class ="success";
				$text = "Pengembalian";
			
			}

				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow,  $astr['date']);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $karyawan['name']);
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 	$aset['name'] );
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow,  $detail['qty']);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow,   $astr['desc']);
				$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow,  $text );
				
				
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);

			$no++; 
			$numrow++;  }	
		}


			

		

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
		header('Content-Disposition: attachment; filename="'.$matters->pr_nama.' - Aset Report.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
?>