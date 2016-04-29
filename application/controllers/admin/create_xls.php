<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class create_xls extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '1'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
		}

	public function crud(){
		$this->load->model('model_infouser');
		$data = $this->model_infouser->read_m();

		//load our new PHPExcel library
		$this->load->library('excel');
		//worksheet no 1
		$this->excel->setActiveSheetIndex(0);
		//nama worksheet
		$this->excel->getActiveSheet()->setTitle('Data User');
		//isi cell A1
		$this->excel->getActiveSheet()->setCellValue('A1', 'Tabel Data User');
		//mengubah font size cell A1
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//bold font cell A1
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 sampe D1
		$this->excel->getActiveSheet()->mergeCells('A1:H1');
		//mengatur posisi merge ditengah
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		//pendefinisian data
		$heading = array('No','Nama User','Username','Jenis Kelamin','Email','Level','Create at','Update at');

		//loop heading
		$rowNumberH = 2;
		$colH= 'A';

		foreach ($heading as $h) {
			$this->excel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFill()->getStartColor()->setARGB('FFFF8000');
			$colH++;
		}

		//loop data user
		$data_user = $data->result();
		$no=1;
		$row=3;
		foreach ($data_user as $test) {
			$this->excel->getActiveSheet()->setCellValue('A'.$row,$no);
			$this->excel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->setCellValue('B'.$row,$test->nama_user);
			$this->excel->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('C'.$row,$test->username);
            $this->excel->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('D'.$row,$test->gender);
            $this->excel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('E'.$row,$test->email);
            $this->excel->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('F'.$row,$test->level);
            $this->excel->getActiveSheet()->getStyle('F'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('G'.$row,$test->create_at);
            $this->excel->getActiveSheet()->getStyle('G'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('H'.$row,$test->update_at);
            $this->excel->getActiveSheet()->getStyle('H'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $row++;
            $no++;
		}

              
		//mengatur colom autosize
        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        //MENGATUR POSISI TENGAH
        $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //border cell
        $jumlah_data=$data->num_rows();
	    $maxrow=$jumlah_data+2;
        $styleArray = array(
	        'borders' => array(
	            'allborders' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN
	            )
	        )
	    );
	    $this->excel->getActiveSheet()->getStyle('A2:H'.$maxrow)->applyFromArray($styleArray);

		$filename='Tabel_Data_User '. date('d-m-Y H-i-s').'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	public function kalori_user($id){
		$this->load->model('model_infouser');
		$data = $this->model_infouser->info_kalori_user($id);
		$namauser = $data->row();

		//load our new PHPExcel library
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Data User '.$namauser->nama_user);
		$this->excel->getActiveSheet()->setCellValue('A1', 'Tabel Data Kalori '.$namauser->nama_user);
		// atur bold dan font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 sampe D1
		$this->excel->getActiveSheet()->mergeCells('A1:J1');
		//mengatur posisi merge ditengah
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		//pendefinisian data
		$heading = array('No','Tanggal','Berat Badan(Kg)','Tinggi Badan(Cm)','Kalori','BMR','BMI','Status','Update At','Create_at');

		//loop heading
		$rowNumberH = 2;
		$colH= 'A';

		foreach ($heading as $h) {
			$this->excel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFill()->getStartColor()->setARGB('FF0086B3');
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			$colH++;
		}

		//loop data user
		$data_user = $data->result();
		$no=1;
		$row=3;
		foreach ($data_user as $test) {
            $this->excel->getActiveSheet()->setCellValue('A'.$row,$no);
			$this->excel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->setCellValue('B'.$row,date("d/m/Y h:i a",strtotime($test->waktu)));
			$this->excel->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('C'.$row,$test->berat_badan);
            $this->excel->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('D'.$row,$test->tinggi_badan);
            $this->excel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('E'.$row,$test->kalori_user);
            $this->excel->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('F'.$row,$test->bmr);
            $this->excel->getActiveSheet()->getStyle('F'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('G'.$row,$test->bmi);
            $this->excel->getActiveSheet()->getStyle('G'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('H'.$row,$test->status);
            $this->excel->getActiveSheet()->getStyle('H'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('I'.$row,date("d/m/Y h:i a",strtotime($test->kal_usr_update)));
            $this->excel->getActiveSheet()->getStyle('I'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('J'.$row,date("d/m/Y h:i a",strtotime($test->kal_usr_create)));
            $this->excel->getActiveSheet()->getStyle('J'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $row++;
            $no++;
		}

              
		//mengatur colom autosize
        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

        //MENGATUR POSISI TENGAH
        $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('J2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //border cell
        $jumlah_data=$data->num_rows();
	    $maxrow=$jumlah_data+2;
        $styleArray = array(
	        'borders' => array(
	            'allborders' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN
	            )
	        )
	    );
	    $this->excel->getActiveSheet()->getStyle('A2:J'.$maxrow)->applyFromArray($styleArray);

		$filename='Tabel_Kalori_User '. date('d-m-Y H-i-s').'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	public function tips_kalori(){
		$this->load->model('model_tips_kalori');
		$data = $this->model_tips_kalori->export_tips_m();

		//load our new PHPExcel library
		$this->load->library('excel');
		//worksheet no 1
		$this->excel->setActiveSheetIndex(0);
		//nama worksheet
		$this->excel->getActiveSheet()->setTitle('Data Tips');
		//isi cell A1
		$this->excel->getActiveSheet()->setCellValue('A1', 'Tabel Tips Kalori');
		//mengubah font size cell A1
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//bold font cell A1
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 sampe D1
		$this->excel->getActiveSheet()->mergeCells('A1:E1');
		//mengatur posisi merge ditengah
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		//pendefinisian data
		$heading = array('No','Judul','informasi','Create At','update At');

		//loop heading
		$rowNumberH = 2;
		$colH= 'A';

		foreach ($heading as $h) {
			$this->excel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFill()->getStartColor()->setARGB('FF2E978C');
			$this->excel->getActiveSheet()->getStyle($colH.$rowNumberH)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			$colH++;
		}

		//loop data user
		$data_tips = $data->result();
		$no=1;
		$row=3;
		foreach ($data_tips as $test) {
			$this->excel->getActiveSheet()->setCellValue('A'.$row,$no);
			$this->excel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->setCellValue('B'.$row,$test->judul);
			$this->excel->getActiveSheet()->getStyle('B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('C'.$row,$test->info);
            $this->excel->getActiveSheet()->getStyle('C'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('D'.$row,$test->create_at);
            $this->excel->getActiveSheet()->getStyle('D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('E'.$row,$test->update_at);
            $row++;
            $no++;
		}
              
		//mengatur colom autosize
        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        //MENGATUR POSISI TENGAH
        $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //border cell
        $jumlah_data=$data->num_rows();
	    $maxrow=$jumlah_data+2;
        $styleArray = array(
	        'borders' => array(
	            'allborders' => array(
	                'style' => PHPExcel_Style_Border::BORDER_THIN
	            )
	        )
	    );
	    $this->excel->getActiveSheet()->getStyle('A2:E'.$maxrow)->applyFromArray($styleArray);

		$filename='Tabel_Tips '. date('d-m-Y H-i-s').'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
	//end of controller
}
