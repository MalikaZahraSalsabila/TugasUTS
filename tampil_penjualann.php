<!DOCTYPE html>
<html>
<head>
    <title>Tampil penjualan</title>
</head>
<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tambah_penjualan.php">+ TAMBAH BARANG</a>
    <br>
    <table border="1">
        <tr>
            <th>Id_Penjualans</th>
            <th>Tanggal_Penjualan</th>
            <th>Nama_Member</th>
            <th>Total_Harga</th>
            <th>OPSI</th>
        </tr>
        <?php
            include 'tugas.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * from penjualan");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['TANGGAL_PENJUALAN'];?></td>
            <td><?php echo $d['NAMA_MEMBER'];?></td>
            <td><?php echo $d['TOTAL'];?></td>
            <td>
            <a href="edit_barang.php?id=<?php echo $d['PENJUALAN_ID']; ?>">Edit</a>
            <a href="hapus_barang.php?id=<?php echo $d['PENJUALAN_ID']; ?>">Hapus</a>                
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>