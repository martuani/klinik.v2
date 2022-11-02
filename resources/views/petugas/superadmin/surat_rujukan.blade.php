@extends('layouts.dashboard.app')

@section('title', 'Surat Rujukan')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

@section('css')
<style>
    
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>

@endsection

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Surat Rujukan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="/surat/rujukan" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">ID pasien <b class="color-red">*</b></label>
                                                <select name="pasien_id" id="pasien_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}">{{ $pas['id'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="riwayat">Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                                                <textarea type="text" id="riwayat" class="form-control"
                                                placeholder="Masukkan Riwayat Penyakit" name="riwayat" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien </label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" placeholder="Masukkan Nama Pasein">
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Obat yang diberikan <b class="color-red">*</b></label>
                                                <textarea type="text" id="obat_diberikan" class="form-control"
                                                placeholder="Masukkan Nama Obat" name="obat_diberikan" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur" placeholder="Umur">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Tempat Pemeriksaan <b class="color-red">*</b></label>
                                                <input type="text" id="tempat" class="form-control"
                                                    name="tempat" placeholder="Masukkan Tempat Pemeriksaan" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="perusahaan">Perusahaan </label>
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Masukkan Nama Perusahaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Hasil Pengobatan Pasien <b class="color-red">*</b></label>
                                                <textarea type="text" id="hasil_pengobatan" class="form-control"
                                                placeholder="Masukkan Hasil Pengobatan" name="hasil_pengobatan" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan </label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" placeholder="Masukkan Pekerjaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dokter_rujukan">Dokter Spesialis Rujukan <b class="color-red">*</b></label>
                                                <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($spesialisrujukan as $spesialis)
                                                        <option value="{{ $spesialis['id'] }}">{{ $spesialis['nama_spesialis_rujukan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                                                <input type="date" id="tanggal" class="form-control"
                                                placeholder="Tanggal Pemeriksaan" name="tanggal" required>
                                            </div>
                                        </div>

                                        

                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
                                                <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($rsrujukan as $rs)
                                                        <option value="{{ $rs['id'] }}">{{ $rs['nama_RS_rujukan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Tanda Tangan <b class="color-red">*</b></label>
                                                <input class="form-control" type="file" id="ttd" name="ttd" multiple required>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class=" d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1 btn-form">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1 btn-form">Reset</button>
                                            </div>  

                                        </form>
                                            
        </section>
        
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
        $(".form-select").select2();
    </script>
@endsection