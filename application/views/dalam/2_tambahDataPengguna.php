<div class="page-title">
	<h3 class="breadcrumb-header">Tambah Data Pengguna</h3>
</div>

<div class="row d-flex justify-content-center">
	<div class="col-md-12 ">
		<div class="panel panel-white">
			<div class="panel-heading clearfix">
				<h4 class="panel-title">Tambah Data Pengguna</h4>
			</div>
			<div class="panel-body">
				<form method="post" action="<?= base_url("Admin/prosesCreateDataPengguna")?>">
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
							<option value = "Laki - Laki">Laki - Laki</option>
							<option value = "Perempuan">Perempuan</option>
						</select>
					</div>

                    <div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username"
							placeholder="Username" autocomplete="off" required readonly value = "<?=$username?>">
					</div>

                    <div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password"
							placeholder="Password" autocomplete="off" required readonly value = "PM12345678">
                            <p class="help-block text-danger" style="margin-bottom:0;">Paswrod Default : PM12345678</p>
					</div>

                    <div class="form-group">
						<label for="level_akses">Level Akses</label>
						<select class="form-control" name="level_akses" id="level_akses">
							<option selected disabled>Pilih salah satu</option>
							<option value = "admin">Admin</option>
							<option value = "umum">Umum</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
