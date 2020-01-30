<div class="content-wrapper mt-4">
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Form Tambah Data Warga</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="form-horizontal" method="post" action="<?=base_url('kartu_keluarga/simpan')?>">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nomor KK</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor KK">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kepala Keluarga</label>
									<div class="col-sm-10">
										<select name="id_kepala" id="id_kepala" class="form-control select2">
											<option value="0" selected disabled>Pilih Kepala Keluarga</option>
											<?php foreach ($kepala as $k): ?>
												<option value="<?=$k['id']?>"><?=$k['nama'].' | '.tanggal_indo($k['tanggal_lahir']).' | '.$k['alamat']?></option>
											<?php endforeach ?>
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
									<label class="col-sm-2 col-form-label">Provinsi</label>
									<div class="col-sm-10">
										<select name="provinsi" id="provinsi" class="form-control select2">
											<option value="0" selected disabled>Pilih Provinsi</option>
											<?php foreach ($provinsi as $k): ?>
												<option value="<?=$k['id']?>"><?=$k['name']?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
									<div class="col-sm-10">
										<select name="kabupaten" id="kabupaten_kota" class="form-control select2">
											<option value="0" selected disabled>Pilih Kabupaten/Kota</option>
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
									<label class="col-sm-2 col-form-label">Kode Pos</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Istri</label>
									<div class="col-sm-10">
										<select name="istri" id="istri" class="form-control select2">
											<option value="0" selected disabled>Pilih Istri</option>
											<?php foreach ($istri as $k): ?>
												<option value="<?=$k['id']?>"><?=$k['nama'].' | '.tanggal_indo($k['tanggal_lahir']).' | '.$k['alamat']?></option>
											<?php endforeach ?>
										</select>
										<small>Kosongi Bila Tidak Memiliki Istri</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Data Anak</label>
									<div class="col-sm-10">
										<select name="anak[]" id="anak[]" class="form-control select2" multiple="">
											<?php foreach ($anak as $k): ?>
												<option value="<?=$k['id']?>"><?=$k['nama'].' | '.tanggal_indo($k['tanggal_lahir']).' | '.$k['alamat']?></option>
											<?php endforeach ?>
										</select>
										<small>Dapat Memilih Lebih Dari 1 Anak</small><br>
										<small>Kosongi Bila Tidak Memiliki Anak</small>
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
