@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Inap')
@section('rekam', 'active')
@section('rawat', 'active')
@section('inap', 'active')

@section('judul', 'Daftar Pasien Rawat Inap')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>ID Rekam Medis </th>
                        <th>ID Rawat Inap</th>
                        <th>Nama Pasien</th>
                        <th>Mulai Rawat Inap</th>
                        <th>Berakhirnya Rawat Inap</th>
                        <td>Perusahaan</td>
                        <td>Diagnosa</td>
                        <td>Status</td>
                        <td>AKsi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RM2212001</td>
                        <td>121328201822</td>
                        <td>Martuani</td>
                        <td>02 Desember 2022</td>
                        <td>03 Desember 2022</td>
                        <td>MIP</td>
                        <td>Demam</td>
                        <td><b>Aktif</b></td>
                        <td><div class="buttons">
                            <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            </div></td>
                    </tr>
                    <tr>
                        <td>RM2212001</td>
                        <td>121328201822</td>
                        <td>Martuani</td>
                        <td>02 Desember 2022</td>
                        <td>03 Desember 2022</td>
                        <td>MIP</td>
                        <td>Demam</td>
                        <td><b>Aktif</b></td>
                        <td><div class="buttons">
                            <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            </div></td>
                    </tr>
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