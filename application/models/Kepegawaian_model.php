<?php

class Kepegawaian_model extends CI_Model
{

    public function getAllBidang()
    {
        $this->db->select('*');
        $this->db->order_by('id_bidang', 'ASC');
        $query = $this->db->get('bidang');
        return $query->result_array();
    }
    public function getAllAgama()
    {
        $this->db->select('*');
        $this->db->order_by('id_agama', 'ASC');
        $query = $this->db->get('agama');
        return $query->result_array();
    }


    public function getAllFungsional()
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->order_by('id_jabatan', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function  getPegawaiPerbidang($bidang)
    {
        $this->db->select('pegawai.jabatan_pelaksana,pegawai.keterangan,status_pgw,pegawai.nip,jabatan_struktural.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan,pendidikan.konsentrasi,jabatan_struktural.level_jabatan');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip', 'left');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan', 'left');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->where('bidang.nama_bidang', $bidang);
        $this->db->where('struktural.status', "1");
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('level_jabatan', 'ASC');
        $this->db->order_by('nm_jabatan', 'ASC');
        $query = $this->db->get('pegawai');
        $data['count'] = $query->num_rows();
        $data['pegawai'] = $query->result_array();

        return $data;
    }


    public function  getPegawaiPerbidangPNS($bidang)
    {
        $this->db->select('pegawai.jabatan_pelaksana,pegawai.keterangan,status_pgw,pegawai.nip,jabatan_struktural.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan,pendidikan.konsentrasi,jabatan_struktural.level_jabatan');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->where('bidang.nama_bidang', $bidang);
        $this->db->where('status_pgw', 'PNS');
        $this->db->where('struktural.status', "1");
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('level_jabatan', 'ASC');
        $query = $this->db->get('pegawai');
        $data['count'] = $query->num_rows();
        $data['pegawai'] = $query->result_array();

        return $data;
    }

    public function  getPegawaiPerbidangNonPns($bidang)
    {
        $this->db->select('pegawai.jabatan_pelaksana,pegawai.keterangan,status_pgw,pegawai.nip,jabatan_struktural.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan,pendidikan.konsentrasi,jabatan_struktural.level_jabatan');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->where('bidang.nama_bidang', $bidang);
        $this->db->where('status_pgw', 'BLU');
        $this->db->where('struktural.status', "1");
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('level_jabatan', 'ASC');
        $query = $this->db->get('pegawai');
        $data['count'] = $query->num_rows();
        $data['pegawai'] = $query->result_array();

        return $data;
    }

    public function updateJabatanPelaksana($nip, $jabatan)
    {
        $this->db->where('nip', $nip);
        $this->db->update('pegawai', ['jabatan_pelaksana' => $jabatan]);
        return $this->db->affected_rows();
    }

    public function  getPegawaiPerfungsional($fungsional)
    {
        $this->db->select('status_pgw,pegawai.nip,jabatan.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan');
        $this->db->join('fungsional', 'pegawai.nip = fungsional.nip');
        $this->db->join('jabatan', 'jabatan.id = fungsional.id_jabatan');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->where('fungsional.id_jabatan', $fungsional);
        $this->db->where('fungsional.status', "1");
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('jabatan.id_jabatan', 'ASC');
        $query = $this->db->get('pegawai');
        $data['count'] = $query->num_rows();
        $data['pegawai'] = $query->result_array();

        return $data;
    }

    // public function getPegawaiPerfungsional($fungsional){
    //     $this->db->select('pegawai.nip,jabatan.')
    // }

    public function insertBidang($bidang)
    {
        $this->db->insert('bidang', ['nama_bidang' => $bidang]);
        return $this->db->affected_rows();
    }

    public function deleteBidang($id)
    {
        $this->db->delete('bidang', ['id_bidang' => $id]);
        return $this->db->affected_rows();
    }

    public function insertAgama($agama)
    {
        $this->db->insert('agama', ['nama_agama' => $agama]);
        return $this->db->affected_rows();
    }

