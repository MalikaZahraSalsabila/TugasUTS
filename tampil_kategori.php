<!DOCTYPE html>
<html>
<head>
     <title>tampil kategori</title>
</head>
<body>
     <h2>pemograman 3 2023</h2>
     <br>
     <a href="tambah_kategori.php">+Tambah kategori</a>
     <br>
     <table border="1">
          <tr> 
             <th>Id Kategori</th>
             <th>Nama kategori</th>
             <th>Diskon</th>
             <th>OPSI</th>
          </tr> 
          <?php
              include 'tugas.php';
              $no = 1;
              $data = mysqli_query($koneksi,"select * from kategori");
              while($d = mysqli_fetch_array($data)){
               ?>
          <tr>
               <td><?php echo $no++; ?></td>
               <td><?php echo $d['NAMA_KATEGORI']; ?></td>
               <td><?php echo $d['DISKON']; ?></td>
               <td>
               <a href="edit_kategori.php?id=<?php echo $d['ID_KATEGORI']; ?>">Edit</a>
               <a href="hapus_kategori.php?id=<?php echo $d['ID_KATEGORI']; ?>">Hapus</a>
              </td>
          </tr>
          <?php
              }
              ?>
     </table>
          </body>
          </html>