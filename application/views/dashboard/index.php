<div class="content-wrapper mt-4">
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-4 col-4">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?=$warga?></h3>

							<p>Data Warga</p>
						</div>
						<div class="icon">
							<i class="ion ion-person"></i>
						</div>
						<a href="<?=base_url('warga')?>" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-4">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?=$kartu_keluarga?></h3>

							<p>Kartu Keluarga</p>
						</div>
						<div class="icon">
							<i class="ion ion-card"></i>
						</div>
						<a href="<?=base_url('kartu_keluarga')?>" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-4">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?=$mutasi?></h3>

							<p>Warga Mutasi Tempat Tinggal</p>
						</div>
						<div class="icon">
							<i class="ion ion-archive"></i>
						</div>
						<a href="<?=base_url('mutasi')?>" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-6">
					<div class="card card-warning card-outline">
		              <div class="card-header">
		                <h3 class="card-title">Grafik Warga Berdasarkan Jenis Kelamin</h3>

		                <div class="card-tools">
		                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		                  </button>
		                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
		                  </button>
		                </div>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body" style="display: block;">
		                <div class="row">
		                  <div class="col-md-8">
		                    <div class="chart-responsive"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
		                      <canvas id="pieChart" height="147" width="296" class="chartjs-render-monitor" style="display: block; height: 118px; width: 237px;"></canvas>
		                    </div>
		                    <!-- ./chart-responsive -->
		                  </div>
		                  <!-- /.col -->
		                  <div class="col-md-4">
		                    <ul class="chart-legend clearfix">
		                      <li><i class="far fa-circle text-danger"></i> Laki-laki</li>
		                      <li><i class="far fa-circle text-info"></i> Perempuan</li>
		                    </ul>
		                  </div>
		                  <!-- /.col -->
		                </div>
		                <!-- /.row -->
		              </div>
		              <!-- /.card-body -->
		            </div>
				</div>
				<div class="col-6">
					<div class="card card-primary card-outline">
		              <div class="card-header">
		                <h3 class="card-title">Grafik Warga Berdasarkan Usia</h3>

		                <div class="card-tools">
		                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		                  </button>
		                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
		                  </button>
		                </div>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body" style="display: block;">
		                <div class="row">
		                  <div class="col-md-8">
		                    <div class="chart-responsive"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
		                      <canvas id="pieUsia" height="147" width="296" class="chartjs-render-monitor" style="display: block; height: 118px; width: 237px;"></canvas>
		                    </div>
		                    <!-- ./chart-responsive -->
		                  </div>
		                  <!-- /.col -->
		                  <div class="col-md-4">
		                    <ul class="chart-legend clearfix">
		                      <li><i class="far fa-circle text-danger"></i> Balita (0-5th)</li>
		                      <li><i class="far fa-circle text-info"></i> Kanak-kanak (5-11th)</li>
		                      <li><i class="far fa-circle text-warning"></i> Remaja (12-25th)</li>
		                      <li><i class="far fa-circle text-primary"></i> Dewasa (26-45th)</li>
		                      <li><i class="far fa-circle text-success"></i> Lansia (>46th)</li>
		                      <li><i class="far fa-circle text-secondary"></i> Kosong</li>
		                    </ul>
		                  </div>
		                  <!-- /.col -->
		                </div>
		                <!-- /.row -->
		              </div>
		              <!-- /.card-body -->
		            </div>
				</div>
			</div>
            <div class="row">
            	<div class="col-12">
	            	<div class="card card-info card-outline">
		              <div class="card-header">
		                <h3 class="card-title">Grafik Penambahan Data Warga</h3>

		                <div class="card-tools">
		                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		                  </button>
		                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
		                  </button>
		                </div>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body" style="display: block;">
		                <div class="form-group mt-0 pb-0">
	                        <b>Berdasarkan Bulan</b>
	                        <select class="form-control select2 mt-0" id="pilihbulan">
	                            <option value="all" selected="">Semua. . .</option>
	                            <option value="1">Januari</option>
	                            <option value="2">Februari</option>
	                            <option value="3">Maret</option>
	                            <option value="4">April</option>
	                            <option value="5">Mei</option>
	                            <option value="6">Juni</option>
	                            <option value="7">Juli</option>
	                            <option value="8">Agustus</option>
	                            <option value="9">September</option>
	                            <option value="10">Oktober</option>
	                            <option value="11">November</option>
	                            <option value="12">Desember</option>
	                        </select>
	                    </div>
	                    
		                <div class="col-12">
		                    <canvas class="text-center" id="chartBulan" height="100%"></canvas>
		                </div>


		              </div>
		              <!-- /.card-body -->
		            </div>
            	</div>
            </div>
            </div>
		</div><!-- /.container-fluid -->
	</section>
</div>

