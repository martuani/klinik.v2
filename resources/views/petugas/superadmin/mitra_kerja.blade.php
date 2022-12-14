@extends('layouts.dashboard.app')
@section('title', 'Data Mitra Kerja')
@section('data', 'active')
@section('mitra', 'active')
@section('side', 'active')

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Data Petugas Mitra Kerja')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
            @section('judul', 'Data Mitra Kerja')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addmitrakerja') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.mitrakerja') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <td>Tanggal dibuat</td>
                        <th>Nama</th>
                        <th>Divisi</th>
                        <th>Perusahaan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($user->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user->divisi->nama_divisi_pasien }}</td>
                        <td>{{ $user->perusahaan->nama_perusahaan_pasien }}</td>
                        <td>{{ $user['status'] }}</td>
                        <td>
                            <div class="buttons" width="100px">
                                <a href="/view/mitra/kerja/{{ $user->id }}" title="View Data Pasien" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/mitra/kerja/{{ $user->id }}" class="btn btn-success rounded-pill" title="Ubah data mitra kerja"><i class="fa fa-edit"></i></a>
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