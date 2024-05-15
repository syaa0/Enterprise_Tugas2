<div class="section-header">
    <h1>Data Jadwal Ujian</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Jadwal Ujian</div>
    </div>
</div>

<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="index.php?p=ujian/adm_tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Jadwal</th>
                                    <th>Info</th>
                                    <th>Isi Pengumuman</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $jadwal_ujian = $koneksi->query("SELECT * FROM jadwal_ujian ORDER BY Tanggal_Ujian DESC");
                                ?>
                                <?php foreach ($jadwal_ujian as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['Nama_Jadwalujian'] ?></td>
                                        <td>
                                            <ul>tanggal ujian : <?= date('d/m/Y', strtotime($uu['Tanggal_Ujian'])) ?></ul>
                                            <ul>ketua : <?= $uu['Ketua'] ?></ul>
                                            <ul>panitia : <?= $uu['Panitia'] ?></ul>
                                            <ul>penguji : <?= $uu['Penguji'] ?></ul>
                                        </td>
                                        <td><?= $uu['Isi_Pengumuman'] ?></td>
                                        <td>
                                            <a href="index.php?p=ujian/adm_edit&id=<?= $uu['Kode_Jadwalujian'] ?>" class="btn btn-icon icon-left btn-warning btn-block"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="return confirm('yakin?')" href="ujian/adm_hapus.php?id=<?= $uu['Kode_Jadwalujian'] ?>" class="btn btn-icon icon-left btn-dark btn-block"><i class="fas fa-times"></i> Hapus</a>
                                            <a href="index.php?p=ujian/adm_kelola&Kode_Jadwalujian=<?= $uu['Kode_Jadwalujian'] ?>" class="btn btn-icon icon-left btn-info btn-block"><i class="fas fa-cogs"></i> Kelola</a>
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