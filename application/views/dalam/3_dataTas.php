<div class="page-title">
	<h3 class="breadcrumb-header">Data Tas</h3>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Input Data Tas</h4>
			</div>
			<div class="panel-body">
				<form method="post" action="<?= base_url("Admin/prosesCreateTas")?>">
					<div class="row">
						<div class="col-xl-6 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="nama_tas">Nama Tas</label>
								<input type="text" class="form-control" id="nama_tas" name="nama_tas"
									placeholder="Nama Tas " autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="merk">Merk</label>
								<input type="text" class="form-control" id="merk" name="merk" placeholder="Merk Tas "
									autocomplete="off" required>
							</div>
						</div>

						<div class="col-xl-6 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="warna">Warna</label>
								<input type="text" class="form-control" id="warna" name="warna" placeholder="Warna Tas "
									autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="bahan">Bahan</label>
								<input type="text" class="form-control" id="bahan" name="bahan" placeholder="Bahan Tas "
									autocomplete="off" required>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Data Tas</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Tas</th>
								<th>Nama Tas</th>
								<th>Merk</th>
								<th>Warna</th>
								<th>Bahan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Kode Tas</th>
								<th>Nama Tas</th>
								<th>Merk</th>
								<th>Warna</th>
								<th>Bahan</th>
								<th>Opsi</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $no = 1; foreach($data as $dt):?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$kd_tas = $dt->kd_tas?></td>
								<td><?=$namaTas = $dt->nama_tas?></td>
								<td><?=$merk = $dt->merk?></td>
								<td><?=$warna = $dt->warna?></td>
								<td><?=$bahan = $dt->bahan?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary dropdown-toggle"
											data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-spin fa-refresh"></i> Action <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a onclick="updateData(
                                                    '<?=$kd_tas?>',
                                                    '<?=$namaTas?>',
                                                    '<?=$merk?>',
                                                    '<?=$warna?>',
                                                    '<?=$bahan?>',
                                                )" href="#" data-toggle="modal"
													data-target=".bs-example-modal-lg">Update Data</a></li>
											<li><a onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_tas','<?=$kd_tas?>','tb_tas','dataTas')" href="#">Hapus</a></li>
										</ul>
									</div>
								</td>
							</tr>
							<?php endforeach?>
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
				<h4 class="modal-title" id="myLargeModalLabel">Update Data Pengguna</h4>
			</div>
			<div class="modal-body">
            <form method="post" action="<?= base_url("Admin/prosesUpdataTas")?>">
					<div class="row">
                        <input type="hidden" name="kd_tas" id="kd_tas">
						<div class="col-xl-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="nama_tas_edit">Nama Tas</label>
								<input type="text" class="form-control" id="nama_tas_edit" name="nama_tas"
									placeholder="Nama Tas " autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="merk_edit">Merk</label>
								<input type="text" class="form-control" id="merk_edit" name="merk" placeholder="Merk Tas "
									autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="warna_edit">Warna</label>
								<input type="text" class="form-control" id="warna_edit" name="warna" placeholder="Warna Tas "
									autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="bahan">Bahan</label>
								<input type="text" class="form-control" id="bahan_edit" name="bahan" placeholder="Bahan Tas "
									autocomplete="off" required>
							</div>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<script>
	function updateData(kd_tas, nama_tas, merk, warna, bahan) {
        document.getElementById('kd_tas').value = kd_tas;
        document.getElementById('nama_tas_edit').value = nama_tas;
        document.getElementById('merk_edit').value = merk;
        document.getElementById('warna_edit').value = warna;
        document.getElementById('bahan_edit').value = bahan;
	}

</script>
