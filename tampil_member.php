<!DOCTYPE html>
<html>
<head>
    <title>pemograman3.com</title>
</head>
<body>
    <h2>pemograman 3 2022</h2>
    <br/>
    <a href="tambah_member.php">+TAMBAH MEMBER</a>
    <br/>
    <table border="1">
        <tr>
            <th>Id_Member</th>
            <th>Kode_Member</th>
            <th>Nama_Member</th>
            <th>Level</th>
            <th>OPSI</th>
        </tr>
<?php
include 'tugas.php';
$no = 1;
$data = mysqli_query($koneksi, "select * from member");
while ($d = mysqli_fetch_array($data)) {
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['KODE_MEMBER']; ?></td>
    <td><?php echo $d['NAMA_MEMBER']; ?></td>
    <td><?php echo $d['LEVEL']; ?></td>
    <td>
        <a href="edit_user.php?id=<?php echo $d['ID_MEMBER']; ?>">EDIT</a>
        <a href="hapus_user.php?id=<?php echo $d['ID_MEMBER']; ?>">HAPUS</a>
    </td>
</tr>
<?php
}
?>
</table>
</body>
</html>

        