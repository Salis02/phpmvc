<div class="row mt-3">

    <div class="row">
        <div class="col-lg-12">
            <?= Flasher::flash() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off" >
                    <button class="btn btn-success" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Mahasiswa
        </button>
        <hr>

        <h3>Daftar Mahasiswa</h3>
        <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div><?= $mhs['nama'] ?></div>
                    <div>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge bg-info text-dark ml-1">Info</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id'] ?>" class="badge bg-warning text-dark ml-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'] ;?>">Edit</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge bg-danger text-dark ml-1" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="namaMahasiswa" placeholder="Nama Mahasiswa Baru" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="number" class="form-control" id="nim" placeholder="NIM Mahasiswa" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailMahasiswa" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailMahasiswa" placeholder="Email" name="email" required>
                            </div>
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select id="jurusan" name="jurusan" class="form-select" aria-label="Default select example" required>
                                <option selected>Pilih Jurusan</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Kimia">Teknik Kimia</option>
                                <option value="Teknik Nuklir">Teknik Nuklir</option>
                                <option value="Teknik Pernapasan">Teknik Pernapasan</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>