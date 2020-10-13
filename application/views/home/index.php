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
            <h1 class="main-title float-left">Dashboard</h1>
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <div class="row">

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 divPegawai" data-id='all'>
          <div class="card-box noradius noborder bg-info">
            <i class="fa fa-user-o float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Pegawai</h6>
            <h1 class="m-b-20 text-white counter"><?= $countPegawai; ?></h1>
            <span class="text-white">.</span>
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 divPegawai" data-id='pns'>
          <div class="card-box noradius noborder bg-warning">
            <i class="fa fa-user-o float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Pegawai PNS</h6>
            <h1 class="m-b-20 text-white counter"><?= $countPns; ?></h1>
            <span class="text-white">.</span>
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 divPegawai" data-id='nonpns'>
          <div class="card-box noradius noborder bg-success">
            <i class="fa fa-user-o float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Pegawai NON PNS</h6>
            <h1 class="m-b-20 text-white counter"><?= $countBlu; ?></h1>
            <span class="text-white">.</span>
          </div>
        </div>

        <!--<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3  divPegawai" data-id='nonaktif'>
          <div class="card-box noradius noborder bg-info">
            <i class="fa fa-user-o float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">NON AKtif</h6>
            <h1 class="m-b-20 text-white counter"><?= $countNonAktif; ?></h1>
            <span class="text-white">.</span>
          </div>
        </div> -->

      </div>

      <!-- end row -->
<!--
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
          <div class="card mb-3">
            <div class="card-header mb-0 ">
              <h3><i class="fa fa-line-chart"></i> Rekapitulasi</h3>
              <div class="row mb-0">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                  <div class="form-group mt-1 mb-0">
                    <button class="btn btn-sm btn-success tipeChart mb-0" data-id="pie">
                      <i class="fa fa-pie-chart"></i>
                    </button>
                    <button class="btn btn-sm btn-warning tipeChart mb-0" data-id="bar">
                      <i class="fa fa-bar-chart"></i>
                    </button>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <div class="form-group mt-1 mb-0">
                    <select class="form-control form-control-sm mb-0" id="data_url">
                      <option value="user">User</option>
                      <option value="golongan">Golongan</option>
                      <option value="pendidikan">Pendidikan</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body mt-0">
              <canvas id="lineChart" width="300" height="170"></canvas>
            </div>
          </div>  end card
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
          <div class="card mb-3">
            <div class="card-header mb-0 ">
              <h3><i class="fa fa-line-chart"></i> Rekapitulasi Fungsional
                <a class="btn btn-sm btn-success mb-0 float-right" href="<?= base_url(); ?>ExportExcel/exportPegawaiFungsional" data-id="pie">
                  <i class="fa fa-file-excel-o text-white"></i>
                </a>
              </h3>

            </div>

            <div class="card-body mt">
              <canvas id="lineChartt" width="300" height="130"></canvas>
            </div>
          </div> end card
        </div>

      </div>
-->
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
          <div class="card mb-3">
            <div class="card-header mb-0 ">
              <h3><i class="fa fa-list-alt"></i> List Pensiun</h3>
              <div class="row mb-0">
              </div>
            </div>

            <div class="card-body mt">
              <div class="tengah-form ">
                <div class="form-group mb-2 row">
                  <label for="col-sm-3 col-form-label col-form-label-sm">Pilih Periode</label>
                  <div class="col-md-6">
                    <select name="jenis_kelamin" id="selectPensiun" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                      <option value="0" selected>Tahun Ini</option>
                      <option value="1"> Tahun Ke Depan</option>
                      <option value="2">2 Tahun Ke Depan</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <a href="<?= base_url(); ?>ExportExcel/exportPegawaiPensiun" class="btn btn-sm btn-success" title="export Excel">
                      <i class="fa fa-file-excel-o"></i>
                    </a>
                  </div>
                </div>
              </div>
              <hr>


              <div id="Pensiun">
                <div class="list-group">



                </div>
              </div>

           <!-- </div>
          </div> 
        </div>  -->

      <!--
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
          <div class="card mb-3">
            <div class="card-header mb-0 ">
              <div class="row">
                <div class="col-sm-10">
                  <h3><i class="fa fa-line-chart"></i> Penggunaan Kapasitas Server
                  </h3>
                </div>
              </div>
            </div>

            <div class="card-body mt ">
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
                <div class="col-sm-4">
                  <div class="kard p-1" style="height:auto;">
                    <div class="row">
                      <div class="col-sm-4 m-0" style="font-size:12px">Free</div>
                      <div class="col-sm-7 m-0" style="font-size:12px"><?= $free ?>&nbsp;GB</div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 m-0" style="font-size:12px">Used</div>
                      <div class="col-sm-7 m-0" style="font-size:12px"><?= $used ?>&nbsp;GB</div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 m-0" style="font-size:12px">Total</div>
                      <div class="col-sm-5 m-0" style="font-size:12px"><?= $total ?>&nbsp;GB</div>
                      <div class="col-sm-2">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-success" data-toggle="dropdown">
                          </a>
                          <div class="dropdown-menu p-2 shadow-sm">
                            <div class="form-group m-0">
                              <form action="<?= base_url() ?>Dashboard/updateKapasitasServer" method="post">
                                <label for="" class="col-form-label-sm col-form-label" style="font-size:12px">Update Kapasitas</label>
                                <input type="text" class="form-control-sm form-control m-0" name="kapasitas">
                                <small id="passwordHelpBlock" class="form-text text-danger m-0" style="font-size:10px">
                                  satuan GB
                                </small>
                                <button type="submit" class="btn btn-sm btn-primary m-0" style="height:20px; font-size:10px">Update</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <div class="col-sm-8">
                  <canvas id="lineCharttt" width="0" height="0"></canvas>

                </div>
              </div>
            </div>
          </div>

<!--
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <div class="card mb-3 ">
            <div class="card-header mb-0 ">
              <div class="row">
                <div class="col-md-5">
                  <h3><i class="fa fa-list-alt"></i> List Pelatihan Tahun</h3>
                </div>
                <div class="col-md-3">
                  <select name="" id="selectTahunPelatihan" class="form-control form-control-sm float-right mb-0">
                    <option value="<?= $tahun ?>"><?= $tahun ?></option>
                    <option value="<?= $tahun1 ?>"><?= $tahun1 ?></option>
                    <option value="<?= $tahun2 ?>"><?= $tahun2 ?></option>
                  </select>
                </div>
              </div>
              <div class="row mb-0">
              </div>
            </div>

            <div class="card-body mt p-2">
              <a id="exportPelatihan" href="<?= base_url(); ?>ExportExcel/exportPegawaiPelatihan/<?= $tahun ?>" class="btn btn-sm btn-success float-right" title="export Excel">
                <i class="fa fa-file-excel-o"></i>
              </a>
              <table id="tablePelatihan" class="table table-bordered table-responsive-md table-hover display mt-1">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pelatihan</th>
                  </tr>
                </thead>
                <tbody id="Pelatihan">
                  <?php foreach ($pelatihan as $row) : ?>
                  <tr>
                    <td onclick="window.location=base_url+'Profile/index/<?= $row['nip'] ?>'"><?= $row['nama']; ?></td>
                    <td onclick="window.location=base_url+'Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_diklat']; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div> end card
        </div> 
