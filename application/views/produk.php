	<div class="row justify-content-center">
		<div class="col-12">
			<h2 class="mb-2 page-title">Data Produk</h2>
			<p class="card-text">Data Informasi Produk Barang</p>
			<div class="row my-4">
				<!-- Small table -->
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-body">
							<div class="toolbar row mb-3">
								<div class="col ml-auto">
									<div class="dropdown float-right">
										<!-- <button class="btn btn-primary float-right ml-3" type="button">Add more +</button> -->
										<button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal"
											data-target="#defaultModal">Add more +</button>
										<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog"
											aria-labelledby="defaultModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="defaultModalLabel">Tambahkan Daftar
															Produk
														</h5>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="card-body">
														<form method="post" action="<?= base_url('produk/add_produk'); ?>"
															enctype="multipart/form-data">
															<div class="form-group row">
																<label for="inputuser" class="col-sm-3 col-form-label">Nama
																	Produk</label>
																<div class="col-sm-9">
																	<input type="text" class="form-control" name="nama"
																		placeholder="Nama Produk"
																		value="<?= set_value('nama')?>">
																	<?= form_error('nama', '<small class="text-danger">', '</small>')?>
																</div>
															</div>
															<div class="form-group row">
																<label for="exampleFormControlTextarea1"
																	class="col-sm-3">Deskripsi Produk</label>
																<div class="col-sm-8">
																	<textarea class="form-control" name="deskripsi"
																		id="exampleFormControlTextarea1"
																		rows="3"></textarea>
																</div>
															</div>
															<div class="form-group row">
																<label for="foto" class="col-sm-3 col-form-label">Gambar
																	Produk</label>
																<div class="col-sm-9">
																	<input class="form-control" type="file" name="foto"
																		accept="image/png, image/jpeg">
																</div>
															</div>
															<div class="form-group row">
																<label for="harga"
																	class="col-sm-3 col-form-label">Harga</label>
																<div class="col-sm-9">
																	<input type="number" class="form-control" name="harga">
																</div>
															</div>
															<div class="form-group row">
																<label for="inputPassword3"
																	class="col-sm-3 col-form-label">Stok
																	Produk</label>
																<div class="col-sm-9">
																	<input type="number" class="form-control"
																		id="inputPassword3" name="stok">
																</div>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn mb-2 btn-secondary"
																	data-dismiss="modal">Close</button>
																<button type="submit" class="btn mb-2 btn-primary">Save
																	changes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- table -->
							<table class="table datatables" id="dataTable-1">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Kode Produk</th>
										<th>Stock</th>
										<th>Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($user as $us):?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $us['nama'];?></td>
										<td><?= $us['kode_produk'];?></td>
										<td><?= $us['stok']; ?></td>
										<td><?= 'Rp. '. number_format($us['harga']); ?></td>
										<td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted sr-only">Action</span>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<button class="dropdown-item" data-toggle="modal"
													data-target="#editmodal<?= $us['id_produk']?>">Edit</button>
												<button class="dropdown-item" data-toggle="modal"
													data-target="#detailmodal<?= $us['id_produk']?>">Detail</button>
												<a class="dropdown-item"
													href="<?= base_url('produk/delete_produk_by_id/'.$us['id_produk']);?>"
													onclick="return confirm('Yakin Hapus :(')">Remove</a>
											</div>
										</td>
									</tr>
									<?php $no++; endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div> <!-- simple table -->
			</div> <!-- end section -->
		</div> <!-- .col-12 -->
	</div> <!-- .row -->

	<?php foreach($user as $det) :?>
	<div class="modal fade" id="detailmodal<?= $det['id_produk']?>" tabindex="-1" role="dialog"
		aria-labelledby="defaultModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="defaultModalLabel">Details Produck</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card" style="dysplay: flex;">
						<!-- Card image -->
						<img class="card-img-top" style="flex: 1; max-width: 30%;" src="<?= base_url( 'upload/produk/' .$det['gambar']) ?>"
							alt="Card image cap">
						<!-- Card content -->
						<div class="card-body" style="flex: 2;">
							<!-- Title -->
							<h4 class="card-title"><a><?= $det['nama']; ?></a></h4>
							<!-- Text -->
							<p class="card-text"><?= $det['deskripsi_produk'] ?></p>
							<!-- Button -->
							<p class="btn btn-primary"><?= 'Rp. '. number_format($det['harga']); ?></</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

	<?php foreach($user as $as) :?>
	<div class="modal fade" id="editmodal<?= $as['id_produk']?>" tabindex="-1" role="dialog"
		aria-labelledby="defaultModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit Data Produk
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body">
					<form method="post" action="<?= base_url('produk/edit_produk'); ?>">
						<input type="hidden" name="id_produk" value="<?= $as['id_produk']?>">
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Nama Produk</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama" value="<?= $as['nama']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputuser" class="col-sm-3 col-form-label">Harga Produk</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="harga" value="<?= $as['harga']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputuser" class="col-sm-3 col-form-label">Stok Produk</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="stok" value="<?= $as['stok']; ?>">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn mb-2 btn-primary">Save
								changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
