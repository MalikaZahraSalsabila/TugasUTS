<!DOCTYPE html>
<html>
<head>
    <title>Hasil Transaksi</title>
</head>
<body>
    <h1>HASIL TRANSAKSI</h1>
    <table border="1">
        <tr>
            <th>Nama Member</th>
            <th>Level</th>
            <th>Diskon Member</th>
            <th>Diskon Barang</th>
            <th>Total Pembelian</th>
            <th>Total Diskon</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        include 'tugas.php';

        $query = "SELECT 
            m.NAMA_MEMBER AS member,
            m.LEVEL AS LEVEL,
            CONCAT(
                CASE 
                WHEN m.LEVEL = 'Platinum' THEN '15%'
                WHEN m.LEVEL = 'Gold' THEN '10%'
                WHEN m.LEVEL = 'Silver' THEN '5%'
                ELSE '0%'
                END )

            AS 'Diskon_Member',
            CASE 
            WHEN SUM(t.total) > 100000 THEN '10%'
            ELSE '0%'
            END 
            
            AS 'Diskon_barang',
            SUM(t.total) AS 'Total_Pembelian',
            (
                CASE
                WHEN m.LEVEL = 'Platinum' THEN SUM(t.total) * 0.15
                WHEN m.LEVEL = 'Gold' THEN SUM(t.total) * 0.10
                WHEN m.LEVEL = 'Silver' THEN SUM(t.total) * 0.05
                ELSE 0
                END
            ) + (
                CASE 
                WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
                ELSE 0
                END ) 

            AS 'Total_Diskon',
            SUM(t.total) -
            (
                CASE
                WHEN m.LEVEL = 'Platinum' THEN SUM(t.total) * 0.15
                WHEN m.LEVEL = 'Gold' THEN SUM(t.total) * 0.10
                WHEN m.LEVEL = 'Silver' THEN SUM(t.total) * 0.05
                ELSE 0
                END
            ) - (
                CASE 
                WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
                ELSE 0
                END )
            AS 'Total_Transaksi'
        FROM member m
        JOIN penjualan j ON m.nama_member = j.NAMA_MEMBER
        JOIN transaksi t ON j.PENJUALAN_ID = t.PENJUALAN_ID
        GROUP BY m.NAMA_MEMBER, m.LEVEL";

        $result = $koneksi->query($query);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['member'] . "</td>";
                echo "<td>" . $row['LEVEL'] . "</td>";
                echo "<td>" . $row['Diskon_Member'] . "</td>";
                echo "<td>" . $row['Diskon_barang'] . "</td>";
                echo "<td>" . $row['Total_Pembelian'] . "</td>";
                echo "<td>" . $row['Total_Diskon'] . "</td>";
                echo "<td>" . $row['Total_Transaksi'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Tidak ada data transaksi.";
        }
        $koneksi->close();
        ?>
    </table>
</body>
</html>