-->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
          <div class="card mb-3">
            <div class="card-header mb-0 ">
              <div class="row mb-0">
                <div class="col-sm-3">
                  <h3><i class="fa fa-list-alt"></i> List Ultah</h3>
                </div>
                <div class="col-md-4">
                  <select name="tanggal" id="selectUltah" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                    <option value="<?= $tanggal ?>" selected>Bulan Ini</option>
                    <option value="<?= $tanggal1 ?>"> Bulan Esok</option>
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
    <!-- end row -->

    <!-- modal -->
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

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Counter-Up-->
<script src="<?= base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>
<script>
  var canvas3 = document.getElementById("lineCharttt");
  var ctx3 = canvas3.getContext('2d');
  var canvas2 = document.getElementById("lineChartt");
  var ctx2 = canvas2.getContext('2d');
  var canvas = document.getElementById("lineChart");
  var ctx = canvas.getContext('2d');
  // We are only changing the chart type, so let's make that a global variable along with the chart object:
  var chartType = 'bar';
  var myBarChart;

  var data_url = document.getElementById('data_url');
  data_url.onchange = function() {
    if (myBarChart) {
      myBarChart.destroy();
    }
    if (data_url.value == 'user') {
      var url = base_url + 'Dashboard/getUserJson';
      var judul = 'User';
    } else if (data_url.value == 'golongan') {
      var url = base_url + 'Dashboard/getPangkatCountJson';
      var judul = 'Golongan';
    } else if (data_url.value == 'pendidikan') {
      var url = base_url + 'Dashboard/getPendidikanCountJson';
      var judul = 'Pendidikan';
    }


    var jsonData = $.ajax({
      url: url,
      dataType: 'json',
    }).done(function(results) {

      // Split timestamp and data into separate arrays
      var labels = [],
        data = [];
      results.forEach(function(packet) {
        labels.push(packet.label);
        data.push(parseFloat(packet.count));
      });


      // Global Options:
      Chart.defaults.global.defaultFontColor = 'grey';
      Chart.defaults.global.defaultFontSize = 12;

      var data = {
        labels: labels,
        datasets: [{
          label: 'Jumlah',
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(0,255,0,0.4)",
          borderColor: "white", // The main line color
          borderCapStyle: 'square',
          pointBorderColor: "white",
          pointBackgroundColor: "green",
          pointBorderWidth: 1,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: "yellow",
          pointHoverBorderColor: "green",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: data,
          spanGaps: true,
          backgroundColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(252,195,195,1)',
            'rgba(191, 63, 63,1)',
            'rgba(232, 200, 134,1)',
            'rgba(201,196,238,1)',
            'rgba(246,240,138,1)',
            'rgba(5, 73, 132, 0.66)',
            'rgba(213,223,249,1)',
            'rgba(109, 242, 173,1)'
          ],
        }]
      };

      // Notice the scaleLabel at the same level as Ticks
      var options = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          fontSize: 18,
          display: true,
          text: judul,
          position: 'bottom'
        }
      };

      // We add an init function down here after the chart options are declared.

      init('bar');

      function init(chartType) {
        // Chart declaration:
        myBarChart = new Chart(ctx, {
          type: chartType,
          data: data,
          options: options
        });

        canvas.onclick = function(evt) {

          $("#tableRekap").html('<div></div>');
          $('#tableRekap').addClass("d-none");

          var activePoints = myBarChart.getElementsAtEvent(evt);
          if (activePoints[0]) {
            var chartData = activePoints[0]['_chart'].config.data;
            var idx = activePoints[0]['_index'];

            var label = chartData.labels[idx];
            var value = chartData.datasets[0].data[idx];

            if (judul == 'Pendidikan') {
              var urlModal = base_url + 'Dashboard/getPendidikanPegawaijson'
            } else if (judul == 'Golongan') {
              var urlModal = base_url + 'Dashboard/getPangkatPegawaijson'
            }

            $.ajax({
              url: urlModal,
              data: {
                label: label
              },
              method: 'post',
              dataType: 'json',
              success: function(data) {
                if (data) {
                  var len = data.length;
                  var txt = "";
                  if (len > 0) {
                    for (var i = 0; i < len; i++) {
                      txt += `
                                    <li class="w3-bar p-0 bg-white"  onclick="window.location='` + base_url + `Profile/index/` + data[i].nip + `'">
                                      <img src="` + base_url + `upload/foto/profile/` + data[i].foto + `" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                      <div class="w3-bar-item">
                                        <span class="w3-medium">` + data[i].nama + `</span><br>
                                        <span>` + data[i].nm_jabatan + `</span>
                                      </div>
                                    </li>
                              `;
                    }
                    if (txt != "") {
                      $("#tableRekap").append(txt);
                      $('#tableRekap').removeClass("d-none");
                    }
                  } else {
                    $("#tableRekap").html('<div></div>');
                    $('#tableRekap').addClass("d-none");
                  }
                }
              }
            })


            $('#tableModal').modal('show');

          }
        };
      }

      // var type = document.getElementById('type');
      $('.tipeChart').on('click', function() {
        const type = $(this).data('id');
        if (type == 'pie') {
          options = "undefined";
        } else {
          options = {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            },
            title: {
              fontSize: 18,
              display: true,
              text: judul,
              position: 'bottom'
            }
          };

        }
        //destroy chart:
        myBarChart.destroy();
        //change chart type: 
        //restart chart:
        init(type);
      });

      // type.onchange = function(){

      //   if (type.value=='pie'){
      //     options="undefined";
      //   }
      //   else{
      //   options = {
      //   scales: {
      //     yAxes: [{
      //       ticks: {
      //         beginAtZero: true
      //       }
      //     }]
      //   },
      //   title: {
      //     fontSize: 18,
      //     display: true,
      //     text: 'Belum Fix!',
      //     position: 'bottom'
      //   }
      // };

      //   }
      //   //destroy chart:
      //   myBarChart.destroy();
      //   //change chart type: 
      //   //restart chart:
      //   init(type.value);
      // };

    });

  };






  //////////////test

  // var chartType = window.document.getElementById('type');
  // type.onchange = function(){
  // 	myBarChart.destroy();
  // 	this.chartType = (this.chartType == 'bar') ? 'line' : 'bar';	
  // init();	
  // };
  // chartType.onchange();
