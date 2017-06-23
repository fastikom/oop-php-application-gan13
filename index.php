<?php
include "config.php";
include "class_anggota.php";
$db = new Config();
$db->koneksi();
$dt = new Anggota();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <div id="container">
            <div id="header">

            </div>
            <div id="menu"><a href="index.php">Home</a></div>
            <div id="tambah"><a href="tambah.php">Tambah</a></div>
            <div id="konten">
            <fieldset><legend>Daftar Anggota</legend>
                <form method="post" action="">
                    <input type="text" name="cari" size="50">
                    <input type="submit" name="caridata" value="Cari Data" >
                </form>
                <br>


                <?php
                if (isset($_POST['caridata'])) {
                    $cari = $_POST['cari'];
                    $carinya=$dt->caridata($cari);
                    ?>
                <h3>Hasil pencarian</h3>
                jumlah data ditemukan sebanyak : <?php echo mysql_num_rows($carinya); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>

                            </tr>
                        </thead>
                         <tbody>
                        <?php
                        $i=1;
                        while ($hasil = mysql_fetch_array($carinya)) {
                            ?>


                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $hasil['nama']; ?></td>
                                    <td><?php echo $hasil['alamat']; ?></td>
                                    <td><?php echo $hasil['telpon']; ?></td>

                                </tr>

                            <?php
                            $i++;
                        }
                        echo "</tbody></table>";
                    }

                    echo"<br>";

                    if (isset($_GET['aksi'])) {
                        if ($_GET['aksi'] == "edit") {
                            $id = $_GET['id'];
                            $edit = mysql_fetch_array($dt->editdata($id));
                            ?>
                            <h3>EDIT DATA</h3>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <table border="0" cellspacing="0" cellpadding="5" width="100%">

                                    <tr>
                                        <td width="15%">Nama</td>
                                        <td width="2%">:</td>
                                        <td><input type="text" name="nama" value="<?php echo $edit['nama']; ?>" size="50" ></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><input type="text" name="alamat" value="<?php echo $edit['alamat']; ?>" size="50" ></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td><input type="text" name="telpon" value="<?php echo $edit['telpon']; ?>" ></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="edit" value="Edit Data" ></td>
                                    </tr>

                                </table>

                            </form>
                            <hr>
                            <?php
                        } elseif ($_GET['aksi'] == "hapus") {
                            $dt->hapusdata($_GET['id']);
                        } elseif (isset($_POST['edit'])) {
                            $id = $_POST['id'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $telpon = $_POST['telpon'];
                            $dt->prosesedit($id, $nama, $alamat, $telpon);
                        }
                    }
                    ?>
                    <table align="center" border="1" width="100%" cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $anggota = $dt->tampildata();
                            $i = 1;
                            if (mysql_num_rows($anggota) > 0) {
                                while ($a = mysql_fetch_array($anggota)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $a['nama']; ?></td>
                                        <td><?php echo $a['alamat']; ?></td>
                                        <td><?php echo $a['telpon']; ?></td>
                                        <td align="center"><a href="<?php $_SERVER['PHP_SELF']; ?>?aksi=edit&id=<?php echo $a['id_anggota']; ?>">EDIT</a> | <a href="<?php $_SERVER['PHP_SELF']; ?>?aksi=hapus&id=<?php echo $a['id_anggota']; ?>">HAPUS</a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4" align="center">Data Kosong</td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </fieldset>


                    </div>
                    <div id="footer">
                        <div class="isinya">
                            Copyright &copy; NUR WAHIDIN (130060 </a>
                        </div>
                    </div>
            </div>
    </body>
</html>
