@extends('layouts.dashboard.app')

@section('title', 'Data Obat')


@section('judul', 'Data Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.adddataobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Create</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Jenis obat</th>
                        <th>Golongan Obat</th>
                        <th>Nama Obat</th>
                        <th>Satuan Obat</th>
                        <th>Bobot Obat</th>
                        <th>Komposisi obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obatalkes as $item)
                    <tr>
                        <td>{{ $item->jenis_obat->nama_jenis_obat }}</td>
                        <td>{{ $item->golongan_obat->nama_golongan_obat }}</td>
                        <td>{{ $item->nama_obat->nama_obat }}</td>
                        <td>{{ $item->satuan_obat->satuan_obat }}</td>
                        <td>{{ $item->bobot_obat->bobot_obat }}</td>
                        <td>{{ $item->komposisi_obat }}</td>
                            <td><div class="buttons">
                                <a href="" title="View Data Pasien" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/data/obat/{{ $item->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
                                </div></td>
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