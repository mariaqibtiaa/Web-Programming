<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;
		
		header("location: ".BASE_URL."login.html");
		exit;
	}
?>

<div id="frame-data-pengiriman">

	<h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>
	
	<div id="frame-form-pengiriman">
	
		<form action="<?php echo BASE_URL."proses-pemesanan.php"; ?>" method="POST">
		
			<div class="element-form">
				<label>Nama Penerima</label><span><input class="form-control" name="nama_penerima" type="text" placeholder="Masukan Nama" required="required" data-validation-required-message=" Masukan Nama " /></span>
                   <p class="masukan data"></p>
            </div>      	
			
			<div class="element-form">
				<label>Nomor Telepon</label><span><input class="form-control" name="nomor_telepon" type="tel" pattern="^\d{12}$" placeholder="Masukan Nomer Telpon" required="required" data-validation-required-message=" Masukan Nomer Telpon " /></span>
                   <p class="masukan data"></p>
			</div>		
			
			<div class="element-form">
				<label>Alamat Pengiriman</label><span><textarea class="form-control" name="alamat" placeholder="Masukan Alamat" required="required" data-validation-required-message=" Masukan Alamat"></textarea></span>
                   <p class="masukan data"></p>
			</div>			
			
			<div class="element-form">
				<label>Kota</label>
				<span>
					<select name="kota">
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM kota");
							
							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
							}
						?>
					</select>
				</span>
			</div>			

			<div class="element-form">
				<span><input type="submit" value="submit" /></span>
			</div>			
			
		</form>
	</div>
</div>

<div id="frame-data-detail">
	<h3 class="label-data-pengiriman">Detail Order</h3>
	
	<div id="frame-detail-order">
		
		<table class="table-list">
			<tr>
				<th class='kiri'>Nama Barang</th>
				<th class='tengah'>Qty</th>
				<th class='kanan'>Total</th>
			</tr>
			
			<?php
				$subtotal = 0;
				foreach($keranjang AS $key => $value){
					
					$barang_id = $key;
					
					$nama_barang = $value['nama_barang'];
					$harga = $value['harga'];
					$quantity = $value['quantity'];
					
					$total = $quantity * $harga;
					$subtotal = $subtotal + $total;
					
					echo "<tr>
							<td class='kiri'>$nama_barang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
				}
				echo "<tr>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					 </tr>";				
				
			?>
			
		</table>
		
	</div>
</div>