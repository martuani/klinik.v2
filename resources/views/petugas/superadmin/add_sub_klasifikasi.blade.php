@extends('layouts.dashboard.app')
@section('title', 'Sub Klasifikasi')
@section('judul', 'Tambah Sub Klasifikasi')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/sub/klasifikasi" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_penyakit">Sub Klasifikasi Penyakit<b class="color-red">*</b></label>
                                            <input type="text" id="nama_penyakit" class="form-control" name="nama_penyakit" placeholder="Masukkan sub klasifikasi" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Klasifikasi Penyakit<b class="color-red">*</b></label>
                                            <select class="choices form-select" name="klasifikasi_penyakit_id" id="klasifikasi_penyakit_id">
                                                <option value="">Pilih Sub-Klasifikasi</option>
                                                @foreach ($klasifikasipenyakit as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->klasifikasi_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="reset" class="form-control btn btn-light-secondary me-1 mb-1">Reset</button>
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