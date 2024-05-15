<div class="section-header">
    <h1>Kelola Akun User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Akun</div>
    </div>
</div>

<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="index.php?p=akun/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Email</th>
                                    <th>Nama Lengkap</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = $koneksi->query("SELECT * FROM tb_user ORDER BY status DESC");
                                ?>
                                <?php foreach ($user as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['email'] ?></td>
                                        <td><?= $uu['nama_lengkap'] ?></td>
                                        <td><?= $uu['level'] ?></td>
                                        <td>
                                            <a onclick="return confirm('yakin di aktifasi???')" href="akun/activasi.php?Id_user=<?= $uu['Id_user'] ?>&status=<?= $uu['status'] ?>" class="badge <?= $uu['status'] == 'active' ? 'badge-primary' : 'badge-warning' ?>"><?= $uu['status'] ?></a>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('yakin?')" href="akun/hapus.php?Id_user=<?= $uu['Id_user'] ?>" class="btn btn-icon icon-left btn-dark"><i class="fas fa-times"></i> Hapus</a>
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