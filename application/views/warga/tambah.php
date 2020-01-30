<div class="content-wrapper mt-4">
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Form Tambah Data Warga</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="form-horizontal" method="post" action="<?=base_url('warga/simpan')?>">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Warga</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tempat Lahir</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-10">
										<select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
											<option value="0" selected disabled>Pilih Jenis Kelamin</option>
											<option value="laki-laki">Laki-Laki</option>
											<option value="perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Agama</label>
									<div class="col-sm-10">
										<select name="agama" id="agama" class="form-control select2">
											<option value="0" selected disabled>Agama</option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Buddha">Buddha</option>
											<option value="Konghucu">Konghucu</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Alamat</label>
									<div class="col-sm-10">
										<textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">RT</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="rt" name="rt" placeholder="RT">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">RW</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="rw" name="rw" placeholder="RW">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
									<div class="col-sm-10">
										<select name="kabupaten_kota" id="kabupaten_kota" class="form-control select2">
											<option value="0" selected disabled>Pilih Kabupaten/Kota</option>
											<?php foreach ($kabupaten as $k): ?>
												<option value="<?=$k['id']?>"><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kecamatan</label>
									<div class="col-sm-10">
										<select name="kecamatan" id="kecamatan" class="form-control select2">
											<option value="0" selected disabled>Pilih Kecamatan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
									<div class="col-sm-10">
										<select name="desa_kelurahan" id="desa_kelurahan" class="form-control select2">
											<option value="0" selected disabled>Pilih Desa/Kelurahan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Pekerjaan</label>
									<div class="col-sm-10">
										<select name="pekerjaan" id="pekerjaan" class="form-control select2">
											<option value="0" selected disabled>Pilih Pekerjaan</option>
											<?php foreach ($pekerjaan as $row): ?>
												<option value="<?=$row['id']?>"><?=$row['nama']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
									<div class="col-sm-10">
										<select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control select2">
											<option value="0" selected disabled>Pilih Pendidikan Terakhir</option>
											<option value="SD/MI">SD/MI</option>
											<option value="SMP/MTS">SMP/MTS</option>
											<option value="SMA/SMK/MA">SMA/SMK/MA</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Status Perkawinan</label>
									<div class="col-sm-10">
										<select name="status_perkawinan" id="status_perkawinan" class="form-control select2">
											<option value="0" selected disabled>Pilih Status Perkawinan</option>
											<option value="BELUM KAWIN">BELUM KAWIN</option>
											<option value="KAWIN">KAWIN</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Status Aktif</label>
									<div class="col-sm-10">
										<select name="status" id="status" class="form-control select2">
											<option value="0" selected disabled>Pilih Status Aktif</option>
											<option value="Masih Hidup">Masih Hidup</option>
											<option value="Sudah Meninggal">Sudah Meninggal</option>
										</select>
									</div>
								</div>

							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Simpan</button>
								<a href="<?=base_url('warga')?>" class="btn bg-gradient-maroon float-right"><i class="fas fa-backward"></i> Batal</a>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
</div>
