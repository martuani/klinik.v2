@extends('layouts.dashboard.app')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golkes', 'active')
@section('title', 'Ubah Golongan Obat')
@section('judul', 'Ubah Golongan Obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/golongan/alkes/{{ $golonganalkes->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="golongan_alkes">Hari</label>
                                            <input type="text" class="form-control" id="golongan_alkes" name="golongan_alkes" value="{{ $golonganalkes['golongan_alkes'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12"><br>
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