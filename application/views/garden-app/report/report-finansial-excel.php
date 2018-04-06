<?php 
		include APPPATH.'third_party/PHPExcel.php';

		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')->setLastModifiedBy('Smartsoft Studio')->setTitle("Report Finansial Perusahaan")->setSubject("Report Finansial Perusahaan")->setDescription("Report Finansial Perusahaan")->setKeywords("Report Finansial Perusahaan");


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

		$style_col2 = array(
			'font' => array('bold' => true), 
			'alignment' => array(
				// 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CEN/TER, 
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
 

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "SPK")->mergeCells('A1:A2');
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Proyek")->mergeCells('B1:B2');
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Nilai Kontrak")->mergeCells('C1:C2');
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Modal")->mergeCells('D1:D2');
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Pengeluaran")->mergeCells('E1:K1');
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Pemasukan")->mergeCells('L1:M1');
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Profit")->mergeCells('N1:N2');
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Status")->mergeCells('O1:O2');
		
		$excel->setActiveSheetIndex(0)->setCellValue('E2', "Hutang");
		$excel->setActiveSheetIndex(0)->setCellValue('F2', "Transport"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G2', "Jasa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H2', "Pegawai"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I2', "Kantor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J2', "Bahan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K2', "Entertain");
		$excel->setActiveSheetIndex(0)->setCellValue('L2', "Invoice"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M2', "Invoice Dibayar"); 






		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);




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
		$excel->getActiveSheet()->getStyle('K2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N2')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O2')->applyFromArray($style_col);






		$allkontrak = 0;
  		$allmodal = 0;
  		$allhutang = 0;
  		$alltransport = 0;
  		$alljasa = 0;
  		$allpegawai = 0;
  		$allkantor = 0;
  		$allbahan = 0;
  		$allentertain = 0;
  		$allinvoice = 0;
  		$allinvoicedibayar = 0;
  		$allprofit = 0;
  		$no = 1;
  		$numrows = 3;

      	foreach ($matters->result() as $p): 
      	$k =0;
      	$mk = 0;
  		$kk = 0;


		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrows,$p->pr_spk);
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrows,$p->pr_nama);
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrows,$p->pr_nilai_kontrak);
		// ---------------------------------------------------------------------------
		$modal = json_decode($p->pr_modal);
      	$mod = array_sum($modal);
      	$allmodal += $mod;
      	$allkontrak += $p->pr_nilai_kontrak;
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrows,$mod);

		// ---------------------------------------------------------------------------
		$bunga = json_decode($p->pr_bunga);
		$bung = array_sum($bunga);
		$hutang = $mod+$bung;
		$allhutang += $hutang;
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrows,$hutang);
		// ---------------------------------------------------------------------------
		$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Transport'));
		$transport = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
		foreach ($transport as $trans) {
			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$trans['ap_idsubaktivitas']));
			if($sub['kategori']=="Masuk"){
			$masuk = $trans['ap_nominal'];
			$keluar = 0;	
			}else if($sub['kategori']=="Keluar"){
			$masuk = 0;
			$keluar = $trans['ap_nominal'];	
			}
			$mk += $masuk;
			$kk += $keluar;
			$k += $keluar;

		}
		$totaltransport = $kk;
		$alltransport += $totaltransport;

		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrows,$totaltransport);
		// ---------------------------------------------------------------------------
		$mk = 0;
		$kk = 0;
		$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Jasa'));
		$jasa = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
		foreach ($jasa as $jas) {
			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$jas['ap_idsubaktivitas']));
			if($sub['kategori']=="Masuk"){
			$masuk = $jas['ap_nominal'];
			$keluar = 0;	
			}else if($sub['kategori']=="Keluar"){
			$masuk = 0;
			$keluar = $jas['ap_nominal'];	
			}
			$mk += $masuk;
			$kk += $keluar;
			$k += $keluar;

		}
		$totaljasa = $kk;
		$alljasa += $totaljasa;
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrows,$totaljasa);
		// ---------------------------------------------------------------------------
		$kk = 0;
		$kp = $this->mymodel->selectWhere('karyawan_proyek',array('proyek_id'=>$p->pr_id));
		foreach ($kp as $rec) {
			$bulan = date('m',strtotime($rec['date']));
			$tahun = date('Y',strtotime($rec['date']));

			$gaji = $this->mymodel->gaji($p->pr_id,$bulan,$tahun,$rec['karyawan_id']);
			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pegawai'));
			$sub = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Gaji','parent'=>$akt['id']));
			$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$rec['karyawan_id']));
				$kk += $gaji['gaji'];
			$k += $gaji['gaji'];
      		$allpegawai += $gaji['gaji'];


			}
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrows,$kk);
		// ---------------------------------------------------------------------------
		$mk = 0;
  		$kk = 0;

		$kantor = $this->mymodel->selectWhere('pengeluaran',array('proyek_id'=>$p->pr_id,'kategori'=>'Kantor'));
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
			$mk += $masuk;
			$kk += $keluar;
			$k += $keluar;

		}
		$totalkantor = $kk;
		$allkantor += $totalkantor;
		
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrows,$totalkantor);
		// ---------------------------------------------------------------------------
		$mk = 0;
  		$kk = 0;
		$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Bahan'));
		$bahan = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
		foreach ($bahan as $bah) {
			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$bah['ap_idsubaktivitas']));
			if($sub['kategori']=="Masuk"){
			$masuk = $bah['ap_nominal'];
			$keluar = 0;	
			}else if($sub['kategori']=="Keluar"){
			$masuk = 0;
			$keluar = $bah['ap_nominal'];	
			}
			$mk += $masuk;
			$kk += $keluar;
			$k += $keluar;

		}
		$totalbahan = $kk;
		$allbahan += $totalbahan;
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrows,$totalbahan);
		// ---------------------------------------------------------------------------
		$mk = 0;
  		$kk = 0;
		$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Entertain'));
		$entertain = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
		foreach ($entertain as $ent) {
			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$ent['ap_idsubaktivitas']));
			if($sub['kategori']=="Masuk"){
			$masuk = $ent['ap_nominal'];
			$keluar = 0;	
			}else if($sub['kategori']=="Keluar"){
			$masuk = 0;
			$keluar = $ent['ap_nominal'];	
			}
			$mk += $masuk;
			$kk += $keluar;
			$k += $keluar;

		}
		$totalentertain = $kk;
		$allentertain += $totalentertain;
		$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrows,$totalentertain);
		// ---------------------------------------------------------------------------
		$totaltp = array();
				            		
		$tp = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$p->pr_id));
		foreach ($tp as $tpp) {
			# code...
			$totaltp[] = $tpp['total'];
		}
		$stp = array_sum($totaltp);
		$allinvoice += $stp;
		$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrows,$allinvoice);
		// ---------------------------------------------------------------------------
		$totaltps = array();
		$tps = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$p->pr_id,'status'=>'Lunas'));
		foreach ($tps as $tpps) {
			# code...
			$totaltps[] = $tpps['total'];
		}
		$stps = array_sum($totaltps);
		$allinvoicedibayar += $stps;
		$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrows,$stps);
		// ---------------------------------------------------------------------------
		$kp = $p->pr_nilai_kontrak-$hutang-$k;
		$allprofit += $kp;
		$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrows,$kp);
		// ---------------------------------------------------------------------------
		
		$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrows,$p->pr_status);


		$excel->getActiveSheet()->getStyle('A'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('K'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('L'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('M'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('N'.$numrows)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('O'.$numrows)->applyFromArray($style_row);


		$numrows++;
  		endforeach;

		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrows, "Total")->mergeCells('A'.$numrows.':B'.$numrows);
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrows,$allkontrak);
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrows,$allmodal);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrows,$allhutang);
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrows,$alltransport);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrows,$alljasa);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrows,$allpegawai);
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrows,$allkantor);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrows,$allbahan);
		$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrows,$allentertain);
		$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrows,$allinvoice);
		$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrows,$allinvoicedibayar);
		$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrows,$allprofit);
		$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrows,''); 




  		$excel->getActiveSheet()->getStyle('A'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('B'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('C'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('D'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('E'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('F'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('G'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('H'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('I'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('J'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('K'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('L'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('M'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('N'.$numrows)->applyFromArray($style_col2);
		$excel->getActiveSheet()->getStyle('O'.$numrows)->applyFromArray($style_col2);








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
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(TRUE);
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(TRUE);



		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Report Finansial Perusahaan");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Report Finansial Perusahaan Report.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
?>