
@extends('layouts.dashboard.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('container')

                <div class="col-12">
                <div class="btn-group mb-1" style=" float: right;">
                                <div class="dropdown" >
                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                        id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-error-circle me-50"></i> {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                        <a class="dropdown-item" href="/ubah/profile/{{ Auth::user()->id }}"><i class="bi bi-person me-50"></i>
                                            Profile</a>
                                        <a class="dropdown-item" href="/ubah/password/{{ Auth::user()->id }}"><i class="bi bi-key me-50"></i> Ubah Password</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Keluar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

 <h4 class="card-title">Welcome, {{ Auth::user()->name }}</h4>
<br><br>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Daftar Pengunjung</h6>
                                    <h6 class="font-extrabold mb-0">1000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold"> Daftar Pasien</h6>
                                    <h6 class="font-extrabold mb-0">{{$pasien}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Karyawan MIP</h6>
                                    <h6 class="font-extrabold mb-0">{{$kategori}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Mitra Kerja</h6>
                                    <h6 class="font-extrabold mb-0">{{$mitra}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Title 1</h6>
                                            <h6 class="font-extrabold mb-0">1000</h6><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Title 2</h6>
                                            <h6 class="font-extrabold mb-0">1000</h6><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Title 3</h6>
                                            <h6 class="font-extrabold mb-0">1000</h6><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Title 4</h6>
                                            <h6 class="font-extrabold mb-0">1000</h6><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="assets/images/faces/5.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Beautiful</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Congratulations</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="assets/images/faces/2.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Mantap</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Wow amazing </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection