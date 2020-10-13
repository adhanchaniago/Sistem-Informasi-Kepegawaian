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
<script src="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert.js"></script>


<script>
	$(document).ready(function() {
		// data-tables
		$('#example1').DataTable();
		// data-tables
		$('#example2').DataTable();
		$('#example3').DataTable();
		$('#tablePensiun').DataTable();
		$('#tablePns').DataTable();
		$('#tableNonPns').DataTable();
		$('#tableCpns').DataTable();
		$('#tableCdtn').DataTable();
		$('#tableTgsBljr').DataTable();
		$('#tablePensiunn').DataTable();
		$('#tableDipekerjakan').DataTable();
		$('#tableBerhenti').DataTable();
		$('#tableall').DataTable();

		// counter-up

	});


	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	function openLink(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontentt");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinkss");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("<?= $tablink ?>").click();
	document.getElementById("defaultOpens").click();

	// $('.hrefProfile').on('click',function(){
	//   const nip = $(this).data('nip');
	//   window.location.href="http://localhost/Humoris/Profile/index/"+nip;
	// });
</script>


<!-- END Java Script for this page -->

</body>

</html>