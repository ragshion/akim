<div class="content-wrapper mt-4">
	<section class="content">
		<div class="container-fluid">
			<div class="modal fade" id="modal-detail">
		        <div class="modal-dialog modal-lg">
		          	<div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Detail Data</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			              <table class="table">
			              	<tbody>
			              		<tr>
			              			<th width="25%">Nomor KK</th>
			              			<td width="2">:</td>
			              			<td id="nomor_kk"></td>
			              		</tr>
			              		<tr>
			              			<th>Kepala Keluarga</th>
			              			<td width="2">:</td>
			              			<td id="kepala"></td>
			              		</tr>
			              		<tr>
			              			<th>Alamat</th>
			              			<td width="2">:</td>
			              			<td id="alamat"></td>
			              		</tr>
			              		<tr>
			              			<th>RT/RW</th>
			              			<td width="2">:</td>
			              			<td id="rtrw"></td>
			              		</tr>
			              		<tr>
			              			<th>Desa/ Kelurahan</th>
			              			<td width="2">:</td>
			              			<td id="desa"></td>
			              		</tr>
			              		<tr>
			              			<th>Kecamatan</th>
			              			<td width="2">:</td>
			              			<td id="kecamatan"></td>
			              		</tr>
			              		<tr>
			              			<th>Kabupaten/ Kota</th>
			              			<td width="2">:</td>
			              			<td id="kabupaten"></td>
			              		</tr>
			              		<tr>
			              			<th>Provinsi</th>
			              			<td width="2">:</td>
			              			<td id="provinsi"></td>
			              		</tr>
			              		<tr>
			              			<th>Kode Pos</th>
			              			<td width="2">:</td>
			              			<td id="kode_pos"></td>
			              		</tr>
			              	</tbody>
			              </table>
			              <hr>
			              <h5>Data Anggota Keluarga</h5>
			              <hr>
			              <table id="detail_warga" class="table table-striped table-bordered datatable">
			              	<thead>
			              		<tr>
			              			<th>No</th>
			              			<th>Nomor KK</th>
			              			<th>Nama Lengkap</th>
			              			<th>Hubungan Dalam Keluarga</th>
			              		</tr>
			              	</thead>
			              	<tbody>
			              	</tbody>
			              </table>
			            </div>
		          	</div>
		        </div>
		      </div>
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">
					<div class="card card-success card-outline">
						<div class="card-body">
							<h5 class="card-title">Data Kartu Keluarga</h5>
							<p class="card-text">
								<hr>
							</p>
							<a href="<?=base_url('kartu_keluarga/tambah')?>" class="btn bg-gradient-success"><i class="fas fa-plus"></i> Tambah Data</a>
							<a href="<?=base_url('kartu_keluarga/cetak')?>" class="btn bg-gradient-danger float-right"><i class="fas fa-file-pdf"></i> Cetak Pdf</a>
							<p></p>
							<table class="table table-bordered table-striped datatable">
				                <thead>
					                <tr>
					                	<th>No</th>
					                  	<th>Nomor KK</th>
					                  	<th>Kepala Keluarga</th>
					                  	<th>Alamat</th>
					                  	<th>RT/RW</th>
					                  	<th>Desa/ Kelurahan</th>
					                  	<th>Kecamatan</th>
					                  	<th>Kabupaten/ Kota</th>
					                  	<th>Kode Pos</th>
					                  	<th>Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php $no = 1; foreach ($data as $row): ?>
				                		<tr>
				                			<td><?=$no?></td>
				                			<td><?=$row['nomor']?></td>
				                			<td><?=$row['kepala_keluarga']?></td>
				                			<td><?=ucwords(strtolower($row['alamat']))?></td>
				                			<td><?=$row['rt'].'/'.$row['rw']?></td>
				                			<td><?=ucwords(strtolower($row['nama_desa']))?></td>
				                			<td><?=ucwords(strtolower($row['nama_kec']))?></td>
				                			<td><?=ucwords(strtolower($row['nama_kab']))?></td>
				                			<td><?=ucwords(strtolower($row['kode_pos']))?></td>
				                			<td>
				                				<button class="btn btn-info btn-sm" onclick="detail_keluarga('<?=$row['id']?>')" title="Detail"><i class="fas fa-info"></i> </button>
				                				<a href="<?=base_url('kartu_keluarga/edit/').$row['id']?>" class="btn btn-secondary btn-sm" title="Ubah"><i class="fas fa-edit"></i> </a>
				                				<a href="javascript:;" rel="<?=base_url('kartu_keluarga/hapus/').$row['id']?>" class="btn btn-danger btn-sm del" title="Hapus"><i class="fas fa-trash"></i> </a>
				                			</td>
				                		</tr>
				                	<?php $no++; endforeach ?>
				                </tbody>
				            </table>
						</div>
					</div><!-- /.card -->
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
</div>