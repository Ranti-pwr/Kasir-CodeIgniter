<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add input data</title>
</head>

<body>

	<div class="col-12 col-md-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<strong class="card-title mb-0">Donut Chart</strong>
			</div>
			<div class="card-body text-center">
				<div id="donutChart1"></div>
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->
	</div> <!-- /. col -->

	<h2>Add Input data</h2>
	<?php echo validation_errors(); ?>

	<form action="<?php echo base_url('suara1/SaveVote') ?>" method="post">
		<label>Nama TPS:</label>
		<input type="text" name="nama_tps"><br>

		<label>No 1:</label>
		<input type="number" name="no1"><br>

		<label>No 2:</label>
		<input type="number" name="no2"><br>

		<label>No 3:</label>
		<input type="number" name="no3"><br>

		<label>Total suara Sah:</label>
		<input type="number" name="total_sah"><br>

		<label>Total Tidak Sah:</label>
		<input type="number" name="total_tidaksah"><br>

		<label>Total:</label>
		<input type="number" name="total"><br>

		<button type="submit">Submit</button>
	</form>
	<script>
		
	</script>
	<script src="<?= base_url('sp/dark/')?>js/jquery.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/popper.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/moment.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/simplebar.min.js"></script>
	<script src='<?= base_url('sp/dark/')?>js/daterangepicker.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/jquery.stickOnScroll.js'></script>
	<script src="<?= base_url('sp/dark/')?>js/tinycolor-min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/config.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/d3.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/topojson.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/datamaps.all.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/datamaps-zoomto.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/datamaps.custom.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/Chart.min.js"></script>
	<script>
		/* defind global options */
		Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
		Chart.defaults.global.defaultFontColor = colors.mutedColor;
	</script>
	<script src="<?= base_url('sp/dark/')?>js/gauge.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/jquery.sparkline.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/apexcharts.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>js/apexcharts.custom.js"></script>
	<script src='<?= base_url('sp/dark/')?>js/jquery.mask.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/select2.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/jquery.steps.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/jquery.validate.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/jquery.timepicker.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/dropzone.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/uppy.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/quill.min.js'></script>
	<script src="<?= base_url('sp/dark/')?>js/apps.js"></script>
	<script src='<?= base_url('sp/dark/')?>js/jquery.dataTables.min.js'></script>
	<script src='<?= base_url('sp/dark/')?>js/dataTables.bootstrap4.min.js'></script>
	<script>
		$('#dataTable-1').DataTable({
			autoWidth: true,
			"lengthMenu": [
				[16, 32, 64, -1],
				[16, 32, 64, "All"]
			]
		});
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-56159088-1');
	</script>
	<script>
		$('.select2').select2({
			theme: 'bootstrap4',
		});
		$('.select2-multi').select2({
			multiple: true,
			theme: 'bootstrap4',
		});
		$('.drgpicker').daterangepicker({
			singleDatePicker: true,
			timePicker: false,
			showDropdowns: true,
			locale: {
				format: 'MM/DD/YYYY'
			}
		});
		$('.time-input').timepicker({
			'scrollDefault': 'now',
			'zindex': '9999' /* fix modal open */
		});
		/** date range picker */
		if ($('.datetimes').length) {
			$('.datetimes').daterangepicker({
				timePicker: true,
				startDate: moment().startOf('hour'),
				endDate: moment().startOf('hour').add(32, 'hour'),
				locale: {
					format: 'M/DD hh:mm A'
				}
			});
		}
		var start = moment().subtract(29, 'days');
		var end = moment();

		function cb(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
					'month')]
			}
		}, cb);
		cb(start, end);
		$('.input-placeholder').mask("00/00/0000", {
			placeholder: "__/__/____"
		});
		$('.input-zip').mask('00000-000', {
			placeholder: "____-___"
		});
		$('.input-money').mask("#.##0,00", {
			reverse: true
		});
		$('.input-phoneus').mask('(000) 000-0000');
		$('.input-mixed').mask('AAA 000-S0S');
		$('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
			translation: {
				'Z': {
					pattern: /[0-9]/,
					optional: true
				}
			},
			placeholder: "___.___.___.___"
		});
		// editor
		var editor = document.getElementById('editor');
		if (editor) {
			var toolbarOptions = [
				[{
					'font': []
				}],
				[{
					'header': [1, 2, 3, 4, 5, 6, false]
				}],
				['bold', 'italic', 'underline', 'strike'],
				['blockquote', 'code-block'],
				[{
						'header': 1
					},
					{
						'header': 2
					}
				],
				[{
						'list': 'ordered'
					},
					{
						'list': 'bullet'
					}
				],
				[{
						'script': 'sub'
					},
					{
						'script': 'super'
					}
				],
				[{
						'indent': '-1'
					},
					{
						'indent': '+1'
					}
				], // outdent/indent
				[{
					'direction': 'rtl'
				}], // text direction
				[{
						'color': []
					},
					{
						'background': []
					}
				], // dropdown with defaults from theme
				[{
					'align': []
				}],
				['clean'] // remove formatting button
			];
			var quill = new Quill(editor, {
				modules: {
					toolbar: toolbarOptions
				},
				theme: 'snow'
			});
		}
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
			'use strict';
			window.addEventListener('load', function () {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function (form) {
					form.addEventListener('submit', function (event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
	<script>
		var uptarg = document.getElementById('drag-drop-area');
		if (uptarg) {
			var uppy = Uppy.Core().use(Uppy.Dashboard, {
				inline: true,
				target: uptarg,
				proudlyDisplayPoweredByUppy: false,
				theme: 'dark',
				width: 770,
				height: 210,
				plugins: ['Webcam']
			}).use(Uppy.Tus, {
				endpoint: 'https://master.tus.io/files/'
			});
			uppy.on('complete', (result) => {
				console.log('Upload complete! We’ve uploaded these files:', result.successful)
			});
		}
	</script>
	<script src="js/apps.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-56159088-1');
	</script>
</body>

</html>
