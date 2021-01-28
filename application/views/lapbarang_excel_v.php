<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DataBarang.xls");
?>
<table border="1" width="100%">
	<tr align="center">
		<td colspan="6"><h1>Laporan Data Barang Berdasarkan <?php echo $filter; ?></h1></td>
	</tr>
	<tr align="center">
		<td>Kode Barang</td>
		<td>Nama Barang</td>
		<td>Satuan</td>
		<td>Stok</td>
		<td>Stok Min</td>
		<td>Stok Max</td>
	</tr>
	<?php
		foreach ($laporan->result() as $dt) {
	?>
			<tr>
				<td><?php echo $dt->kd_barang; ?></td>
				<td><?php echo $dt->nm_barang; ?></td>
				<td><?php echo $dt->satuan; ?></td>
				<td><?php echo $dt->stok; ?></td>
				<td><?php echo $dt->stokmin; ?></td>
				<td><?php echo $dt->stokmax; ?></td>
			</tr>
	<?php
		}
	?>

</table>