<div class="page-title">
	<h3 class="breadcrumb-header">Data Kriteria</h3>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Input Data Kriteria</h4>
			</div>
			<div class="panel-body">
				<form method="post" action="<?= base_url("Admin/prosesCreateKriteria")?>">
					<div class="row">
						<div class="col-xl-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="kriteria">Kriteria</label>
								<input type="text" class="form-control" id="kriteria" name="kriteria"
									placeholder="Masukan Kriteria " autocomplete="off" required>
							</div>

                            <div class="form-group">
								<label for="bobot">Bobot</label>
								<input type="number" step="1" min="0" max="100" class="form-control" id="bobot" name="bobot"
									placeholder="Nilai Bobot" autocomplete="off" required>
							</div>

							<div class="form-group">
								<label for="core">Core</label>
								<input type="number" step="1" min="0" max="100" class="form-control" id="core" name="core"
									placeholder="Masukan Nilai Core " autocomplete="off" required>
							</div>

                            <div class="form-group">
								<label for="secondary">Secondary</label>
								<input  type="number" step="1" min="0" max="100" 1 class="form-control" id="secondary" name="secondary"
									placeholder="Masukan Nilai Secondary" autocomplete="off" required readonly>
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





<script>
    $(document).on('keyup mouseup', '#core', function() {
        var core = document.getElementById('core').value;
        if(core > 100){
            Swal.fire(
                'Perhatian',
                'Rentang Nilai hanya dari 0 sampai 100',
                'warning'
            );
            document.getElementById('core').value = '';
            document.getElementById('secondary').value = '';
        }else{
            document.getElementById('secondary').value = 100 - core;
        }
    });

    $(document).on('keyup mouseup', '#bobot', function() {

        var bobot_input = document.getElementById('bobot').value;
        var bobot_sekarang = '<?=$bobot->bobot?>' == '' ? 0 : '<?=$bobot->bobot?>';
        bobot_sekarang = parseInt(bobot_sekarang);

        if(bobot_input > 100){
            Swal.fire(
                'Perhatian',
                'Rentang Nilai hanya dari 0 sampai 100',
                'warning'
            );
            document.getElementById('bobot').value = '';
        }else if (bobot_sekarang >= 100){
            Swal.fire(
                'Perhatian',
                'Bobot Telah mencapai 100% dan tidak dapat diinput lagi',
                'warning'
            );
            document.getElementById('bobot').value = '';
        }
    });


</script>
