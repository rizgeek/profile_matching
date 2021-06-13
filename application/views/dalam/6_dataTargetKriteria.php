<?php
	$update_data = isset($update_data) ? $update_data : null;
?>


<div class="page-title">
	<h3 class="breadcrumb-header">Data Target <?=$kriteria->kriteria?></h3>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Input Data Target <?=$kriteria->kriteria?></h4>
			</div>
			<div class="panel-body">
				<form method="post" action="<?= $update_data == null ? base_url("Admin/prosesCreateTarget") : base_url("Admin/prosesUpdateTarget") ?>">
					<div class="row">
						<div class="col-xl-12 col-md-12 col-sm-12">

							<input type="hidden" name="kd_kriteria" id="kd_kriteria" value="<?=$kriteria->kd_kriteria?>">

							<?php if($update_data != null): ?>
								<input type="hidden" name="kd_target" id="kd_target" value="<?=$update_data->kd_target?>">
							<?php endif ?>

                            <div class="form-group">
								<label for="target">Target</label>
								<input type="text" class="form-control" id="target" name="target" placeholder="Target"
									autocomplete="off" required value="<?= $update_data != null ?$update_data->target : '' ?>">
							</div>

							<div class="form-group">
								<label for="bobot_target">Bobot Target</label>
								<select class="form-control" name="bobot_target" id="bobot_target" required>
									<option <?= $update_data == null ? 'selected' : '' ?> disabled>Pilih salah satu</option>
									<?php for( $i = 0; $i < count($nilai_target); $i++): $tmp = $i+1; ?>
									<option 
										<?= $update_data != null ? $update_data->bobot_target == $tmp ? 'selected' : '' : '' ?>
									value = "<?=$tmp?>"><?=$tmp." - ".$nilai_target[$i]?></option>
									<?php endfor ?>
								</select>
								
							</div>

							<div class="form-group">
								<label for="tipe">Type Core</label>
								<select class="form-control" name="tipe" id="tipe" value="<?= $update_data != null ? $update_data->tipe : '' ?>" required>
									<option  <?= $update_data == null ? 'selected' : '' ?> disabled>Pilih salah satu</option>
									<option 
										<?= $update_data != null ? $update_data->tipe == 'primary' ? 'selected' : '' : '' ?>
										value = "primary">Primary Core</option>

									<option 
										<?= $update_data != null ? $update_data->tipe == 'secondary' ? 'selected' : '' : '' ?>
										value = "secondary">Secondary Core</option>
								</select>
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
				<h4 class="panel-title">Data Target</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Target</th>
								<th>Target</th>
								<th>Bobot Target</th>
								<th>Tipe</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Kode Target</th>
								<th>Target</th>
								<th>Bobot Target</th>
								<th>Tipe</th>
								<th>Opsi</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $no =1; foreach($data_target as $dt): ?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$kd_target = $dt->kd_target?></td>
									<td><?=$dt->target?></td>
									<td><?=$dt->bobot_target?></td>
									<td><?=ucwords($dt->tipe)?></td>
									<td>
										<div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-spin fa-refresh"></i> Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a onclick="updateData('<?=$kd_target?>')" href="#">Update Data</a></li>
                                                <li><a onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_target','<?=$kd_target?>','tb_target','dataKriteria')" href="#">Hapus</a></li>
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


<script>
	function updateData(kd_kriteria) {
		Swal.fire({
			title: 'Yakin ingin update data target?',
			text: "Tekan Iya jika yakin!",
			icon: 'question',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya, Update data'
			}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?=base_url('Admin/updateDataTarget/')?>"+"<?=$kriteria->kd_kriteria?>/"+kd_kriteria;
			}
		})
	}
</script>