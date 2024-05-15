<div class="section-header">
    <h1>Data Jenis Tingkatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Tingkatan</div>
    </div>
</div>

<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="index.php?p=tingkatan/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Jenis Tingkatan</th>
                                    <th>Nama Tingkatan</th>
                                    <th>Keterangan</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tingkatan = $koneksi->query("SELECT * FROM  jenis_tingkatan ORDER BY Jenis_Tingkatansabuk ASC");
                                ?>
                                <?php foreach ($tingkatan as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['Jenis_Tingkatansabuk'] ?></td>
                                        <td><?= $uu['Nama_Tingkatan'] ?></td>
                                        <td><?= $uu['Keterangan'] ?></td>
                                        <td>
                                            <a href="index.php?p=tingkatan/edit&id=<?= $uu['Jenis_Tingkatansabuk'] ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="return confirm('yakin?')" href="tingkatan/hapus.php?id=<?= $uu['Jenis_Tingkatansabuk'] ?>" class="btn btn-icon icon-left btn-dark"><i class="fas fa-times"></i> Hapus</a>
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