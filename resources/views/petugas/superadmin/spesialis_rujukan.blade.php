@extends('layouts.dashboard.app')
@section('title', 'Dokter Spesialis')
@section('md', 'active')
@section('periksa', 'active')
@section('spes', 'active')

@section('judul', 'Dokter Spesialis')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addspesialisrujukan') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.spesialisrujukan') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spesialis_rujukans as $spesialis)
                    <tr>
                        <td>{{ $spesialis['nama_spesialis_rujukan'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/spesialis/rujukan/{{ $spesialis['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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