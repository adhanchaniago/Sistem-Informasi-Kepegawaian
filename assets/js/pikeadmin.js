var resizefunc = [];
var base_url = 'http://localhost/Humoris/';

$(document).ready(function () {
	$(function () {
		$(".nicescroll").niceScroll({
			cursorcolor: "#858586"
		});
	});
});


! function ($) {
	"use strict";

	var Sidemenu = function () {
		this.$body = $("body"),
			this.$openLeftBtn = $(".open-left"),
			this.$menuItem = $("#sidebar-menu a")
	};
	Sidemenu.prototype.openLeftBar = function () {
			$("#main").toggleClass("enlarged");
			$("#main").addClass("forced");

			if ($("#main").hasClass("enlarged") && $("body").hasClass("adminbody")) {
				$("body").removeClass("adminbody").addClass("adminbody-void");
			} else if (!$("#main").hasClass("enlarged") && $("body").hasClass("adminbody-void")) {
				$("body").removeClass("adminbody-void").addClass("adminbody");
			}

			if ($("#main").hasClass("enlarged")) {
				$(".left ul").removeAttr("style");
			} else {
				$(".subdrop").siblings("ul:first").show();
			}

		},
		//menu item click
		Sidemenu.prototype.menuItemClick = function (e) {
			if (!$("#main").hasClass("enlarged")) {
				if ($(this).parent().hasClass("submenu")) {

				}
				if (!$(this).hasClass("subdrop")) {
					// hide any open menus and remove all other classes
					$("ul", $(this).parents("ul:first")).slideUp(350);
					$("a", $(this).parents("ul:first")).removeClass("subdrop");
					$("#sidebar-menu .pull-right i").removeClass("md-remove").addClass("md-add");

					// open our new menu and add the open class
					$(this).next("ul").slideDown(350);
					$(this).addClass("subdrop");
					$(".pull-right i", $(this).parents(".submenu:last")).removeClass("md-add").addClass("md-remove");
					$(".pull-right i", $(this).siblings("ul")).removeClass("md-remove").addClass("md-add");
				} else if ($(this).hasClass("subdrop")) {
					$(this).removeClass("subdrop");
					$(this).next("ul").slideUp(350);
					$(".pull-right i", $(this).parent()).removeClass("md-remove").addClass("md-add");
				}
			}
		},

		//init sidemenu
		Sidemenu.prototype.init = function () {
			var $this = this;

			var ua = navigator.userAgent,
				event = (ua.match(/iP/i)) ? "touchstart" : "click";

			//bind on click
			this.$openLeftBtn.on(event, function (e) {
				e.stopPropagation();
				$this.openLeftBar();
			});

			// LEFT SIDE MAIN NAVIGATION
			$this.$menuItem.on(event, $this.menuItemClick);

			// NAVIGATION HIGHLIGHT & OPEN PARENT
			$("#sidebar-menu ul li.submenu a.active").parents("li:last").children("a:first").addClass("active").trigger("click");
		},

		//init Sidemenu
		$.Sidemenu = new Sidemenu, $.Sidemenu.Constructor = Sidemenu

}(window.jQuery),


