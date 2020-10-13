<?php
    function checkOption($x,$y){
        if($x==$y)
            return "selected";
        else
            return "";
    }
?>
<div class="content-page">

	<!-- Start content -->
	<div class="content">

		<div class="container-fluid">

       

			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Data Pegawai</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$this->input->post('nip')?>">
                            Data Pegawai
                            </a> </li>
							<li class="breadcrumb-item active">Add Kemampuan Bahasa</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->

            <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-1 mr-1 ml-1">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('flash'); ?>  
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php endif; ?>

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card mb-3">
						<div class="card-header blue p-2">
                        <h3><i class="fa fa-id-card-o"></i> Form Data Kemampuan Bahasa
                        </h3>
                        </div>


						<div class="card-body">
                            <div class="tengah-form" style="min-height:400px;" >
                            <form enctype="multipart/form-data" method="post">
                            
                            <div class="form-group row"  <?=checkAkses()?>>
                                <label  class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                <div class="col-sm-9">
                                    <select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                        <?php foreach($pegawai as $row) :?>
                                            <?php if ($row['nip']==$this->input->post('nip')) : ?>
                                            <option data-tokens="<?= $row['nip'].', '.$row['nama']?>" value="<?= $row['nip']?>" selected ><?= $row['nip'].', '.$row['nama'] ?></option>
                                            <?php else : ?>
                                            <option data-tokens="<?= $row['nip'].', '.$row['nama']?>" value="<?= $row['nip']?>"><?= $row['nip'].', '.$row['nama']?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('nip'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Bahasa</label>
                                <div class="col-sm-9">
                                    <select name="bahasa"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="10" title="...">
                                        <option value="Afrikanns" data-tokens="Afrikanns">Afrikanns</option>
                                        <option value="Albanian" data-tokens="Albanian">Albanian</option>
                                        <option value="Arabic" data-tokens="Arabic">Arabic</option>
                                        <option value="Armenian" data-tokens="Armenian">Armenian</option>
                                        <option value="Basque" data-tokens="Basque">Basque</option>
                                        <option value="Bengali" data-tokens="Bengali">Bengali</option>
                                        <option value="Bulgarian" data-tokens="Bulgarian">Bulgarian</option>
                                        <option value="Catalan" data-tokens="Catalan">Catalan</option>
                                        <option value="Cambodian" data-tokens="Cambodian">Cambodian</option>
                                        <option value="Chinese (Mandarin)" data-tokens="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                        <option value="Croation" data-tokens="Croation">Croation</option>
                                        <option value="Czech" data-tokens="Czech">Czech</option>
                                        <option value="Danish" data-tokens="Danish">Danish</option>
                                        <option value="Dutch" data-tokens="Dutch">Dutch</option>
                                        <option value="English" data-tokens="English">English</option>
                                        <option value="Estonian" data-tokens="Estonian">Estonian</option>
                                        <option value="Fiji" data-tokens="Fiji">Fiji</option>
                                        <option value="Finnish" data-tokens="Finnish">Finnish</option>
                                        <option value="French" data-tokens="French">French</option>
                                        <option value="Georgian" data-tokens="Georgian">Georgian</option>
                                        <option value="German" data-tokens="German">German</option>
                                        <option value="Greek" data-tokens="Greek">Greek</option>
                                        <option value="Gujarati" data-tokens="Gujarati">Gujarati</option>
                                        <option value="Hebrew" data-tokens="Hebrew">Hebrew</option>
                                        <option value="Hindi" data-tokens="Hindi">Hindi</option>
                                        <option value="Hungarian" data-tokens="Hungarian">Hungarian</option>
                                        <option value="Icelandic" data-tokens="Icelandic">Icelandic</option>
                                        <option value="Indonesian" data-tokens="Indonesian">Indonesian</option>
                                        <option value="Irish" data-tokens="Irish">Irish</option>
                                        <option value="Italian" data-tokens="Italian">Italian</option>
                                        <option value="Japanese" data-tokens="Japanese">Japanese</option>
                                        <option value="Javanese"  data-tokens="Javanese">Javanese</option>
                                        <option value="Korean" data-tokens="Korean">Korean</option>
                                        <option value="Latin"  data-tokens="Latin">Latin</option>
                                        <option value="Latvian" data-tokens="Latvian">Latvian</option>
                                        <option value="Lithuanian" data-tokens="Lithuanian">Lithuanian</option>
                                        <option value="Macedonian" data-tokens="Macedonian">Macedonian</option>
                                        <option value="Malay" data-tokens="Malay">Malay</option>
                                        <option value="Malayalam" data-tokens="Malayalam">Malayalam</option>
                                        <option value="Maltese" data-tokens="Maltese">Maltese</option>
                                        <option value="Maori"  data-tokens="Maori">Maori</option>
                                        <option value="Marathi"  data-tokens="Marathi">Marathi</option>
                                        <option value="Mongolian" data-tokens="Mongolian">Mongolian</option>
                                        <option value="Nepali" data-tokens="Nepali">Nepali</option>
                                        <option value="Norwegian" data-tokens="Norwegian">Norwegian</option>
                                        <option value="Persian" data-tokens="Persija">Persian</option>
                                        <option value="Polish" data-tokens="Polish">Polish</option>
                                        <option value="Portuguese" data-tokens="Portuguese">Portuguese</option>
                                        <option value="Punjabi" data-tokens="Punjabi">Punjabi</option>
                                        <option value="Quechua" data-tokens="Quechua">Quechua</option>
                                        <option value="Romanian" data-tokens="Romanian">Romanian</option>
                                        <option value="Russian" data-tokens="Russian">Russian</option>
                                        <option value="Samoan" data-tokens="Samoan">Samoan</option>
                                        <option value="Serbian" data-tokens="Serbian">Serbian</option>
                                        <option value="Slovak"  data-tokens="Slovak">Slovak</option>
                                        <option value="Slovenian" data-tokens="Slovenian">Slovenian</option>
                                        <option value="Spanish" data-tokens="Spanish">Spanish</option>
                                        <option value="Swahili" data-tokens="Swahili">Swahili</option>
                                        <option value="Swedish " data-tokens="Swedish">Swedish </option>
                                        <option value="Tamil" data-tokens="Tamil">Tamil</option>
                                        <option value="Tatar" data-tokens="Tatar">Tatar</option>
                                        <option value="Telugu" data-tokens="Telugu">Telugu</option>
                                        <option value="Thai" data-tokens="Thai">Thai</option>
                                        <option value="Tibetan" data-tokens="Tibetan">Tibetan</option>
                                        <option value="Tonga" data-tokens="Tonga">Tonga</option>
                                        <option value="Turkish" data-tokens="Turkish">Turkish</option>
                                        <option value="Ukranian" data-tokens="Ukranian">Ukranian</option>
                                        <option value="Urdu" data-tokens="Urdu">Urdu</option>
                                        <option value="Uzbek" data-tokens="Uzbek">Uzbek</option>
                                        <option value="Vietnamese" data-tokens="Vietnamese">Vietnamese</option>
                                        <option value="Welsh" data-tokens="Welsh">Welsh</option>
                                        <option value="Xhosa" data-tokens="Xhosa">Xhosa</option>  
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('bahasa'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Kemampuan Bahasa </label>
                                <div class="col-sm-9">

                                    <div class="btn-group mb-0" data-toggle="buttons">
                                        <label class="btn btn-primary mb-0 mr-3">
                                            <span class="btn-label"><i class="fa fa-volume-up"></i></span>
                                            <input type="radio" name="kemampuan_bahasa" id="option1" autocomplete="off" value="Pasif" > Pasif
                                        </label>
                                        <label class="btn btn-primary mb-0">
                                            <span class="btn-label"><i class="fa fa-wechat"></i></span>
                                            <input type="radio" name="kemampuan_bahasa" id="option2" autocomplete="off" value="Aktif"> Aktif
                                        </label>
                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('kemampuan_bahasa'); ?>
                                    </small>
                                </div>
                            </div>

                           
                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$this->input->post('nip')?>/<?=uniqid()?>/bahasa">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Tambah
                                    </button>
                                </div>
                            </form>
                            </div>
						</div>
					</div><!-- end card-->
				</div>


			</div>

       
		</div>
		<!-- END container-fluid -->

	</div>
	<!-- END content -->

</div>
