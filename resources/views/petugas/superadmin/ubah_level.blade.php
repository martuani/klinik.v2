@extends('layouts.dashboard.app')
@section('title', 'Ubah Kategori Petugas')
@section('data', 'active')
@section('level', 'active')
@section('side', 'active')

@section('judul', 'Ubah Kategori Petugas')
@section('container')


<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/level/{{ $level->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_level">Kategori Petugas</label>
                                            <input type="text" class="form-control" name="nama_level" value="{{ $level['nama_level'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/> 
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

</div>

@endsection