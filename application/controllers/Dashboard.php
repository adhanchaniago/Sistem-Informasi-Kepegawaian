<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->model('Kepegawaian_model', 'kepegawaian');
    $this->load->model('Pangkat_model', 'pangkat');
    $this->load->model('Pendidikan_model', 'pendidikan');
    $this->load->model('Fungsional_model', 'fungsional');
    $this->load->model('Kapasitas_model', 'kapasitas');
    if ($this->session->userdata('level') != 'admin') {
      redirect('Login');
    }
    header('Cache-Control: no cache'); //no cache
  }

  private function addUnits($bytes)
  {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
      $bytes /= 1024;
    }

    return round($bytes, 1) . ' ' . $units[$i];
  }

  public function folderSize($dir)
  {
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
      $size += is_file($each) ? filesize($each) : $this->folderSize($each);
    }
    return $size;
  }


  private function get_dir_size()
  {
    $directory = './';
    $size = 0;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file) {
      $size += $file->getSize();
    }
    return $size;
  }

  public function infoDisk()
  {

    try {
      $data['used'] =  $this->addUnits($this->folderSize('/xampp/htdocs/Humoris'));
    } catch (Exception $e) {
      echo 'Error (' . $e->getMessage() . ')';
      exit();
    }

    $digunakan = explode(" ", $data['used']);
    $used = (float) $this->get_dir_size();
    $size = $this->kapasitas->getKapasitas();
    $total = (float) $size['kapasitas'];
    if ($digunakan[1] == 'MB') {
      $hasilDigunakan = (float) $digunakan[0];
      $hasilDigunakan = $hasilDigunakan / 1000;
    } else {
      $hasilDigunakan = $digunakan[0];
    }
    $free = $total - $hasilDigunakan;
    $data = [
      'free' => $free,
      'used' => $hasilDigunakan,
      'total' => $total,
      'tipe' => $digunakan[1]
    ];

    return $data;
  }

  // public function getDiskStat(){

  //   $hasil = $this->hasil;
  //   $data = [
  //     [
  //         "label"=>'Free space',
  //         "count" => $hasil['free']
  //     ],
  //     [
  //         "label"=>'Used space',
  //         "count" => $hasil['used']
  //     ] 
  //   ]; 
  //   echo json_encode($data);
  // }

  public function index()
  {
    $hasill = $this->infoDisk();
    $data['used'] = $hasill['used'];
    $data['free'] = $hasill['free'];
    $data['total'] = $hasill['total'];
    $data['tipe'] = $hasill['tipe'];
    $tahun = date("Y");
    $data['tahun'] = date("Y");
    $data['tahun1'] = date('Y', strtotime('-1 years'));
    $data['tahun2'] = date('Y', strtotime('-2 years'));
    $data['tanggal'] = date("m");
    $data['tanggal1'] = date('m', strtotime('+1 months'));

    $data['username'] = $this->session->userdata('username');
    $data['level'] = $this->session->userdata('level');
    $data['countPegawai'] = (int) $this->kepegawaian->getCountPegawai();
    $data['countPns'] = (int) $this->kepegawaian->getCountPns();
    $data['countBlu'] = $this->kepegawaian->getCountBlu();
    $data['countNonAktif'] = $this->kepegawaian->getCountNonAktif();
    $data['pensiun'] = $this->kepegawaian->getAllPegawaii();
    $data['pelatihan'] = $this->kepegawaian->getPelatihanTahunIni($tahun);
    if ($data['level'] == "admin") {

      $this->load->view('templates/header.php');
      $this->load->view('templates/headerbar.php', $data);
      $this->load->view('templates/sidebar.php');
      $this->load->view('home/index', $data);
    } else {
      redirect('Login');
    }
  }

  public function getPensiunJson()
  {
    $periode = $this->input->post('periode');
    // $periode=0;
    $pegawai = $this->kepegawaian->getAllPegawaii();
    $data = [];
    foreach ($pegawai as $rowPegawai) {
      $date = new DateTime($rowPegawai['tanggal_lahir']);
      $date->add(new DateInterval('P' . $rowPegawai['pensiun'] . 'Y'));
      $rowPegawai['pensiun'] = $date->format('Y-m-d');
      $date1 = date_create($rowPegawai['pensiun']);
      $date2 = date_create(date("Y-m-d"));
      $diff = date_diff($date1, $date2);
      $rowPegawai['pensiun'] = $date1->format('Y-m-d');

      if ($diff->format("%y") == $periode && $diff->format("%R") == "-") {
        $rowPegawai['count'] = $diff->format("%y thn %m bln %d hari");
        array_push($data, $rowPegawai);
      }
      // else if($diff->format("%y")==$periode && $diff->format("%R")=="+"){
      //     $this->kepegawaian->setKetPensiun($rowPegawai['nip']);
      // }
    }

    echo json_encode($data);
  }

  // public function test(){            
  //   $date1=date_create("2017-09-01");
  //   $date2=date_create(date("Y-m-d"));
  //   $diff=date_diff($date1,$date2);
  //  echo $diff->format("%y-%m-%d"); 
  // }

  public function logout()
  {
    session_destroy();
    redirect('Login');
  }

  public function getPangkatCountJson()
  {
    $data = $this->pangkat->getPangkatPegawaiCount();
    echo json_encode($data);
  }

  public function getPendidikanCountJson()
  {
    $data = $this->pendidikan->getPendidikanPegawaiCount();
    echo json_encode($data);
  }

  public function getFungsionalCountJson()
  {
    $data = $this->fungsional->getFungsionalPegawaiCount();
    // foreach ($data as $row ) {
    //   $fungsional = $this->fungsional->get
    // }
    echo json_encode($data);
  }

  public function getUserJson()
  {
    $data = $this->user->getUserCount();
    echo json_encode($data);
  }

  public function getPendidikanPegawaiJson()
  {
    $tingkat = $this->input->post('label');
    $data = $this->pendidikan->getPendidikanTerakhirAllPegawai($tingkat);
    echo json_encode($data);
  }

  public function getPangkatPegawaiJson()
  {
    $id_jabatan = $this->input->post('label');
    $data = $this->pangkat->getPangkatTerakhirAllPegawai($id_jabatan);
    echo json_encode($data);
  }

  public function getPelatihanTahun()
  {
    $tahun = $this->input->post('tahun');
    $data = $this->kepegawaian->getPelatihanTahunIni($tahun);
    echo json_encode($data);
  }

  public function getUltahPegawai()
  {
    $tanggal = $this->input->post('tanggal');
    $data = $this->kepegawaian->getUltahPegawai($tanggal);
    echo json_encode($data);
  }