    public function deleteAgama($id)
    {
        $this->db->delete('agama', ['id_agama' => $id]);
        return $this->db->affected_rows();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/foto/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = md5(uniqid());
        $config['overwrite']            = true;
        $config['max_size']             = 3072; // 2MB
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($nip)
    {
        $pegawai = $this->getPegawaiById($nip);
        if ($pegawai['foto'] != "default.jpg") {
            $filename = explode(".", $pegawai['foto'])[0];
            return array_map('unlink', glob(FCPATH . "upload/foto/profile/$filename.*"));
        }
    }
    
    public function insertPegawai()
    {
        $data = [];
        $data['nip'] = $this->input->post('nip');
        $data['nip_lama'] = $this->input->post('nip_lama');
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['status_pgw'] = "PNS";
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['id_bidang'] = $this->input->post('id_bidang');
        if (empty($_FILES['image']['name'])) {
            // $this->form_validation->set_rules('image', 'Foto', 'required', array('required' => 'Foto wajib diisi maksimal 3 MB'));
            $data['foto'] = "default.jpg";
        } else {
            $data['foto'] = $this->_uploadImage();
        }
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['tanggal_bergabung'] = $this->input->post('tanggal_bergabung');
        $data['pensiun'] = $this->input->post('pensiun');
        $data['keterangan'] = "PNS";
        $this->db->insert('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function insertPegawaiBlu($data)
    {

        if (empty($_FILES['image']['name'])) {
            // $this->form_validation->set_rules('image', 'Foto', 'required', array('required' => 'Foto wajib diisi maksimal 3 MB'));
            $data['foto'] = "default.jpg";
        } else {
            $data['foto'] = $this->_uploadImage();
        }
        $this->db->insert('pegawai', $data);

        return $this->db->affected_rows();
    }

    
    public function getAllPegawai()
    {
        $this->db->select('pegawai.nip,pegawai.keterangan,status_pgw,pegawai.nama,nama_agama,nama_bidang,status,nm_jabatan,pegawai.jenis_kelamin,pegawai.foto');
        $this->db->from('pegawai');
        $this->db->join('agama', 'pegawai.id_agama = agama.id_agama');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip', 'left');
        $this->db->join('jabatan_struktural', 'struktural.id_jabatan = jabatan_struktural.id_jabatan', 'left');
        $this->db->order_by('jabatan_struktural.level_jabatan', 'ASC');
        $this->db->order_by('jabatan_struktural.nm_jabatan', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getAllPegawaiii()
    {
        $this->db->select('pegawai.nip,pegawai.keterangan,status_pgw,pegawai.nama,nama_agama,nama_bidang,status,nm_jabatan');
        $this->db->from('pegawai');
        $this->db->join('agama', 'pegawai.id_agama = agama.id_agama');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip');
        $this->db->join('jabatan_struktural', 'struktural.id_jabatan = jabatan_struktural.id_jabatan');
        return $this->db->get()->result_array();
    }

    public function getAllPegawaiBiasa()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        return $this->db->get()->result_array();
    }

    public function getAllPegawaii()
    {
        $this->db->select('pensiun,nama,pegawai.nip,tanggal_lahir,nm_jabatan');
        $this->db->from('pegawai');
        $this->db->join('agama', 'pegawai.id_agama = agama.id_agama');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip');
        $this->db->join('jabatan_struktural', 'struktural.id_jabatan = jabatan_struktural.id_jabatan');
        $this->db->order_by('jabatan_struktural.level_jabatan', 'ASC');
        $this->db->where('struktural.status', '1');
        $this->db->where('pegawai.status_pgw', 'pns');
        return $this->db->get()->result_array();
    }

    public function getAllPegawaiPNS()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('status_pgw', 'PNS');
        $this->db->join('agama', 'pegawai.id_agama = agama.id_agama');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        return $this->db->get()->result_array();
    }

    public function getPegawaiById($nip)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('pegawai.nip', $nip);
        $this->db->join('agama', 'pegawai.id_agama = agama.id_agama');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        return $this->db->get()->row_array();
    }

    public function getPegawaiGolonganById($nip)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('pegawai.nip', $nip);
        $this->db->join('riwayat_pangkat', 'pegawai.nip = riwayat_pangkat.nip');
        $this->db->join('golongan', 'riwayat_pangkat.id_golongan = golongan.id_golongan');

        return $this->db->get()->result_array();
    }

    public function getPegawaiFungsionalById($nip)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('pegawai.nip', $nip);
        $this->db->join('fungsional', 'pegawai.nip = fungsional.nip');
        $this->db->join('jabatan', 'fungsional.id_jabatan = jabatan.id');

        return $this->db->get()->result_array();
    }

