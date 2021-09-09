<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my-profile&module=banner&action=form"; ?>">+ Tambah Banner</a>
</div>

<?php
    $no=1;
        
    $query = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");
        
    if(mysqli_num_rows($query) == 0)
    {
        echo "<h3 class='tengah'>Saat ini belum ada banner di dalam database</h3>";
    }
    else
    {
        echo "<table class='table-list'>";
            
            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Banner</th>
                    <th class='kiri'>Link</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
                 </tr>";
    
            while($row=mysqli_fetch_array($query))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$row[banner]</td>
                        <td><a target='blank' href='".BASE_URL."$row[link]'>$row[link]</a></td>
                        <td class='tengah'>$row[status]</td>
                        <td class='tengah'>
                        <a class='tombol-action' href='".BASE_URL."index.php?page=my-profile&module=banner&action=form&banner_id=$row[banner_id]"."'>Edit</a>
                        <a class='tombol-action' href='".BASE_URL."module/banner/action.php?button=Delete&banner_id=$row[banner_id]'>Delete</a>
                        </td>
                     </tr>";
                
                $no++;
            }
            
        echo "</table>";
    }
?>