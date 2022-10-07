@extends('layouts.users.user')

@section('konten')
    <h1 class="text-center">Form Pendaftaran Mahasiswa Baru</h1>
    <form id="form" method="post">
        <div class="alert alert-primary">
            <strong>Data Diri</strong>
        </div>
        <div class="row">
            <div class="col-sm-7">

                <div class="form-group">
                    <label>Nama Lengkap:</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Nomor Identitas (NIK):</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukan Nomor NIK">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Jenis Kelamin:</label>
                    <select class="form-control" name="jk">
                        <option>Pilih</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Kewarganegaraan:</label>
                    <select class="form-control" name="kewarganegaraan">
                        <option>Pilih</option>
                        <option value="WNI">Warga Negara Indonesia</option>
                        <option value="WNA">Warga Negara Asing</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Agama:</label>
                    <select class="form-control" name="agama">
                        <option>Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Nama Ibu Kandung:</label>
                    <input type="text" name="nama_ibu" class="form-control" placeholder="Masukan Nama Ibu Kandung">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>No Telp:</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Masukan No Telp">
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Data Alamat Asal</strong>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea class="form-control" name="alamat" rows="2" id="alamat"></textarea>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Kode Pos:</label>
                    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos">
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Data Pendidikan</strong>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Pendidikan Terakhir:</label>
                    <select class="form-control" name="pendidikan">
                        <option value="SMA-IPA">SMA - IPA</option>
                        <option value="SMA-IPS">SMA - IPS</option>
                        <option value="SMK-IPA">SMK - IPA</option>
                        <option value="SMK-IPS">SMK - IPS</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nama Sekolah:</label>
                    <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Rata-rata Nilai Rapor Kelas 12:</label>
                    <input type="text" name="nilai_raport" class="form-control"
                        placeholder="Masukan Rata-rata nilai raport">
                </div>
            </div>
        </div>
        <div class="alert alert-primary">
            <strong>Pilihan Program Studi</strong>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Pilih Program Studi 1:</label>
                    <select class="form-control" name="prog1">
                        <option value="D3 - Teknik Komputer">D3 - Teknik Komputer</option>
                        <option value="D3 - Komputerisasi Akuntansi">D3 - Komputerisasi Akuntansi</option>
                        <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                        <option value="S1 - Sistem Informasi">SI - Sistem Informasi</option>
                        <option value="S1 - Teknik Informatika">SI - Teknik Informatika</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Pilih Program Studi 2:</label>
                    <select class="form-control" name="prog2">
                        <option value="D3 - Teknik Komputer">D3 - Teknik Komputer</option>
                        <option value="D3 - Komputerisasi Akuntansi">D3 - Komputerisasi Akuntansi</option>
                        <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                        <option value="S1 - Sistem Informasi">SI - Sistem Informasi</option>
                        <option value="S1 - Teknik Informatika">SI - Teknik Informatika</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

        </div>
    </form>
@endsection
