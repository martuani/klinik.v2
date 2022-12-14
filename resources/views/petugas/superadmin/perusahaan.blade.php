@extends('layouts.dashboard.app')
@section('title', 'Data Perusahaan')
@section('organisasi', 'active')
@section('perusahaan', 'active')
@section('organ', 'active')

@section('judul', 'Data Perusahaan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.perusahaan') }}" }})
                </script>
            @endif
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addperusahaan') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perusahaan as $peru)
                    <tr>
                        <td>{{ $peru['nama_perusahaan_pasien'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/perusahaan/{{ $peru->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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