/*
  public function updateKapasitasServer()
  {
    $size = $this->input->post('kapasitas');
    if ($this->kapasitas->updateKapasitas($size) > 0) {
      $this->session->set_flashdata('flash', 'Kapasitas berhasil diupdate');
      redirect('Dashboard');
    }
  }
*/
  public function testt()
  {

    $this->load->view('templates/header.php');
    $this->load->view('templates/headerbar.php');
    $this->load->view('templates/sidebar.php');
    $this->load->view('home/testList');
  }

  public function tokped()
  {
    $arr = ["2 3", "3 7", "4 1"];
    $kiri = [];
    $kanan = [];
    $nampung = [[]];
    // $dimensi = [
    //   [0,0,0,0,0,0,0],
    //   [0,0,0,0,0,0,0],
    //   [0,0,0,0,0,0,0],
    //   [0,0,0,0,0,0,0]
    // ];
    $dimensi = [[]];

    for ($i = 0; $i < count($arr); $i++) {
      $nampung[$i] = explode(" ", $arr[$i]);
      $kiri[$i] = (int) $nampung[$i][0];
      $kanan[$i] = (int) $nampung[$i][1];
    }
    $maxkiri = max($kiri);
    $maxkanan = max($kanan);
    $gabung = [$maxkiri, $maxkanan];

    for ($i = 0; $i < $maxkiri; $i++) {
      for ($j = 0; $j < $maxkanan; $j++) {
        $dimensi[$i][$j] = 0;
      }
    }

    for ($x = 0; $x < count($arr); $x++) {
      for ($i = 0; $i < $kiri[$x]; $i++) {
        for ($j = 0; $j < $kanan[$x]; $j++) {
          $dimensi[$i][$j]++;
        }
      }
    }

    $y = 0;
    $inc = 0;
    for ($i = 0; $i < count($dimensi); $i++) {
      for ($j = 0; $j < count($dimensi[$i]); $j++) {
        if ($dimensi[$i][$j] > $y) {
          $y = $dimensi[$i][$j];
        }
      }
    }

    for ($i = 0; $i < count($dimensi); $i++) {
      for ($j = 0; $j < count($dimensi[$i]); $j++) {
        if ($dimensi[$i][$j] == $y) {
          $inc++;
        }
      }
    }

    echo $inc;
  }

  public function hackerrank()
  {
    $queries = [
      [1, 2, 100],
      [2, 5, 100],
      [3, 4, 100]
    ];

    $n = 5;

    $length = count($queries);
    $nampung = [];
    $max = 0;

    for ($i = 0; $i < $n; $i++) {
      $nampung[$i] = 0;
    }

    for ($h = 0; $h < $length; $h++) {
      for ($i = $queries[$h][0] - 1; $i < $queries[$h][1]; $i++) {
        $nampung[$i] += $queries[$h][2];
        // echo $nampung[$i]; echo "<br>";
      }
    }

    for ($i = 0; $i < $n; $i++) {
      if ($nampung[$i] > $max) {
        $max = $nampung[$i];
      }
    }
    echo json_encode($nampung);
  }
}
