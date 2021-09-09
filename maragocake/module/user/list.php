<?php
    $no=1;
      
    $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
      
    if(mysqli_num_rows($query) == 0)
    {
        echo "<h3 class='tengah'>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {
        echo "<table class='table-list'>";
          
            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Email</th>
                    <th class='kiri'>Phone</th>
                    <th class='kiri'>Level</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>";
  
            while($row=mysqli_fetch_array($query))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$row[nama]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[level]</td>
                        <td class='tengah'>$row[status]</td>
                        <td class='tengah'>
                        <a class='tombol-action' href='".BASE_URL."index.php?page=my-profile&module=user&action=form&user_id=$row[user_id]"."'>Edit</a>
                        <a class='tombol-action' href='".BASE_URL."module/user/action.php?button=Delete&user_id=$row[user_id]'>Delete</a>
                        </td>
                     </tr>";
              
                $no++;
            }
          
        //AKHIR DARI TABLE
        echo "</table>";
    }
?>