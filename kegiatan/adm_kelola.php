<?php
$info_ujian = $koneksi->query("SELECT * FROM  kegiatan WHERE Kode_Kegiatan='$_GET[Kode_Kegiatan]'")->fetch_assoc();
?>
<div class="section-header">
    <h1>Kelola Data Presensi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=kegiatan/index">Kegiatan</a></div>
        <div class="breadcrumb-item">Detail</div>
    </div>
</div>

<div class="section-body">
    <div class="alert alert-light alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Daftar Presensi</div>
            <ul>
                <b>

                    <li>Kode Kegiatan : <?= $info_ujian['Kode_Kegiatan'] ?></li>
                    <li>Tanggal :<?= date('d F Y', strtotime($info_ujian['Tanggal_Kegiatan']))  ?></li>
                    <li>Nama Kegiatan : <?= $info_ujian['Nama_Kegiatan'] ?></li>
                </b>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $peserta = $koneksi->query("SELECT * FROM presensi JOIN anggota ON presensi.Id_Anggota=anggota.Id_Anggota WHERE presensi.Kode_Kegiatan='$_GET[Kode_Kegiatan]'");
                                ?>
                                <?php foreach ($peserta as $u => $uu) : ?>
                                    <tr>
                                        <td>
                                            <?= $u + 1 ?>
                                        </td>
                                        <td><?= $uu['Id_Anggota'] ?></td>
                                        <td><?= $uu['Nama_Anggota'] ?></td>
                                        <td><?= $uu['Status'] ?></td>                                          
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>