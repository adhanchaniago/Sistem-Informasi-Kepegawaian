<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->model('Kepegawaian_model', 'kepegawaian');
    $this->load->model('Pangkat_model', 'pangkat');
    $this->load->model('Struktural_model', 'struktural');
    $this->load->model('Seminar_model', 'seminar');
    $this->load->model('Sk_lain_model', 'sk');
    $this->load->model('Pendidikan_model', 'pendidikan');
    $this->load->model('Diklat_model', 'diklat');
    $this->load->model('bahasa_model', 'bahasa');
    $this->load->model('Penghargaan_model', 'penghargaan');
    $this->load->model('Pengalaman_model', 'pengalaman');
    $this->load->model('Keluarga_model', 'keluarga');
    $this->load->model('Kartu_model', 'kartu');
    $this->load->model('Subbid_model', 'subbid');
    if (empty($this->session->userdata('nip'))) {
      redirect('Login');
    }
    header('Cache-Control: no cache'); //no cache
  }

  public function index($nip, $tablink = null, $tablink2 = null)
  {

    if ($tablink == 'golongan') {
      $data['tablink'] = 'defaultOpens';
    } else if ($tablink == 'fungsional') {
      $data['tablink'] = 'tabLinkfungsional';
    } else if ($tablink == 'struktural') {
      $data['tablink'] = 'tabLinkstruktural';
    } else if ($tablink == 'pendidikan') {
      $data['tablink'] = 'tabLinkpendidikan';
    } else if ($tablink == 'pelatihan') {
      $data['tablink'] = 'tabLinkpelatihan';
    } else if ($tablink == 'seminar') {
      $data['tablink'] = 'tabLinkseminar';
    } else if ($tablink == 'penghargaan') {
      $data['tablink'] = 'tabLinkpenghargaan';
    } else if ($tablink == 'pengalaman') {
      $data['tablink'] = 'tabLinkpengalaman';
    } else if ($tablink == 'kartu') {
      $data['tablink'] = 'tabLinkkartu';
    } else if ($tablink == 'sk') {
      $data['tablink'] = 'tabLinksk';
    } else {
      $data['tablink'] = 'defaultOpens';
    }

    if ($tablink2 == 'keluarga') {
      $data['tablink2'] = 'tabLinkkeluarga';
    } else if ($tablink2 == 'bahasa') {
      $data['tablink2'] = 'tabLinkbahasa';
    } else {
      $data['tablink2'] = 'defaultOpen';
    }

    $data['profil'] = $this->kepegawaian->getPegawaiById($nip);
    $data['profil']['golongan'] = $this->pangkat->getPangkatTerakhirPegawai($nip);
    $data['profilGolongan'] = $this->kepegawaian->getPegawaiGolonganById($nip);
    $data['profilFungsional'] = $this->kepegawaian->getPegawaiFungsionalById($nip);
    $data['profilStruktural'] = $this->kepegawaian->getPegawaiStrukturalById($nip);
    $data['profilStrukturalTerakhir'] = $this->struktural->getStrukturalTerakhirPegawai($nip);
    $data['profilPendidikan'] = $this->pendidikan->getPendidikanPegawai($nip);
    $data['profilPenghargaan'] = $this->penghargaan->getPenghargaanPegawai($nip);
    $data['profilDiklat'] = $this->diklat->getDiklatPegawaiById($nip);
    $data['profilSeminar'] = $this->seminar->getSeminarPegawai($nip);
    $data['profilBahasa'] = $this->bahasa->getBahasaPegawai($nip);
    $data['profilKeluarga'] = $this->keluarga->getKeluargaPegawai($nip);
    $data['profilKartu'] = $this->kartu->getKartuPegawai($nip);
    $data['profilSk'] = $this->sk->getSkPegawai($nip);
    $data['profilPengalaman'] = $this->pengalaman->getPengalamanPegawai($nip);
    $data['profilSubbid'] = $this->subbid->getStaffSubBidPegawai($nip);
    $data['subbid'] = $this->subbid->getSubBidangByBidang($data['profil']['id_bidang']);
    if ($this->session->userdata('level') == "admin") {

      $this->load->view('templates/header');
      $this->load->view('templates/headerbar');
      $this->load->view('templates/sidebar');
      $this->load->view('profile/profile_v', $data);
    } else if ($this->session->userdata('level') == 'pegawai' && $this->session->userdata('nip') == $nip) {
      $this->load->view('templates/header');
      $this->load->view('templates/headerbar');
      $this->load->view('templates/sidebar');
      $this->load->view('profile/profile_v', $data);
    } else {
      $this->session->set_flashdata('flashgagal', 'akses ditolak');
      redirect('profile/index/' . $this->session->userdata('nip'));
    }
  }

  public function addStaffSubbid()
  {
    $nip = $this->input->post('nip');
    $id = $this->input->post('id_subbidang');
    $data = [
      'nip' => $nip,
      'id_subbidang' => $id
    ];
    if ($this->subbid->insertStaffSubBidPegawai($data) > 0) {
      $this->session->set_flashdata('flash', ' Subbidang berhasil dimasukan');
      redirect('Profile/index/' . $nip);
    } else {
      $this->session->set_flashdata('flashgagal', ' Subbidang gagal dimasukan');
      redirect('Profile/index/' . $nip);
    }
  }
  public function editStaffSubbid()
  {
    $nip = $this->input->post('nip');
    $idsubbid = $this->input->post('id_staffsubbid');
    $id = $this->input->post('id_subbidang');
    $data = [
      'id_subbidang' => $id
    ];
    if ($this->subbid->updateStaffSubBidPegawai($data, $idsubbid) > 0) {
      $this->session->set_flashdata('flash', ' Subbidang berhasil diupdate');
      redirect('Profile/index/' . $nip);
    } else {
      $this->session->set_flashdata('flashgagal', ' Subbidang gagal diupdate');
      redirect('Profile/index/' . $nip);
    }
  }
  public function laporan_pdf($nip)
  {

    // $data = array(
    //     "dataku" => array(
    //         "nama" => "",
    //         "url" => ""
    //     )
    // );

    $data['profil'] = $this->kepegawaian->getPegawaiById($nip);
    //var_dump($data['profil']);
    //exit;
    $data['profil']['golongan'] = $this->pangkat->getPangkatTerakhirPegawai($nip);
    $data['profilStrukturalTerakhir'] = $this->struktural->getStrukturalTerakhirPegawai($nip);
    $data['profilPendidikan'] = $this->pendidikan->getPendidikanPegawai($nip);
    $data['profilDiklat'] = $this->diklat->getDiklatPegawaiById($nip);
    $data['profilSeminar'] = $this->seminar->getSeminarPegawai($nip);
    $data['profilBahasa'] = $this->bahasa->getBahasaPegawai($nip);
    $data['profilPengalaman'] = $this->pengalaman->getPengalamanPegawai($nip);

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->set_option('isRemoteEnabled', TRUE);
    $this->pdf->filename = $data['profil']['nama'] . " CV .pdf";
    $this->pdf->load_view('laporan_pdf', $data);
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

  public function testkabid()
  {
    $test = $this->kepegawaian->getKabidPerBidang('6');
    echo json_encode($test);
  }
  public function testsubbid()
  {
    $test = $this->kepegawaian->getPegawaiPerSubbidang('12');
    echo json_encode($test);
  }

  public function testpos()
  {
    echo "asdasd";
    echo strpos("Institut Pertanian Bogor", "TANI");
  }
}
