<!DOCTYPE html>
<html>
<head>
    <title>TAMBAH TRANSAKSI</title>
</head>
<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tambah_transaksi.php">+ TAMBAH TRANSAKSI</a>
    <br>
    <table border="1">
        <tr>
            <th>Id Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Nomor Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Jumlah Transaksi</th>
            <th>Penjualan Id</th>
            <th>Barang Id</th>
            <th>Id Member</th>
            <th>Total</th>
            <th>Opsi</th>
        </tr>
        <?php
            include 'tugas.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * From transaksi");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['TANGGAL_TRANSAKSI'];?></td>
            <td><?php echo $d['NOMOR_TRANSAKSI'];?></td>
            <td><?php echo $d['JENIS_TRANSAKSI'];?></td>
            <td><?php echo $d['JUMLAH_TRANSAKSI'];?></td>
            <td><?php echo $d['PENJUALAN_ID'];?></td>
            <td><?php echo $d['BARANG_ID'];?></td>
            <td><?php echo $d['ID_MEMBER'];?></td>
            <td><?php echo $d['TOTAL'];?></td>
            <td>
                <a href="edit_transaksi.php?id=<?php echo $d['ID_TRANSAKSI']; ?>">Edit</a>
                <a href="hapus_transaksi.php?id=<?php echo $d['ID_TRANSAKSI']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>