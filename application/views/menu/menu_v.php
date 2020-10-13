

<!-- top bar navigation -->

<!-- End Navigation -->


<!-- Left Sidebar -->
<!-- End Sidebar -->


<div class="content-page">

	<!-- Start content -->
	<div class="content">

		<div class="container-fluid">

			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Menu</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item active">Menu</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->

			<div class="row">
          <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
              <div class="row mb-2">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4 divPegawai" data-id='profil'>
                  <div class="kard">
                      <img src="<?=base_url();?>assets/logo/profile.png" height="120" width="300" class="kard-media" />
                      <div class="kard-details">
                          <h2 class="kard-head">Profil</h2>
                      </div>
                  </div>
                </div>
             
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4 divPegawai" data-id='password'>
                  <div class="kard">
                      <img src="<?=base_url();?>assets/logo/password.jpg"  class="kard-media" />
                      <div class="kard-details">
                          <h2 class="kard-head">Ubah Password</h2>
                        </div>
                  </div>
                </div>
              </div>
          </div>
		
			
			
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <div class="card mb-3">
            <div class="card-header mb-0 ">
              <div class="row mb-0">
                <div class="col-sm-3">
                  <h3><i class="fa fa-list-alt"></i> List Ultah</h3>
                </div>
                <div class="col-md-4">
                      <select name="tanggal" id="selectUltah" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                          <option  value="<?=$tanggal?>" selected>Bulan Ini</option>
                          <option  value="<?=$tanggal1?>"> Bulan Esok</option>
                      </select>
                </div>
              </div>
            </div>
            
            <div class="card-body mt">
              <div class="w3-container">
                <ul class="w3-ul w3-card-4 p-0" id="Ultah">
                </ul>
              </div>
            </div>
              
         

            </div>
          </div><!-- end card-->
        </div>
			</div>

  <div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="tableModal" aria-hidden="true">
        <div class="modal-dialog modal-md pulse animated" role="document">
        <div class="modal-content bg-secondary">
         <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="float-right mr-2 text-white">&times;</span>
        </button>
            <div class="modal-body "> 
           

            <div class="w3-container">
              <ul class="w3-ul w3-card-4" id="tableRekap">
              </ul>
            </div>

            </div>
        </div>
        </div>
    </div>
  <!-- endmodal -->

		</div>
		<!-- END container-fluid -->

	</div>
	<!-- END content -->

</div>
<!-- END content-page -->

<footer class="footer">


</footer>

<div class="modall"></div>
</div>


<script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/moment.min.js"></script>

<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<script src="<?= base_url(); ?>assets/js/detect.js"></script>
<script src="<?= base_url(); ?>assets/js/fastclick.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.blockUI.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="<?= base_url(); ?>assets/js/pikeadmin.js"></script>


<!-- Counter-Up-->
<script src="<?= base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert.js"></script>

<script>
var base_url = '<?=base_url()?>';
var tanggal = '<?=$tanggal?>';
$.ajax({
            url:base_url+'Menu/getUltahPegawai',
            data : {
                tanggal : tanggal
            },
            method: 'post',
            dataType:'json',
            success: function(data){
                if(data){
                  var len = data.length;
                  var txt = "";
                  if(len > 0){
                      for(var i=0;i<len;i++){
                              txt += `
                              <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">`+data[i].nama+`</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">`+data[i].tanggal_lahir+`</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li>
                              `;
                      }
                      if(txt != ""){
                          $("#Ultah").append(txt);
                          $('#Ultah').removeClass("d-none");
                      }
                  }
                  else{
                    $('#Ultah').removeClass("d-none");
                    if (tanggal=='0'){
                      $("#Ultah").html(`
                      <div class="row  fadeIn animated">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                tidak ada yang ultah bulan ini  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                      `);
                    } 
                    else {
                      $("#Ultah").html(`
                      <div class="row  fadeIn animated">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                tidak ada yang ultah di bulan `+tanggal+`  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                      `);
                    }
                  }
               }
            }
        })

      $('#selectUltah').change(function(){

        $("#Ultah").html('<div></div>');
        $('#Ultah').addClass("d-none");
        const tanggal = $(this).children("option:selected").val();

        $.ajax({
            url:base_url+'Menu/getUltahPegawai',
            data : {
                tanggal : tanggal
            },
            method: 'post',
            dataType:'json',
            success: function(data){
                if(data){
                  var len = data.length;
                  var txt = "";
                  if(len > 0){
                      for(var i=0;i<len;i++){
                              txt += `
                              <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">`+data[i].nama+`</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">`+data[i].tanggal_lahir+`</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                                </div>
                              </li>
                              `;
                      }
                      if(txt != ""){
                          $("#Ultah").append(txt);
                          $('#Ultah').removeClass("d-none");
                      }
                  }
                  else{
                    
                    $('#Ultah').removeClass("d-none");
                    if (tanggal=='0'){
                      $("#Ultah").html(`
                      <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                tidak ada yang ultah bulan ini  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                      `);
                    } 
                    else {
                      $("#Ultah").html(`
                      <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                tidak ada yang ultah di bulan `+tanggal+`  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                      `);
                    }

                  }
               }
            }
        })

      });
      
      
$('.divPegawai').on('click', function () {
  var sistem = $(this).data('id');
  var base_url = '<?=base_url();?>';  
  // window.location.replace(base_url+"DataPegawai/index/pns");
  if (sistem=='presensi'){

  }
  else if (sistem=='siadig'){
  window.location.href=base_url+"Profile/index/<?=$this->session->userdata('nip')?>";
  }
  else if (sistem=='password'){
  window.location.href=base_url+"Akun/ubahPassword/<?=$this->session->userdata('username')?>";
  }
  else if (sistem=='profil'){
  window.location.href=base_url+"Profile/index/<?=$this->session->userdata('nip')?>";
  }
});
</script>
</body>

</html>