<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my-profile&module=kota&action=form"; ?>">+ Tambah Kota</a>
</div>

<?php

	$query = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");
	
	if(mysqli_num_rows($query) == 0){
		echo "<h3 class='tengah'>Saat ini belum ada nama kota yang didalam database.</h3>";
	}
	else{
		echo "<table class='table-list'>";
		
			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>Kota</th>
					<th class='kiri'>Tarif</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
				 </tr>";
				 
			$no = 1;
			while($row=mysqli_fetch_assoc($query)){
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td>$row[kota]</td>
						<td>".rupiah($row['tarif'])."</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a class='tombol-action' href='".BASE_URL."index.php?page=my-profile&module=kota&action=form&kota_id=$row[kota_id]"."'>Edit</a>
	                        <a class='tombol-action' href='".BASE_URL."module/kota/action.php?button=Delete&kota_id=$row[kota_id]'>Delete</a>
						</td>
					 </tr>";
				
				$no++;
			}
		
		echo "</table>";
	}
?>