<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportexcel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function MovementPPE(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data =$this->m3_movement->getMovementPPE($param['dari'],$param['sampai'],$param['cat'],$param['sap'],$param['phsy'],$param['aset'],$param['type']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Transaction PPE")
							   ->setSubject("Transaction PPE")
							   ->setDescription("Transaction PPE")
							   ->setKeywords("Transaction PPE");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Asset number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Sub Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Capitalize Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Outgoing to"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->td_tipe);
			$excel->getActiveSheet()->setCellValueExplicit('D'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_category);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->sp_name);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_assetdescription);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->code_physical_buff." - ".$dt->nama_physical_buff);

			/*querynya bayu*/
			if($dt->td_remark==1) @$condition="Good - Ready to Used"; 
			else if($dt->td_remark==2) @$condition="Need Repair"; 
			else if($dt->td_remark==3) @$condition="Idle"; 
			else $condition="";

			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, @$condition);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Transaction PPE");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Transaction PPE.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function MovementITlaptop(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_movement->getMovementIT($param['dari'],$param['sampai'],$param['sap'],$param['phsy'],$param['aset'],"Laptop",$param['type']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Transaction IT (Laptop)")
							   ->setSubject("Transaction IT (Laptop)")
							   ->setDescription("Transaction IT (Laptop)")
							   ->setKeywords("Transaction IT (Laptop)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "OS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Year Build"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Barcode"); 

		
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
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('F'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field3_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $dt->nama_network);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(TRUE);
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Transaction IT (Laptop)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Transaction IT (Laptop).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function MovementITdesktop(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_movement->getMovementIT($param['dari'],$param['sampai'],$param['sap'],$param['phsy'],$param['aset'],"Desktop",$param['type']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Transaction IT (Desktop)")
							   ->setSubject("Transaction IT (Desktop)")
							   ->setDescription("Transaction IT (Desktop)")
							   ->setKeywords("Transaction IT (Desktop)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "OS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Year Build"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Barcode"); 

		
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
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('F'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field3_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $dt->nama_network);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(TRUE);
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Transaction IT (Desktop)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Transaction IT (Desktop).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function MovementIThp(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_movement->getMovementIT($param['dari'],$param['sampai'],$param['sap'],$param['phsy'],$param['aset'],"Hp/Tab",$param['type']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Transaction IT (Hp or Tab)")
							   ->setSubject("Transaction IT (Hp or Tab)")
							   ->setDescription("Transaction IT (Hp or Tab)")
							   ->setKeywords("Transaction IT (Hp or Tab)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "IMEI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Year Build"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Phone Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Barcode"); 

		
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
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('F'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field3_it);
			$excel->getActiveSheet()->setCellValueExplicit('J'.$numrow, $dt->td_field2_it, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $dt->nama_network);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(TRUE);
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Transaction IT (Hp or Tab)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Transaction IT (Hp or Tab).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function MovementITprinter(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_movement->getMovementIT($param['dari'],$param['sampai'],$param['sap'],$param['phsy'],$param['aset'],"Printer",$param['type']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Transaction IT (Printer)")
							   ->setSubject("Transaction IT (Printer)")
							   ->setDescription("Transaction IT (Printer)")
							   ->setKeywords("Transaction IT (Printer)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Brand"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('F'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->nama_network);
			if($dt->td_field4_it>2000-01-01) {
			    $pur=$dt->td_field4_it;
			    $exp=date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year"));
			} else {
			    $pur="";
			    $exp="";
			} 
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $pur);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $exp);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_assetdescription);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_code);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		
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

		
		$excel->getActiveSheet(0)->setTitle("Transaction IT (Printer)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Transaction IT (Printer).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function MovementITcamera(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_movement->getMovementIT($param['dari'],$param['sampai'],$param['sap'],$param['phsy'],$param['aset'],"Camera",$param['type']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Transaction IT (Camera)")
							   ->setSubject("Transaction IT (Camera)")
							   ->setDescription("Transaction IT (Camera)")
							   ->setKeywords("Transaction IT (Camera)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Brand"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('F'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->nama_network);
			
			if($dt->td_field4_it>2000-01-01) {
			    $pur=$dt->td_field4_it;
			    $exp=date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year"));
			} else {
			    $pur="";
			    $exp="";
			} 
			
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $pur);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $exp);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_assetdescription);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_code);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		
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

		
		$excel->getActiveSheet(0)->setTitle("Transaction IT (Camera)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Transaction IT (Camera).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function TrackPPE(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data =$this->m3_movement->getTrackPPE($param['dari'],$param['sampai'],$param['cat'],$param['sap'],$param['phsy'],$param['aset']);
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Asset Report PPE")
							   ->setSubject("Asset Report PPE")
							   ->setDescription("Asset Report PPE")
							   ->setKeywords("Asset Report PPE");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Last Moving"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Asset number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Capitalize Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Sub Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Description"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Condition"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->td_tipe." / ".$dt->date);
			$excel->getActiveSheet()->setCellValueExplicit('C'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $dt->nama_category);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->sp_name);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_assetdescription);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->td_code);

			if($dt->td_remark==1) @$condition="Good - Ready to Used"; 
			else if($dt->td_remark==2) @$condition="Need Repair"; 
			else if($dt->td_remark==3) @$condition="Idle"; 
			else $condition="";

			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $condition);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Asset Report PPE");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Asset Report PPE.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function TrackITlaptop(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_track->getTrackIT($param['dari'],$param['sampai'],$param['netid'],$param['aset'],"Laptop");
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Asset Report IT (Laptop)")
							   ->setSubject("Asset Report IT (Laptop)")
							   ->setDescription("Asset Report IT (Laptop)")
							   ->setKeywords("Asset Report IT (Laptop)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Type Moving"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "OS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Year Build"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->td_tipe." / ".$dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('E'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field3_it);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->nama_network);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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

		
		$excel->getActiveSheet(0)->setTitle("Asset Report IT (Laptop)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Asset Report IT (Laptop).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function TrackITdesktop(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_track->getTrackIT($param['dari'],$param['sampai'],$param['netid'],$param['aset'],"Desktop");
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Asset Report IT (Desktop)")
							   ->setSubject("Asset Report IT (Desktop)")
							   ->setDescription("Asset Report IT (Desktop)")
							   ->setKeywords("Asset Report IT (Desktop)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Last Moving"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "OS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Year Build"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->td_tipe." / ".$dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('E'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_field3_it);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->nama_network);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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

		
		$excel->getActiveSheet(0)->setTitle("Asset Report IT (Desktop)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Asset Report IT (Desktop).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function TrackIThp(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_track->getTrackIT($param['dari'],$param['sampai'],$param['netid'],$param['aset'],"Hp/Tab");
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Asset Report IT (Hp or Tab)")
							   ->setSubject("Asset Report IT (Hp or Tab)")
							   ->setDescription("Asset Report IT (Hp or Tab)")
							   ->setKeywords("Asset Report IT (Hp or Tab)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Last Moving"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "IMEI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Year Build"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Phone Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->td_tipe." / ".$dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('E'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field3_it);
			$excel->getActiveSheet()->setCellValueExplicit('I'.$numrow, $dt->phone_network, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->nama_network);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 3 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $dt->td_code);
			
			
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
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		//
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

		
		$excel->getActiveSheet(0)->setTitle("Asset Report IT (Hp or Tab)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Asset Report IT (Hp or Tab).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function TrackITprinter(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_track->getTrackIT($param['dari'],$param['sampai'],$param['netid'],$param['aset'],"Printer");
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Asset Report IT (Printer)")
							   ->setSubject("Asset Report IT (Printer)")
							   ->setDescription("Asset Report IT (Printer)")
							   ->setKeywords("Asset Report IT (Printer)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Last Moving"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Brand"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->td_tipe." / ".$dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('E'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_code);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		
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
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Asset Report IT (Printer)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Asset Report IT (Printer).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function TrackITcamera(){
		include APPPATH.'third_party/PHPExcel.php';


		$param = $this->input->post();
		
		$data = $this->m3_track->getTrackIT($param['dari'],$param['sampai'],$param['netid'],$param['aset'],"Camera");
		
		$excel = new PHPExcel();

		
		$excel->getProperties()->setCreator('Smartsoft Studio')
							   ->setLastModifiedBy('Smartsoft Studio')
							   ->setTitle("Asset Report IT (Camera)")
							   ->setSubject("Asset Report IT (Camera)")
							   ->setDescription("Asset Report IT (Camera)")
							   ->setKeywords("Asset Report IT (Camera)");



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
			)
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
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Last Moving"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "SAP Cost Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Phsycal Center"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Asset Number"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Category"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Model/Type"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Brand"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Network ID"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Purchase Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "Expired Date"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Remark"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Barcode"); 

		
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

		

		$no = 1; 
		$numrow = 2; 
		foreach($data->result() as $dt){ 
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $dt->td_tipe." / ".$dt->date);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $dt->code_sap." - ".$dt->nama_sap);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $dt->code_physical." - ".$dt->nama_physical);
			$excel->getActiveSheet()->setCellValueExplicit('E'.$numrow, $dt->td_assetnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $dt->td_category_it);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $dt->td_field1_it);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $dt->td_field2_it);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $dt->td_tipe);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $dt->td_field4_it);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, date("Y-m-d", strtotime(date("Y-m-d", strtotime($dt->td_field4_it)) . " + 4 year")));
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $dt->td_status);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $dt->td_remark);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $dt->td_code);
			
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row2);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			
			$no++; 
			$numrow++; 
		}

		
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
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		
		$excel->getActiveSheet(0)->setTitle("Asset Report IT (Camera)");
		$excel->setActiveSheetIndex(0);

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Asset Report IT (Camera).xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */