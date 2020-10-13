<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
require('./excel/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportExcel extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Kepegawaian_model','kepegawaian');
        $this->load->model('Struktural_model','struktural');
        $this->load->model('Subbid_model','subbid');
        $this->load->model('Pangkat_model','pangkat');
        if($this->session->userdata('level')!='admin'){
            redirect('Login');
         }
    }

   

    public function exportPegawai(){
        $agama = $this->kepegawaian->getAllAgama(); 
        $bidang = $this->kepegawaian->getAllBidang();
        $spreadsheet = new Spreadsheet();   

        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PEGAWAI PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',date('Y'))
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Bidang')
        ->setCellValue('C3', 'Jabatan')
        ->setCellValue('D3','Nama')
        ->setCellValue('E3','NIP')
        ->setCellValue('F3','Pangkat')
        ->setCellValue('G3','Fungsional')
        ->setCellValue('H3','Pendidikan')
        ->setCellValue('I3','Konsentrasi')
        ->setCellValue('J3','Keterangan')
        ->setCellValue('K3','Jabatan Pelaksana')
        // ->setCellValue('G1','Pensiun')
        ;
        
      
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(82);
        $spreadsheet->getActiveSheet()->getStyle("A3:K3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18.5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(38);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(28);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $spreadsheet->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:K1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:K2');
        
        $i=4;
        $j=1;
        $x=3;
        foreach ($bidang as $rowBidang){
            // $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidang($rowBidang['nama_bidang']);
            $SubBidang = $this->subbid->getSubBidangByBidang($rowBidang['id_bidang']);
            $kabid = $this->kepegawaian->getKabidPerBidang($rowBidang['id_bidang']);
            $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidang($rowBidang['nama_bidang']);
            
            $pegawaiPerbidang2 = [];
                foreach($pegawaiPerbidang['pegawai'] as $rowPegawai){   
                    if (($rowPegawai['status']=='1' || $rowPegawai['status']===NULL)){
                        array_push($pegawaiPerbidang2,$rowPegawai);
                        $x++; 
                    }
                }

             
            if (!empty($pegawaiPerbidang2)){    
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i,$rowBidang['nama_bidang']);

                $spreadsheet->getActiveSheet(0)
                ->mergeCells('B'.$i.':B'.$x);

                if($rowBidang['id_bidang'] == "1"){
                        
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('E6B8B7');
                }elseif($rowBidang['id_bidang'] == "2"){
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('FFFF00'); 
                }elseif ($rowBidang['id_bidang'] == "3") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('D8E4BC');
                }elseif ($rowBidang['id_bidang'] == "4") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('B7DEE8');
                }elseif ($rowBidang['id_bidang'] == "5") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('CCC0DA');
                }elseif ($rowBidang['id_bidang'] == "6") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('C4BD97');
                }  

                if (!empty($kabid)){
                    if ($kabid['level_jabatan']!='4'){
                        $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                    }

                $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($kabid['nip']);
                $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($kabid['nip']);
                if ($kabid['status_pgw']=="BLU"){
                    $kabid['nip']='-';
                }
                if ($kabid['status']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('H'.$i," - ")
                    ->setCellValue('I'.$i," - ")
                    ;
                }
                else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('H'.$i,$kabid['tingkat']." - ".$kabid['jurusan'])
                    ->setCellValue('I'.$i,$kabid['konsentrasi'])
                    ;
                }

                if ($fungsional['nm_jabatan']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('G'.$i,"-")
                    ;
            
                }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                ;
                
                }

                if ($Pangkat['pangkat']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i,"-")
                    ;
            
                }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                ;
                }
    
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$j)
                    ->setCellValue('C'.$i,$kabid['nm_jabatan'])
                    ->setCellValue('D'.$i,$kabid['nama'])
                    ->setCellValue('E'.$i,$kabid['nip'])
                    ->setCellValue('J'.$i,$kabid['keterangan'])
                    ->setCellValue('K'.$i,$kabid['jabatan_pelaksana'])
                    ;
                
                $j++;
                $i++;
             }
             if ($rowBidang['nama_bidang']=='Kepala Pusyantek'){
                foreach ($pegawaiPerbidang2 as $rowPegawai){
    
                    if ($rowPegawai['level_jabatan']!='4'){
                           $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                    }
    
                    $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($rowPegawai['nip']);
                    $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($rowPegawai['nip']);
                    if ($rowPegawai['status_pgw']=="BLU"){
                        $rowPegawai['nip']='-';
                    }
                    if ($rowPegawai['status']===NULL){
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('H'.$i," - ")
                        ->setCellValue('I'.$i," - ")
                        ;
                    }
                    else{
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('H'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan'])
                        ->setCellValue('I'.$i,$rowPegawai['konsentrasi'])
                        ;
                    }
    
                    if ($fungsional['nm_jabatan']===NULL){
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('G'.$i,"-")
                        ;
                
                    }else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                    ;
                    
                    }
    
                    if ($Pangkat['pangkat']===NULL){
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('F'.$i,"-")
                        ;
                
                    }else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                    ;
                    }
        
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i,$j)
                        ->setCellValue('C'.$i,$rowPegawai['nm_jabatan'])
                        ->setCellValue('D'.$i,$rowPegawai['nama'])
                        ->setCellValue('E'.$i,$rowPegawai['nip'])
                        ->setCellValue('J'.$i,$rowPegawai['keterangan'])
                        ->setCellValue('K'.$i,$rowPegawai['jabatan_pelaksana'])
                        ;
                    
                    $j++;
                    $i++;
                } 
            }
                foreach ($SubBidang as $rowSubBidang){
                    $pegawaiPerSubBidang = $this->kepegawaian->getPegawaiPerSubbidang($rowSubBidang['id_subbidang']);
                    $pegawaiPerSubBidang2 = [];
                    foreach($pegawaiPerSubBidang['pegawai'] as $rowPegawai){   
                        if (($rowPegawai['status']=='1' || $rowPegawai['status']===NULL)){
                            array_push($pegawaiPerSubBidang2,$rowPegawai);
                        }
                    }
        
                    // // $x+=$pegawaiPerbidang['count'];
    
                    foreach ($pegawaiPerSubBidang2 as $rowPegawai){
        
                        if ($rowPegawai['level_jabatan']!='4'){
                               $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                        }
        
                        $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($rowPegawai['nip']);
                        $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($rowPegawai['nip']);
                        if ($rowPegawai['status_pgw']=="BLU"){
                            $rowPegawai['nip']='-';
                        }
                        if ($rowPegawai['status']===NULL){
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('H'.$i," - ")
                            ->setCellValue('I'.$i," - ")
                            ;
                        }
                        else{
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('H'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan'])
                            ->setCellValue('I'.$i,$rowPegawai['konsentrasi'])
                            ;
                        }
        
                        if ($fungsional['nm_jabatan']===NULL){
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('G'.$i,"-")
                            ;
                    
                        }else{
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                        ;
                        
                        }
        
                        if ($Pangkat['pangkat']===NULL){
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('F'.$i,"-")
                            ;
                    
                        }else{
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                        ;
                        }
            
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i,$j)
                            ->setCellValue('C'.$i,$rowPegawai['nm_jabatan'])
                            ->setCellValue('D'.$i,$rowPegawai['nama'])
                            ->setCellValue('E'.$i,$rowPegawai['nip'])
                            ->setCellValue('J'.$i,$rowPegawai['keterangan'])
                            ->setCellValue('K'.$i,$rowPegawai['jabatan_pelaksana'])
                            ;
                        
                        $j++;
                        $i++;
                    } 
                }
            }
         

        }

    
        $spreadsheet->getActiveSheet()->getStyle('A3:K'.($i-1))->applyFromArray($styleArray);

        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report '.date('d-m-Y H'));

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pegawai '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function exportPegawaiPNS(){
        $agama = $this->kepegawaian->getAllAgama();
        $bidang = $this->kepegawaian->getAllBidang();
        $spreadsheet = new Spreadsheet();   

        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PEGAWAI PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',date('Y'))
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Bidang')
        ->setCellValue('C3', 'Jabatan')
        ->setCellValue('D3','Nama')
        ->setCellValue('E3','NIP')
        ->setCellValue('F3','Pangkat')
        ->setCellValue('G3','Fungsional')
        ->setCellValue('H3','Pendidikan')
        ->setCellValue('I3','Konsentrasi')
        ->setCellValue('J3','Keterangan')
        ->setCellValue('K3','Jabatan Pelaksana')
        // ->setCellValue('G1','Pensiun')
        ;
        
      
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(82);
        $spreadsheet->getActiveSheet()->getStyle("A3:K3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18.5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(38);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(28);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $spreadsheet->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:K1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:K2');
        
        $i=4;
        $j=1;
        $x=3;
        foreach ($bidang as $rowBidang){
            // $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidang($rowBidang['nama_bidang']);
            $SubBidang = $this->subbid->getSubBidangByBidang($rowBidang['id_bidang']);
            $kabid = $this->kepegawaian->getKabidPerBidang($rowBidang['id_bidang']);
            $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidangPNS($rowBidang['nama_bidang']);
            
            $pegawaiPerbidang2 = [];
                foreach($pegawaiPerbidang['pegawai'] as $rowPegawai){   
                    if (($rowPegawai['status']=='1' || $rowPegawai['status']===NULL)){
                        array_push($pegawaiPerbidang2,$rowPegawai);
                        $x++; 
                    }
                }

             
            if (!empty($pegawaiPerbidang2)){    
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i,$rowBidang['nama_bidang']);

                $spreadsheet->getActiveSheet(0)
                ->mergeCells('B'.$i.':B'.$x);

                if($rowBidang['id_bidang'] == "1"){
                        
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('E6B8B7');
                }elseif($rowBidang['id_bidang'] == "2"){
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('FFFF00'); 
                }elseif ($rowBidang['id_bidang'] == "3") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('D8E4BC');
                }elseif ($rowBidang['id_bidang'] == "4") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('B7DEE8');
                }elseif ($rowBidang['id_bidang'] == "5") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('CCC0DA');
                }elseif ($rowBidang['id_bidang'] == "6") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('C4BD97');
                }  

                if (!empty($kabid)){
                    if ($kabid['level_jabatan']!='4'){
                        $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                    }

                $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($kabid['nip']);
                $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($kabid['nip']);
                if ($kabid['status_pgw']=="BLU"){
                    $kabid['nip']='-';
                }
                if ($kabid['status']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('H'.$i," - ")
                    ->setCellValue('I'.$i," - ")
                    ;
                }
                else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('H'.$i,$kabid['tingkat']." - ".$kabid['jurusan'])
                    ->setCellValue('I'.$i,$kabid['konsentrasi'])
                    ;
                }

                if ($fungsional['nm_jabatan']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('G'.$i,"-")
                    ;
            
                }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                ;
                
                }

                if ($Pangkat['pangkat']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i,"-")
                    ;
            
                }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                ;
                }
    
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$j)
                    ->setCellValue('C'.$i,$kabid['nm_jabatan'])
                    ->setCellValue('D'.$i,$kabid['nama'])
                    ->setCellValue('E'.$i,$kabid['nip'])
                    ->setCellValue('J'.$i,$kabid['keterangan'])
                    ->setCellValue('K'.$i,$kabid['jabatan_pelaksana'])
                    ;
                
                $j++;
                $i++;
             }
             if ($rowBidang['nama_bidang']=='Kepala Pusyantek'){
                foreach ($pegawaiPerbidang2 as $rowPegawai){
    
                    if ($rowPegawai['level_jabatan']!='4'){
                           $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                    }
    
                    $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($rowPegawai['nip']);
                    $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($rowPegawai['nip']);
                    if ($rowPegawai['status_pgw']=="BLU"){
                        $rowPegawai['nip']='-';
                    }
                    if ($rowPegawai['status']===NULL){
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('H'.$i," - ")
                        ->setCellValue('I'.$i," - ")
                        ;
                    }
                    else{
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('H'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan'])
                        ->setCellValue('I'.$i,$rowPegawai['konsentrasi'])
                        ;
                    }
    
                    if ($fungsional['nm_jabatan']===NULL){
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('G'.$i,"-")
                        ;
                
                    }else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                    ;
                    
                    }
    
                    if ($Pangkat['pangkat']===NULL){
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('F'.$i,"-")
                        ;
                
                    }else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                    ;
                    }
        
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i,$j)
                        ->setCellValue('C'.$i,$rowPegawai['nm_jabatan'])
                        ->setCellValue('D'.$i,$rowPegawai['nama'])
                        ->setCellValue('E'.$i,$rowPegawai['nip'])
                        ->setCellValue('J'.$i,$rowPegawai['keterangan'])
                        ->setCellValue('K'.$i,$rowPegawai['jabatan_pelaksana'])
                        ;
                    
                    $j++;
                    $i++;
                } 
            }
                foreach ($SubBidang as $rowSubBidang){
                    $pegawaiPerSubBidang = $this->kepegawaian->getPegawaiPerSubbidangPNS($rowSubBidang['id_subbidang']);
                    $pegawaiPerSubBidang2 = [];
                    foreach($pegawaiPerSubBidang['pegawai'] as $rowPegawai){   
                        if (($rowPegawai['status']=='1' || $rowPegawai['status']===NULL)){
                            array_push($pegawaiPerSubBidang2,$rowPegawai);
                        }
                    }
        
                    // // $x+=$pegawaiPerbidang['count'];
    
                    foreach ($pegawaiPerSubBidang2 as $rowPegawai){
        
                        if ($rowPegawai['level_jabatan']!='4'){
                               $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                        }
        
                        $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($rowPegawai['nip']);
                        $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($rowPegawai['nip']);
                        if ($rowPegawai['status_pgw']=="BLU"){
                            $rowPegawai['nip']='-';
                        }
                        if ($rowPegawai['status']===NULL){
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('H'.$i," - ")
                            ->setCellValue('I'.$i," - ")
                            ;
                        }
                        else{
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('H'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan'])
                            ->setCellValue('I'.$i,$rowPegawai['konsentrasi'])
                            ;
                        }
        
                        if ($fungsional['nm_jabatan']===NULL){
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('G'.$i,"-")
                            ;
                    
                        }else{
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                        ;
                        
                        }
        
                        if ($Pangkat['pangkat']===NULL){
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('F'.$i,"-")
                            ;
                    
                        }else{
                        $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                        ;
                        }
            
                            $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i,$j)
                            ->setCellValue('C'.$i,$rowPegawai['nm_jabatan'])
                            ->setCellValue('D'.$i,$rowPegawai['nama'])
                            ->setCellValue('E'.$i,$rowPegawai['nip'])
                            ->setCellValue('J'.$i,$rowPegawai['keterangan'])
                            ->setCellValue('K'.$i,$rowPegawai['jabatan_pelaksana'])
                            ;
                        
                        $j++;
                        $i++;
                    } 
                }
            }
         

        }

    
        $spreadsheet->getActiveSheet()->getStyle('A3:K'.($i-1))->applyFromArray($styleArray);

        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report '.date('d-m-Y H'));

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pegawai '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function exportPegawaiPNSs(){
        
        $agama = $this->kepegawaian->getAllAgama();
        $bidang = $this->kepegawaian->getAllBidang();
        $spreadsheet = new Spreadsheet();   

        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PEGAWAI PNS PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',date('Y'))
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Bidang')
        ->setCellValue('C3', 'Jabatan')
        ->setCellValue('D3','Nama')
        ->setCellValue('E3','NIP')
        ->setCellValue('F3','Pangkat')
        ->setCellValue('G3','Fungsional')
        ->setCellValue('H3','Pendidikan')
        ->setCellValue('I3','Konsentrasi')
        ->setCellValue('J3','Keterangan')
        ->setCellValue('K3','Jabatan Pelaksana')
        // ->setCellValue('G1','Pensiun')
        ;
        
      
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(82);
        $spreadsheet->getActiveSheet()->getStyle("A3:K3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18.5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(38);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $spreadsheet->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:K1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:K2');
        
        $i=4;
        $j=1;
        $x=3;
        foreach ($bidang as $rowBidang){
            $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidangPNS($rowBidang['nama_bidang']);
            
        $pegawaiPerbidang2 = [];
            foreach($pegawaiPerbidang['pegawai'] as $rowPegawai){   
                if (($rowPegawai['status']=='1' || $rowPegawai['status']===NULL)){
                    array_push($pegawaiPerbidang2,$rowPegawai);
                    $x++; 
                }
            }

            // // $x+=$pegawaiPerbidang['count'];

            if (!empty($pegawaiPerbidang2)){
                    
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i,$rowBidang['nama_bidang']);

                $spreadsheet->getActiveSheet(0)
                ->mergeCells('B'.$i.':B'.$x);

                
            if($rowBidang['id_bidang'] == "1"){
                     
                $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('E6B8B7');
              }elseif($rowBidang['id_bidang'] == "2"){
                $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('FFFF00'); 
              }elseif ($rowBidang['id_bidang'] == "3") {
                $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('D8E4BC');
              }elseif ($rowBidang['id_bidang'] == "4") {
                $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('B7DEE8');
              }elseif ($rowBidang['id_bidang'] == "5") {
                $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('CCC0DA');
              }elseif ($rowBidang['id_bidang'] == "6") {
                $spreadsheet->getActiveSheet()->getStyle('B'.$i.':K'.$x)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('C4BD97');
              }
            }


            foreach ($pegawaiPerbidang2 as $rowPegawai){
                if ($rowPegawai['level_jabatan']!='4'){
                    $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
                }
                $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($rowPegawai['nip']);
                $Pangkat=$this->pangkat->getPangkatTerakhirPegawai($rowPegawai['nip']);
                if ($rowPegawai['status_pgw']=="BLU"){
                    $rowPegawai['nip']='-';
                }
                if ($rowPegawai['status']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('H'.$i," - ")
                    ->setCellValue('I'.$i," - ")
                    ;
                }
                else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('H'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan'])
                    ->setCellValue('I'.$i,$rowPegawai['konsentrasi'])
                    ;
                }

                if ($fungsional['nm_jabatan']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('G'.$i,"-")
                    ;
            
                }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('G'.$i,$fungsional['nm_jabatan'])
                ;
                }

                if ($Pangkat['pangkat']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i,"-")
                    ;
            
                }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('F'.$i,$Pangkat['pangkat'].' - '.$Pangkat['id_golongan'])
                ;
                }
    
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$j)
                    ->setCellValue('C'.$i,$rowPegawai['nm_jabatan'])
                    ->setCellValue('D'.$i,$rowPegawai['nama'])
                    ->setCellValue('E'.$i,$rowPegawai['nip'])
                    ->setCellValue('J'.$i,$rowPegawai['keterangan'])
                    ->setCellValue('K'.$i,$rowPegawai['jabatan_pelaksana'])
                    ;
                
                $j++;
                $i++;
            } 
        }

    
        $spreadsheet->getActiveSheet()->getStyle('A3:K'.($i-1))->applyFromArray($styleArray);

        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report '.date('d-m-Y H'));

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pegawai PNS'.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function exportPegawaiNonPNS(){
        
        $pegawai = $this->kepegawaian->getAllPegawai();
        $agama = $this->kepegawaian->getAllAgama();
        $bidang = $this->kepegawaian->getAllBidang();
        $spreadsheet = new Spreadsheet();   

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PEGAWAI NON PNS PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',date('Y'))
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Bidang')
        ->setCellValue('C3', 'Jabatan')
        ->setCellValue('D3','Nama')
        ->setCellValue('E3','NIP')
        ->setCellValue('F3','Pendidikan')
        ->setCellValue('G3','Konsentrasi')
        ->setCellValue('H3','Jabatan pelaksana')
        // ->setCellValue('G1','Pensiun')
        ;


      
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(82);
        $spreadsheet->getActiveSheet()->getStyle("A3:H3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18.5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(38);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(21);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:H1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:H2');
        
        $i=4;
        $j=1;
        $x=3;
        foreach ($bidang as $rowBidang){
            $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidangNonPns($rowBidang['nama_bidang']);
            
        $pegawaiPerbidang2 = [];
            foreach($pegawaiPerbidang['pegawai'] as $rowPegawai){   
                if (($rowPegawai['status']=='1' || $rowPegawai['status']===NULL)){
                    array_push($pegawaiPerbidang2,$rowPegawai);
                    $x++; 
                }
            }

            // // $x+=$pegawaiPerbidang['count'];

            if (!empty($pegawaiPerbidang2)){
                    
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i,$rowBidang['nama_bidang']);

                $spreadsheet->getActiveSheet(0)
                ->mergeCells('B'.$i.':B'.$x);

                if($rowBidang['id_bidang'] == "5"){
                     
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':H'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('E6B8B7');
                  }elseif($rowBidang['id_bidang'] == "9"){
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':H'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('FFFF00'); 
                  }elseif ($rowBidang['id_bidang'] == "3") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':H'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('D8E4BC');
                  }elseif ($rowBidang['id_bidang'] == "8") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':H'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('B7DEE8');
                  }elseif ($rowBidang['id_bidang'] == "6") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':H'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('CCC0DA');
                  }elseif ($rowBidang['id_bidang'] == "7") {
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i.':H'.$x)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('C4BD97');
                  }
            }


            foreach ($pegawaiPerbidang2 as $rowPegawai){

                if ($rowPegawai['level_jabatan']!='4'){
                    $spreadsheet->getActiveSheet()->getStyle("C".$i)->getFont()->setBold( true );
               }
                if ($rowPegawai['status']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i," - ")
                    ->setCellValue('G'.$i," - ")
                    ;
                }
                else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('F'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan'])
                    ->setCellValue('G'.$i,$rowPegawai['konsentrasi'])
                    ;
                }
    
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$j)
                    ->setCellValue('C'.$i,$rowPegawai['nm_jabatan'])
                    ->setCellValue('D'.$i,$rowPegawai['nama'])
                    ->setCellValue('E'.$i,$rowPegawai['nip'])
                    ->setCellValue('H'.$i,$rowPegawai['jabatan_pelaksana'])
                    ;
                
                $j++;
                $i++;
            }

        }

    

        $spreadsheet->getActiveSheet()->getStyle('A3:H'.($i-1))->applyFromArray($styleArray);
        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report '.date('d-m-Y H'));

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Non PNS '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function exportPegawaiPensiun(){
        $pegawai = $this->kepegawaian->getAllPegawaii();

        $spreadsheet = new Spreadsheet();   

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PEGAWAI PENSIUN PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',date('Y').' - 2 tahun ke depan')
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Nama')
        ->setCellValue('C3', 'NIP')
        ->setCellValue('D3','Jabatan')
        ->setCellValue('E3','Fungsional')
        ->setCellValue('F3','Pensiun')
        ->setCellValue('G3','Massa Waktu')
        // ->setCellValue('G1','Pensiun')
        ;
        
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(82);
        $spreadsheet->getActiveSheet()->getStyle("A3:G3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(24);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(37);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(11);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(23);
        $spreadsheet->getActiveSheet()->getStyle('A3:G3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:G3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:G1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:G2');

        $i=4;
        $j=1;
        $x=3;
        

        foreach ($pegawai as $rowPegawai){
          $date = new DateTime($rowPegawai['tanggal_lahir']);
          $date->add(new DateInterval('P'.$rowPegawai['pensiun'].'Y'));
          $rowPegawai['pensiun'] =$date->format('Y-m-d');
          $date1=date_create($rowPegawai['pensiun']);
          $date2=date_create(date("Y-m-d"));
          $diff=date_diff($date1,$date2);
          $rowPegawai['pensiun']=$date1->format('Y-m-d');
  
          if (($diff->format("%y")=="0" || $diff->format("%y")=="1" || $diff->format("%y")=="2" ) && $diff->format("%R")=="-"){
              $rowPegawai['count']=$diff->format("%y tahun %m bulan %d hari");
              $fungsional=$this->kepegawaian->getFungsionalTerakhirPegawai($rowPegawai['nip']);

              $spreadsheet->setActiveSheetIndex(0)
              ->setCellValue('A'.$i,$j)
              ->setCellValue('B'.$i,$rowPegawai['nama'])
              ->setCellValue('C'.$i,$rowPegawai['nip'])
              ->setCellValue('D'.$i,$rowPegawai['nm_jabatan'])
              ->setCellValue('F'.$i,$rowPegawai['pensiun'])
              ->setCellValue('G'.$i,$rowPegawai['count'])
              ;

              if ($fungsional!="0"){
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('E'.$i,$fungsional['nm_jabatan'])
                ;
            
              }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('E'.$i,"-")
                ;
              }
              
            $i++;
            $j++;
          }
          
        }
        
        $spreadsheet->getActiveSheet()->getStyle('A3:G'.($i-1))->applyFromArray($styleArray);
        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Pensiun'.date('d-m-Y H'));

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pensiun '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
        
    }

    public function exportPegawaiFungsional(){
        $pegawai = $this->kepegawaian->getAllPegawai();
        $Fungsional = $this->kepegawaian->getAllFungsional();
        $spreadsheet = new Spreadsheet();   
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PEGAWAI FUNGSIONAL PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',date('Y'))
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Fungsional')
        ->setCellValue('C3', 'Nama')
        ->setCellValue('D3', 'NIP')
        ->setCellValue('E3','Pendidikan')
        // ->setCellValue('G1','Pensiun')
        ;
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(82);
        $spreadsheet->getActiveSheet()->getStyle("A3:E3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('A3:E3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:E3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:E1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:E2');


        $i=4;
        $j=1;
        $x=3;
        foreach ($Fungsional as $rowFungsional){
            $pegawaiPerfungsional = $this->kepegawaian->getPegawaiPerfungsional($rowFungsional['id']);
            
        $pegawaiPerfungsional2 = [];
            foreach($pegawaiPerfungsional['pegawai'] as $rowPegawai){   
                if ($rowPegawai['status']=='1' || $rowPegawai['status']===NULL){
                    array_push($pegawaiPerfungsional2,$rowPegawai);
                    $x++; 
                }
            }

            // // $x+=$pegawaiPerbidang['count'];

            if (!empty($pegawaiPerfungsional2)){
                
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$i,$rowFungsional['nm_jabatan'].' - '.$rowFungsional['id_jabatan']);
                
                $spreadsheet->getActiveSheet(0) 
                ->mergeCells('B'.$i.':B'.$x);
            }


            foreach ($pegawaiPerfungsional2 as $rowPegawai){

                if ($rowPegawai['status']===NULL){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('E'.$i," - ");
                }
                else{
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('E'.$i,$rowPegawai['tingkat']." - ".$rowPegawai['jurusan']);
                }

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$j)
                    ->setCellValue('C'.$i,$rowPegawai['nama'])
                    ->setCellValue('D'.$i,$rowPegawai['nip'])
                    ;
                
                $j++;
                $i++;
            }

        }

        $spreadsheet->getActiveSheet()->getStyle('A3:E'.($i-1))->applyFromArray($styleArray);
        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Fungsional');

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Fungsional '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function exportPegawaiPelatihan($tahun){
            
        $data = $this->kepegawaian->getPelatihanTahunIni($tahun);
        $spreadsheet = new Spreadsheet();   
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                
            ]
          ];
        //set document properties
        $spreadsheet->getProperties()->setCreator('Staff Bidang Tata Usaha')
        ->setLastModifiedBy('Staff Bidang Tata Usaha')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        //masukin data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1','DAFTAR PELATIHAN PEGAWAI PUSAT PELAYANAN TEKNOLOGI  - BPPT')
        ->setCellValue('A2',$tahun)
        ->setCellValue('A3','No')
        ->setCellValue('B3', 'Nama')
        ->setCellValue('C3', 'Bidang')
        ->setCellValue('D3', 'Pelatihan')
        ->setCellValue('E3', 'Mulai')
        ->setCellValue('F3','Selesai')
        ->setCellValue('G3','Tempat')
        // ->setCellValue('G1','Pensiun')
        ;
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(95);
        $spreadsheet->getActiveSheet()->getStyle("A3:G3")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold( true );
        $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(3);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(34);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(28);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $spreadsheet->getActiveSheet()->getStyle('A3:G3')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A3:G3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A1:G1');
        $spreadsheet->getActiveSheet(0)
        ->mergeCells('A2:G2');


        $i=4;
        $j=1;
        foreach ($data as $row){
        
                $Struktural=$this->struktural->getStrukturalTerakhirPegawai($row['nip']);
    
    
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,$j)
                    ->setCellValue('B'.$i,$row['nama'])
                    ->setCellValue('C'.$i,$row['nama_bidang'])
                    ->setCellValue('D'.$i,$row['nama_diklat'])
                    ->setCellValue('E'.$i,$row['mulai_diklat'])
                    ->setCellValue('F'.$i,$row['selesai_diklat'])
                    ->setCellValue('G'.$i,$row['tempat_diklat'])
                    ;
                
                $j++;
                $i++;

        }

        $spreadsheet->getActiveSheet()->getStyle('A3:G'.($i-1))->applyFromArray($styleArray);
        //Namain worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Pelatihan');

        //set worksheet pertama yang aktif
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pelatihan '.$tahun.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function test(){
        
        $x=0;
        $i=1;
        $pegawaiPerbidang2=[];
        $bidang = $this->kepegawaian->getAllFungsional();
        
        foreach ($bidang as $rowBidang){
            $data = $this->kepegawaian->getPegawaiPerfungsional($rowBidang['id']);
            foreach($data['pegawai'] as $rowPegawai){   
                if ($rowPegawai['status']=='1' || $rowPegawai['status']===NULL){
                    array_push($pegawaiPerbidang2,$rowPegawai);
                    $x++;
                } 
            }     
        }
        
        $pegawaiPerbidang2['x']=$x;
        echo json_encode($pegawaiPerbidang2);
    }
    public function test4(){
        $pegawaiPerbidang = $this->kepegawaian->getPegawaiPerbidang('Tata Usaha');
      echo json_encode($pegawaiPerbidang);
    }
}