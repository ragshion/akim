<div class="content-wrapper mt-4">
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Form Ubah Mutasi Data Warga</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="form-horizontal" method="post" action="<?=base_url('mutasi/update')?>">
							<div class="card-body">
								<input type="hidden" name="id" value="<?=$data['id']?>">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">NIK</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" readonly id="nik" name="nik" placeholder="NIK" value="<?=$data['nik']?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Warga</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" readonly id="nama" name="nama" placeholder="Nama"  value="<?=$data['nama']?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tempat Lahir</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" readonly id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"  value="<?=$data['tempat_lahir']?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker" readonly id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir"  value="<?=$data['tanggal_asli']?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-10">
										<select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Jenis Kelamin</option>
											<option value="laki-laki" <?= ($data['jenis_kelamin']=='laki-laki') ? 'selected' : '' ?> >Laki-Laki</option>
											<option value="perempuan" <?= ($data['jenis_kelamin']=='perempuan') ? 'selected' : '' ?>>Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Agama</label>
									<div class="col-sm-10">
										<select name="agama" id="agama" class="form-control select2" disabled>
											<option value="0" disabled>Agama</option>
											<option value="Islam" <?= ($data['agama']=='Islam') ? 'selected' : '' ?>>Islam</option>
											<option value="Kristen" <?= ($data['agama']=='Kristen') ? 'selected' : '' ?>>Kristen</option>
											<option value="Katolik" <?= ($data['agama']=='Katolik') ? 'selected' : '' ?>>Katolik</option>
											<option value="Hindu" <?= ($data['agama']=='Hindu') ? 'selected' : '' ?>>Hindu</option>
											<option value="Buddha" <?= ($data['agama']=='Buddha') ? 'selected' : '' ?>>Buddha</option>
											<option value="Konghucu" <?= ($data['agama']=='Konghucu') ? 'selected' : '' ?>>Konghucu</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Alamat</label>
									<div class="col-sm-10">
										<textarea name="alamat" id="alamat" class="form-control" readonly placeholder="Alamat"><?=$data['alamat']?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">RT</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" readonly id="rt" name="rt" placeholder="RT" value="<?=$data['rt']?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">RW</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" readonly id="rw" name="rw" placeholder="RW" value="<?=$data['rw']?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
									<div class="col-sm-10">
										<select name="kabupaten_kota" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Kabupaten/Kota</option>
											<?php foreach ($kabupaten as $k): ?>
												<option value="<?=$k['id']?>" <?= ($data['kabupaten_kota']==$k['id']) ? 'selected' : '' ?>><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kecamatan</label>
									<div class="col-sm-10">
										<select name="kecamatan" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Kecamatan</option>
											<?php foreach ($kecamatan as $k): ?>
												<option value="<?=$k['id']?>" <?= ($data['kecamatan']==$k['id']) ? 'selected' : '' ?>><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
									<div class="col-sm-10">
										<select name="desa_kelurahan" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Desa/Kelurahan</option>
											<?php foreach ($desa_kelurahan as $k): ?>
												<option value="<?=$k['id']?>" <?= ($data['desa_kelurahan']==$k['id']) ? 'selected' : '' ?>><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Pekerjaan</label>
									<div class="col-sm-10">
										<select name="pekerjaan" id="pekerjaan" class="form-control select2" disabled>
											<option value="0" selected disabled>Pilih Pekerjaan</option>
											<?php foreach ($pekerjaan as $row): ?>
												<option value="<?=$row['id']?>" <?= ($data['pekerjaan']==$row['id']) ? 'selected' : '' ?>><?=$row['nama']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
									<div class="col-sm-10">
										<select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Pendidikan Terakhir</option>
											<option value="SD/MI" <?= ($data['pendidikan_terakhir']=='SD/MI') ? 'selected' : '' ?>>SD/MI</option>
											<option value="SMP/MTS" <?= ($data['pendidikan_terakhir']=='SMP/MTS') ? 'selected' : '' ?>>SMP/MTS</option>
											<option value="SMA/SMK/MA" <?= ($data['pendidikan_terakhir']=='SMA/SMK/MA') ? 'selected' : '' ?>>SMA/SMK/MA</option>
											<option value="S1" <?= ($data['pendidikan_terakhir']=='S1') ? 'selected' : '' ?>>S1</option>
											<option value="S2" <?= ($data['pendidikan_terakhir']=='S2') ? 'selected' : '' ?>>S2</option>
											<option value="S3" <?= ($data['pendidikan_terakhir']=='S3') ? 'selected' : '' ?>>S3</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Status Perkawinan</label>
									<div class="col-sm-10">
										<select name="status_perkawinan" id="status_perkawinan" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Status Perkawinan</option>
											<option value="BELUM KAWIN" <?= ($data['status_perkawinan']=='BELUM KAWIN') ? 'selected' : '' ?>>BELUM KAWIN</option>
											<option value="KAWIN" <?= ($data['status_perkawinan']=='KAWIN') ? 'selected' : '' ?>>KAWIN</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Status Aktif</label>
									<div class="col-sm-10">
										<select name="status" id="status" class="form-control select2" disabled>
											<option value="0" disabled>Pilih Status Aktif</option>
											<option value="Masih Hidup" <?= ($data['status']=='Masih Hidup') ? 'selected' : '' ?>>Masih Hidup</option>
											<option value="Sudah Meninggal" <?= ($data['status']=='Sudah Meninggal') ? 'selected' : '' ?>>Sudah Meninggal</option>
										</select>
									</div>
								</div>
								<hr>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Lokasi Mutasi</label>									
								</div>
								<hr>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Alamat</label>
									<div class="col-sm-10">
										<textarea name="alamat_mutasi" id="alamat" class="form-control" placeholder="Alamat"><?=$data['alamat_mutasi']?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">RT</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="rt" name="rt_mutasi" value="<?=$data['rt_mutasi']?>" placeholder="RT">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">RW</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="rw" value="<?=$data['rt_mutasi']?>"  name="rw_mutasi" placeholder="RW" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
									<div class="col-sm-10">
										<select name="kabupaten_mutasi" id="kabupaten_kota" class="form-control select2">
											<option value="0" disabled>Pilih Kabupaten/Kota</option>
											<?php foreach ($kabupaten as $k): ?>
												<option value="<?=$k['id']?>" <?= ($data['kabupaten_mutasi']==$k['id']) ? 'selected' : '' ?>><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kecamatan</label>
									<div class="col-sm-10">
										<select name="kecamatan_mutasi" id="kecamatan" class="form-control select2">
											<option value="0" disabled>Pilih Kecamatan</option>
											<?php foreach ($kecamatan as $k): ?>
												<option value="<?=$k['id']?>" <?= ($data['kecamatan_mutasi']==$k['id']) ? 'selected' : '' ?>><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
									<div class="col-sm-10">
										<select name="desa_mutasi" id="desa_kelurahan" class="form-control select2">
											<option value="0" disabled>Pilih Desa/Kelurahan</option>
											<?php foreach ($desa_kelurahan as $k): ?>
												<option value="<?=$k['id']?>" <?= ($data['desa_mutasi']==$k['id']) ? 'selected' : '' ?>><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Mutasi</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker" value="<?=$data['tanggal_mutasi']?>" id="tanggal_mutasi" name="tanggal_mutasi" placeholder="Tanggal Mutasi">
									</div>
								</div>

							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn bg-gradient-info"><i class="fas fa-recycle"></i> Perbarui Mutasi</button>
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
