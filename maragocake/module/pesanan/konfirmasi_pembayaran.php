<?php

	$pesanan_id = $_GET["pesanan_id"];

?>

<table class="table-list">

	<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
	
		<div class="element-form">
				<label>Nomor Rekening</label>
				<span><input class="form-control" name="nomor_rekening" type="tel" placeholder="Masukan Nomor Rekening" required="required" data-validation-required-message=" Masukan Nomer Rekening " /></span>
                   <p class="masukan data"></p>
		</div>	

		<div class="element-form">
				<label>Nama Account</label>
				<span><input class="form-control" name="nama_account" type="text" placeholder="Masukan Nama Account" required="required" data-validation-required-message=" Masukan Nama Account " /></span>
                   <p class="masukan data"></p>
		</div>		
	
		<div class="element-form">
				<label>Tanggal Transfer</label>
				<span><input class="form-control" name="tanggal_transfer" type="date" placeholder="Masukan Tanggal Transfer" required="required" data-validation-required-message=" Masukan Tanggal Transfer " /></span>
                   <p class="masukan data"></p>
		</div>	

		<div class="element-form">
			<span><input type="submit" value="Konfirmasi" name="button" /></span>
		</div>		
	
	</form>

</table>