<?php
// satu file daya.php punya 3 fungsi
// 1. menampilkan data daya dari tabel
// 2. menampilkan form utk tambah data
// 3. menampilkan form utk edit data
include "koneksi.php";

if(isset($_GET['act'])) {
    $act = $_GET['act'];
    if($act == "tambah") {
        // echo "Form tambah";
        // localhost/aplikasi_listrik/index.php?mod=daya&act=tambah
        ?>
        <form action="modules/mod_daya/aksi.php?act=tambah" method="post">
            <label for="kode">Kode</label>
            <input type="text" name="kode">
            <br>
            <label for="daya">Daya</label>
            <input type="text" name="daya">
            <br>
            <label for="tarif_perkwh">Tarif Perkwh</label>
            <input type="text" name="tarif_perkwh">
            <br>
            <input type="submit" value="Simpan">
        </form>
        <?php
    }
    else if($act == "ubah") {
        // echo "Form ubah";
        // http://localhost/aplikasi_listrik/index.php?mod=daya&act=ubah&id=D0003
        $id = $_GET['id'];
        $sql   = "SELECT * FROM daya WHERE kode = '$id'";
        $hasil = mysqli_query($koneksi, $sql);
        $data  = mysqli_fetch_array($hasil);
        ?>
        <form action="modules/mod_daya/aksi.php?act=ubah" method="post">
            <label for="kode">Kode</label>
            <input type="text" name="kode" value="<?php echo $data['kode']; ?>">
            <br>
            <label for="daya">Daya</label>
            <input type="text" name="daya" value="<?php echo $data['daya']; ?>">
            <br>
            <label for="tarif_perkwh">Tarif Perkwh</label>
            <input type="text" name="tarif_perkwh" value="<?php echo $data['tarif_perkwh']; ?>">
            <br>
            <input type="submit" value="Ubah">
        </form>
        <?php 
    }
}
else {
    ?>
    <a href="?mod=daya&act=tambah">Tambah Data</a>
    <table border="1" width="800">
        <tr>
            <td>Kode</td>
            <td>Daya</td>
            <td>Tarif Perkwh</td>
            <td>Aksi</td>
        </tr>
        <?php
        // echo "Tampilkan semua data";
        $sql   = "SELECT * FROM daya";
        $hasil = mysqli_query($koneksi, $sql);
        if($hasil) {
            while($data = mysqli_fetch_array($hasil)) {
                ?>
                <tr>
                    <td><?php echo $data['kode']; ?></td>
                    <td><?php echo $data['daya']; ?></td>
                    <td><?php echo $data['tarif_perkwh']; ?></td>
                    <td>
                        <a href="?mod=daya&act=ubah&id=<?php echo $data['kode']; ?>">Ubah</a>
                        <a href="modules/mod_daya/aksi.php?act=hapus&id=<?php echo $data['kode']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php 
            }
        echo "</table>";
    } else {
        echo "Tidak ada data";
    }
}