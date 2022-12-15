@extends('layouts.dashboard.app')
@section('title', 'Data Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('al', 'active')
@section('judul', 'Data Alat/Bahan Kesehatan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('obat.addalkes') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataalkes') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Golongan Alat/Bahan Kesehatan</th>
                        <th>Nama Alat/Bahan Kesehatan</th>
                        <th>Satuan Alat/Bahan Kesehatan</th>
                        <th>Bobot Alat/Bahan Kesehatan</th>
                        <th>Komposisi Alat/Bahan Kesehatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alkes as $al)
                    <tr>
                        <td>{{ $al->golongan_alkes->golongan_alkes }}</td>
                        <td>{{ $al->nama_alkes->nama_alkes }}</td>
                        <td>{{ $al->satuan_obat->satuan_obat }}</td>
                        <td>{{ $al->bobot_obat->bobot_obat }}</td>
                        <td>{{ $al->komposisis }}</td>
                            <td><div class="buttons">
                                <a href="/ubah/alkes/{{ $al->id }}" class="btn btn-success rounded-pill" title="Ubah data alkes"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@include('sweetalert::alert')
@endsection