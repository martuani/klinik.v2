@extends('layouts.dashboard.app')

@section('title', 'Data Pasien Mitra Kerja')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Data Pasien Mitra Kerja')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="buttons" width="100px">
                        <a href="{{ route('superadmin.addmitrakerja') }}" class="btn btn-success rounded-pill">
                            <i class="fa fa-plus"></i>
                        <span>Tambah</span></a>
                    </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            
                             <th>Created</th>
                             <th>Nama</th>
                             <th>ID Kategori</th>
                             <th>Jenis Kelamin</th>
                             <th>Perusahaan</th>
                             <th>Jabatan</th>
                             <th>Alergi</th>
                             <th>Hamil/Menyusui</th>
                             <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $patient)
                        <tr>
                            <td>{{ $patient['created_at'] }}</td>
                            <td>{{ $patient['nama_pasien'] }}</td>
                            <td>{{ $patient['kategori_pasien_id'] }}</td>
                            <td>{{ $patient['jenis_kelamin'] }}</td>
                            <td>{{ $patient->perusahaan->nama_perusahaan_pasien }}</td>
                            <td>{{ $patient->jabatan->nama_jabatan }}</td>
                            <td>{{ $patient['alergi_obat'] }}</td>
                            <td>{{ $patient['hamil_menyusui'] }}</td>
                            <td><div class="buttons" width="100px">
                                <a href="" title="View Data Pasien" href="#"
                                class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                    <a href="/ubah/mitra/kerja/{{ $patient->id }}" class="btn btn-success rounded-pill" title="Edit" 
                                        ><i class="fa fa-edit"></i></a>
                                </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    
    <!-- // Basic multiple Column Form section end -->
    
</div>
@include('sweetalert::alert') 
@endsection