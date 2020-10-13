<?php
    function selectOption($x,$y){
        if($x==$y)
            return "selected";
        else
            return "";
    }
    function checkOption($x,$y){
        if($x==$y)
            return "checked";
        else
            return "";
    }
    function activeOption($x,$y){
        if($x==$y)
            return "active";
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
							<li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$bahasa['nip']?>">
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
                                            <?php if ($row['nip']==$bahasa['nip']) : ?>
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
                                        <option value="Afrikanns" data-tokens="Afrikanns" <?=selectOption('Afrikanns',$bahasa['bahasa'])?>>Afrikanns</option>
                                        <option value="Albanian" data-tokens="Albanian"<?=selectOption('Albanian',$bahasa['bahasa'])?>>Albanian</option>
                                        <option value="Arabic" data-tokens="Arabic"<?=selectOption('Arabic',$bahasa['bahasa'])?>>Arabic</option>
                                        <option value="Armenian" data-tokens="Armenian"<?=selectOption('Armenian',$bahasa['bahasa'])?>>Armenian</option>
                                        <option value="Basque" data-tokens="Basque"<?=selectOption('Basque',$bahasa['bahasa'])?>>Basque</option>
                                        <option value="Bengali" data-tokens="Bengali"<?=selectOption('Bengali',$bahasa['bahasa'])?>>Bengali</option>
                                        <option value="Bulgarian" data-tokens="Bulgarian"<?=selectOption('Bulgarian',$bahasa['bahasa'])?>>Bulgarian</option>
                                        <option value="Catalan" data-tokens="Catalan"<?=selectOption('Catalan',$bahasa['bahasa'])?>>Catalan</option>
                                        <option value="Cambodian" data-tokens="Cambodian"<?=selectOption('Cambodian',$bahasa['bahasa'])?>>Cambodian</option>
                                        <option value="Chinese (Mandarin)" data-tokens="Chinese (Mandarin)"<?=selectOption('Chinese (Mandarin)',$bahasa['bahasa'])?>>Chinese (Mandarin)</option>
                                        <option value="Croation" data-tokens="Croation"<?=selectOption('Croation',$bahasa['bahasa'])?>>Croation</option>
                                        <option value="Czech" data-tokens="Czech"<?=selectOption('Czech',$bahasa['bahasa'])?>>Czech</option>
                                        <option value="Danish" data-tokens="Danish"<?=selectOption('Danish',$bahasa['bahasa'])?>>Danish</option>
                                        <option value="Dutch" data-tokens="Dutch"<?=selectOption('Dutch',$bahasa['bahasa'])?>>Dutch</option>
                                        <option value="English" data-tokens="English"<?=selectOption('English',$bahasa['bahasa'])?>>English</option>
                                        <option value="Estonian" data-tokens="Estonian"<?=selectOption('Estonian',$bahasa['bahasa'])?>>Estonian</option>
                                        <option value="Fiji" data-tokens="Fiji"<?=selectOption('Fiji',$bahasa['bahasa'])?>>Fiji</option>
                                        <option value="Finnish" data-tokens="Finnish"<?=selectOption('Finnish',$bahasa['bahasa'])?>>Finnish</option>
                                        <option value="French" data-tokens="French"<?=selectOption('French',$bahasa['bahasa'])?>>French</option>
                                        <option value="Georgian" data-tokens="Georgian"<?=selectOption('Afrikanns',$bahasa['bahasa'])?>>Georgian</option>
                                        <option value="German" data-tokens="German"<?=selectOption('German',$bahasa['bahasa'])?>>German</option>
                                        <option value="Greek" data-tokens="Greek"<?=selectOption('Greek',$bahasa['bahasa'])?>>Greek</option>
                                        <option value="Gujarati" data-tokens="Gujarati"<?=selectOption('Gujarati',$bahasa['bahasa'])?>>Gujarati</option>
                                        <option value="Hebrew" data-tokens="Hebrew"<?=selectOption('Hebrew',$bahasa['bahasa'])?>>Hebrew</option>
                                        <option value="Hindi" data-tokens="Hindi"<?=selectOption('Hindi',$bahasa['bahasa'])?>>Hindi</option>
                                        <option value="Hungarian" data-tokens="Hungarian"<?=selectOption('Hungarian',$bahasa['bahasa'])?>>Hungarian</option>
                                        <option value="Icelandic" data-tokens="Icelandic"<?=selectOption('Icelandic',$bahasa['bahasa'])?>>Icelandic</option>
                                        <option value="Indonesian" data-tokens="Indonesian"<?=selectOption('Indonesian',$bahasa['bahasa'])?>>Indonesian</option>
                                        <option value="Irish" data-tokens="Irish"<?=selectOption('Irish',$bahasa['bahasa'])?>>Irish</option>
                                        <option value="Italian" data-tokens="Italian"<?=selectOption('Italian',$bahasa['bahasa'])?>>Italian</option>
                                        <option value="Japanese" data-tokens="Japanese"<?=selectOption('Japanese',$bahasa['bahasa'])?>>Japanese</option>
                                        <option value="Javanese"  data-tokens="Javanese"<?=selectOption('Javanese',$bahasa['bahasa'])?>>Javanese</option>
                                        <option value="Korean" data-tokens="Korean"<?=selectOption('Korean',$bahasa['bahasa'])?>>Korean</option>
                                        <option value="Latin"  data-tokens="Latin"<?=selectOption('Latin',$bahasa['bahasa'])?>>Latin</option>
                                        <option value="Latvian" data-tokens="Latvian"<?=selectOption('Latvian',$bahasa['bahasa'])?>>Latvian</option>
                                        <option value="Lithuanian" data-tokens="Lithuanian"<?=selectOption('Lithuanian',$bahasa['bahasa'])?>>Lithuanian</option>
                                        <option value="Macedonian" data-tokens="Macedonian"<?=selectOption('Macedonian',$bahasa['bahasa'])?>>Macedonian</option>
                                        <option value="Malay" data-tokens="Malay"<?=selectOption('Malay',$bahasa['bahasa'])?>>Malay</option>
                                        <option value="Malayalam" data-tokens="Malayalam"<?=selectOption('Malayalam',$bahasa['bahasa'])?>>Malayalam</option>
                                        <option value="Maltese" data-tokens="Maltese"<?=selectOption('Maltese',$bahasa['bahasa'])?>>Maltese</option>
                                        <option value="Maori"  data-tokens="Maori"<?=selectOption('Maori',$bahasa['bahasa'])?>>Maori</option>
                                        <option value="Marathi"  data-tokens="Marathi"<?=selectOption('Marathi',$bahasa['bahasa'])?>>Marathi</option>
                                        <option value="Mongolian" data-tokens="Mongolian"<?=selectOption('Mongolian',$bahasa['bahasa'])?>>Mongolian</option>
                                        <option value="Nepali" data-tokens="Nepali"<?=selectOption('Nepali',$bahasa['bahasa'])?>>Nepali</option>
                                        <option value="Norwegian" data-tokens="Norwegian"<?=selectOption('Norwegian',$bahasa['bahasa'])?>>Norwegian</option>
                                        <option value="Persian" data-tokens="Persija"<?=selectOption('Persija',$bahasa['bahasa'])?>>Persian</option>
                                        <option value="Polish" data-tokens="Polish"<?=selectOption('Polish',$bahasa['bahasa'])?>>Polish</option>
                                        <option value="Portuguese" data-tokens="Portuguese"<?=selectOption('Portuguese',$bahasa['bahasa'])?>>Portuguese</option>
                                        <option value="Punjabi" data-tokens="Punjabi"<?=selectOption('Punjabi',$bahasa['bahasa'])?>>Punjabi</option>
                                        <option value="Quechua" data-tokens="Quechua"<?=selectOption('Quechua',$bahasa['bahasa'])?>>Quechua</option>
                                        <option value="Romanian" data-tokens="Romanian"<?=selectOption('Romanian',$bahasa['bahasa'])?>>Romanian</option>
                                        <option value="Russian" data-tokens="Russian"<?=selectOption('Russian',$bahasa['bahasa'])?>>Russian</option>
                                        <option value="Samoan" data-tokens="Samoan"<?=selectOption('Samoan',$bahasa['bahasa'])?>>Samoan</option>
                                        <option value="Serbian" data-tokens="Serbian"<?=selectOption('Serbian',$bahasa['bahasa'])?>>Serbian</option>
                                        <option value="Slovak"  data-tokens="Slovak"<?=selectOption('Slovak',$bahasa['bahasa'])?>>Slovak</option>
                                        <option value="Slovenian" data-tokens="Slovenian"<?=selectOption('Slovenian',$bahasa['bahasa'])?>>Slovenian</option>
                                        <option value="Spanish" data-tokens="Spanish"<?=selectOption('Spanish',$bahasa['bahasa'])?>>Spanish</option>
                                        <option value="Swahili" data-tokens="Swahili"<?=selectOption('Swahili',$bahasa['bahasa'])?>>Swahili</option>
                                        <option value="Swedish " data-tokens="Swedish"<?=selectOption('Swedish',$bahasa['bahasa'])?>>Swedish </option>
                                        <option value="Tamil" data-tokens="Tamil"<?=selectOption('Tamil',$bahasa['bahasa'])?>>Tamil</option>
                                        <option value="Tatar" data-tokens="Tatar"<?=selectOption('Tatar',$bahasa['bahasa'])?>>Tatar</option>
                                        <option value="Telugu" data-tokens="Telugu"<?=selectOption('Telugu',$bahasa['bahasa'])?>>Telugu</option>
                                        <option value="Thai" data-tokens="Thai"<?=selectOption('Thai',$bahasa['bahasa'])?>>Thai</option>
                                        <option value="Tibetan" data-tokens="Tibetan"<?=selectOption('Tibetan',$bahasa['bahasa'])?>>Tibetan</option>
                                        <option value="Tonga" data-tokens="Tonga"<?=selectOption('Tonga',$bahasa['bahasa'])?>>Tonga</option>
                                        <option value="Turkish" data-tokens="Turkish"<?=selectOption('Turkish',$bahasa['bahasa'])?>>Turkish</option>
                                        <option value="Ukranian" data-tokens="Ukranian"<?=selectOption('Ukranian',$bahasa['bahasa'])?>>Ukranian</option>
                                        <option value="Urdu" data-tokens="Urdu"<?=selectOption('Urdu',$bahasa['bahasa'])?>>Urdu</option>
                                        <option value="Uzbek" data-tokens="Uzbek"<?=selectOption('Uzbek',$bahasa['bahasa'])?>>Uzbek</option>
                                        <option value="Vietnamese" data-tokens="Vietnamese"<?=selectOption('Vietnamese',$bahasa['bahasa'])?>>Vietnamese</option>
                                        <option value="Welsh" data-tokens="Welsh"<?=selectOption('Welsh',$bahasa['bahasa'])?>>Welsh</option>
                                        <option value="Xhosa" data-tokens="Xhosa"<?=selectOption('Xhosa',$bahasa['bahasa'])?>>Xhosa</option>  
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
                                        <label class="btn btn-primary mb-0 mr-3  <?= activeOption('Pasif',$bahasa['kemampuan_bahasa'])?>">
                                            <span class="btn-label"><i class="fa fa-volume-up"></i></span>
                                            <input type="radio" name="kemampuan_bahasa" id="option1" autocomplete="off" value="Pasif"  <?= checkOption('Pasif',$bahasa['kemampuan_bahasa'])?>> Pasif
                                        </label>
                                        <label class="btn btn-primary mb-0 <?= activeOption('Aktif',$bahasa['kemampuan_bahasa'])?>" >
                                            <span class="btn-label"><i class="fa fa-wechat" ></i></span>
                                            <input type="radio" name="kemampuan_bahasa" id="option2" autocomplete="off" value="Aktif"  <?= checkOption('Aktif',$bahasa['kemampuan_bahasa'])?>> Aktif
                                        </label>
                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('kemampuan_bahasa'); ?>
                                    </small>
                                </div>
                            </div>

                           
                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$bahasa['nip']?>/bahasa/bahasa">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Ubah
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
