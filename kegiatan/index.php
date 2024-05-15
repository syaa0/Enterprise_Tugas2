<div class="section-header">
    <h1>Data Kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Kegiatan</div>
    </div>
</div>

<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="index.php?p=kegiatan/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Kegiatan</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $kegiatan = $koneksi->query("SELECT * FROM kegiatan ORDER BY Kode_Kegiatan ASC");
                                ?>
                                <?php foreach ($kegiatan as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['Kode_Kegiatan'] ?></td>
                                        <td><?= $uu['Nama_Kegiatan'] ?></td>
                                        <td><?= $uu['Tanggal_Kegiatan'] ?></td>
                                        <td>
                                            <a href="index.php?p=kegiatan/edit&id=<?= $uu['Kode_Kegiatan'] ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="return confirm('yakin?')" href="kegiatan/hapus.php?id=<?= $uu['Kode_Kegiatan'] ?>" class="btn btn-icon icon-left btn-dark"><i class="fas fa-times"></i> Hapus</a>
                                            <a href="index.php?p=kegiatan/adm_kelola&Kode_Kegiatan=<?= $uu['Kode_Kegiatan'] ?>" class="btn btn-icon icon-left btn-info btn-block"><i class="fas fa-cogs"></i> Kelola</a>
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