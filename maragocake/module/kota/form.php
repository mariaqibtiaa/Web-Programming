<?php

	$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
	
	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if($kota_id){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
		$row=mysqli_fetch_assoc($queryKota);
		
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}
		
?>		
<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"?>" method="post">

	<div class="element-form">
		<label>Kota</label><span><input class="form-control" name="kota" type="text" placeholder="Masukan Kota" required="required" data-validation-required-message=" Masukan Kota " value="<?php echo $kota; ?>" /></span>
        <p class="masukan data"></p>
	</div>		

	<div class="element-form">
		<label>Tarif</label><span><input class="form-control" name="tarif" type="text" placeholder="Masukan Tarif" required="required" data-validation-required-message=" Masukan Kota " value="<?php echo $tarif; ?>" /></span>
        <p class="masukan data"></p>
	</div>		

	<div class="element-form">
		<label>Status</label>	
		<span>
			<input type="radio" name="status" required="required" value="on" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" name="status" required="required" value="off" <?php if($status == "off"){ echo "checked"; } ?> /> Off
		</span>
	</div>		
	
	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>		

</form>		