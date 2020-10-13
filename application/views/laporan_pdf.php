<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV</title>
	<link href="<?= base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url();?>assets/csspdf/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div style="height:20px;">
</div>

<div class="header">
      <table width="100%">
        <tr>
          <td align="left" style="width:35%;">
            <img alt="Logo" src="<?=base_url();?>assets/logo/logo2.png" width="170" style="margin-left:15px;"/>
          </td>
          <td align="center">
            <pre style="font-size:16px;">
            Daftar Riwayat Pegawai
              BPPT Pusyantek
            </pre>
          </td>
          <td align="right"></td>
        </tr>
      </table>
</div>

<div class="information">
    <table width="100%">
        <tr >
            <td align="left" style="width: 20%;">
                <div>
                    <img src="<?=base_url();?>upload/foto/profile/<?=$profil['foto']?>" width="100" height="130" alt="" style="margin-left:30px;margin-bottom:0;">
                </div>
            </td>
            <td style="width:30%;">
              <div class="nama" >
                <p style="font-size:15px;"><?=$profil['nama']?></p>
                <hr>
                <?php if(isset($profilStrukturalTerakhir)) : ?>
									<?php if($profil['status_pgw']=="BLU")  : ?>	
											<p class=" float-right mb-2 " style="font-size:12px"><?=$profilStrukturalTerakhir['nm_jabatan']?></p>					
									<?php else : ?>
										 <p class=" float-right mb-2 " style="font-size:12px"><?=$profilStrukturalTerakhir['nm_jabatan']?></p>
									<?php endif; ?>
								 <?php else : ?>
                 asdasd
								<?php endif; ?>
                <p><?=$profil['nip']?></p>
              </div>
            </td>
            <td >
                  <?php if ($this->session->userdata('status')!='BLU') : ?>
                  <p><span style="font-family: FontAwesome">&#xF192;</span>&nbsp; Pangkat</p>
                  <?php endif; ?>
                  <p><span style="font-family: FontAwesome">&#xF073;</span>&nbsp; TTL</p>
                  <p><span style="font-family: FontAwesome">&#xF192;</span>&nbsp; Jenis Kelamin</p>
                  <p><span style="font-family: FontAwesome">&#xF192;</span>&nbsp; Agama</p> 
                  <p><span style="font-family: FontAwesome">&#xF10b;</span>&nbsp; Telepon</p>
                  <p><span style="font-family: FontAwesome">&#xF015;</span>&nbsp; Alamat <br></p>
                  <br>
            </td>
            <td >
                  <?php if ($this->session->userdata('status')!='BLU') : ?>
                   <p><?=$profil['golongan']['id_golongan'].' - '.$profil['golongan']['pangkat']?></p>
                  <?php endif; ?>
                   <p><?=$profil['tempat_lahir'].', '.$profil['tanggal_lahir']?></p>
                   <p><?=$profil['jenis_kelamin']?></p>
                   <p><?=$profil['nama_agama']?></p>
                   <p><?=$profil['no_telp']?></p>
                   <p><?=$profil['alamat']?></p>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Pendidikan</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Tingkat</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>Tahun Lulus</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($profilPendidikan as $row) : ?>
            <tr>
              <td><?=$row['tingkat']?></td>
              <td><?=$row['sekolah']?></td>
              <td><?=$row['jurusan']?></td>
              <td><?=$row['tahun_lulus']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

        <tfoot>
        <tr>
            <!-- <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€15,-</td> -->
        </tr>
        </tfoot>
    </table>
</div>

<div class="invoice">
    <h3>Pelatihan</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>nama</th>
            <th>Mulai - Selesai</th>
            <th>Tempat</th>
            <th>Negara</th>
            <th>Sponsor</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($profilDiklat as $row) : ?>
            <tr>
                <td><?=$row['nama_diklat']?></td>	
                <td><?=$row['mulai_diklat']." ~ ".$row['selesai_diklat'];?></td>	
                <td><?=$row['tempat_diklat']?></td>	
                <td><?=$row['negara_diklat']?></td>
                <td><?=$row['sponsor_diklat']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

        <tfoot>
        <tr>
            <!-- <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€15,-</td> -->
        </tr>
        </tfoot>
    </table>
</div>

<div class="invoice">
    <h3>Seminar</h3>
    <table width="100%">
        <thead>
        <tr>
          <th >Nama</th>
          <th >Peran</th>
          <th >Tanggal</th>
          <th >Tempat</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($profilSeminar as $row) : ?>
            <tr>
              <td><?=$row['nama_seminar']?></td>	
              <td><?=$row['peran']?></td>	
              <td><?=$row['tanggal_seminar']?></td>	
              <td><?=$row['tempat_seminar']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

        <tfoot>
        <tr>
            <!-- <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€15,-</td> -->
        </tr>
        </tfoot>
    </table>
</div>

<div class="invoice">
    <h3>Pengalaman</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Perusahaan</th>
            <th>Jabatan</th>
            <th>Mulai Kerja</th>
            <th>Selesai Kerja</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($profilPengalaman as $row) : ?>
            <tr>
              <td><?=$row['perusahaan_kerja']?></td>	
              <td><?=$row['jabatan_kerja']?></td>
              <td><?=$row['mulai_kerja']?></td>
              <td><?=$row['selesai_kerja']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

        <tfoot>
        <tr>
            <!-- <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€15,-</td> -->
        </tr>
        </tfoot>
    </table>
</div>

<div class="invoice">
    <h3>Kemampuan Bahasa</h3>
    <table width="100%">
        <thead>
        <tr>
          <th >Bahasa</th>
          <th >Kemampuan Bahasa</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($profilBahasa as $row) : ?>
            <tr>
              <td ><?=$row['bahasa']?></td>	
              <td ><?=$row['kemampuan_bahasa']?></td>	
            </tr>
          <?php endforeach; ?>
        </tbody>

        <tfoot>
        <tr>
            <!-- <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€15,-</td> -->
        </tr>
        </tfoot>
    </table>
</div>


<div class="information" style="position: absolute; bottom: 0; ">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
               
            </td>
            <td align="right" style="width: 50%;">
            </td>
        </tr>

    </table>
</div>
</body>
</html>