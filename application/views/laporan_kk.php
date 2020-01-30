<style type="text/css">
	@page { margin: 1em; }
</style>
<table width="100%" style="border: 1px solid black; border-collapse: collapse; font-size: 11px" border="1" cellpadding="2">
	<caption style="margin-bottom: 20px"><b>Data Kartu Keluarga Desa Pododadi Kecamatan Karanganyar</b></caption>
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
			<th>Provinsi</th>
			<th>Kode Pos</th>
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
    			<td><?=ucwords(strtolower($row['nama_prov']))?></td>
    			<td><?=ucwords(strtolower($row['kode_pos']))?></td>
    		</tr>
    	<?php $no++; endforeach ?>
	</tbody>
</table>


								