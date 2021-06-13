<div class="page-title">
	<h3 class="breadcrumb-header">Tambah Data Nilai</h3>
</div>


<div class="row d-flex justify-content-center">
	<div class="col-md-12 ">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Tambah Data Nilai</h4>
			</div>
			<div class="panel-body">
				<form method="post" action="<?= base_url("Admin/prosesCreateNilai")?>">
				
                    <div class="form-group">
						<label for="kd_tas">Tas</label>
						<select class="form-control" name="kd_tas" id="kd_tas">
							<option selected disabled>Pilih salah satu</option>
                            <?php foreach($tas as $dt) : ?>
                                <option value = "<?=$dt->kd_tas?>" ><?=$dt->nama_tas?></option>
                            <?php endforeach; ?>
						</select>
					</div>

                    <?php $no = 1; foreach($target as $dt):?>
                        <div class="form-group">
                            <label for="<?= $dt->kd_target?>"><?=$no++?> - <?=$dt->target?></label>
                            <select class="form-control" name="<?= $dt->kd_target?>" id="<?= $dt->kd_target?>" required>
                                <option selected disabled>Pilih salah satu</option>
                                <?php for($i = 0; $i < count($nilai); $i++) : $tmp = $i + 1; ?>
                                    <option value = "$tmp" ><?=$tmp?> - <?=$nilai[$i]?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>
                    

					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
