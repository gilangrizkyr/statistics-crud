<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manajemen Karyawan</title>
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/costum.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- alert random -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body id="page-top">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <img src="<?= base_url('assets/img/ptp.png'); ?>" alt="Logo" style="width: 50px; height: 50px; margin-right: 10px;">
                    <h4 class="m-0 font-weight-bold text-primary">Manajemen Karyawan</h4>

                </div>

                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKaryawanModal">
                        Tambah Karyawan
                    </button>
                    <a href="<?= base_url('auth') ?>">
                        <button class="btn btn-primary">
                            Mode Statistik
                        </button></a>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($karyawan as $data): ?>
                            <tr>
                                <!-- <td><?= $data['id']; ?></td> -->
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['jenis_kelamin']; ?></td>
                                <td><?= $data['pendidikan']; ?></td>
                                <td><?= $data['tanggal_lahir']; ?></td>
                                <td><?= $data['umur']; ?></td>
                                <td><?= $data['golongan']; ?></td>
                                <td><?= $data['jabatan']; ?></td>
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#editKaryawanModal<?= $data['id']; ?>">
                                        <i class="fas fa-edit fa-sm"></i>
                                    </button>
                                    <a href="<?= base_url('action/delete/' . $data['id']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt fa-sm"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Pop up view edit -->
                            <div class="modal fade" id="editKaryawanModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editKaryawanModalLabel">Edit Karyawan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('action/update/' . $data['id']); ?>" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                                        <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" name="tanggal_lahir" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pendidikan">Pendidikan</label>
                                                    <select class="form-control" name="pendidikan" required>
                                                        <option value="SLTA" <?= $data['pendidikan'] == 'SLTA' ? 'selected' : ''; ?>>SLTA</option>
                                                        <option value="D3" <?= $data['pendidikan'] == 'D3' ? 'selected' : ''; ?>>D3</option>
                                                        <option value="S1" <?= $data['pendidikan'] == 'S1' ? 'selected' : ''; ?>>S1</option>
                                                        <option value="S2" <?= $data['pendidikan'] == 'S2' ? 'selected' : ''; ?>>S2</option>
                                                        <option value="S3" <?= $data['pendidikan'] == 'S3' ? 'selected' : ''; ?>>S3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="golongan">Golongan</label>
                                                    <select class="form-control" name="golongan" required>
                                                        <option value="II/C" <?= $data['golongan'] == 'II/C' ? 'selected' : ''; ?>>II/C</option>
                                                        <option value="II/D" <?= $data['golongan'] == 'II/D' ? 'selected' : ''; ?>>II/D</option>
                                                        <option value="III/A" <?= $data['golongan'] == 'III/A' ? 'selected' : ''; ?>>III/A</option>
                                                        <option value="III/B" <?= $data['golongan'] == 'III/B' ? 'selected' : ''; ?>>III/B</option>
                                                        <option value="III/C" <?= $data['golongan'] == 'III/C' ? 'selected' : ''; ?>>III/C</option>
                                                        <option value="III/D" <?= $data['golongan'] == 'III/D' ? 'selected' : ''; ?>>III/D</option>
                                                        <option value="IV/A" <?= $data['golongan'] == 'IV/A' ? 'selected' : ''; ?>>IV/A</option>
                                                        <option value="IV/B" <?= $data['golongan'] == 'IV/B' ? 'selected' : ''; ?>>IV/B</option>
                                                        <option value="IV/C" <?= $data['golongan'] == 'IV/C' ? 'selected' : ''; ?>>IV/C</option>
                                                        <option value="IV/D" <?= $data['golongan'] == 'IV/D' ? 'selected' : ''; ?>>IV/D</option>
                                                        <option value="IV/E" <?= $data['golongan'] == 'IV/E' ? 'selected' : ''; ?>>IV/E</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <select class="form-control" name="jabatan" required>
                                                        <option value="Wakil Ketua Tingkat Banding" <?= $data['jabatan'] == 'Wakil Ketua Tingkat Banding' ? 'selected' : ''; ?>>Wakil Ketua Tingkat Banding</option>
                                                        <option value="Sekretaris Tingkat Banding Tipe B" <?= $data['jabatan'] == 'Sekretaris Tingkat Banding Tipe B' ? 'selected' : ''; ?>>Sekretaris Tingkat Banding Tipe B</option>
                                                        <option value="Kepala Bagian" <?= $data['jabatan'] == 'Kepala Bagian' ? 'selected' : ''; ?>>Kepala Bagian</option>
                                                        <option value="Panitera Pengganti Tingkat Banding" <?= $data['jabatan'] == 'Panitera Pengganti Tingkat Banding' ? 'selected' : ''; ?>>Panitera Pengganti Tingkat Banding</option>
                                                        <option value="Kepala Sub Bagian" <?= $data['jabatan'] == 'Kepala Sub Bagian' ? 'selected' : ''; ?>>Kepala Sub Bagian</option>
                                                        <option value="Pranata Keuangan APBN Pelaksanaan" <?= $data['jabatan'] == 'Pranata Keuangan APBN Pelaksanaan' ? 'selected' : ''; ?>>Pranata Keuangan APBN Pelaksanaan</option>
                                                        <option value="Arsiparis Pelaksanaan Lanjutkan" <?= $data['jabatan'] == 'Arsiparis Pelaksanaan Lanjutkan' ? 'selected' : ''; ?>>Arsiparis Pelaksanaan Lanjutkan</option>
                                                        <option value="Analisa Protokol" <?= $data['jabatan'] == 'Analisa Protokol' ? 'selected' : ''; ?>>Analisa Protokol</option>
                                                        <option value="Pranata Komputer Ahli Muda" <?= $data['jabatan'] == 'Pranata Komputer Ahli Muda' ? 'selected' : ''; ?>>Pranata Komputer Ahli Muda</option>
                                                        <option value="Pengadministrasi Persuratan" <?= $data['jabatan'] == 'Pengadministrasi Persuratan' ? 'selected' : ''; ?>>Pengadministrasi Persuratan</option>
                                                        <option value="Analisa Pengelolaan Keuangan APBN" <?= $data['jabatan'] == 'Analisa Pengelolaan Keuangan APBN' ? 'selected' : ''; ?>>Analisa Pengelolaan Keuangan APBN</option>
                                                        <option value="Pranata Keuangan APBN Penyelia" <?= $data['jabatan'] == 'Pranata Keuangan APBN Penyelia' ? 'selected' : ''; ?>>Pranata Keuangan APBN Penyelia</option>
                                                        <option value="Pengadministrasi Perpustakaan" <?= $data['jabatan'] == 'Pengadministrasi Perpustakaan' ? 'selected' : ''; ?>>Pengadministrasi Perpustakaan</option>
                                                        <option value="Penyusunan Laporan Keuangan" <?= $data['jabatan'] == 'Penyusunan Laporan Keuangan' ? 'selected' : ''; ?>>Penyusunan Laporan Keuangan</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pop up view create -->
    <div class="modal fade" id="tambahKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="tambahKaryawanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKaryawanModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('action/create'); ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select class="form-control" id="pendidikan" name="pendidikan" required>
                                <option value="SLTA">SLTA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <select class="form-control" id="golongan" name="golongan" required>
                                <option value="II/C">II/C</option>
                                <option value="II/D">II/D</option>
                                <option value="III/A">III/A</option>
                                <option value="III/B">III/B</option>
                                <option value="III/C">III/C</option>
                                <option value="III/D">III/D</option>
                                <option value="IV/A">IV/A</option>
                                <option value="IV/B">IV/B</option>
                                <option value="IV/C">IV/C</option>
                                <option value="IV/D">IV/D</option>
                                <option value="IV/E">IV/E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" required>
                                <option value="Wakil Ketua Tingkat Banding">Wakil Ketua Tingkat Banding</option>
                                <option value="Sekretaris Tingkat Banding Tipe B">Sekretaris Tingkat Banding Tipe B</option>
                                <option value="Kepala Bagian">Kepala Bagian</option>
                                <option value="Panitera Pengganti Tingkat Banding">Panitera Pengganti Tingkat Banding</option>
                                <option value="Kepala Sub Bagian">Kepala Sub Bagian</option>
                                <option value="Pranata Keuangan APBN Pelaksanaan">Pranata Keuangan APBN Pelaksanaan</option>
                                <option value="Arsiparis Pelaksanaan Lanjutkan">Arsiparis Pelaksanaan Lanjutkan</option>
                                <option value="Analisa Protokol">Analisa Protokol</option>
                                <option value="Pranata Komputer Ahli Muda">Pranata Komputer Ahli Muda</option>
                                <option value="Pengadministrasi Persuratan">Pengadministrasi Persuratan</option>
                                <option value="Analisa Pengelolaan Keuangan APBN">Analisa Pengelolaan Keuangan APBN</option>
                                <option value="Pranata Keuangan APBN Penyelia">Pranata Keuangan APBN Penyelia</option>
                                <option value="Pengadministrasi Perpustakaan">Pengadministrasi Perpustakaan</option>
                                <option value="Penyusunan Laporan Keuangan">Penyusunan Laporan Keuangan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- script bawaan template sbadmin -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- ini script transisi pindah halaman -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>

    <!-- coba open line -->
    <script>
        <?php if ($this->session->flashdata('sweet_error')) : ?>
            swal({
                icon: 'error',
                title: 'Oops...!!!',
                text: '<?php echo $this->session->flashdata('sweet_error'); ?>',
                timer: 3000,
                buttons: false
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('sweet_success')) : ?>
            swal({
                title: "Success!",
                text: "<?php echo $this->session->flashdata('sweet_success'); ?>",
                icon: "success",
                timer: 3000,
                buttons: false
            });
        <?php endif; ?>
    </script>

    <!-- ini juga -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-print').on('click', function() {
                window.print();
            });
        });
    </script>
</body>

</body>

</html>