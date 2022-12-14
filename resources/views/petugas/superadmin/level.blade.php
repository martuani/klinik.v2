@extends('layouts.dashboard.app')
@section('title', 'Data Level Petugas')
@section('data', 'active')
@section('level', 'active')
@section('side', 'active')

@section('judul', 'Data Level Petugas')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addlevel') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($level as $lev)
                    <tr>
                        <td>{{ $lev['nama_level'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/level/{{ $lev->id }}" class="btn btn-success rounded-pill" title="Ubah kategori petugas"><i class="fa fa-edit"></i></a>
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

<script>
    @if($message = session('succes_message'))
    Swal.fire(
      'Good job!',
      '{{ $message }}',
      'success'
    )
    function(){ 
       location.reload();
   }
    @endif
    </script>
@endsection