<div class="section-header">
    <h1>Data Anggota</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Data Anggota</div>
    </div>
</div>

<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="index.php?p=anggotabaru/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Id Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Jenis Tingkatan Sabuk</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $anggotabaru = $koneksi->query("SELECT * FROM  jenis_tingkatan, anggota where jenis_tingkatan.Jenis_Tingkatansabuk=anggota.Jenis_Tingkatansabuk ORDER BY anggota.Jenis_Tingkatansabuk ASC");
                                ?>
                                <?php foreach ($anggotabaru as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['Id_Anggota'] ?></td>
                                        <td><?= $uu['Nama_Anggota'] ?></td>
                                        <td><?= $uu['Tempat_Lahir'] ?></td>
                                        <td><?= $uu['TL'] ?></td>
                                        <td><?= $uu['JK'] ?></td>
                                        <td><?= $uu['Alamat'] ?></td>
                                        <td><?= $uu['No_hp'] ?></td>
                                        <td><?= $uu['Jenis_Tingkatansabuk'] ?></td>
                                        <td>
                                            
                                            <!--  <a href="index.php?p=anggotabaru/edit&id=<?= $uu['Id_Anggota'] ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a> -->
                                            <a onclick="return confirm('yakin?')" href="anggotabaru/hapus.php?id=<?= $uu['Id_Anggota'] ?>" class="btn btn-icon icon-left btn-dark"><i class="fas fa-times"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>