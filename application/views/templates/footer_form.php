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

<!-- Counter-Up-->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- typehead -->

<script src="<?= base_url(); ?>assets/js/bootstrap3-typeahead.js"></script>
<script>
  $('.strukturalSelect').on('change', function() {
    var id = this.value;

    $.ajax({
      url: '<?= base_url() ?>Struktural/getStrukturalJson',
      method: 'post',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        if (data.nm_jabatan.includes("Staf") == true) {
          $('.eselonSelect').attr("hidden", true);
        } else {
          $('.eselonSelect').removeAttr('hidden');
        }
      }

    });
  });

  $('.suamiistri').click(function() {
    var jk = $(this).data('status');

    $('#formtglmenikah').removeClass("d-none");
    $('#anakke').addClass('d-none');
    console.log('asd');
    if (jk == 'Perempuan') {

      $('.jk_perempuan').prop('checked', true);
      $('#jkPerempuan').addClass('active');
    } else {
      $('.jk_laki').prop('checked', true);
      $('#jkLaki').addClass('active');
    }

  });

  $('.anak').click(function() {
    $('#formtglmenikah').addClass("d-none");
    $('#anakke').removeClass('d-none');
    $('#jkLaki').removeClass('active');
    $('#jkPerempuan').removeClass('active');
  })

  $('#selectTingkat').on('change', function() {
    if (this.value == "SD" || this.value == "SMP" || this.value == "SMA") {
      $('.hidePendidikan').hide();
    } else {
      $('.hidePendidikan').show();
    }
  });
</script>
<script>
  $('#filer_example2').filer({
    limit: 1,
    maxSize: 3,
    extensions: ['jpg', 'jpeg', 'png', 'pdf', 'psd'],
    changeInput: true,
    showThumbs: true,
    addMore: false
  });

  $(document).ready(function() {

    $('.selectpicker').selectpicker();
  });


  $(function() {
    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
  });
</script>
<script>
  function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete?");
    if (x)
      return true;
    else
      return false;
  }

  $.ajax({
    url: base_url + 'DataPegawai/getJabatanPelaksanaJSON',
    dataType: 'json',
    success: function(data) {
      $(".typeahead").typeahead({
        source: data,
        items: 8,
        menu: '<ul class="typeahead dropdown-menu" role="listbox"></ul>',
        item: '<li><a class="dropdown-item" href="#" role="option"></a></li>',
        headerHtml: '<li class="dropdown-header"></li>',
        headerDivider: '<li class="divider" role="separator"></li>',
        itemContentSelector: 'a',
        minLength: 1,
        scrollHeight: 0,
        autoSelect: true,
        afterSelect: $.noop,
        afterEmptySelect: $.noop,
        addItem: false,
        delay: 0,
      });
    }

  });
</script>
</body>

</html>