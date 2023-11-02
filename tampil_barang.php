<!DOCTYPE html>
<html>
<head>
    <title>Tampil Barang</title>
</head>
<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tambah_barang.php">+ TAMBAH BARANG</a>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama_Barang</th>
            <th>Kode_Barang</th>
            <th>Qty</th>
            <th>Id_Kategori</th>
            <th>OPSI</th>
        </tr>
        <?php
        if(isset($_GET['id'])) {
            $id_to_delete = $_GET['ID'];
            //  DELETE FROM tabel_barang WHERE ID = $id_to_delete
        
            // Setelah penghapusan berhasil, Anda dapat mengarahkan pengguna ke halaman lain atau memberikan pesan konfirmasi
            header("Location: tampil_barang.php");
            exit();
        }
    
            include 'tugas.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * from barang");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['NAMA_BARANG'];?></td>
            <td><?php echo $d['KODE_BARANG'];?></td>
            <td><?php echo $d['QTY'];?></td>
            <td><?php echo $d['ID_KATEGORI'];?></td>
            <td>
            <a href="edit_barang.php?id=<?php echo $d['BARANG_ID']; ?>">Edit</a>
            <a href="tampil_barang.php?id=
            
            <?php echo $d['BARANG_ID']; ?>">Hapus</a>
            <?php
if (isset($_GET["id"])) {
    // Ambil ID barang dari URL
    $BARANG_ID = $_GET["11"];
    
    // Lakukan koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "keuangan_1";

    $koneksi = new mysqli($host, $username, $password, $database);

    if ($koneksi->connect_error) {
        die("Koneksi ke database gagal: " . $koneksi->connect_error);
    }

    // Query SQL untuk menghapus data barang dari database
    $sql = "DELETE FROM barang WHERE BARANG_ID = $BARANG_ID";

    if ($koneksi->query($sql) === TRUE) {
        echo "Barang berhasil dihapus. <a href='tampil_barang.php'>Kembali ke Tampil Barang</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>      
        </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>