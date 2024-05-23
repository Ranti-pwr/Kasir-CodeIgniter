<div class="card shadow mb-4">
	<div class="card-header">
		<strong class="card-title">Form controls</strong>
	</div>
	<div class="card-body">
		<div class="row">
			<!-- /.col -->
			<table class="table table-hover table-borderless border-v">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Kode Barang</th>
						<th>Nama</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $cek = 0; $no1 = 0; $no = 1; foreach($tempori as $us):?>
					<tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474"
						href="#collap-2474">
						<td><?= $no; ?></td>
						<td><?= $us['kode_produk'];?></td>
						<td><?= $us['nama'];?></td>
						<?php if($us['jumlah'] > $us['stok'] ) {
							echo '<script>alert("Stok tidak mencukupi")</script>';	
							echo "<td><span class='badge badge-pill badge-danger'>Stok tidak mencukupi</span></td>";
							$cek = 1;
						} else{?>
							<td><?= $us['jumlah'];?></td>
						<?php } ?>

						<td><?= 'Rp. '. number_format($us['harga']); ?></td>
						<td><?= 'Rp. '. number_format($us['jumlah'] * $us['harga']); ?></td>
						<td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="text-muted sr-only">Action</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item"
									href="<?= base_url('penjualan/hapus_tempori/'.$us['id_tempori']);?>"
									onclick="return confirm('Yakin Hapus :(')">Remove</a>
							</div>
						</td>
					</tr>
					<?php $no1 = $no1 + ($us['jumlah'] * $us['harga']); $no++; endforeach;?>
				</tbody>
			</table>
			<tr>
				<td colspan="5">Total Harga</td>
				<td><?='Rp. '. number_format($no1); ?></td>
			</tr>
		</div>

	</div> <!-- / .card -->
	<div class="card-body">
		<form action="<?= base_url('penjualan/bayar') ?>" method="post">
			<input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan?>">
			<input type="hidden" name="kode_penjualan" value="<?= $nota?>">
			<input type="hidden" name="total_harga" value="<?= $no1?>">

			<?php if($tempori <> null and ($cek == 0)) { ?>
				<button type="submit" class="btn btn-primary">Pay</button>
				<?php }?>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-md-6 mb-4">
		<div class="card shadow">
			<div class="card-body">
				<div class="form-group mb-3">
					<label for="simpleinputt">Nota</label>
					<input type="number" name="kode_penjualan" class="form-control" id="simpleInputt"
						value="<?= $nota?>" readonly>
					<input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan?>">
				</div>
				<div class="form-group mb-3">
					<input type="text" name="kode_penjualan" class="form-control" id="simpleInputt" value="<?= $nama?>"
						readonly>
				</div>
				<form action="<?= base_url('penjualan/add_ker') ?>" method="post">
					<div class="form-group mb-3">
						<div class="form-group mb-3">
							<label for="simpleinput">Product</label>
							<input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
							<input type="hidden" name="kode_penjualan" value="<?= $nota; ?>">
							<select name="id_produk" class="form-control select2" id="simple-select2>
							<?php foreach($produk as $pro) { ?>
								<option value=" <?= $pro['id_produk']; ?>"><?= $pro['nama']; ?> (<?= $pro['kode_produk']; ?>
								[<?= $pro['stok']; ?>] )</option>
								<?php  }?>
							</select>
						</div>
						<div class="form-group mb-3">
							<label for="example-email">Jumlah</label>
							<input type="number" id="example-email" name="jumlah" class="form-control"
								placeholder="jumlah yang dijual" required>
						</div>
						<button type="submit" class="btn btn-primary">Tambah Keranjang</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- <div class="col-md-6 mb-4">
	<div class="card shadow">
		<div class="card-body">
			<form action="<?= base_url('penjualan/bayar') ?>" method="post">
					<button type="submit" class="btn btn-primary">Pay</button>
			</form>
		</div>
	</div>
</div> -->
