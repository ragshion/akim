
<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		Anything you want
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url('assets/')?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url('assets/')?>plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>

<!-- ChartJS -->
<script src="<?=base_url('assets/')?>plugins/chart.js/Chart.min.js"></script>

<script>

    var ctx;
    var myChart;

	$(function(){
		$('.select2').select2();
		<?= $this->session->flashdata('alert'); ?>

		$('.datatable').DataTable()
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        })

        if ($('#pieChart').length > 0) {
            $.get('<?=base_url('dashboard/chart_jk')?>',
            function(data){
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData        = {
                  labels: [
                      'Laki-Laki', 
                      'Perempuan'
                  ],
                  datasets: [
                    {
                      data: [data.laki_laki,data.perempuan],
                      backgroundColor : ['#f56954', '#3c8dbc'],
                    }
                  ]
                }
                var pieOptions     = {
                  legend: {
                    display: false
                  }
                }

                var pieChart = new Chart(pieChartCanvas, {
                  type: 'pie',
                  data: pieData,
                  options: pieOptions      
                })
            });

            $.get('<?=base_url('dashboard/chart_usia')?>',
            function(data){
                var pieChartCanvas = $('#pieUsia').get(0).getContext('2d')
                var pieData        = {
                  labels: [
                      'Balita', 
                      'Kanak',
                      'Remaja',
                      'Dewasa',
                      'Lansia',
                      'Kosong'
                  ],
                  datasets: [
                    {
                      data: [data.balita,data.kanak,data.remaja,data.dewasa,data.lansia,data.kosong],
                      backgroundColor : ['#dc3545', '#17a2b8','#ffc107','#007bff','#28a745','#6c757d'],
                    }
                  ]
                }
                var pieOptions     = {
                  legend: {
                    display: false
                  }
                }

                var pieChart = new Chart(pieChartCanvas, {
                  type: 'pie',
                  data: pieData,
                  options: pieOptions      
                })
            });

        // pilih bulan

            $('#pilihbulan').change(function(){
              getGrafikPerbulan();
            });

            $.get('<?=base_url('dashboard/grafikperbulan')?>',
            function(data){
                ctx  = $('#chartBulan').get(0).getContext("2d");
                var warga = [];
                  for (i = 0; i < data.length; i++) { 
                      warga.push(parseInt(data[i].warga));
                  }

                  var cars = [{
                      label: "Warga",
                      fill: false,
                      borderColor: "rgba(14, 205, 119, 1)",
                      backgroundColor: "rgba(14, 205, 119, 1)",
                      data: warga
                        }
                  ];

                  var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                  myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                          labels: label,
                          datasets: cars
                        },
                        options: {
                          responsive : true,
                          animateScale : true
                        }
                  });
            });


        // end pilih bulan

        }

	})

    function getGrafikPerbulan(){
        var bulan = $('#pilihbulan').val();
        var tahun = '20';
        if(bulan=='all'){
            location.reload();
        }else{
            $.get('<?= base_url('dashboard/grafikperhari/')?>'+bulan+'/'+tahun,
            function(data){
                var label = [];          
                var warga = [];
                for (i = 0; i < data.length; i++) { 
                    label.push(i+1);
                    warga.push(parseInt(data[i].warga));
                }

                var cars = [{
                    label: "Data Warga",
                    fill: false,
                    borderColor: "rgba(14, 205, 119, 1)",
                    backgroundColor: "rgba(14, 205, 119, 1)",
                    data: warga
                  }
                ];

                myChart.data.labels = label;
                myChart.data.datasets = cars;
                myChart.update();
            });
        }
    }

    $("#provinsi").on("select2:select", function (e) {
        load_kabupaten($('#provinsi').val());
    });

	$("#kabupaten_kota").on("select2:select", function (e) {
        load_kecamatan($('#kabupaten_kota').val());
    });

    $("#kecamatan").on("select2:select", function (e) {
        load_desa($('#kecamatan').val());
    });

    function load_desa(id){
		$('#desa_kelurahan').val('0').change();
        $('#desa_kelurahan').find('option').not(':first').remove();

		$.post('<?=base_url('warga/load_desa')?>',
        {
          id:id
        },
        function(data){
        	console.log(data)
        	for (var i = 0; i < data.length; i++) {
            	$("#desa_kelurahan").append('<option value='+data[i].id+'>'+data[i].name+'</option>')
            }
        });
	}

	function load_kecamatan(id){
		$('#kecamatan').val('0').change();
        $('#kecamatan').find('option').not(':first').remove();
        $('#desa_kelurahan').val('0').change();
        $('#desa_kelurahan').find('option').not(':first').remove();

		$.post('<?=base_url('warga/load_kecamatan')?>',
        {
          id:id
        },
        function(data){
        	console.log(data)
        	for (var i = 0; i < data.length; i++) {
            	$("#kecamatan").append('<option value='+data[i].id+'>'+data[i].name+'</option>')
            }
        });
	}

    function load_kabupaten(id){
        $('#kabupaten_kota').val('0').change();
        $('#kabupaten_kota').find('option').not(':first').remove();
        $('#kecamatan').val('0').change();
        $('#kecamatan').find('option').not(':first').remove();
        $('#desa_kelurahan').val('0').change();
        $('#desa_kelurahan').find('option').not(':first').remove();

        $.post('<?=base_url('warga/load_kabupaten')?>',
        {
          id:id
        },
        function(data){
            console.log(data)
            for (var i = 0; i < data.length; i++) {
                $("#kabupaten_kota").append('<option value='+data[i].id+'>'+data[i].name+'</option>')
            }
        });
    }

    function detail_keluarga(id){
        if ( $.fn.DataTable.isDataTable('#detail_warga') ) {
            $('#detail_warga').DataTable().destroy();
        }

        $('#detail_warga tbody').empty();

        $.post('<?=base_url('kartu_keluarga/detail_json')?>',
        {
          id:id
        },
        function(data){
            $('#modal-detail').modal('toggle')
            $('#nomor_kk').html(data.nomor)
            $('#kepala').html(data.kepala)
            $('#alamat').html(ucwords(lowercase(data.alamat+' Rt '+data.rt+' RW '+data.rw+', '+data.nama_desa+', '+data.nama_kec+', '+data.nama_kab+', '+data.nama_prov)))
            $('#rtrw').html(data.rt+'/'+data.rw)
            $('#desa').html(ucwords(lowercase(data.nama_desa)))
            $('#kecamatan').html(ucwords(lowercase(data.nama_kec)))
            $('#kabupaten').html(ucwords(lowercase(data.nama_kab)))
            $('#provinsi').html(ucwords(lowercase(data.nama_prov)))
            $('#kode_pos').html(ucwords(lowercase(data.kode_pos)))
          
            for (var i = 0; i < data.keluarga.length; i++) {
                $('#detail_warga tbody').append('<tr><td>'+(i+1)+'</td><td>'+data.keluarga[i].nomor_kk+'</td><td>'+data.keluarga[i].nama+'</td><td>'+data.keluarga[i].hub_keluarga+'</td></tr>')
            }

            $('#detail_warga').DataTable();

            console.log(data)
        });
    }

	function detail_warga(id){
        if ( $.fn.DataTable.isDataTable('#detail_warga') ) {
            $('#detail_warga').DataTable().destroy();
        }

        $('#detail_warga tbody').empty();

		$.post('<?=base_url('warga/detail_json')?>',
        {
          id:id
        },
        function(data){
        	$('#modal-detail').modal('toggle')
            $('#nik').html(data.nik)
            $('#nama').html(data.nama)
            $('#alamat').html(ucwords(lowercase(data.alamat+' Rt '+data.rt+' RW '+data.rw+', '+data.nama_desa+', '+data.nama_kec+', '+data.nama_kab)))
            $('#ttl').html(data.tempat_lahir+', '+data.tanggal_lahir)
            $('#agama').html(data.agama)
            $('#jenis_kelamin').html(data.jenis_kelamin)
            $('#pekerjaan').html(data.nama_pekerjaan)
            $('#status_perkawinan').html(data.status_perkawinan)
            $('#status').html(data.status)
          
            for (var i = 0; i < data.keluarga.length; i++) {
                $('#detail_warga tbody').append('<tr><td>'+(i+1)+'</td><td>'+data.keluarga[i].nomor_kk+'</td><td>'+data.keluarga[i].nama+'</td><td>'+data.keluarga[i].hub_keluarga+'</td></tr>')
            }

            $('#detail_warga').DataTable();

        	console.log(data)
        });
	}

    function ucwords (str) {
        return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
            return $1.toUpperCase();
        });
    }

    function lowercase(str){
        return str.toLowerCase()
    }

	$('.del').click(function(){
        var href = $(this).attr('rel');
        swal({
            title: "Anda Yakin?",
            text: "Data yang telah di hapus tidak dapat dikembalikan!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText:"Batal",
            cancelButtonClass: "btn-info",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya, Saya Yakin!!",
            closeOnConfirm:false
            
        },
        function(){
            swal({
                title:"Terhapus!",
                text: "Data yang anda maksud telah berhasil di hapus",
                type: "success"
            },
            function(){
                window.location=href;
            });
        });
        return false ;
    })
</script>
</body>
</html>
