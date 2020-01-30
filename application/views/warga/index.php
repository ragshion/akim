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
			              			<th>NIK</th>
			              			<td width="2">:</td>
			              			<td id="nik"></td>
			              		</tr>
			              		<tr>
			              			<th>Nama</th>
			              			<td width="2">:</td>
			              			<td id="nama"></td>
			              		</tr>
			              		<tr>
			              			<th>Tempat, Tanggal Lahir</th>
			              			<td width="2">:</td>
			              			<td id="ttl"></td>
			              		</tr>
			              		<tr>
			              			<th>Agama</th>
			              			<td width="2">:</td>
			              			<td id="agama"></td>
			              		</tr>
			              		<tr>
			              			<th>Jenis Kelamin</th>
			              			<td width="2">:</td>
			              			<td id="jenis_kelamin"></td>
			              		</tr>
			              		<tr>
			              			<th>Alamat</th>
			              			<td width="2">:</td>
			              			<td id="alamat"></td>
			              		</tr>
			              		<tr>
			              			<th>Pekerjaan</th>
			              			<td width="2">:</td>
			              			<td id="pekerjaan"></td>
			              		</tr>
			              		<tr>
			              			<th>Status Perkawinan</th>
			              			<td width="2">:</td>
			              			<td id="status_perkawinan"></td>
			              		</tr>
			              		<tr>
			              			<th>Status Hidup</th>
			              			<td width="2">:</td>
			              			<td id="status"></td>
			              		</tr>
			              	</tbody>
			              </table>
			              <hr>
			              <h5>Data Keluarga</h5>
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
					<div class="card card-primary card-outline">
						<div class="card-body">
							<h5 class="card-title">Data Warga</h5>
							<p class="card-text">
								<hr>
							</p>
							<a href="<?=base_url('warga/tambah')?>" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Tambah Data</a>
							<a href="<?=base_url('warga/cetak')?>" class="btn bg-gradient-danger float-right"><i class="fas fa-file-pdf"></i> Cetak Pdf</a>
							<p></p>
							<table class="table table-bordered table-striped datatable">
				                <thead>
					                <tr>
					                	<th>No</th>
					                  	<th>NIK</th>
					                  	<th>Nama</th>
					                  	<th>Alamat</th>
					                  	<th>Tanggal Lahir</th>
					                  	<th>Pendidikan Terakhir</th>
					                  	<th>Pekerjaan</th>
					                  	<th>Status Kawin</th>
					                  	<th>Status Aktif</th>
					                  	<th>Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php $no = 1; foreach ($data as $row): ?>
				                		<tr>
				                			<td><?=$no?></td>
				                			<td><?=$row['nik']?></td>
				                			<td><?=$row['nama']?></td>
				                			<td><?=$row['alamat']?></td>
				                			<td><?=tanggal_indo($row['tanggal_lahir'])?></td>
				                			<td><?=$row['pendidikan_terakhir']?></td>
				                			<td><?=$row['nama_pekerjaan']?></td>
				                			<td><?=ucwords(strtolower($row['status_perkawinan']))?></td>
				                			<td><?=$row['status']?></td>
				                			<td>
				                				<button class="btn btn-info btn-sm" onclick="detail_warga('<?=$row['id']?>')" title="Detail"><i class="fas fa-info"></i> </button>
				                				<a href="<?=base_url('warga/edit/').$row['id']?>" class="btn btn-secondary btn-sm" title="Ubah"><i class="fas fa-edit"></i> </a>
				                				<a href="javascript:;" rel="<?=base_url('warga/hapus/').$row['id']?>" class="btn btn-danger btn-sm del" title="Hapus"><i class="fas fa-trash"></i> </a>
				                				<a href="<?=base_url('mutasi/tambah/').$row['id']?>"class="btn btn-success btn-sm" title="Mutasi"><i class="fas fa-check" ></i> </a>
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
