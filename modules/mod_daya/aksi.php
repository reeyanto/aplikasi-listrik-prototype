<?php
include "../../koneksi.php";
if(isset($_GET['act'])) {
    $act = $_GET['act'];

    if($act == 'tambah') {
        $kode           = $_POST['kode'];
        $daya           = $_POST['daya'];
        $tarif_perkwh   = $_POST['tarif_perkwh'];

        $sql = "INSERT INTO daya (kode, daya, tarif_perkwh) 
                VALUES ('$kode', '$daya', '$tarif_perkwh')";
        $hasil = mysqli_query($koneksi, $sql);

        if($hasil) {
            header('location:../../index.php?mod=daya');
        }
    }

    else if($act == 'ubah') {
        // query update
        $kode           = $_POST['kode'];
        $daya           = $_POST['daya'];
        $tarif_perkwh   = $_POST['tarif_perkwh'];

        $sql = "UPDATE daya
                SET daya = '$daya', tarif_perkwh = '$tarif_perkwh'
                WHERE kode = '$kode'";

        $hasil = mysqli_query($koneksi, $sql);

        if($hasil) {
            header('location:../../index.php?mod=daya');
        }
    }

    else if($act == 'hapus') {
        // query delete
        $id  = $_GET['id'];
        $sql = "DELETE FROM daya WHERE kode = '$id'";

        $hasil = mysqli_query($koneksi, $sql);

        if($hasil) {
            header('location:../../index.php?mod=daya');
        }
    }
}