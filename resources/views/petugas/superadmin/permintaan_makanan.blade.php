@extends('layouts.dashboard.app')

@section('title', 'Permintaan Makanan')
@section('rawat', 'active')
@section('inap', 'active')
@section('makanan', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset ('ref/assets/css/bootstrap.css')}}">

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="stylesheet" href="{{asset ('ref/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{asset ('ref/assets/css/app.css')}}">

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/choices.js/choices.min.css')}}" />

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="shortcut icon" href="{{asset ('ref/assets/images/favicon.svg" type="image/x-icon')}}">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Permintaan Makanan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>ID Pasien</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select name="pasien_id" id="pasien_id" class="form-select">
                                                <option disabled selected>Pilih ID Pasien</option>
                                                @foreach ($pasien_id as $pas)
                                                <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['tempat_lahir'] }}|{{ $pas['tanggal_lahir'] }}|{{ $pas['umur'] }}|{{ $pas['pekerjaan'] }}|{{  $pas->perusahaan->nama_perusahaan_pasien }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}">{{ $pas['id'] }} - {{ $pas['nama_pasien'] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4 form-group">
                                        </div>
                                        <br>
                                        <div class="col-md-2">
                                            <label>ID Rawat Inap</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="search" id="id_rawat_inap" class="form-control" name="id_rawat_inap" placeholder="ID Rawat Inap" required disabled>
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-4 form-group">

                                        </div>

                                        <div class="col-md-2">
                                            <label>Nama Pasien</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" placeholder="Nama Pasien" disabled>
                                        </div>

                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4 form-group">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" disabled>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4 form-group">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Pekerjaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="divisi" class="form-control" name="divisi" placeholder="Divisi" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Perusahaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Divisi</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput7" class="form-control" name="myInput7" placeholder="Masukkan divisi" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Jabatan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput8" class="form-control" name="myInput8" placeholder="Masukkan jabatan" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Diagnosa</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select class="choices form-select" name="nama_penyakit_id" id="nama_penyakit_id">
                                                <option disabled selected>Pilih Nama Penyakit</option>
                                                @foreach ($namapenyakit as $nama)
                                                <option value="{{ $nama->id }}">{{ $nama->primer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Permintaan Makanan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <textarea type="text" id="permintaan_makanan" class="form-control" name="permintaan_makanan" placeholder="Masukkan permintaan makanan"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Catatan Tambahan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <textarea type="text" id="catatan_tambahan" class="form-control" name="catatan_tambahan" placeholder="Tambahkan catatan"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Tanggal Mulai Diberikan Makanan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="date" id="tanggal_mulai" class="form-control" name="tanggal_dimulai">
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Tanggal Selesai Diberikan Makanan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="date" id="tanggal_selesai" class="form-control" name="tanggal_selesai">
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Total Hari Pemberian</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="tezt" id="hari_pemberian" class="form-control" name="hari_pemberian" placeholder="total" required>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-sm-6 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset ('ref/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Include Choices JavaScript -->
    <script src="{{asset ('ref/assets/vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{asset ('ref/assets/js/pages/form-element-select.js')}}"></script>

    {{-- <script src="{{asset ('ref/assets/js/mazer.js')}}"></script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>



    {{-- <script src="assets/js/mazer.js"></script> --}}

    {{-- <script>
                     $(document).ready(function () {
                    $('#pasien_id').select2();
                    $('#pasien_id').on('change', function (e) {
                        var data = $('#pasien_id').select2("val");
                        @this.set('pasien_id', data);
                    });
                });
                </script> --}}

    <script type="text/javascript">
        function myChangeFunction(input1) {
            let text = input1.value;
            const myArray = text.split("|");
            var input0 = document.getElementById('myInput0');
            var input1 = document.getElementById('myInput1');
            var input2 = document.getElementById('myInput2');
            var input3 = document.getElementById('myInput3');
            var input4 = document.getElementById('myInput4');
            var input5 = document.getElementById('myInput5');
            var input6 = document.getElementById('myInput6');
            var input7 = document.getElementById('myInput7');
            var input8 = document.getElementById('myInput8');
            input0.value = myArray[0];
            input1.value = myArray[1];
            input2.value = myArray[2];
            input3.value = myArray[3];
            input4.value = myArray[4];
            input5.value = myArray[5];
            input6.value = myArray[6];
            input7.value = myArray[7];
            input8.value = myArray[8];
        }
    </script>

    {{-- <script>
                    const userList = document.querySelectorAll(".name-list tr");
                const history = document.querySelector(".history");
                const addListBtn = document.querySelector(".addListBtn");
            
                addListBtn.addEventListener('click', function(){
                    const newLi = document.createElement('LI');
                    const liContent = document.createTextNode('sdf');
                    
                    newLi.appendChild(liContent);
                    userList.appendChild(newLi);
                });
                </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("#pasien_id").click(function(e) {
            var pasien = $(this).val();

            console.log(pasien);

            $.ajax({
                type: "GET",
                url: "{{route('superadmin.datapasien.id')}}",
                data: {
                    'pasien': pasien
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#nama_pasien').val(data.nama_pasien);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tanggal_lahir').val(data.tanggal_lahir);
                    $('#umur').val(data.umur);
                    $('#pekerjaan').val(data.pekerjaan);
                    $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
                    $('#divisi').val(data.divisi.nama_divisi_pasien);
                    $('#jabatan').val(data.jabatan.nama_jabatan);
                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });
        });
    </script>

    @endsection