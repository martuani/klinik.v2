@extends('layouts.dashboard.app')
@section('title', 'Ubah Data Mitra Kerja')
@section('data', 'active')
@section('mitra', 'active')
@section('side', 'active')

@section('judul', 'Ubah Data Mitra Kerja')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">

                    </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        @error('message')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <form class="form" action="/ubah/mitra/kerja/{{ $user->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Mitra Kerja <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Petugas" value="{{ $user['name'] }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nik">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                            <input type="number" id="nik" class="form-control" name="nik" value="{{ $user['nik'] }}"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="13" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email <b class="color-red">*</b></label>
                                            <input type="email" id="email" class="form-control" name="email" value="{{ $user['email'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Perusahaan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="perusahaan_id" id="perusahaan_id">
                                                @foreach ($perusahaan as $peru)
                                                <option value="{{ $peru->id }}" {{ $peru->id == $user->perusahaan->id ? 'selected' : '' }}>{{ $peru->nama_perusahaan_pasien }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Divisi <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="divisi_id" id="divisi_id">
                                                @foreach ($divisi as $div)
                                                <option value="{{ $div->id }}" {{ $div->id == $user->divisi->id ? 'selected' : '' }}>{{ $div->nama_divisi_pasien }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon <b class="color-red">*</b></label>
                                            <input type="text" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" value="{{ $user['telp'] }}" maxlength="13">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="status" id="status" required>
                                                <option value="{{ $user['status'] }}">{{ $user['status'] }}</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="NonAktif">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12"><br>
                                        <input type="text" id="telp" class="form-control" value="klinikMIP2022!" name="password" hidden>
                                        <div class="form-group"><input type="checkbox" id="cek" name="cek" value="x">
                                            <label for="cek"> <B>Reset Password</B> <I>*klinikMIP2022!</I></label>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
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

@endsection