    public function getPegawaiStrukturalById($nip)
    {
        $this->db->select('*');
        $this->db->from('struktural');
        $this->db->where('struktural.nip', $nip);
        $this->db->join('jabatan_struktural', 'struktural.id_jabatan = jabatan_struktural.id_jabatan');
        $this->db->join('eselon', 'eselon.id_eselon = struktural.id_eselon');

        return $this->db->get()->result_array();
    }

    public function getCountPegawai()
    {
        $query = $this->db->get('pegawai');
        return $query->num_rows();
    }

    public function getCountPns()
    {
        $this->db->where('status_pgw', 'pns');
        $query = $this->db->get('pegawai');
        return $query->num_rows();
    }

    public function getCountBlu()
    {
        $this->db->where('status_pgw', 'BLU');
        $query = $this->db->get('pegawai');
        return $query->num_rows();
    }

    public function getCountNonAktif()
    {
        $nonaktif = array('Dipekerjakan', 'Pensiun', 'Berhenti');
        $this->db->where_in('keterangan', $nonaktif);
        $query = $this->db->get('pegawai');
        return $query->num_rows();
    }

    public function getJabatanPelaksana()
    {
        $this->db->select('jabatan_pelaksana');
        $this->db->distinct();
        $this->db->from('pegawai');
        return $this->db->get()->result_array();
    }

