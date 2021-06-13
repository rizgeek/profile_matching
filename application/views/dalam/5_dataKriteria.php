<div class="page-title">
	<h3 class="breadcrumb-header">Data Kriteria</h3>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Data Kriteria</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Kriteria</th>
								<th>Kriteria</th>
								<th>Core Factor</th>
								<th>Secondary Factor</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                <th>No</th>
								<th>Kode Kriteria</th>
								<th>Kriteria</th>
								<th>Core Factor</th>
								<th>Secondary Factor</th>
								<th>Opsi</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $no = 1; foreach($data as $dt):?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$kd_kriteria = $dt->kd_kriteria?></td>
                                    <td><?=$kriteria = $dt->kriteria?></td>
                                    <td><?=$core = $dt->core?></td>
                                    <td><?=$secondary = $dt->secondary?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-spin fa-refresh"></i> Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a onclick="tambahTarget('<?=$kd_kriteria?>')" href="#">Tambah Target</a></li>
                                                <li><a onclick="updateData('<?=$kd_kriteria?>')" href="#">Update Data</a></li>
                                                <li><a onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_kriteria','<?=$kd_kriteria?>','tb_kriteria','dataKriteria')" href="#">Hapus</a></li>
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
			title: 'Yakin ingin melakukan update data?',
			text: "Tekan Iya jika yakin!",
			icon: 'question',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya, Update data'
			}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?=base_url('Admin/updateDataKriteria/')?>"+kd_kriteria;
			}
		})
	}

	function tambahTarget(kd_kriteria) {
		Swal.fire({
			title: 'Yakin ingin tambah data target?',
			text: "Tekan Iya jika yakin!",
			icon: 'question',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya, Update data'
			}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?=base_url('Admin/tambahDataTarget/')?>"+kd_kriteria;
			}
		})
	}
</script>