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
			              <p>One fine body&hellip;</p>
			            </div>
		          	</div>
		        </div>
		      </div>
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">
					<div class="card card-info card-outline">
						<div class="card-body">
							<h5 class="card-title">Data Warga Mutasi Tempat Tinggal</h5>
							<p class="card-text">
								<hr>
							</p>
							<a href="<?=base_url('mutasi/cetak')?>" class="btn bg-gradient-danger float-right"><i class="fas fa-file-pdf"></i> Cetak Pdf</a>
							<p></p>
							<table class="table table-bordered table-striped datatable">
				                <thead>
					                <tr>
					                	<th>No</th>
					                  	<th>NIK</th>
					                  	<th>Nama</th>
					                  	<th>Alamat Mutasi</th>
					                  	<th>Tanggal Lahir</th>
					                  	<th>Pendidikan Terakhir</th>
					                  	<th>Pekerjaan</th>
					                  	<th>Tanggal Mutasi</th>
					                  	<th>Aksi</th>
					                </tr>
				                </thead>
				                <tbody>
				                	<?php $no = 1; foreach ($data as $row): ?>
				                		<tr>
				                			<td><?=$no?></td>
				                			<td><?=$row['nik']?></td>
				                			<td><?=$row['nama']?></td>
				                			<td><?=$row['alamat_mutasi']?></td>
				                			<td><?=tanggal_indo($row['tanggal_lahir'])?></td>
				                			<td><?=$row['pendidikan_terakhir']?></td>
				                			<td><?=$row['nama_pekerjaan']?></td>
				                			<td><?=tanggal_indo($row['tanggal_mutasi'])?></td>
				                			<td>
				                				<button class="btn btn-info btn-sm" onclick="detail_warga('<?=$row['id']?>')" title="Detail"><i class="fas fa-info"></i> </button>
				                				<a href="<?=base_url('mutasi/edit/').$row['id']?>" class="btn btn-secondary btn-sm" title="Ubah"><i class="fas fa-edit"></i> </a>
				                				<a href="javascript:;" rel="<?=base_url('mutasi/hapus/').$row['id']?>" class="btn btn-danger btn-sm del" title="Hapus"><i class="fas fa-trash"></i> </a>
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
