<?php
$info_ujian = $koneksi->query("SELECT * FROM  jadwal_ujian WHERE Kode_Jadwalujian='$_GET[Kode_Jadwalujian]'")->fetch_assoc();
?>
<div class="section-header">
    <h1>Kelola Data Ujian Naik Tingkatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=ujian/adm_index">Jadwal Ujian</a></div>
        <div class="breadcrumb-item">Detail</div>
    </div>
</div>

<div class="section-body">
    <div class="alert alert-light alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Informasi Jadwal Ujian</div>
            <ul>
                <b>

                    <li>Nama : <?= $info_ujian['Nama_Jadwalujian'] ?></li>
                    <li>Tanggal :<?= date('d F Y', strtotime($info_ujian['Tanggal_Ujian']))  ?></li>
                    <li>Ketua : <?= $info_ujian['Ketua'] ?></li>
                    <li>Panitia : <?= $info_ujian['Panitia'] ?></li>
                    <li>Penguji : <?= $info_ujian['Penguji'] ?></li>
                    <li>Tempat Pelaksanaan : <?= $info_ujian['Tempat_Pelaksanaan'] ?></li>
                </b>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <a href="index.php?p=ujian/tambah_hasil&Kode_Jadwalujian=<?= $_GET['Kode_Jadwalujian'] ?>" class="btn btn-primary">Tambah Data</a>
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
                                    <th>Hasil</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $peserta = $koneksi->query("SELECT * FROM hasil_ujian JOIN anggota ON hasil_ujian.Id_Anggota=anggota.Id_Anggota WHERE hasil_ujian.Kode_Jadwalujian='$_GET[Kode_Jadwalujian]'");
                                ?>
                                <?php foreach ($peserta as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['Id_Anggota'] ?></td>
                                        <td><?= $uu['Nama_Anggota'] ?></td>
                                        <td>
                                            <?php if ($uu['Hasil_ujian'] == NULL) : ?>
                                                -
                                            <?php else : ?>
                                                <a target="_blank" href="ujian/sertifikat/<?= $uu['Hasil_ujian'] ?>">download</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('yakin?')" href="ujian/hapus.php?id=<?= $uu['No_ujian'] ?>&Kode_Jadwalujian=<?= $_GET['Kode_Jadwalujian'] ?>" class="btn btn-icon icon-left btn-dark"><i class="fas fa-times"></i> Hapus</a>
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