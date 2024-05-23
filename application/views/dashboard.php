<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="row justify-content-center">
	<div class="col-12">
		<div class="row">
			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow text-white border-0">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col pr-0">
								<p class="small text-muted mb-0">Today Sales</p>
								<span class="h3 mb-0 text-white">Rp. <?= number_format($hari_ini); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow text-white border-0">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col pr-0">
								<p class="small text-muted mb-0">Monthly Sales</p>
								<span class="h3 mb-0 text-white">Rp. <?= number_format($bulan_ini); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow border-0">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col pr-0">
								<p class="small text-muted mb-0">Product</p>
								<span class="h3 mb-0"><?= $produk; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow border-0">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col">
								<p class="small text-muted mb-0">Transaction</p>
								<div class="row align-items-center no-gutters">
									<div class="col-auto">
										<span class="h3 mr-2 mb-0"> <?= $transaksi;?> </span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end section -->
		<div class="row align-items-center my-2">
			<div class="col-auto ml-auto">
				<form class="form-inline">
					<div class="form-group">
						<label for="reportrange" class="sr-only">Date Ranges</label>
						<div id="reportrange" class="px-2 py-2 text-muted">
							<i class="fe fe-calendar fe-16 mx-2"></i>
							<span class="small"></span>
						</div>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-sm"><span
								class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
						<button type="button" class="btn btn-sm"><span
								class="fe fe-filter fe-12 text-muted"></span></button>
					</div>
				</form>
			</div>
		</div>
		<!-- charts-->
		<div class="row my-4">
			<div class="col-md-12">
				<div class="chart-box">
					<div id="chart"></div>
					<?php 
    $nama_n = date('M');
    $nama_1 = date('M', strtotime('-1 Months'));
    $nama_2 = date('M', strtotime('-2 Months'));
    $nama_3 = date('M', strtotime('-3 Months'));
    $nama_4 = date('M', strtotime('-4 Months'));
    $nama_5 = date('M', strtotime('-5 Months'));

    $tanggal = date('Y-m');
    $bulan_ini = $this->db->select('SUM(total_harga) as total')->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->get('penjualan')->row()->total ?? 0;
    $tanggal = date('Y-m', strtotime('-1 Months'));
    $bulan_1 = $this->db->select('SUM(total_harga) as total')->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->get('penjualan')->row()->total ?? 0;
    $tanggal = date('Y-m', strtotime('-2 Months'));
    $bulan_2 = $this->db->select('SUM(total_harga) as total')->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->get('penjualan')->row()->total ?? 0;
    $tanggal = date('Y-m', strtotime('-3 Months'));
    $bulan_3 = $this->db->select('SUM(total_harga) as total')->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->get('penjualan')->row()->total ?? 0;
    $tanggal = date('Y-m', strtotime('-4 Months'));
    $bulan_4 = $this->db->select('SUM(total_harga) as total')->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->get('penjualan')->row()->total ?? 0;
    $tanggal = date('Y-m', strtotime('-5 Months'));
    $bulan_5 = $this->db->select('SUM(total_harga) as total')->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->get('penjualan')->row()->total ?? 0;
    ?>

					<script>
						var options = {
							series: [{
								name: 'Net Profit',
								data: [ <?= $bulan_5 ?> , <?= $bulan_4 ?> , <?= $bulan_3 ?> , <?= $bulan_2 ?> , <?= $bulan_1 ?> , <?= $bulan_ini ?>
								]
							}],
							chart: {
								type: 'bar',
								height: 350
							},
							plotOptions: {
								bar: {
									horizontal: false,
									columnWidth: '55%',
									endingShape: 'rounded'
								},
							},
							dataLabels: {
								enabled: false
							},
							stroke: {
								show: true,
								width: 2,
								colors: ['transparent']
							},
							xaxis: {
								categories: ['<?= $nama_5 ?>', '<?= $nama_4 ?>', '<?= $nama_3 ?>', '<?= $nama_2 ?>', '<?= $nama_1 ?>',
									'<?= $nama_n ?>'
								],
							},
							yaxis: {
								title: {
									text: '$ (thousands)'
								}
							},
							fill: {
								opacity: 1
							},
							tooltip: {
								y: {
									formatter: function (val) {
										return "$ " + val + " thousands"
									}
								}
							}
						};
						var chart = new ApexCharts(document.querySelector("#chart"), options);
						chart.render();
					</script>
				</div>

			</div> <!-- .col -->
		</div> <!-- end section -->
		<!-- info small box -->
	</div>
</div> <!-- .row -->
