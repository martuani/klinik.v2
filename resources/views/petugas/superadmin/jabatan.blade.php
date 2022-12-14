@extends('layouts.dashboard.app')
@section('title', 'Data Jabatan')
@section('organisasi', 'active')
@section('jabatan', 'active')
@section('organ', 'active')

@section('judul', 'Data Jabatan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addjabatan') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.jabatan') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $jab)
                    <tr>
                        <td>{{ $jab['nama_jabatan'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/jabatan/{{ $jab->id }}" class="btn btn-success rounded-pill" title="Ubah jabatan"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>



{{-- @include('sweetalert::alert') --}}
@endsection