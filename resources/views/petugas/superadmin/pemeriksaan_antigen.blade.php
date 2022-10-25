@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Antigen')


@section('judul', 'Pemeriksaan Antigen')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addpemeriksaanantigen') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemeriksaanantigen as $pemeriksaaan)
                    <tr>
                        <td>{{ $pemeriksaaan['kebutuhan'] }}</td>
                        <td><div class="buttons">
                            <a href="" title="" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            <a href="/ubah/pemeriksaan/antigen/{{ $pemeriksaaan['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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