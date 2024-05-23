<div class="row justify-content-center">
		<div class="col-12">
			<h2 class="mb-2 page-title">Data Pelanggan</h2>
			<p class="card-text">Data Informasi Pelanggan</p>
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
															Pelanggan
														</h5>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="card-body">
														<form method="post" action="<?= base_url('pelanggan/add_pelanggan'); ?>">
															<div class="form-group row">
																<label for="inputuser" class="col-sm-3 col-form-label">Nama
																	Produk</label>
																<div class="col-sm-9">
																	<input type="text" class="form-control" name="nama"
																		placeholder="Nama Pelanggan"
																		value="<?= set_value('nama')?>" required>
																	<?= form_error('nama', '<small class="text-danger">', '</small>')?>
																</div>
															</div>
															<div class="form-group row">
																<label for="harga"
																	class="col-sm-3 col-form-label">alamat</label>
																<div class="col-sm-9">
																<input type="text" class="form-control" name="alamat"
																		placeholder="Your address"
																		value="<?= set_value('alamat')?>" required>
																</div>
															</div>
															<div class="form-group row">
																<label for="inputPassword3"
																	class="col-sm-3 col-form-label">No TLPN</label>
																<div class="col-sm-9">
																<input type="number" class="form-control" name="tlpn"
																		placeholder="Your number phone"
																		value="<?= set_value('tlpn')?>" required>
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
										<th>Address</th>
										<th>Telepon</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($pelanggan as $us):?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $us['nama'];?></td>
										<td><?= $us['alamat'];?></td>
										<td><?= $us['tlpn']; ?></td>
										<td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted sr-only">Action</span>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<button class="dropdown-item" data-toggle="modal"
													data-target="#editmodal<?= $us['id_pelanggan']?>">Edit</button>
												<a class="dropdown-item"
													href="<?= base_url('pelanggan/delete_pelanggan_by_id/'.$us['id_pelanggan']);?>"
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
	<?php foreach($pelanggan as $as) :?>
	<div class="modal fade" id="editmodal<?= $as['id_pelanggan']?>" tabindex="-1" role="dialog"
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
					<form method="post" action="<?= base_url('pelanggan/edit_pelanggan'); ?>">
						<input type="hidden" name="id_pelanggan" value="<?= $as['id_pelanggan']?>">
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Nama Produk</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama" value="<?= $as['nama']; ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputuser" class="col-sm-3 col-form-label">Harga Produk</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="alamat" value="<?= $as['alamat']; ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputuser" class="col-sm-3 col-form-label">Stok Produk</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="tlpn" value="<?= $as['tlpn']; ?>" required>
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
