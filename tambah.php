<?php
include 'config.php';
include 'class_anggota.php';
$db = new Config();
$db->koneksi();
$dt = new Anggota();
 ?>
<fieldset><legend>Tambah Data</legend>
<br>
<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $dt->tambahdata($nama, $alamat, $telpon);
}
?>
<form action="" method="POST">
    <table border="0" cellspacing="0" cellpadding="5" width="100%">

        <tr>
            <td width="15%">Nama</td>
            <td width="2%">:</td>
            <td><input type="text" name="nama" size="50"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" size="50" ></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><input type="text" name="telpon" ></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="simpan" value="Simpan Data" ></td>
        </tr>

    </table>

</form>
</fieldset>
