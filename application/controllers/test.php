<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    header('Cache-Control: no cache'); //no cache
  }

 
  public function pdfbnsp($nama, $a, $b, $c, $d, $e, $f, $g, $h)
  {

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->set_option('isRemoteEnabled', TRUE);
    $this->pdf->filename =  "test .pdf";

    $masuk['a'] = $a;
    $masuk['b'] = $b;
    $masuk['c'] = $c;
    $masuk['d'] = $d;
    $masuk['e'] = $e;
    $masuk['f'] = $f;
    $masuk['g'] = $g;
    $masuk['h'] = $h;
    $masuk['nama'] = $nama;
    $this->pdf->load_view('pdfbnsp', $masuk);
  }

  public function bnsptest()
  {

    $tanggal = date("Y-m-d");
    $hari = array(
      1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );

    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $split     = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];

    $num = date('N', strtotime($tanggal));
    $data['date'] = $hari[$num] . ', ' . $tgl_indo;

    $this->load->view('bnsp', $data);
  }
  public function sorting()
  {

    $data = [];
    $data[0] = $this->input->post('uts_teori');
    $data[1] = $this->input->post('uas_teori');
    $data[2] = $this->input->post('quiz');
    $data[3] = $this->input->post('uts_praktikum');
    $data[4] = $this->input->post('uas_praktikum');
    $data[5] = $this->input->post('tugas_word');
    $data[6] = $this->input->post('tugas_ppt');
    $data[7] = $this->input->post('mulok');

    $blom[0] = $this->input->post('uts_teori');
    $blom[1] = $this->input->post('uas_teori');
    $blom[2] = $this->input->post('quiz');
    $blom[3] = $this->input->post('uts_praktikum');
    $blom[4] = $this->input->post('uas_praktikum');
    $blom[5] = $this->input->post('tugas_word');
    $blom[6] = $this->input->post('tugas_ppt');
    $blom[7] = $this->input->post('mulok');

    $jumlah = count($data);

    for ($i = 0; $i < $jumlah; $i++) {
      for ($j = $i + 1; $j < $jumlah; $j++) {
        if ($data[$i] > $data[$j]) {
          $t = $data[$i];
          $data[$i] = $data[$j];
          $data[$j] = $t;
        }
      }
    }


    $masuk['nilai'] = $data;
    $masuk['blom'] = $blom;
    $masuk['jumlah'] = $jumlah;
    $masuk['nama'] = $this->input->post('nama');
    $this->load->view('bnsp2', $masuk);
  }

  public function grafik($a, $b, $c, $d, $e, $f, $g, $h)
  {
    $y = array(
      [
        "label" => "UTS Teori",
        "value" => $a
      ],
      [
        "label" => "UAS Teori",
        "value" => $b
      ],
      [
        "label" => "Quiz",
        "value" => $c
      ],
      [
        "label" => "UTS Praktikum",
        "value" => $d
      ],
      [
        "label" => "UAS Praktikum",
        "value" => $e
      ],
      [
        "label" => "Tugas Word",
        "value" => $f
      ],
      [
        "label" => "Tugas PPT",
        "value" => $g
      ],
      [
        "label" => "Tugas Mulok",
        "value" => $h
      ],
    );


    $z = array(
      "caption" => "Nilai Aplikom",
      "theme" => "fint"
    );

    $gab = array("chart" => $z, "data" => $y);
    $j = json_encode($gab);
    echo $j;
  }


}