    public function updatePegawai()
    {
        $data = [];
        $data['nip'] = $this->input->post('nip');
        $data['nip_lama'] = $this->input->post('nip_lama');
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['status_pgw'] = "PNS";
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['id_bidang'] = $this->input->post('id_bidang');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['tanggal_bergabung'] = $this->input->post('tanggal_bergabung');
        $data['pensiun'] = $this->input->post('pensiun');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['jabatan_pelaksana'] = $this->input->post('jabatan_pelaksana');

        if (!empty($_FILES["image"]["name"])) {
            $this->_deleteImage($this->input->post('old_nip'));
            $data['foto'] = $this->_uploadImage();
            if ($this->session->userdata('nip') == $this->input->post('old_nip')) {
                $this->session->set_userdata('foto', $data['foto']);
            }
        }

        $this->db->where('nip', $this->input->post('old_nip'));
        $this->db->update('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function updatePegawaiBlu()
    {
        $data = [];
        $data['nip'] = $this->input->post('nip');
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['id_bidang'] = $this->input->post('id_bidang');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['tanggal_bergabung'] = $this->input->post('tanggal_bergabung');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['jabatan_pelaksana'] = $this->input->post('jabatan_pelaksana');

        if (!empty($_FILES["image"]["name"])) {
            $this->_deleteImage($this->input->post('old_nip'));
            $data['foto'] = $this->_uploadImage();
            if ($this->session->userdata('nip') == $this->input->post('old_nip')) {
                $this->session->set_userdata('foto', $data['foto']);
            }
        }

        $this->db->where('nip', $this->input->post('old_nip'));
        $this->db->update('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function deletePegawai($nip)
    {
        $this->_deleteImage($nip);
        $this->db->delete('pegawai', ['nip' => $nip]);
        return $this->db->affected_rows();
    }

    public function updatePns($new_nip, $old_nip)
    {
        $data['nip'] = $new_nip;
        $data['status_pgw'] = "PNS";
        $this->db->where('nip', $old_nip);
        $this->db->update('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function setKetPensiun($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->update('pegawai', ["keterangan" => "Pensiun"]);
        return $this->db->affected_rows();
    }

    public function setKetPegawai($nip, $keterangan)
    {
        $this->db->where('nip', $nip);
        if ($keterangan == "NON PNS") {
            $this->db->update('pegawai', ["status_pgw" => "BLU", "keterangan" => $keterangan]);
        } elseif ($keterangan == "PNS") {
            $this->db->update('pegawai', ["status_pgw" => "PNS", "keterangan" => $keterangan]);
        } else {
            $this->db->update('pegawai', ["keterangan" => $keterangan]);
        }
        return $this->db->affected_rows();
    }

    public function getFungsionalTerakhirPegawai($nip)
    {
        $this->db->select('id_fungsional,jabatan.id_jabatan,jabatan.nm_jabatan');
        $this->db->from('fungsional');
        $this->db->where('nip', $nip);
        $this->db->where('fungsional.status', '1');
        $this->db->join('jabatan', 'jabatan.id=fungsional.id_jabatan', 'left');
        return $this->db->get()->row_array();
    }

    public function getStrukturalTerakhirPegawai($nip)
    {
        $this->db->select('id_struktural,jabatan_struktural.id_jabatan,jabatan_struktural.nm_jabatan');
        $this->db->from('struktural');
        $this->db->where('nip', $nip);
        $this->db->where('struktural.status', '1');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan=struktural.id_jabatan', 'left');
        return $this->db->get()->row_array();
    }

    public function getPelatihanTahunIni($tahun)
    {
        $this->db->select('pegawai.nip,pegawai.nama,diklat.nama_diklat,diklat.mulai_diklat,diklat.selesai_diklat,diklat.tempat_diklat,bidang.nama_bidang');
        $this->db->join('pegawai', 'pegawai.nip = diklat.nip');
        $this->db->join('bidang', 'pegawai.id_bidang = bidang.id_bidang');
        $this->db->where('year(mulai_diklat)', $tahun);
        $this->db->order_by('mulai_diklat', 'ASC');
        return $this->db->get('diklat')->result_array();
    }

    public function getUltahPegawai($tanggal)
    {
        $this->db->select('pegawai.nip,pegawai.nama, pegawai.tanggal_lahir,pegawai.foto,jabatan_struktural.nm_jabatan');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan');
        $this->db->where('struktural.status', "1");
        $this->db->where("DATE_FORMAT(tanggal_lahir, '%m') = ", $tanggal);
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('DAYOFMONTH(pegawai.tanggal_lahir)', 'ASC');
        return $this->db->get('pegawai')->result_array();
    }

    public function getPegawaiPerSubbidang($id_subbidang)
    {
        $this->db->select('pegawai.jabatan_pelaksana,pegawai.keterangan,status_pgw,pegawai.nip,jabatan_struktural.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan,pendidikan.konsentrasi,jabatan_struktural.level_jabatan');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip', 'left');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan', 'left');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->join('staffsubbid', 'pegawai.nip=staffsubbid.nip');
        $this->db->where('staffsubbid.id_subbidang', $id_subbidang);
        $this->db->where('struktural.status', "1");
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('level_jabatan', 'ASC');
        $this->db->order_by('nm_jabatan', 'ASC');
        $this->db->order_by('status_pgw', 'DESC');
        $query = $this->db->get('pegawai');
        $data['count'] = $query->num_rows();
        $data['pegawai'] = $query->result_array();

        return $data;
    }

    public function getPegawaiPerSubbidangPNS($id_subbidang)
    {
        $this->db->select('pegawai.jabatan_pelaksana,pegawai.keterangan,status_pgw,pegawai.nip,jabatan_struktural.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan,pendidikan.konsentrasi,jabatan_struktural.level_jabatan');
        $this->db->join('struktural', 'pegawai.nip = struktural.nip', 'left');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan', 'left');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->join('staffsubbid', 'pegawai.nip=staffsubbid.nip');
        $this->db->where('staffsubbid.id_subbidang', $id_subbidang);
        $this->db->where('struktural.status', "1");
        $this->db->where('pegawai.status_pgw', "PNS");
        $this->db->where_not_in('pegawai.keterangan', array('Dipekerjakan', 'Pensiun', 'Berhenti', 'Lainnya'));
        $this->db->order_by('level_jabatan', 'ASC');
        $this->db->order_by('nm_jabatan', 'ASC');
        $this->db->order_by('status_pgw', 'DESC');
        $query = $this->db->get('pegawai');
        $data['count'] = $query->num_rows();
        $data['pegawai'] = $query->result_array();

        return $data;
    }
    public function getKabidPerBidang($bidang)
    {
        $this->db->select('pegawai.jabatan_pelaksana,pegawai.keterangan,status_pgw,pegawai.nip,jabatan_struktural.nm_jabatan,nama,pendidikan.status,pendidikan.tingkat,pendidikan.jurusan,pendidikan.konsentrasi,jabatan_struktural.level_jabatan');
        $this->db->from('pegawai');
        $this->db->join('struktural', 'pegawai.nip=struktural.nip', 'left');
        $this->db->join('jabatan_struktural', 'jabatan_struktural.id_jabatan = struktural.id_jabatan', 'left');
        $this->db->join('pendidikan', 'pendidikan.nip = pegawai.nip', 'left');
        $this->db->where('id_bidang', $bidang);
        $this->db->where('struktural.status', "1");
        $this->db->like('jabatan_struktural.nm_jabatan', 'Ka.Bid');
        $this->db->or_like('jabatan_struktural.nm_jabatan', 'Kepala Bidang');
        return $this->db->get()->row_array();
    }
}
