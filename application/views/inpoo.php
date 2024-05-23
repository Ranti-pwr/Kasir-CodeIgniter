<div class="row justify-content-center">
	<div class="col-12 col-lg-10 col-xl-8">
		<div class="row align-items-center mb-4">
			<div class="col">
				<h2 class="h5 page-title"><small class="text-muted text-uppercase">Invoice</small><br />#<?= $nota?></h2>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('penjualan/cetak/'. $nota); ?>">
					<button type="button" class="btn btn-secondary">Print</button>
				</a>
				<button type="button" class="btn btn-primary">Pay</button>
			</div>
		</div>
		<div class="card shadow">
			<div class="card-body p-6">
				<div class="row mb-6">
					<div class="col-12 text-center mb-4">
						<img src="<?= base_url('sp/dark/')?>/assets/images/logo.svg"
							class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
						<h2 class="mb-0 text-uppercase">Invoice</h2>
						<p class="text-muted"> NZAKINARA<br /> All-Right Reversed 2024 </p>
					</div>
					<div class="col-md-7">
						<p class="small text-muted text-uppercase mb-2">Invoice from</p>
						<p class="mb-4">
							<strong>Ranti pwr</strong><br /> Asset Management<br /> 9022 Suspendisse Rd.<br /> High
							Wycombe<br /> (478) 446-9234<br />
						</p>
						<p>
							<span class="small text-muted text-uppercase">Invoice #</span><br />
							<strong><?= $nota?></strong>
						</p>
					</div>
					<div class="col-md-5">
						<p class="small text-muted text-uppercase mb-2">Invoice to</p>
						<p class="mb-4">
							<strong><?= $penjualan->nama;?></strong><br /> Human Resources<br /> <?= $penjualan->alamat;?>
							Street<br /> Ivanteyevka<br /> <?= $penjualan->tlpn;?><br/>
						</p>
						<p>
							<small class="small text-muted text-uppercase">Due date</small><br />
							<strong><?= date('Y-M-d')?></strong>
						</p>
					</div>
				</div> <!-- /.row -->
				<table class="table table-borderless table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Kode Barang</th>
							<th scope="col" class="text-right">Produk</th>
							<th scope="col" class="text-right">Jumlah</th>
							<th scope="col" class="text-right">Harga</th>
							<th scope="col" class="text-right">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $no= 1; foreach($detail as $det) { ?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td> <?= $det['kode_produk'] ?></td>
							<td class="text-right"><?= $det['nama']; ?></td>
							<td class="text-right"><?= $det['jumlah']; ?></td>
							<td class="text-right">Rp. <?= number_format($det['harga']); ?></td>
							<td class="text-right">Rp. <?= number_format($det['sub_total']); ?></td>
						</tr>
						<?php } $no++;?>
					</tbody>
				</table>
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->
	</div> <!-- /.col-12 -->
</div> <!-- .row -->
