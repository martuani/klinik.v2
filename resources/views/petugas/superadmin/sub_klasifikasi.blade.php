@extends('layouts.dashboard.app')
@section('title', 'Sub Klasifikasi Penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('sub', 'active')

@section('judul', 'Data Sub Klasifikasi Penyakit')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addsubklasifikasi') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.subklasifikasi') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Sub Klasifikasi Penyakit</th>
                        <th>Klasifikasi Penyakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subklasifikasi as $sub)
                    <tr>
                        <td>{{ $sub->nama_penyakit }}</td>
                        <td>{{ $sub->klasifikasi_penyakit->klasifikasi_penyakit }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/sub/klasifikasi/{{ $sub['id'] }}" class="btn btn-success rounded-pill" title="Ubah sub klasifikasi Penyakit"><i class="fa fa-edit"></i></a>
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