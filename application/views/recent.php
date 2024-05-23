<div class="row">
	<div class="col-md-12 my-4">
		<h2 class="h4 mb-1">Pengguna</h2>
		<p class="mb-3">Informasi Daftar Data Pengguna</p>
		<div class="card shadow">
			<div class="card-body">
				<!-- table -->
				<table class="table table-hover table-borderless border-v">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Useragent</th>
							<th>Waktu Terakhir</th>
							<th>Status</th>
							<!-- 	 -->
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($recent as $r):?>
						<tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474"
							href="#collap-2474">
							<td><?= $no; ?></td>
							<td><?= $r['username'];?></td>
							<td><?= $r['device'];?></td>
							<?php 
								// if($r['device']) {

								// }
							?>
							<td><?= $r['waktu'];?></td>
							<td><?= $r['status'];?></td>
							<!-- <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="text-muted sr-only">Action</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item"
										href="<?= base_url('user/delete_user_by_id/'.$us['id_user']);?>"
										onclick="return confirm('Yakin Hapus :(')">Remove</a>
								</div>
							</td> -->
						</tr>
						<?php $no++; endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div> <!-- end section -->
