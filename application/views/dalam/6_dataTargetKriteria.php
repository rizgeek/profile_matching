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
				<form method="post" action="<?= base_url("Admin/prosesCreateTarget")?>">
					<div class="row">
						<div class="col-xl-12 col-md-12 col-sm-12">

							<input type="hidden" name="kd_kriteria" id="kd_kriteria" value="<?=$kriteria->kd_kriteria?>">

                            <div class="form-group">
								<label for="target">Target</label>
								<input type="text" class="form-control" id="target" name="target" placeholder="Target"
									autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="bobot_target">Bobot Target</label>
								<select class="form-control" name="bobot_target" id="bobot_target">
									<option selected disabled>Pilih salah satu</option>
									<?php for( $i = 0; $i < count($nilai_target); $i++): $tmp = $i+1; ?>
									<option value = "<?=$tmp?>"><?=$tmp." - ".$nilai_target[$i]?></option>
									<?php endfor ?>
								</select>
								
							</div>

							<div class="form-group">
								<label for="tipe">Type Core</label>
								<select class="form-control" name="tipe" id="tipe">
									<option selected disabled>Pilih salah satu</option>
									<option value = "primary">Primary Core</option>
									<option value = "secondary">Secondary Core</option>
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
									<td><?=$dt->kd_target?></td>
									<td><?=$dt->target?></td>
									<td><?=$dt->bobot_target?></td>
									<td><?=ucwords($dt->tipe)?></td>
									<td>opsi</td>
								</tr>
							<?php endforeach?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>