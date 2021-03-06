<?php

// tambah data
if (isset($_POST['tambah_data_penjualan'])) {
    if (tambahDataPenjualan($_POST) > 0) {
        $berhasil = true;
        echo "<meta http-equiv='refresh' content='1;URL=index.php?p=data-penjualan'>";
    } else {
        $gagal = true;
    }
}

// ubah data
if (isset($_POST['ubah_data_penjualan'])) {
    if (ubahDataPenjualan($_POST) > 0) {
        $berhasil = true;
        echo '<meta http-equiv="refresh" content="1; url=?p=data-penjualan">';
    } else {
        $gagal = true;
    }
}

// hapus data
if (isset($_GET['hapus'])) {
    if (hapusDataPenjualan($_GET) > 0) {
        $berhasil = true;
        echo '<meta http-equiv="refresh" content="1; url=index.php?p=data-penjualan">';
    } else {
        $gagal = true;
    }
}
?>

<div class="container">
    <div class="row">

        <!-- Alert message -->
        <?php if (isset($berhasil)) : ?>
            <div class="col-md-12 mt-5" style="margin-bottom: -50px;">
                <div class="alert alert-primary" role="alert">
                    <strong>Berhasil </strong> mengubah data !
                </div>
            </div>
        <?php elseif (isset($gagal)) : ?>
            <div class="col-md-12 mt-5" style="margin-bottom: -50px;">
                <div class="alert alert-danger" role="alert">
                    <strong>Gagal </strong> mengubah data, mohon periksa kembali data yang anda masukkan !
                </div>
            </div>
        <?php endif; ?>

        <!-- //**
        halaman tambah
        */ -->
        <?php if (isset($_GET['tambah'])) : ?>
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="title text-center">
                    <h1>TAMBAH DATA PENJUALAN</h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DATA ORDER BARANG :</h5>
                        <hr>

                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">KODE BARANG</label>
                                <div class="col-9">
                                    <select name="kode_brg" class="form-control" required>
                                        <option value="">- Pilih Kode -</option>
                                        <option value="91-02-DEF">91-02-DEF</option>
                                        <option value="92-01-ABC">92-01-ABC</option>
                                        <option value="93-03-JKL">93-03-JKL</option>
                                        <option value="94-02-ABC">94-02-ABC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">QUANTITY</label>
                                <div class="col-9">
                                    <input class="form-control" type="number" min="1" value="1" name="qty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">DISCOUNT</label>
                                <div class="col-9 py-2" style="vertical-align: middle;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="discount">
                                        <label class="form-check-label" for="defaultCheck1">
                                            8%
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">BONUS</label>
                                <div class="col-9 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bonus" value="1">
                                        <label class="form-check-label mr-5">
                                            Cangkir
                                        </label>
                                        <input class="form-check-input" type="radio" name="bonus" value="2">
                                        <label class="form-check-label">
                                            Pensil
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bonus" value="3">
                                        <label class="form-check-label mr-5">
                                            Buku
                                        </label>
                                        <input class="form-check-input" type="radio" name="bonus" value="4">
                                        <label class="form-check-label">
                                            Kupon
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary" name="tambah_data_penjualan">SIMPAN</button>
                                <input type="reset" class="btn btn-light" value="KOSONGKAN">
                            </div>
                        </form>
                        <hr>
                        <!--  -->
                        <div class="text-center">
                            <h6><a href="index.php">MENU UTAMA</a></h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //**
        halaman ubah data
        */ -->
        <?php elseif (isset($_GET['edit'])) : ?>
            <?php
            $id = $_GET['id'];
            $dataPenjualan = mysqli_query($conn, "SELECT * FROM jual WHERE id='$id'");
            if ($row = mysqli_fetch_assoc($dataPenjualan)) {
                $kode = $row['kode'];
                $qty = $row['qty'];
                $disc = $row['disc'];
                $bonus = $row['bonus'];
            }
            ?>
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="title text-center">
                    <h1>UBAH DATA PENJUALAN</h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DATA ORDER BARANG :</h5>
                        <hr>

                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-3 col-form-label">KODE BARANG</label>
                                <div class="col-9">
                                    <select name="kode_brg" class="form-control" required>
                                        <option value="">- Pilih Kode -</option>
                                        <option value="91-02-DEF" <?= ($kode == '91-02-DEF' ? 'selected' : ''); ?>>91-02-DEF</option>
                                        <option value="92-01-ABC" <?= ($kode == '92-01-ABC' ? 'selected' : ''); ?>>92-01-ABC</option>
                                        <option value="93-03-JKL" <?= ($kode == '93-03-JKL' ? 'selected' : ''); ?>>93-03-JKL</option>
                                        <option value="94-02-ABC" <?= ($kode == '94-02-ABC' ? 'selected' : ''); ?>>94-02-ABC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">QUANTITY</label>
                                <div class="col-9">
                                    <input class="form-control" type="number" min="1" value="<?= $qty; ?>" name="qty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">DISCOUNT</label>
                                <div class="col-9 py-2" style="vertical-align: middle;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="discount" <?= ($disc == 1 ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            8%
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-3 col-form-label">BONUS</label>
                                <div class="col-9 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bonus" value="1" <?= ($bonus == 1 ? 'checked' : ''); ?>>
                                        <label class="form-check-label mr-5">
                                            Cangkir
                                        </label>
                                        <input class="form-check-input" type="radio" name="bonus" value="2" <?= ($bonus == 2 ? 'checked' : ''); ?>>
                                        <label class="form-check-label">
                                            Pensil
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bonus" value="3" <?= ($bonus == 3 ? 'checked' : ''); ?>>
                                        <label class="form-check-label mr-5">
                                            Buku
                                        </label>
                                        <input class="form-check-input" type="radio" name="bonus" value="4" <?= ($bonus == 4 ? 'checked' : ''); ?>>
                                        <label class="form-check-label">
                                            Kupon
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" name="ubah_data_penjualan" class="btn btn-primary">SIMPAN</button>
                                <input type="reset" class="btn btn-light" value="KOSONGKAN">
                            </div>
                        </form>
                        <hr>
                        <!--  -->
                        <div class="text-center">
                            <h6><a href="index.php">MENU UTAMA</a></h6>
                        </div>
                    </div>
                </div>
            </div>


            <!-- //**
        halaman tampil data
        */ -->
        <?php else : ?>
            <div class="col-md-12 mt-5">
                <div class="title text-center">
                    <h4>TABEL DATA PENJUALAN [ <a href="index.php">MENU UTAMA</a> ]</h4>
                </div>


                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">KODE BRG</th>
                                <th scope="col">NAMA BARANG</th>
                                <th scope="col">QTY</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">SUBTOTAL</th>
                                <th scope="col">DISC 8%</th>
                                <th scope="col">GRAND TOTAL</th>
                                <th scope="col">BONUS</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $dataPenjualan = mysqli_query($conn, "SELECT * FROM jual ORDER BY kode DESC"); ?>
                            <?php while ($row = mysqli_fetch_assoc($dataPenjualan)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $row['kode'] ?></td>
                                    <!-- Nama barang -->
                                    <td>
                                        <?php
                                        $kode = $row['kode'];
                                        $kodeNama = substr($kode, -6);
                                        ?>
                                        <?php if ($kodeNama == '02-DEF') : ?>
                                            CELANA VERSACE
                                        <?php elseif ($kodeNama == '01-ABC') : ?>
                                            BAJU HAMMER
                                        <?php elseif ($kodeNama == '03-JKL') : ?>
                                            KOSMETIK REVLON
                                        <?php elseif ($kodeNama == '02-ABC') : ?>
                                            BAJU MORGAN
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row['qty']; ?></td>
                                    <!-- Harga -->
                                    <td>
                                        <?php
                                        $kode = $row['kode'];
                                        $kodeHarga = substr($kode, 0, 2);
                                        ?>
                                        <?php if ($kodeHarga == '91') : ?>
                                            <?php
                                            $harga = 9100;
                                            echo rupiah($harga);
                                            ?>
                                        <?php elseif ($kodeHarga == '92') : ?>
                                            <?php
                                            $harga = 9200;
                                            echo rupiah($harga);
                                            ?>
                                        <?php elseif ($kodeHarga == '93') : ?>
                                            <?php
                                            $harga = 9300;
                                            echo rupiah($harga);
                                            ?>
                                        <?php elseif ($kodeHarga == '94') : ?>
                                            <?php
                                            $harga = 9400;
                                            echo rupiah($harga);
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                    <!-- Subtotal -->
                                    <td>
                                        <?php
                                        $subTotal = $row['qty'] * $harga;
                                        echo rupiah($subTotal);
                                        ?>
                                    </td>
                                    <!-- Discount -->
                                    <td>
                                        <?php
                                        if ($row['disc'] == 1) {
                                            $disc = (8 / 100) * $subTotal;
                                            echo rupiah($disc);
                                        } else {
                                            echo '0';
                                        }
                                        ?>
                                    </td>
                                    <!-- Grand total -->
                                    <td>
                                        <?php
                                        if ($row['disc'] == 1) {
                                            $grandTotal = $subTotal - $disc;
                                            echo rupiah($grandTotal);
                                        } else {
                                            echo rupiah($subTotal);
                                        }
                                        ?>
                                    </td>
                                    <!-- Bonus -->
                                    <td>
                                        <?php if ($row['bonus'] == '1') : ?>
                                            CANGKIR
                                        <?php elseif ($row['bonus'] == '2') : ?>
                                            PENSIL
                                        <?php elseif ($row['bonus'] == '3') : ?>
                                            BUKU
                                        <?php elseif ($row['bonus'] == '4') : ?>
                                            KUPON
                                        <?php else : ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <!-- Aksi -->
                                    <td>
                                        <a href="index.php?p=data-penjualan&edit&id=<?= $row['id']; ?>" class="badge badge-info">edit</a>
                                        <a href="index.php?p=data-penjualan&hapus&id=<?= $row['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?');">hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!--  -->
                <div class="card col-md-6 offset-3 mt-5">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>NIM </td>
                                <td>: </td>
                                <td>_ _ _ </td>
                            </tr>
                            <tr>
                                <td>NAMA </td>
                                <td>: </td>
                                <td>_ _ _ </td>

                            </tr>
                            <tr>
                                <td>JUR/KELAS </td>
                                <td>: </td>
                                <td>_ _ _ /_ _ _ </td>
                            </tr>
                            <tr>
                                <td>TIPE SOAL </td>
                                <td>: </td>
                                <td>_ _ _ </td>
                            </tr>
                            <tr>
                                <td>NO KOMP </td>
                                <td>: </td>
                                <td>_ _ _ </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>