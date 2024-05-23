<div class="row">
	<div class="col-md-12 my-4">
		<h2 class="h4 mb-1">Pengguna</h2>
		<p class="mb-3">Informasi Daftar Data Pengguna</p>
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
											<h5 class="modal-title" id="defaultModalLabel">Tambahkan Daftar Pengguna
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="card-body">
											<form method="post" action="<?= base_url('user/add_user'); ?>">
												<div class="form-group row">
													<label for="inputuser"
														class="col-sm-3 col-form-label">Username</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="username"
															placeholder="Username" value="<?= set_value('username')?>">
														<?= form_error('username', '<small class="text-danger">', '</small>')?>
													</div>
												</div>
												<div class="form-group row">
													<label for="name" class="col-sm-3 col-form-label">Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="name"
															placeholder="Your name.." value="<?= set_value('name')?>">
														<?= form_error('name', '<small class="text-danger">', '</small>')?>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputPassword3"
														class="col-sm-3 col-form-label">Password</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="inputPassword3"
															name="password" placeholder="Password"
															value="<?= set_value('password')?>">
														<?= form_error('password', '<small class="text-danger">', '</small>')?>
													</div>
												</div>
												<div class="form-group row">
													<label for="level" class="col-sm-3 col-form-label">Level
														Status</label>
													<div class="col-sm-9">
														<select class="custom-select my-1 mr-sm-2"
															id="inlineFormCustomSelectPref" name="level" required>
															<option value="">Choose Your Level...</option>
															<option value="Admin">Admin</option>
															<option value="Kasir">Kasir</option>
														</select>
														<?= form_error('level', '<small class="text-danger">', '</small>')?>
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
				<table class="table table-hover table-borderless border-v">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Status Level</th>
							<th>Riwayat Login</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($user as $us):?>
						<tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474"
							href="#collap-2474">
							<td><?= $no; ?></td>
							<td><?= $us['username'];?></td>
							<td><?= $us['nama'];?></td> <td><span
									class="badge badge-pill <?php if($us['level'] == "Admin"){ echo "badge-success";}else{echo "badge-warning"; } ?>  mr-2"><?= $us['level']; ?></span>
							</td>
							<td>00.00</td>
							<td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="text-muted sr-only">Action</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right">
									<button class="dropdown-item" data-toggle="modal"
										data-target="#editmodal<?= $us['id_user']?>">Edit</button>
									<a class="dropdown-item"
										href="<?= base_url('user/delete_user_by_id/'.$us['id_user']);?>"
										onclick="return confirm('Yakin Hapus :(')">Remove</a>
								</div>
							</td>
						</tr>
						<?php $no++; endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div> <!-- end section -->

<?php foreach($user as $as) :?>
<div class="modal fade" id="editmodal<?= $as['id_user']?>" tabindex="-1" role="dialog"
	aria-labelledby="defaultModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Data Pengguna
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="card-body">
				<form method="post" action="<?= base_url('user/edit_user'); ?>">
					<input type="hidden" name="id_user" value="<?= $as['id_user']?>">
					<div class="form-group row">
						<label for="inputuser" class="col-sm-3 col-form-label">Username</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username" value="<?= $as['username']; ?>"
								readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="name" value="<?= $as['nama']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="level" class="col-sm-3 col-form-label">Level
							Status</label>
						<div class="col-sm-9">
							<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="level">
								<option value="Admin" <?php if($as['level']=='Admin'){echo 'selected';}?>>Admin</option>
								<option value="Kasir" <?php if($as['level']=='Kasir'){echo 'selected';}?>>Kasir</option>
							</select>
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
