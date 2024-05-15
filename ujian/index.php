<div class="section-header">
    <h1>Jadwal Ujian Naik Tingkatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Jadwal Ujian</div>
    </div>
</div>
<?php
$data = $koneksi->query("SELECT * FROM jadwal_ujian");
$pengumuman = $data->fetch_assoc();
$cek_anggota = $koneksi->query("SELECT * FROM anggota WHERE Id_user='$_SESSION[Id_user]' ");

?>
<div class="section-body">
    <?php if ($_SESSION['level'] == 'pelatih') : ?>
        <?php if ($data->num_rows == 0) : ?>
            <div class="col-12 col-md-6 col-lg-6">
                <article class="article article-style-c">
                    <div class="article-details">
                        <div class="article-title">
                            <h5 class="text-center text-primary">Belum Ada Pengumuman</h5>
                        </div>
                        <ul>
                            <li>
                                <i>jadwal ujian naik tingkat masih kosong</i>
                            </li>
                        </ul>
                        <div class="article-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">Admin</a>
                                </div>
                                <div class="text-job">Administrator</div>
                            </div>
                        </div>

                    </div>

                </article>
            </div>
        <?php else : ?>
            <div class="col-12 col-md-6 col-lg-6">
                <article class="article article-style-c">
                    <div class="article-details">
                        <div class="article-title">
                            <h2>
                                <a href="#">
                                    <div class="bullet"></div> INFORMASI
                                </a>
                            </h2>

                        </div>
                        <h6><?= strtoupper($pengumuman['nama_jadwal_ujian']) ?></h6>
                        <?= $pengumuman['isi_pengumuman'] ?>
                        <div class="article-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">Ketua</a>
                                </div>
                                <div class="text-job"><?= $pengumuman['Ketua'] ?></div>
                            </div>
                        </div>
                        <div class="article-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">Panitia</a>
                                </div>
                                <div class="text-job"><?= $pengumuman['Panitia'] ?></div>
                            </div>
                        </div>
                        <div class="article-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">Penguji</a>
                                </div>
                                <div class="text-job"><?= $pengumuman['Penguji'] ?></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endif; ?>

    <?php else : ?>
        <?php if ($cek_anggota->num_rows == 0) : ?>
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Pemberitahuan</div>
                    Harap Mengisi Biodata Terlebih Dahulu
                </div>
            </div>
        <?php else : ?>
            <?php $dataa = $cek_anggota->fetch_assoc(); ?>
            <?php if ($dataa['bio_status'] == 'register') : ?>
                <div class="alert alert-warning alert-has-icon">
                    <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Pemberitahuan</div>
                        Biodata Anda Sudah Tersimpan, Harap Menunggu Verifikasi Berkas dari Admin
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <?php if ($data->num_rows > 0) : ?>
                        <div class="col-12 col-md-6 col-lg-6">
                            <article class="article article-style-c">
                                <div class="article-details">
                                    <div class="article-title">
                                        <h2>
                                            <a href="#">
                                                <div class="bullet"></div> INFORMASI
                                            </a>
                                        </h2>

                                    </div>
                                    <h6><?= strtoupper($pengumuman['nama_jadwal_ujian']) ?></h6>
                                    <?= $pengumuman['isi_pengumuman'] ?>
                                    <div class="article-user">
                                        <img alt="image" src="assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Ketua</a>
                                            </div>
                                            <div class="text-job"><?= $pengumuman['Ketua'] ?></div>
                                        </div>
                                    </div>
                                    <div class="article-user">
                                        <img alt="image" src="assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Panitia</a>
                                            </div>
                                            <div class="text-job"><?= $pengumuman['Panitia'] ?></div>
                                        </div>
                                    </div>
                                    <div class="article-user">
                                        <img alt="image" src="assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Penguji</a>
                                            </div>
                                            <div class="text-job"><?= $pengumuman['Penguji'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="card-body">
                                    <h4>NOTE</h4>
                                    <p>Silahkan ikuti ujian naik tingkat sesuai jadwal</p>
                                    
                                </div>
                            </div>                           
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-6 col-lg-6">
                            <article class="article article-style-c">
                                <div class="article-details">
                                    <div class="article-title">
                                        <h5 class="text-center text-primary">Belum Ada Pengumuman</h5>
                                    </div>
                                    <ul>
                                        <li>
                                            <i>jadwal ujian naik tingkat masih kosong</i>
                                        </li>
                                    </ul>
                                    <div class="article-user">
                                        <img alt="image" src="assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Admin</a>
                                            </div>
                                            <div class="text-job">Administrator</div>
                                        </div>
                                    </div>

                                </div>

                            </article>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Tabel Riwayat Ikut Ujian Naik Tingkatan</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $ujian = $koneksi->query("SELECT * FROM hasil_ujian JOIN anggota ON hasil_ujian.Id_Anggota=anggota.Id_Anggota JOIN jadwal_ujian ON jadwal_ujian.Kode_Jadwalujian=hasil_ujian.Kode_Jadwalujian WHERE anggota.Id_user='$_SESSION[Id_user]' ORDER BY No_ujian DESC");
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama</th>
                                                <th>Tempat</th>
                                                <th>Tanggal</th>
                                                <th>Sertifikat</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($ujian as $u => $uu) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $u + 1 ?>
                                                    </td>
                                                    <td><?= $uu['Nama_Jadwalujian'] ?></td>
                                                    <td><?= $uu['Tempat_Pelaksanaan'] ?></td>
                                                    <td><?= date('d M Y', strtotime($uu['Tanggal_Ujian'])) ?></td>
                                                    <td>
                                                        <?php if ($uu['Hasil_ujian'] == NULL) : ?>
                                                            -
                                                        <?php else : ?>
                                                            <a target="_blank" href="ujian/sertifikat/">download</a>
                                                        <?php endif; ?>
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
            <?php endif; ?>

        <?php endif; ?>
    <?php endif; ?>


</div>