//main app module
function ($) {
	"use strict";

	var App = function () {
		this.pageScrollElement = "html, body",
			this.$body = $("body")
	};

	//on doc load
	App.prototype.onDocReady = function (e) {
			FastClick.attach(document.body);
			resizefunc.push("changeptype");

			$('.animate-number').each(function () {
				$(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-duration")));
			});

			//RUN RESIZE ITEMS
			$(window).resize(debounce(resizeitems, 100));
			$("body").trigger("resize");

			// right side-bar toggle
			$('.right-bar-toggle').on('click', function (e) {

				$('#main').toggleClass('right-bar-enabled');
			});


		},
		//initilizing
		App.prototype.init = function () {
			var $this = this;
			$(document).ready($this.onDocReady);
			$.Sidemenu.init();
		},

		$.App = new App, $.App.Constructor = App

}(window.jQuery),

//initializing main application module
function ($) {
	"use strict";
	$.App.init();
}(window.jQuery);


function executeFunctionByName(functionName, context) {
	var args = [].slice.call(arguments).splice(2);
	var namespaces = functionName.split(".");
	var func = namespaces.pop();
	for (var i = 0; i < namespaces.length; i++) {
		context = context[namespaces[i]];
	}
	return context[func].apply(this, args);
}
var w, h, dw, dh;
var changeptype = function () {
	w = $(window).width();
	h = $(window).height();
	dw = $(document).width();
	dh = $(document).height();

	if (jQuery.browser.mobile === true) {
		$("body").addClass("mobile").removeClass("adminbody");
	}

	if (!$("#main").hasClass("forced")) {
		if (w > 990) {
			$("body").removeClass("smallscreen").addClass("widescreen");
			$("#main").removeClass("enlarged");
		} else {
			$("body").removeClass("widescreen").addClass("smallscreen");
			$("#main").addClass("enlarged");
			$(".left ul").removeAttr("style");
		}
		if ($("#main").hasClass("enlarged") && $("body").hasClass("adminbody")) {
			$("body").removeClass("adminbody").addClass("adminbody-void");
		} else if (!$("#main").hasClass("enlarged") && $("body").hasClass("adminbody-void")) {
			$("body").removeClass("adminbody-void").addClass("adminbody");
		}

	}

}


var debounce = function (func, wait, immediate) {
	var timeout, result;
	return function () {
		var context = this,
			args = arguments;
		var later = function () {
			timeout = null;
			if (!immediate) result = func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) result = func.apply(context, args);
		return result;
	};
}

function resizeitems() {
	if ($.isArray(resizefunc)) {
		for (i = 0; i < resizefunc.length; i++) {
			window[resizefunc[i]]();
		}
	}
}

$('.nav-link').filter(function () {
	return this.href == location.href
}).addClass('active').siblings().removeClass('active')
$('.nav-link').click(function () {
	$(this).addClass('active').siblings().removeClass('active')
})

$('.ResetModal').on('click', function () {
	const username = $(this).data('id');

	$.ajax({
		url: base_url + 'Datauser/getReset',
		data: {
			username: username
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#username').val(data.username);
			$('#outputUser').html("&nbsp;" + data.username + " ?");
		}

	})

});

$('.DeleteModal').on('click', function () {
	const username = $(this).data('id');

	$.ajax({
		url: base_url + 'Datauser/getReset',
		data: {
			username: username
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#usernamee').val(data.username);
			$('#outputUserr').html("&nbsp;" + data.username + " ?");
		}

	})

});

$('.DeletePegawaiModal').on('click', function () {
	const nip = $(this).data('id');

	$.ajax({
		url: base_url + 'DataPegawai/getPegawaiJson',
		data: {
			nip: nip
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#usernamee').val(data.nip);
			$('#outputUserr').html("&nbsp;" + data.nama + " ?");
		}

	})

});


$('.DeleteGolonganModal').on('click', function () {
	const id_riwayat = $(this).data('id');

	$.ajax({
		url: base_url + 'Pangkat/getPangkatPegawaiJson',
		data: {
			id_riwayat: id_riwayat
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#usernamee').val(data.id_riwayat);
			$('#nip').val(data.nip);
			$('#outputUserr').html("&nbsp;" + data.jenis_sk + " ?");
		}

	})

});

$('.DeleteFungsionalModal').on('click', function () {
	const id_fungsional = $(this).data('id');

	$.ajax({
		url: base_url + 'Fungsional/getFungsionalPegawaiJson',
		data: {
			id_fungsional: id_fungsional
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_fungsional').val(data.id_fungsional);
			$('#nipfungsional').val(data.nip);
		}

	})

});

$('.DeleteStrukturalModal').on('click', function () {
	const id_struktural = $(this).data('id');

	$.ajax({
		url: base_url + 'Struktural/getStrukturalPegawaiJson',
		data: {
			id_struktural: id_struktural
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_strukturalDel').val(data.id_struktural);
			$('#nipstrukturalDel').val(data.nip);
		}

	})

});

$('.DeletePendidikanModal').on('click', function () {
	const id_Pendidikan = $(this).data('id');

	$.ajax({
		url: base_url + 'Pendidikan/getPendidikanPegawaiJson',
		data: {
			id_Pendidikan: id_Pendidikan
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_pendidikanDel').val(data.id_pendidikan);
			$('#nippendidikanDel').val(data.nip);
		}

	})

});

$('.DeleteDiklatModal').on('click', function () {
	const id_Diklat = $(this).data('id');

	$.ajax({
		url: base_url + 'Diklat/getDiklatPegawaiJson',
		data: {
			id_Diklat: id_Diklat
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_diklatDel').val(data.id_diklat);
			$('#nipdiklatDel').val(data.nip);
		}

	})

});

$('.DeleteSeminarModal').on('click', function () {
	const id_seminar = $(this).data('id');

	$.ajax({
		url: base_url + 'Seminar/getSeminarPegawaiJson',
		data: {
			id_seminar: id_seminar
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_seminarDel').val(data.id_seminar);
			$('#nipseminarDel').val(data.nip);
		}

	})

});

$('.DeleteBahasaModal').on('click', function () {
	const id_bahasa = $(this).data('id');

	$.ajax({
		url: base_url + 'bahasa/getBahasaPegawaiJson',
		data: {
			id_bahasa: id_bahasa
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_bahasaDel').val(data.id_bahasa);
			$('#nipbahasaDel').val(data.nip);
			$('#bahasaId').html('&nbsp' + data.bahasa + ' ?');
		}

	})

});

$('.DeletePenghargaanModal').on('click', function () {
	const id_Penghargaan = $(this).data('id');

	$.ajax({
		url: base_url + 'Penghargaan/getPenghargaanPegawaiJson',
		data: {
			id_Penghargaan: id_Penghargaan
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_PenghargaanDel').val(data.id_penghargaan);
			$('#nipPenghargaanDel').val(data.nip);
			$('#PenghargaanId').html('&nbsp' + data.bahasa + ' ?');
		}

	})

});

$('.DeletePengalamanModal').on('click', function () {
	const id_kerja = $(this).data('id');

	$.ajax({
		url: base_url + 'Pengalaman/getPengalamanPegawaiJson',
		data: {
			id_kerja: id_kerja
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_PengalamanDel').val(data.id_kerja);
			$('#nipPengalamanDel').val(data.nip);
			$('#PengalamanId').html('&nbsp' + data.perusahaan_kerja + ' ?');
		}

	})

});

$('.DeleteKeluargaModal').on('click', function () {
	const id_keluarga = $(this).data('id');

	$.ajax({
		url: base_url + 'keluarga/getKeluargaPegawaiJson',
		data: {
			id_keluarga: id_keluarga
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_keluargaDel').val(data.id_keluarga);
			$('#nipkeluargaDel').val(data.nip);
			$('#keluargaId').html('&nbsp' + data.nama_klg + ' ?');
		}
	})

});

$('.DeleteKartuModal').on('click', function () {
	const id_kartu = $(this).data('id');

	$.ajax({
		url: base_url + 'kartu/getKartuPegawaiJson',
		data: {
			id_kartu: id_kartu
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_kartuDel').val(data.id_kartu);
			$('#nipkartuDel').val(data.nip);
			$('#kartuId').html('&nbsp' + data.jenis_kartu + ' ?');
		}
	})

});

$('.DeleteSk_lainModal').on('click', function () {
	const id_sk = $(this).data('id');

	$.ajax({
		url: base_url + 'Sk_lain/getSkPegawaiJson',
		data: {
			id_sk: id_sk
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_SkDel').val(data.id_sk);
			$('#nipSkDel').val(data.nip);
			$('#SkId').html('&nbsp' + data.jenis_sk + ' ?');
		}
	})

});

$('.setPnsModal').on('click', function () {
	const nip = $(this).data('id');

	$.ajax({
		url: base_url + 'DataPegawai/getPegawaiJson',
		data: {
			nip: nip
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#old_nip').val(data.nip);
		}

	})

});

$('.setGolonganModal').on('click', function () {
	const id_riwayat = $(this).data('id');

	$.ajax({
		url: base_url + 'Pangkat/getPangkatPegawaiJson',
		data: {
			id_riwayat: id_riwayat
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_riwayats').val(data.id_riwayat);
			$('#nip_riwayat').val(data.nip);
		}

	})

});

$('.setFungsionalModal').on('click', function () {
	const id_fungsional = $(this).data('id');

	$.ajax({
		url: base_url + 'Fungsional/getFungsionalPegawaiJson',
		data: {
			id_fungsional: id_fungsional
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_fungsionalSet').val(data.id_fungsional);
			$('#nipfungsionalSet').val(data.nip);
		}

	})

});

$('.setStrukturalModal').on('click', function () {
	const id_struktural = $(this).data('id');

	$.ajax({
		url: base_url + 'Struktural/getStrukturalPegawaiJson',
		data: {
			id_struktural: id_struktural
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_strukturalSet').val(data.id_struktural);
			$('#nipstrukturalSet').val(data.nip);
		}

	})

});

$('.setPendidikanModal').on('click', function () {
	const id_Pendidikan = $(this).data('id');

	$.ajax({
		url: base_url + 'Pendidikan/getPendidikanPegawaiJson',
		data: {
			id_Pendidikan: id_Pendidikan
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#id_pendidikanSet').val(data.id_pendidikan);
			$('#nippendidikanSet').val(data.nip);
			$('#tingkatOutput').html("&nbsp;" + data.tingkat + "&nbsp;");
		}

	})

});

$('.setKeteranganPegawai').on('click', function () {
	const nip = $(this).data('nip');

	$.ajax({
		url: base_url + 'DataPegawai/getPegawaiJson',
		data: {
			nip: nip
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#nipKeterangan').val(data.nip);
			$('#selectOptKet').val(data.keterangan);
		}

	})

});
$('.setJabatanPelaksana').on('click', function () {
	const nip = $(this).data('nip');
	$.ajax({
		url: base_url + 'DataPegawai/getPegawaiJson',
		data: {
			nip: nip
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#nipPelaksana').val(data.nip);
			$('#jabatanPelaksana').val(data.jabatan_pelaksana);
		}

	})

});


$('#divPns').on('click', function () {

});

$('.dropdown').on('show.bs.dropdown', function () {
	$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
});

// Add slideUp animation to Bootstrap dropdown when collapsing.
$('.dropdown').on('hide.bs.dropdown', function () {
	$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
});