</script>

<script>
  // $body = $("body");

  // $(document).on({
  // 	ajaxStart: function () {
  // 		$body.addClass("loading");
  // 	},
  // 	ajaxStop: function () {
  // 		$body.removeClass("loading");
  // 	}
  // });

  var base_url = '<?= base_url(); ?>';
  $(document).ready(function() {
    // data-tables

    $('#example1').DataTable();
    var tablePelatihan = $('#tablePelatihan').DataTable();
    // data-tables
    $('#example2').DataTable();
    $('#example3').DataTable();


    $('#selectTahunPelatihan').on('change', function() {
      tablePelatihan.clear().draw();
      var tahun = this.value;
      $('#exportPelatihan').attr('href', base_url + 'ExportExcel/exportPegawaiPelatihan/' + tahun);

      $.ajax({
        url: base_url + 'Dashboard/getPelatihanTahun',
        data: {
          tahun: tahun
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          if (data) {
            var len = data.length;
            if (len > 0) {
              for (var i = 0; i < len; i++) {
                tablePelatihan.row.add([
                  data[i].nama, data[i].nama_diklat
                ]).draw(false);
              }
            }
          }
        }
      })
    });



    // Global Options:
    Chart.defaults.global.defaultFontColor = 'grey';
    Chart.defaults.global.defaultFontSize = 12;

    var data = {
      labels: ['Used', 'Free'],
      datasets: [{
        label: 'Jumlah',
        fill: true,
        lineTension: 0.1,
        backgroundColor: "rgba(0,255,0,0.4)",
        borderColor: "white", // The main line color
        borderCapStyle: 'square',
        pointBorderColor: "white",
        pointBackgroundColor: "green",
        pointBorderWidth: 1,
        pointHoverRadius: 8,
        pointHoverBackgroundColor: "yellow",
        pointHoverBorderColor: "green",
        pointHoverBorderWidth: 2,
        pointRadius: 4,
        pointHitRadius: 10,
        data: ['<?= $used ?>', '<?= $free ?>'],
        spanGaps: true,
        backgroundColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(252,195,195,1)',
          'rgba(191, 63, 63,1)',
          'rgba(232, 200, 134,1)',
          'rgba(201,196,238,1)',
          'rgba(246,240,138,1)',
          'rgba(5, 73, 132, 0.66)',
          'rgba(213,223,249,1)',
          'rgba(109, 242, 173,1)'
        ],
      }]
    };

    // Notice the scaleLabel at the same level as Ticks
    var options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      title: {
        fontSize: 18,
        display: true,
        text: 'User',
        position: 'bottom'
      }
    };

    // We add an init function down here after the chart options are declared.

    init('doughnut');

    function init(chartType) {
      // Chart declaration:
      myBarChartt = new Chart(ctx3, {
        type: chartType,
        data: data,
        options: "undefined"
      });


    }


    // var type = document.getElementById('type');


    var jsonData = $.ajax({
      url: base_url + 'Dashboard/getFungsionalCountJson',
      dataType: 'json',
    }).done(function(results) {

      // Split timestamp and data into separate arrays
      var labels = [],
        data = [];
      results.forEach(function(packet) {
        labels.push(packet.label);
        data.push(parseFloat(packet.count));
      });


      // Global Options:
      Chart.defaults.global.defaultFontColor = 'grey';
      Chart.defaults.global.defaultFontSize = 12;

      var data = {
        labels: labels,
        datasets: [{
          label: 'Jumlah',
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(0,255,0,0.4)",
          borderColor: "white", // The main line color
          borderCapStyle: 'square',
          pointBorderColor: "white",
          pointBackgroundColor: "green",
          pointBorderWidth: 1,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: "yellow",
          pointHoverBorderColor: "green",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: data,
          spanGaps: true,
          backgroundColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(252,195,195,1)',
            'rgba(191, 63, 63,1)',
            'rgba(232, 200, 134,1)',
            'rgba(201,196,238,1)',
            'rgba(246,240,138,1)',
            'rgba(5, 73, 132, 0.66)',
            'rgba(213,223,249,1)',
            'rgba(109, 242, 173,1)'
          ],
        }]
      };

      // Notice the scaleLabel at the same level as Ticks
      var options = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          fontSize: 18,
          display: true,
          text: 'User',
          position: 'bottom'
        }
      };

      // We add an init function down here after the chart options are declared.

      init('pie');

      function init(chartType) {
        // Chart declaration:
        myBarChartt = new Chart(ctx2, {
          type: chartType,
          data: data,
          options: "undefined"
        });


      }


      // var type = document.getElementById('type');

    });

    //fungsional
    var jsonData = $.ajax({
      url: base_url + 'Dashboard/getUserJson',
      dataType: 'json',
    }).done(function(results) {

      // Split timestamp and data into separate arrays
      var labels = [],
        data = [];
      results.forEach(function(packet) {
        labels.push(packet.label);
        data.push(parseFloat(packet.count));
      });


      // Global Options:
      Chart.defaults.global.defaultFontColor = 'grey';
      Chart.defaults.global.defaultFontSize = 12;

      var data = {
        labels: labels,
        datasets: [{
          label: 'Jumlah',
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(0,255,0,0.4)",
          borderColor: "white", // The main line color
          borderCapStyle: 'square',
          pointBorderColor: "white",
          pointBackgroundColor: "green",
          pointBorderWidth: 1,
          pointHoverRadius: 8,
          pointHoverBackgroundColor: "yellow",
          pointHoverBorderColor: "green",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: data,
          spanGaps: true,
          backgroundColor: [
            'rgba(255,99,132,1)', //1
            'rgba(54, 162, 235, 1)', //2
            'rgba(255, 206, 86, 1)', //3
            'rgba(75, 192, 192, 1)', //4
            'rgba(153, 102, 255, 1)', //5
            'rgba(255, 159, 64, 1)', //6
            'rgba(252,195,195,1)', //7
            'rgba(191, 63, 63,1)', //8
            'rgba(232, 200, 134,1)', //9
            'rgba(201,196,238,1)', //10
            'rgba(246,240,138,1)', //11
            'rgba(5, 73, 132, 0.66)', //12
            'rgba(213,223,249,1)', //13
            'rgba(109, 242, 173,1)' //14
          ],
        }]
      };

      // Notice the scaleLabel at the same level as Ticks
      var options = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          fontSize: 18,
          display: true,
          text: 'User',
          position: 'bottom'
        }
      };

      // We add an init function down here after the chart options are declared.

      init('bar');

      function init(chartType) {
        // Chart declaration:
        myBarChart = new Chart(ctx, {
          type: chartType,
          data: data,
          options: options
        });


      }


      // var type = document.getElementById('type');p
      $('.tipeChart').on('click', function() {
        const type = $(this).data('id');
        if (type == 'pie') {
          options = "undefined";
        } else {
          options = {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            },
            title: {
              fontSize: 18,
              display: true,
              text: 'User',
              position: 'bottom'
            }
          };

        }
        //destroy chart:
        myBarChart.destroy();
        //change chart type: 
        //restart chart:
        init(type);
      });

    });

    var periode = "0";

    $.ajax({
      url: base_url + 'Dashboard/getpensiunjson',
      data: {
        periode: periode
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        if (data) {
          var len = data.length;
          var txt = "";
          if (len > 0) {
            for (var i = 0; i < len; i++) {
              txt += `
                              <a href=` + base_url + `"Profile/index/` + data[i].nip + `" class="list-group-item pensi list-group-item-action p-2">
								
										<div class="row mb-0 p-0">
											<div class="col-md-8">
												<p class="m-0">` + data[i].nama + `</p>
											</div>
											<div class="col-md-4">
												<p class="m-0">` + data[i].pensiun + `</p>
											</div>
										</div>
										<div class="row mb-0 p-0">
											<div class="col-md-8">
												<p class="m-0">` + data[i].nm_jabatan + `</p>
											</div>
                      <div class="col-md-4">
                        <p class="m-0">` + data[i].count + `</p>
                      </div>
										</div>
								</a>
                              `;
            }
            if (txt != "") {
              $("#Pensiun").append(txt);
              $('#Pensiun').removeClass("d-none");
            }
          } else {
            $('#Pensiun').removeClass("d-none");
            if (periode == '0') {
              $("#Pensiun").html(`
                      <div class="row mt-1 mr-1 ml-1 fadeIn animated">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                tidak ada yang pensiun dalam tahun ini  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                      `);
            } else {
              $("#Pensiun").html(`
                      <div class="row mt-1 mr-1 ml-1 fadeIn animated">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                tidak ada yang pensiun dalam ` + periode + ` tahun ke depan  
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

    $('#selectPensiun').change(function() {

      $("#Pensiun").html('<div></div>');
      $('#Pensiun').addClass("d-none");
      const periode = $(this).children("option:selected").val();

      $.ajax({
        url: base_url + 'Dashboard/getpensiunjson',
        data: {
          periode: periode
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          if (data) {
            var len = data.length;
            var txt = "";
            if (len > 0) {
              for (var i = 0; i < len; i++) {
                txt += `
                              <a href="` + base_url + `Profile/index/` + data[i].nip + `" class="list-group-item pensi list-group-item-action p-2">
						
										<div class="row">
											<div class="col-md-8">
												<p class="m-0">` + data[i].nama + `</p>
											</div>
											<div class="col-md-4">
												<p class="m-0">` + data[i].pensiun + `</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
												<p class="m-0">` + data[i].nm_jabatan + `</p>
											</div>
                      <div class="col-md-4">
                        <p class="m-0">` + data[i].count + `</p>
                      </div>
										</div>
								</a>
                              `;
              }
              if (txt != "") {
                $("#Pensiun").append(txt);
                $('#Pensiun').removeClass("d-none");
              }
            } else {

              $('#Pensiun').removeClass("d-none");
              if (periode == '0') {
                $("#Pensiun").html(`
                      <div class="row mt-1 mr-1 ml-1">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                tidak ada yang pensiun dalam tahun ini  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                      `);
              } else {
                $("#Pensiun").html(`
                      <div class="row mt-1 mr-1 ml-1">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                tidak ada yang pensiun dalam ` + periode + ` tahun ke depan  
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


  });

  // $('.hrefProfile').on('click',function(){
  //   const nip = $(this).data('nip');
  //   window.location.href=base_url+"Profile/index/"+nip;
  // });
</script>
<script>
  var tanggal = '<?= $tanggal ?>';
  $.ajax({
    url: base_url + 'Dashboard/getUltahPegawai',
    data: {
      tanggal: tanggal
    },
    method: 'post',
    dataType: 'json',
    success: function(data) {
      if (data) {
        var len = data.length;
        var txt = "";
        if (len > 0) {
          for (var i = 0; i < len; i++) {
            txt += `
                              <li class="w3-bar p-0 bg-white"  onclick="window.location='` + base_url + `Profile/index/` + data[i].nip + `'">
                                <img src="` + base_url + `upload/foto/profile/` + data[i].foto + `" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">` + data[i].nama + `</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">` + data[i].tanggal_lahir + `</span>
                                    </div>
                                  </div>
                                  <span>` + data[i].nm_jabatan + `</span>
                              </li>
                              `;
          }
          if (txt != "") {
            $("#Ultah").append(txt);
            $('#Ultah').removeClass("d-none");
          }
        } else {
          $('#Ultah').removeClass("d-none");
          if (tanggal == '0') {
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
          } else {
            $("#Ultah").html(`
                      <div class="row  fadeIn animated">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                tidak ada yang ultah di bulan ` + tanggal + `  
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

  $('#selectUltah').change(function() {

    $("#Ultah").html('<div></div>');
    $('#Ultah').addClass("d-none");
    const tanggal = $(this).children("option:selected").val();

    $.ajax({
      url: base_url + 'Dashboard/getUltahPegawai',
      data: {
        tanggal: tanggal
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        if (data) {
          var len = data.length;
          var txt = "";
          if (len > 0) {
            for (var i = 0; i < len; i++) {
              txt += `
                              <li class="w3-bar p-0 bg-white"  onclick="window.location='` + base_url + `Profile/index/` + data[i].nip + `'">
                                <img src="` + base_url + `upload/foto/profile/` + data[i].foto + `" class="w3-bar-item  avatar-rounded w3-hide-small" style="width:75px;height:60px">
                                <div class="w3-bar-item" style="width:80%">
                                  <div class="row">
                                    <div class="col-sm-8">
                                       <span class="w3-medium">` + data[i].nama + `</span>
                                    </div>
                                    <div class="col-sm-4">
                                       <span class="w3-small">` + data[i].tanggal_lahir + `</span>
                                    </div>
                                  </div>
                                  <span>` + data[i].nm_jabatan + `</span>
                                </div>
                              </li>
                              `;
            }
            if (txt != "") {
              $("#Ultah").append(txt);
              $('#Ultah').removeClass("d-none");
            }
          } else {

            $('#Ultah').removeClass("d-none");
            if (tanggal == '0') {
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
            } else {
              $("#Ultah").html(`
                      <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                tidak ada yang ultah di bulan ` + tanggal + `  
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
</script>

<!-- END Java Script for this page -->
<script>
  $('.divPegawai').on('click', function() {
    var tab = $(this).data('id');
    var base_url = '<?= base_url(); ?>';
    $('#tabLinkPns').trigger('click');
    // window.location.replace(base_url+"DataPegawai/index/pns");
    window.location.href = base_url + "DataPegawai/index/" + tab;
  });
  $('.counter').counterUp({
    delay: 10,
    time: 600
  });
</script>
</body>

</html>