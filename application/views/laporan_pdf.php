<style type="text/css">
	@page { margin: 1em; }
</style>
<table style="border: 1px solid black; border-collapse: collapse; font-size: 11px" border="1" cellpadding="2">
	<caption style="margin-bottom: 20px"><b>Data Warga Desa Pododadi Kecamatan Karanganyar</b></caption>
	<thead>
		<tr>
			<th>No</th>
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Desa/Kelurahan</th>
			<th>Kecamatan</th>
			<th>Kabupaten/Kota</th>
			<th>Pendidikan Terakhir</th>
			<th>Pekerjaan</th>
			<th>Status Perkawinan</th>
			<th>Status Aktif</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($data as $row): ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$row['nik']?></td>
				<td><?=ucwords(strtolower($row['nama']))?></td>
				<td><?=ucwords(strtolower($row['tempat_lahir']))?></td>
				<td><?=$row['tanggal_lahir']?></td>
				<td><?=ucwords(strtolower($row['jenis_kelamin']))?></td>
				<td><?=$row['agama']?></td>
				<td><?=ucwords(strtolower($row['alamat'].' RT '.$row['rt'].' / RW '.$row['rw']))?></td>
				<td><?=ucwords(strtolower($row['nama_desa']))?></td>
				<td><?=ucwords(strtolower($row['nama_kec']))?></td>
				<td><?=ucwords(strtolower($row['nama_kota']))?></td>
				<td><?=$row['pendidikan_terakhir']?></td>
				<td><?=ucwords(strtolower($row['nama_pekerjaan']))?></td>
				<td><?=ucwords(strtolower($row['status_perkawinan']))?></td>
				<td><?=ucwords(strtolower($row['status']))?></td>
			</tr>
		<?php $no++; endforeach ?>
	</tbody>
</table>
