<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataPegawai extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kepegawaian_model', 'kepegawaian');
    $this->load->model('User_model', 'user');
    if (!$this->session->userdata('nip')) {
      redirect('Login');
    }
    header('Cache-Control: no cache'); //no cache
  }

  public function test()
  {
    $pegawai = $this->kepegawaian->getAllPegawai();
    echo json_encode($pegawai);
  }

  public function index($tablink = null)
  {
    if ($tablink == 'pns') {
      $footer['tablink'] = 'tabLinkPns';
    } else if ($tablink == 'nonpns') {
      $footer['tablink'] = 'tabLinkNonPns';
    } else {
      $footer['tablink'] = 'defaultOpen';
    }

    $data['data'] = [];
    $data['dataa'] = [];
    $data['pns'] = [];
    $data['pnss'] = [];
    $data['nonpns'] = [];
    $data['nonpnss'] = [];
    $data['cpns'] = [];
    $data['cpnss'] = [];
    $data['cdtn'] = [];
    $data['cdtns'] = [];
    $data['tgsbljr'] = [];
    $data['tgsbljrs'] = [];
    $data['pensiun'] = [];
    $data['pensiuns'] = [];
    $data['dipekerjakan'] = [];
    $data['ditugaskans'] = [];
    $data['berhenti'] = [];
    $data['berhentis'] = [];
    $data['semua'] = [];
    $data['semuas'] = [];

    $pegawai = $this->kepegawaian->getAllPegawai();

    foreach ($pegawai as $row) {
      if ($row['status'] == '1') {
        array_push($data['data'], $row);
      } else
            if ($row['status'] === NULL) {
        array_push($data['dataa'], $row);
      }
    }

    foreach ($data['dataa'] as $row) {

      if ($row['keterangan'] == "PNS") {
        array_push($data['pnss'], $row);
      } else if ($row['keterangan'] == "NON PNS") {
        array_push($data['nonpnss'], $row);
      } else if ($row['keterangan'] == "CPNS") {
        array_push($data['cpnss'], $row);
      } else if ($row['keterangan'] == "CDTN") {
        array_push($data['cdtns'], $row);
      } else if ($row['keterangan'] == "Tugas Belajar") {
        array_push($data['tgsbljrs'], $row);
      } else if ($row['keterangan'] == "Pensiun") {
        array_push($data['pensiuns'], $row);
      } else if ($row['keterangan'] == "Ditugaskan") {
        array_push($data['ditugaskans'], $row);
      } else if ($row['keterangan'] == "Berhenti") {
        array_push($data['berhentis'], $row);
      }
    }

    foreach ($data['data'] as $row) {

      if ($row['keterangan'] == "PNS") {
        array_push($data['pns'], $row);
        array_push($data['semua'], $row);
      } else if ($row['keterangan'] == "NON PNS") {
        array_push($data['nonpns'], $row);
        array_push($data['semua'], $row);
      } else if ($row['keterangan'] == "CPNS") {
        array_push($data['cpns'], $row);
        array_push($data['semua'], $row);
      } else if ($row['keterangan'] == "CDTN") {
        array_push($data['cdtn'], $row);
        array_push($data['semua'], $row);
      } else if ($row['keterangan'] == "Tugas Belajar") {
        array_push($data['tgsbljr'], $row);
        array_push($data['semua'], $row);
      } else if ($row['keterangan'] == "Pensiun") {
        array_push($data['pensiun'], $row);
      } else if ($row['keterangan'] == "Dipekerjakan") {
        array_push($data['dipekerjakan'], $row);
      } else if ($row['keterangan'] == "Berhenti") {
        array_push($data['berhenti'], $row);
      }
    }


    if ($this->session->userdata('level') == "admin") {

      $this->load->view('templates/header.php');
      $this->load->view('templates/headerbar.php');
      $this->load->view('templates/sidebar.php');
      $this->load->view('datapegawai/listPegawai_v', $data);
      $this->load->view('templates/footer.php', $footer);
    } else {
      redirect('Login');
    }
  }

  public function editKeterangan()
  {
    if ($this->session->userdata('level') != 'admin') {
      $this->session->set_flashdata('flashgagal', 'akses ditolak');
      redirect('Profile/index/' . $this->session->userdata('nip'));
    }
    $nip = $this->input->post('nip');
    $keterangan = $this->input->post('keterangan');
    if ($this->kepegawaian->setKetPegawai($nip, $keterangan) > 0) {
      $this->session->set_flashdata('flash', 'Keterangan berhasil diupdate');
      redirect('Profile/index/' . $nip);
    }
  }

  public function formPegawai()
  {
    $data['bidang'] = $this->kepegawaian->getAllBidang();
    $data['agama'] = $this->kepegawaian->getAllAgama();
    $this->form_validation->set_rules(
      'nip',
      'NIP',
      'required|min_length[18]|max_length[18]|numeric',
      array('required' => 'NIP wajib diisi', 'min_length' => 'NIP harus 18 digit','max_length' => 'NIP harus 18 digit', 'numeric' => 'NIP harus numerik')
    );
    $this->form_validation->set_rules(
      'nip_lama',
      'NIP Lama',
      'required|min_length[9]|max_length[18]|numeric',
      array('required' => 'NIP Lama wajib diisi', 'min_length' => 'NIP Lama minimal harus 9 digit', 'numeric' => 'NIP Lama harus numerik')
    );
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama wajib diisi'));
    $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username wajib diisi'));
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', array('required' => 'Tempat Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_lahir', 'Tangal Lahir', 'required', array('required' => 'Tangal Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_bergabung', 'Tangal Bergabung', 'required', array('required' => 'Tangal Bergabung wajib diisi'));
    $this->form_validation->set_rules('id_agama', 'Agama', 'required', array('required' => 'Agama wajib diisi'));
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Jenis Kelamin wajib diisi'));
    $this->form_validation->set_rules('pensiun', 'Pensiun', 'required', array('required' => 'Pensiun wajib diisi'));
    $this->form_validation->set_rules('id_bidang', 'Bidang', 'required', array('required' => 'Bidang wajib diisi'));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => 'Alamat wajib diisi'));

    $nip = $this->input->post('nip');
    $username = $this->input->post('username');

    $allUser = $this->user->getUser();
    foreach ($allUser as $row) {
      if ($row['username'] == $username) {
        $this->session->set_flashdata('username', 'Username sudah ada');
        redirect('DataPegawai/formPegawai');
      }
    }

    if ($this->session->userdata('level') == "admin") {
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header_form.php');
        $this->load->view('templates/headerbar.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('datapegawai/formPegawai_v', $data);
        $this->load->view('templates/footer_form.php');
      } else {

        if ($this->kepegawaian->insertPegawai() > 0) {
          if ($this->user->insertUserPegawai($username, $nip) > 0) {
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('DataPegawai');
          }
        } else {
          $this->session->set_flashdata('flash', 'gagal upload image');
          redirect('Datauser');
        }
      }
    } else {
      redirect('Login');
    }
  }

  public function formPegawaiBlu()
  {
    $data['bidang'] = $this->kepegawaian->getAllBidang();
    $data['agama'] = $this->kepegawaian->getAllAgama();
    $this->form_validation->set_rules(
      'nip',
      'NIP',
      'required',
      array('required' => 'NIP wajib diisi')
    );
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama wajib diisi'));
    $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username wajib diisi'));
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', array('required' => 'Tempat Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_lahir', 'Tangal Lahir', 'required', array('required' => 'Tangal Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_bergabung', 'Tangal Bergabung', 'required', array('required' => 'Tangal Bergabung wajib diisi'));
    $this->form_validation->set_rules('id_agama', 'Agama', 'required', array('required' => 'Agama wajib diisi'));
    $this->form_validation->set_rules('id_bidang', 'Bidang', 'required', array('required' => 'Bidang wajib diisi'));
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Jenis Kelamin wajib diisi'));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => 'Alamat wajib diisi'));

    $username = $this->input->post('username');

    $allUser = $this->user->getUser();
    foreach ($allUser as $row) {
      if ($row['username'] == $username) {
        $this->session->set_flashdata('username', 'Username sudah ada');
        redirect('DataPegawai/formPegawai');
      }
    }

    if ($this->session->userdata('level') == "admin") {
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header_form.php');
        $this->load->view('templates/headerbar.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('datapegawai/formPegawaiBlu_v', $data);
        $this->load->view('templates/footer_form.php');
      } else {
        $data = [];

        $data['nip'] = $this->input->post('nip');
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['status_pgw'] = "BLU";
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['id_bidang'] = $this->input->post('id_bidang');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['tanggal_bergabung'] = $this->input->post('tanggal_bergabung');
        $data['pensiun'] = "0";
        $data['keterangan'] = "NON PNS";

        if ($this->kepegawaian->insertPegawaiBlu($data) > 0) {
          if ($this->user->insertUserPegawai($username, $data['nip']) > 0) {
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('DataPegawai');
          }
        } else {
          $this->session->set_flashdata('flash', 'gagal upload image');
          redirect('Datauser');
        }
      }
    } else {
      redirect('Login');
    }
  }

  public function addBidang()
  {
    $bidang = $this->input->post('nama_bidang', true);
    if ($this->kepegawaian->insertBidang($bidang) > 0) {
      $this->session->set_flashdata('flash', 'ditambah');
      redirect('DataPegawai/formPegawai');
    } else { }
  }

  public function deleteBidang()
  {
    $id = $this->input->post('id', true);
    if ($this->kepegawaian->deleteBidang($id) > 0) {
      $this->session->set_flashdata('flash', 'dihapus');
      redirect('DataPegawai/formPegawai');
    } else { }
  }

  public function editFormPegawai($nip)
  {
    $nip = decrypt_url($nip);
    $data['bidang'] = $this->kepegawaian->getAllBidang();
    $data['agama'] = $this->kepegawaian->getAllAgama();
    $data['pegawai'] = $this->kepegawaian->getPegawaiById($nip);
    $this->form_validation->set_rules(
      'nip',
      'NIP',
      'required|min_length[18]|numeric',
      array('required' => 'NIP wajib diisi', 'min_length' => 'NIP harus 18 digit', 'numeric' => 'NIP harus numerik')
    );
    $this->form_validation->set_rules(
      'nip_lama',
      'NIP Lama',
      'required|min_length[5]|numeric',
      array('required' => 'NIP Lama wajib diisi', 'min_length' => 'NIP Lama minimal harus 5 digit', 'numeric' => 'NIP Lama harus numerik')
    );
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama wajib diisi'));
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', array('required' => 'Tempat Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_lahir', 'Tangal Lahir', 'required', array('required' => 'Tangal Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_bergabung', 'Tangal Bergabung', 'required', array('required' => 'Tangal Bergabung wajib diisi'));
    $this->form_validation->set_rules('id_agama', 'Agama', 'required', array('required' => 'Agama wajib diisi'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => 'Keterangan wajib diisi'));

    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Jenis Kelamin wajib diisi'));
    if ($this->session->userdata('level') != 'pegawai') {
      $this->form_validation->set_rules('id_bidang', 'Bidang', 'required', array('required' => 'Bidang wajib diisi'));
    }
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => 'Alamat wajib diisi'));

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header_form.php');
      $this->load->view('templates/headerbar.php');
      $this->load->view('templates/sidebar.php');
      $this->load->view('datapegawai/formEditPegawai_v', $data);
      $this->load->view('templates/footer_form.php');
    } else {
      if ($this->kepegawaian->updatePegawai() > 0) {
        $this->session->set_flashdata('flash', ' data profil berhasil diupdate');
        redirect('Profile/index/' . $nip);
      } else {
        $this->session->set_flashdata('flashgagal', ' data profil gagal diupdate');
        redirect('Profile/index/' . $nip);
      }
    }
  }

  public function editFormPegawaiBlu($nip)
  {
    $nip = decrypt_url($nip);
    $data['bidang'] = $this->kepegawaian->getAllBidang();
    $data['agama'] = $this->kepegawaian->getAllAgama();
    $data['pegawai'] = $this->kepegawaian->getPegawaiById($nip);
    $this->form_validation->set_rules(
      'nip',
      'NIP',
      'required',
      array('required' => 'NIP wajib diisi')
    );
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama wajib diisi'));
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', array('required' => 'Tempat Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_lahir', 'Tangal Lahir', 'required', array('required' => 'Tangal Lahir wajib diisi'));
    $this->form_validation->set_rules('tanggal_bergabung', 'Tangal Bergabung', 'required', array('required' => 'Tangal Bergabung wajib diisi'));
    $this->form_validation->set_rules('id_agama', 'Agama', 'required', array('required' => 'Agama wajib diisi'));
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Jenis Kelamin wajib diisi'));
    if ($this->session->userdata('level') != 'pegawai') {
      $this->form_validation->set_rules('id_bidang', 'Bidang', 'required', array('required' => 'Bidang wajib diisi'));
    }
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => 'Alamat wajib diisi'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => 'Keterangan wajib diisi'));

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header_form.php');
      $this->load->view('templates/headerbar.php');
      $this->load->view('templates/sidebar.php');
      $this->load->view('datapegawai/formEditPegawaiBlu_v', $data);
      $this->load->view('templates/footer_form.php');
    } else {
      if ($this->kepegawaian->updatePegawaiBlu() > 0) {
        $this->session->set_flashdata('flash', ' data profil berhasil diupdate');
        redirect('Profile/index/' . $nip);
      } else {
        $this->session->set_flashdata('flashgagal', ' data profil gagal diupdate');
        redirect('Profile/index/' . $nip);
      }
    }
  }

  public function deletePegawai()
  {
    $this->kepegawaian->deletePegawai($this->input->post('username'));
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('DataPegawai');
  }

  public function getPegawaiJson()
  {
    $nip = $this->input->post('nip');
    $data = $this->kepegawaian->getPegawaiById($nip);
    echo json_encode($data);
  }

  public function setPns()
  {
    $new_nip = $this->input->post('new_nip');
    $old_nip = $this->input->post('old_nip');

    if ($this->kepegawaian->updatePns($new_nip, $old_nip) > 0) {
      $this->session->set_flashdata('flash', 'diupdate');
      redirect('DataPegawai');
    }
  }

  public function updateJabatanPelaksana()
  {
    if ($this->session->userdata('level') != 'admin') {
      $this->session->set_flashdata('flashgagal', 'akses ditolak');
      redirect('Profile/index/' . $this->session->userdata('nip'));
    }

    $nip = $this->input->post('nip');
    $jabatan = $this->input->post('jabatan_pelaksana');
    if ($this->kepegawaian->updateJabatanPelaksana($nip, $jabatan) > 0) {
      $this->session->set_flashdata('flash', 'jabatan pelakasana berhasil diupdate');
      redirect('Profile/index/' . $nip);
    } else {
      $this->session->set_flashdata('flashgagal', 'jabatan pelakasana gagal diupdate');
      redirect('Profile/index/' . $nip);
    }
  }

  public function tests()
  {
    $data = $this->kepegawaian->getAllPegawai();
    echo json_encode($data);
  }

  public function getJabatanPelaksanaJSON()
  {
    $data = $this->kepegawaian->getJabatanPelaksana();
    $hasil = array();
    foreach ($data as $hsl) {
      $hasil[] = $hsl['jabatan_pelaksana'];
    }
    echo json_encode($hasil);
  }
}
