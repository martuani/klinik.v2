@extends('layouts.dashboard.app')

@section('title', 'Nama Penyakit')


@section('judul', 'Data Nama Penyakit')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addnamapenyakit') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama Penyakit</th>
                        <th>Penyakit Sekunder</th>
                        <th>Sub Klasifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($namapenyakit as $nama)
                    <tr>
                        <td>{{ $nama->primer }}</td>
                        <td>{{ $nama->sekunder }}</td>
                        <td>{{ $nama->sub_klasifikasi->nama_penyakit }}</td>
                        <td></td>
                        <td><div class="buttons">
                            <a href="/ubah/nama/penyakit/{{ $nama['id'] }}" class="btn btn-success rounded-pill" title="Ubah diagnosa"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection