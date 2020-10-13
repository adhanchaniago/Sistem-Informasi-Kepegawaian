
<div class="content-page">

<!-- Start content -->
<div class="content">

    <div class="container-fluid">
        <div class="row">
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
                <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">asd</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">a</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li> <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">asd</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">a</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li> <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">asd</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">a</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li> <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">asd</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">a</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li> <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">asd</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">a</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li> <li class="w3-bar p-0 bg-white"  onclick="window.location='`+base_url+`Profile/index/`+data[i].nip+`'">
                                <img src="`+base_url+`upload/foto/profile/`+data[i].foto+`" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">asd</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">a</span>
                                    </div>
                                  </div>
                                  <span>`+data[i].nm_jabatan+`</span>
                              </li>
                </ul>
              </div>
            </div>
              
         

            </div>
          </div><!-- end card-->
        </div>
        </div>
    </div>    

</div>    
</div>    

<footer class="footer">
</footer>

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

<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/list/paginathing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){

    $('.w3-ul').paginathing({
      perPage: 5,
      limitPagination: 9,
      containerClass: 'w3-container',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
</script>