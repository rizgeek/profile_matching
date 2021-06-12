<div class="page-title">
	<h3 class="breadcrumb-header">Data Pengguna</h3>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Basic example</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Pengguna</th>
								<th>Nama</th>
								<th>Nomor Hp</th>
								<th>Jenis Kelamin</th>
								<th>Username</th>
								<th>Level Akses</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Kode Pengguna</th>
								<th>Nama</th>
								<th>Nomor Hp</th>
								<th>Jenis Kelamin</th>
								<th>Username</th>
								<th>Level Akses</th>
								<th>Opsi</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $no = 1; foreach ($data as $dt):?>
							<tr>
								<td><?= $no++?></td>
								<td><?= $kd_pengguna = $dt->kd_pengguna?></td>
								<td><?= $nama = $dt->nama?></td>
								<td><?= $nomor_hp = $dt->nomor_hp?></td>
								<td><?= $jenis_kelamin = $dt->jenis_kelamin?></td>
								<td><?= $username = $dt->username?></td>
								<td><?= $level_akses = $dt->level_akses?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary dropdown-toggle"
											data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-spin fa-refresh"></i> Action <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a onclick="updateData(
												'<?=$kd_pengguna?>',
												'<?=$nama?>',
												'<?=$nomor_hp?>',
												'<?=$jenis_kelamin?>',
												'<?=$username?>',
												'<?=$level_akses?>',
											)" href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Update Data</a></li>
											<li><a onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_pengguna','<?=$kd_pengguna?>','tb_pengguna','dataPengguna')"" href="#">Hapus</a></li>
										</ul>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url("Admin/prosesUpdateDataPengguna")?>">
					<input type="hidden" id="kd_pengguna" name="kd_pengguna" required>
				
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pengguna"
							autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="nomor_hp">Nomor Hp Pengguna</label>
						<input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
							placeholder="Nomor Hp Pengguna" autocomplete="off" required>
					</div>

					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
							<option selected disabled>Pilih salah satu</option>
							<option value="Laki - Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>

					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username"
							autocomplete="off" required readonly>
					</div>

					<div class="form-group">
						<label for="level_akses">Level Akses</label>
						<select class="form-control" name="level_akses" id="level_akses">
							<option selected disabled>Pilih salah satu</option>
							<option value="admin">Admin</option>
							<option value="umum">Umum</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Reset</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>


<script>
	function updateData(kd_pengguna, nama, nomor_hp, jenis_kelamin, username,level_akses) {
		document.getElementById('kd_pengguna').value =kd_pengguna;
		document.getElementById('nama').value = nama;
		document.getElementById('nomor_hp').value = nomor_hp;
		document.getElementById('jenis_kelamin').value = jenis_kelamin;
		document.getElementById('username').value = username;
		document.getElementById('level_akses').value = level_akses;
	}
</script>
