<?php
// satu file daya.php punya 3 fungsi
// 1. menampilkan data daya dari tabel
// 2. menampilkan form utk tambah data
// 3. menampilkan form utk edit data
include "koneksi.php";

if(isset($_GET['act'])) {
    $act = $_GET['act'];
    if($act == "tambah") {
        echo "Form tambah";
    }
    else if($act == "ubah") {
        echo "Form ubah";
    }
}
else {
    ?>
    <table border="1" width="800">
        <tr>
            <td>ID Pelanggan</td>
            <td>Daya</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>HP</td>
        </tr>
        <?php
        // echo "Tampilkan semua data";
        $sql   = "SELECT p.*, d.daya 
                    FROM pelanggan p 
                    JOIN daya d ON p.daya_kode = d.kode";
        $hasil = mysqli_query($koneksi, $sql);
        if($hasil) {
            while($data = mysqli_fetch_array($hasil)) {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['daya']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['hp']; ?></td>
                </tr>
                <?php 
            }
        echo "</table>";
    } else {
        echo "Tidak ada data";
    }
}