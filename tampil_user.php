<!DOCTYPE html>
<html>
<head>
    <title>pemograman3.com</title>
</head>
<body>
    <h2>pemograman 3 2022</h2>
    <br/>
    <a href="tambah_user.php">+TAMBAH USER</a>
    <br/>
    <table border="1">
        <tr>
            <th>Id_User</th>
            <th>Nama_User</th>
            <th>Password</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>OPSI</th>
        </tr>
<?php
include 'tugas.php';
$no = 1;
$data = mysqli_query($koneksi, "select * from user");
while ($d = mysqli_fetch_array($data)) {
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['NAMA_USER']; ?></td>
    <td><?php echo $d['PASSWORD']; ?></td>
    <td><?php echo $d['JABATAN']; ?></td>
    <td><?php echo $d['STATUS']; ?></td>
    <td>
        <a href="edit_user.php?id=<?php echo $d['ID_USER']; ?>">EDIT</a>
        <a href="hapus_user.php?id=<?php echo $d['ID_USER']; ?>">HAPUS</a>
    </td>
</tr>
<?php
}
?>
</table>
</body>
</html>

        