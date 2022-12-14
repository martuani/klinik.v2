@extends('layouts.dashboard.app')
@section('title', 'Add Data Pasien')
@section('kate', 'active')
@section('da', 'active')
@section('pasien', 'active')

@section('judul', 'Tambah Data Pasien')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @error('message')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <form class="form" action="{{ route('add.pasien') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5 class="mb-4">Data Pasien</h5>
                                    <div class="form-group">
                                        <label for="kategori_pasien_id">Kategori Pasien <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="kategori_pasien_id"  onchange="yesnoCheck_penduduk(this);" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            <option disabled selected value="">Pilih Kategori Pasien</option>
                                            @foreach ($kategori as $kate)
                                            <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" placeholder="Masukkan Nama Pasien" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group" id="nik" name="nik"  style="display: block;" >
                                        <label for="NIK">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="NIK" class="form-control" name="NIK" placeholder="Masukkan Nomor Induk Karyawan" maxlength="16" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    
                                    <div class="form-group" id="penduduk" name="penduduk">
                                        <label for="penduduk">Nomor Induk Kependudukan </label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="penduduk" class="form-control" name="penduduk" placeholder="Masukkan Nomor Induk Kependudukan" maxlength="16" >
                                    </div>
                                    <div class="form-group">
                                        <label for="perusahaan_id">Perusahaan <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" required onchange="yesnoCheck_lainnya(this);" oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            <option disabled selected value="">Pilih Perusahaan</option>
                                            <option value="9">other</option>
                                            @foreach ($perusahaan as $peru)
                                            <option value="{{ $peru->id }}">
                                                {{ $peru->nama_perusahaan_pasien }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="lain" name="lain" style="display: none;">
                                        <label for="lain">Lain-lain</label>
                                        <input type="text" id="lain" class="form-control" name="lain" placeholder="lainnya">
                                    </div>
                                    <div class="form-group">
                                        <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="divisi_id" id="divisi_id" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            <option disabled selected value="">Pilih Divisi</option>
                                            @foreach ($divisi as $divi)
                                            <option value="{{ $divi->id }}">{{ $divi->nama_divisi_pasien }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="jabatan_id" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            <option disabled selected value="">Pilih Jabatan</option>
                                            @foreach ($jabatan as $jabat)
                                            <option value="{{ $jabat->id }}">{{ $jabat->nama_jabatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir <b class="color-red">*</b></label>
                                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" placeholder="Masukkan tempat lahir" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir <b class="color-red">*</b></label>
                                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan_id">Jenis Kelamin <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="jenis_kelamin" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            <option disabled selected value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat <b class="color-red">*</b></label>
                                        <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_mess">Alamat Mess</label>
                                        <input type="text" id="alamat_mess" class="form-control" name="alamat_mess" placeholder="Masukkan Alamat Mess">
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                        <input type="text" id="pekerjaan" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="telepon">Telepon <b class="color-red">*</b></label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="telepon" class="form-control" name="telepon" placeholder="Masukkan no telepon" maxlength="13" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email" >
                                    </div>

                                    {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                    <div class="form-group">
                                        <label for="email">Foto Pasien</label>
                                        <input class="form-control" type="file" id="upload" name="upload">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Alergi Obat <b class="color-red">*</b></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-check-input" type="radio" name="alergi_obat" id="alergi_obat" value="0" checked> Tidak
                                        <input class="form-check-input " type="radio" name="alergi_obat" id="alergi_obat" value="1"> Ya
                                    </div>
                                    

                                    <div class="col-md-4">
                                        <label>Hamil/Menyusui <b class="color-red">*</b></label>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <input class="form-check-input" type="radio" name="hamil_menyusui" id="hamil_menyusui" value="0" checked> Tidak
                                        <input class="form-check-input" type="radio" name="hamil_menyusui" id="hamil_menyusui" value="1"> Ya
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <h5 class="mb-4">Data Keluarga</h5>
                                    <div class="form-group">
                                        <label for="nama_keluarga">Nama Keluarga <b class="color-red">*</b></label>
                                        <input type="text" id="nama_keluarga" class="form-control" name="nama_keluarga" placeholder="Masukkan Nama Keluarga" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_keluarga">Hubungan Keluarga <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="hubungan_keluarga" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            <option disabled selected value="">Pilih Hubungan Keluarga</option>
                                            <option value="Ayah">Ayah</option>
                                            <option value="Ibu">Ibu</option>
                                            <option value="Adik">Adik</option>
                                            <option value="Abang">Abang</option>
                                            <option value="Kakak">Kakak</option>
                                            <option value="Ayah Mertua">Ayah Mertua</option>
                                            <option value="Ibu Mertua">Ibu Mertua</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_keluarga">Alamat <b class="color-red">*</b></label>
                                        <input type="text" id="alamat_keluarga" class="form-control" name="alamat_keluarga" placeholder="Masukkan Alamat Keluarga" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_keluarga">Pekerjaan <b class="color-red">*</b></label>
                                        <input type="text" id="pekerjaan_keluarga" class="form-control" name="pekerjaan_keluarga" placeholder="Masukkan Pekerjaan Keluarga" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_keluarga">Nomor Telepon <b class="color-red">*</b></label>
                                        <input type="text" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telepon_keluarga" placeholder="Masukkan No Telepon Keluarga" maxlength="13" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_keluarga">Email</label>
                                        <input type="email_keluarga" id="email_keluarga" class="form-control" name="email_keluarga" placeholder="Masukkan Email Keluarga">
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="form-control btn btn-secondary me-1 mb-1" onclick="javascript:window.history.back();"> Kembali</button>
                                            </div>
                                            
                                            <div class="col-4">
                                                <button type="reset" class="form-control btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function yesnoCheck_penduduk(that) {
        if (that.value == '5') {
            document.getElementById("nik").style.display = "none";
        } else {
            document.getElementById("nik").style.display = "block";
        }
    }
</script>

<script type="text/javascript">
    function yesnoCheck_lainnya(that) {
        if (that.value == "9") {
            document.getElementById("lain").style.display = "block";
        } else {
            document.getElementById("lain").style.display = "none";
        }
    }
</script>
@endsection