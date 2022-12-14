@extends('layouts.dashboard.app')

@section('title', 'Kecelakan Kerja')
@section('kecelakaan', 'active')

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Kecelakan Kerja')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    
    <div class="card collapse-icon accordion-icon-rotate">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="accordion" id="cardAccordion">
                                <div class="card open">
                                    <div class="card-header" id="headingThree" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree" role="button" style="background-color: #ADD8E6">
                                        <span class="collapsed collapse-title">Data Pasien</span>
                                    </div>
                                    <div id="collapseThree" class="collapse show pt-1" aria-labelledby="headingThree"
                                        data-parent="#cardAccordion">

                                        <div class="tab-content text-justify">
                                            <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel" aria-labelledby="list-datapasien-list">                                      
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
                                                                                       <option value="{{ $pas['id'] }}">{{ $pas['id'] }}</option>
                                                                                   @endforeach
                                                                               </select>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                               </div>
                               
                                                                               <div class="col-md-2">
                                                                                   <label>Nama Pasien</label>
                                                                               </div>
                                                                               <div class="col-md-4 form-group">
                                                                                   <input type="text" id="nama_pasien" class="form-control"
                                                                                       name="nama_pasien" placeholder="Nama Pasien"  disabled>
                                                                               </div>
                                                                               <div class="col-md-6">
                                                                                   </div>
                               
                                                                                   <div class="col-md-2">
                                                                                       <label>Pekerjaan</label>
                                                                                   </div>
                                                                                   <div class="col-md-4 form-group">
                                                                                       <input type="text" id="pekerjaan" class="form-control"
                                                                                           name="pekerjaan" placeholder="Pekerjaan"  disabled>
                                                                                   </div>
                                                                                   <div class="col-md-6">
                                                                                       </div>
                                                                               
                                                                                   <div class="col-md-2">
                                                                                       <label>Perusahaan</label>
                                                                                   </div>
                                                                                   <div class="col-md-4 form-group">
                                                                                       <input type="text" id="perusahaan" class="form-control"
                                                                                           name="perusahaan" placeholder="Perusahaan" disabled >
                                                                                   </div>
                                                                                   <div class="col-md-6">
                                                                                       </div>
                                                                       
                                                                               <div class="col-md-2">
                                                                               <label>Divisi</label>
                                                                           </div>
                                                                           <div class="col-md-4 form-group">
                                                                               <input type="text" id="divisi" class="form-control"
                                                                                   name="divisi" placeholder="Divisi"  disabled>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                               </div>
                                                                               
                                                                                           <div class="col-md-2">
                                                                                               <label>Tanggal Kejadian</label>
                                                                                           </div>
                                                                                           <div class="col-md-4 form-group">
                                                                                               <input type="date" id="tanggal_kejadian" class="form-control"
                                                                                                   name="tanggal_kejadian" placeholder="Tanggal Kejadian">
                                                                                           </div>
                                                                                           <div class="col-md-6">
                                                                                               </div>
                                                                                              
                                                                                                   <div class="col-md-2">
                                                                                                       <label>Nama Pengantar</label>
                                                                                                   </div>
                                                                                                   <div class="col-md-4 form-group">
                                                                                                       <input type="text" id="nama_pengantar" class="form-control"
                                                                                                           name="nama_pengantar" placeholder="Nama Pengantar">
                                                                                                   </div>
                                                                                                   <div class="col-md-6">
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
                                       </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                        role="button" style="background-color: #ADD8E6">
                                        <span class="collapsed collapse-title">Pemeriksaan</span>
                                    </div>
                                    <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne"
                                        data-parent="#cardAccordion">
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
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>ID Rekam Medis</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input type="search" id="id_pasien" class="form-control"
                                                                                            name="id_pasien" placeholder="ID Rekam Medis">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Anamnesis/Kronologi</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input type="text" id="id_pasien" class="form-control"
                                                                                            name="id_pasien" placeholder="ID Pasien" required disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Pemeriksa Fisik*</label>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Tinggi Badan</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                            <div class="input-group-append">
                                                                                              <span class="input-group-text" id="basic-addon2">cm</span>
                                                                                            </div>
                                                                                          </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Berat Badan</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                            <div class="input-group-append">
                                                                                              <span class="input-group-text" id="basic-addon2">kg</span>
                                                                                            </div>
                                                                                          </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">                                                    
                                                                                    <div class="col-md-2">
                                                                                            <label>Suhu Tubuh</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                            <div class="input-group-append">
                                                                                              <span class="input-group-text" id="basic-addon2">Celcius</span>
                                                                                            </div>
                                                                                          </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                       <label>Tekanan Darah</label>
                                                                               </div>
                                                                               <div class="col-md-4 form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                    <div class="input-group-append">
                                                                                      <span class="input-group-text" id="basic-addon2">mmHg</span>
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                       <label>Denyut Nadi</label>
                                                                               </div>
                                                                               <div class="col-md-4 form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                    <div class="input-group-append">
                                                                                      <span class="input-group-text" id="basic-addon2">/menit</span>
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                       <label>Laju Pernapasan</label>
                                                                               </div>
                                                                               <div class="col-md-4 form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                    <div class="input-group-append">
                                                                                      <span class="input-group-text" id="basic-addon2">/menit</span>
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                       <label>Saturasi Oksigen</label>
                                                                               </div>
                                                                               <div class="col-md-2 form-group">
                                                                                   <input type="text" id="saturasi_oksigen" class="form-control"
                                                                                           name="saturasi_oksigen" placeholder="" required >
                                                                               </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                       <label>Status Lokalis</label>
                                                                                   </div>
                                                                                   <div class="col-md-5 form-group">
                                                                                       <textarea type="text" id="status_lokasi" class="form-control"
                                                                                           name="status_lokasi">Status Lokalis</textarea>
                                                                                   </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Klasifikasi Penyakit</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                    <select class="choices form-select">
                                                                                            <option value="others">Others</option>
                                                                                            <option value="jantung">Jantung</option>
                                                                                            <option value="hati">Hati</option>
                                                                                    </select>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Sub-Klasifikasi Penyakit</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                    <select class="choices form-select">
                                                                                            <option value="others">Others</option>
                                                                                            <option value="jantung">Jantung</option>
                                                                                            <option value="hati">Hati</option>
                                                                                    </select>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input type="text" id="" class="form-control"
                                                                                            name="" placeholder="enter text">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Diagnosa</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                    <select class="choices form-select">
                                                                                        <option value="others">Others</option>
                                                                                        <option value="jantung">Jantung</option>
                                                                                        <option value="hati">Hati</option>
                                                                                    </select>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Diagnosa Sekunder</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                    <select class="choices form-select">
                                                                                        <option value="others">Others</option>
                                                                                        <option value="jantung">Jantung</option>
                                                                                        <option value="hati">Hati</option>
                                                                                    </select>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label>Terapi yang Diberikan</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <textarea type="text" id="obat_sebelumnya" class="form-control"
                                                                                            name="obat_sebelumnya"></textarea>
                                                                                    </div>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="card collapse-header">
                                    <div class="card-header" id="headingTwo" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                        role="button" style="background-color: #ADD8E6">
                                        <span class="collapsed collapse-title">Tindakan</span>
                                    </div>
                                    <div id="collapseTwo" class="collapse pt-1" aria-labelledby="headingTwo"
                                        data-parent="#cardAccordion">
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
                                                                                <label>Nama Tindakan</label>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <input type="text" id="nama_tindakan" class="form-control"
                                                                                    name="nama_tindakan" placeholder="Nama Tindakan">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label>Nama Alat Kesehatan</label>
                                                                                </div>
                                                                                <div class="col-md-4 form-group">
                                                                                    <select class="choices form-select">
                                                                                        <optgroup label="nama_alat">
                                                                                            <option value="romboid">IT</option>
                                                                                            <option value="trapeze">HSE</option>
                                                                                            <option value="triangle">Triangle</option>
                                                                                            <option value="polygon">Polygon</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    </div>
                                                                                
                                                                                    <div class="col-md-2">
                                                                                        <label>Jumlah Pengguna Alat Kesehatan</label>
                                                                                    </div>
                                                                                    <div class="col-md-2 form-group">
                                                                                        <input type="text" id="pengguna_alat" class="form-control"
                                                                                            name="pengguna_alat" placeholder="Jumlah Pengguna Alat">
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        </div>
                                
                                                                                        <div class="col-md-2">
                                                                                            <label>Keterangan</label>
                                                                                        </div>
                                                                                        <div class="col-md-4 form-group">
                                                                                            <textarea type="text" id="keterangan" class="form-control"
                                                                                                name="keterangan">Keterangan</textarea>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            </div>
                                                                                            
                                                                    </div>
                                                                    <div class="row" id="table-hover-row">
                                                                        <div class="col-12">
                                                                            <div class="card">
                                                                                {{-- <div class="card-header">
                                                                                    <h4 class="card-title">Hoverable rows</h4>
                                                                                </div> --}}
                                                                                
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover mb-0">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Nama Tindakan</th>
                                                                                                    <th>Nama Alat Kesehatan</th>
                                                                                                    <th>Jumlah Pengguna Alat Kesehatan</th>
                                                                                                    <th>Keterangan</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
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
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingFour" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour" role="button" style="background-color: #ADD8E6">
                                        <span class="collapsed  collapse-title">Resep Obat</span>
                                    </div>
                                    <div id="collapseFour" class="collapse pt-1" aria-labelledby="headingFour"
                                        data-parent="#cardAccordion">
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
                                                                                <label>Nama Obat</label>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <input type="text" id="id_pasien" class="form-control"
                                                                                    name="id_pasien" placeholder="ID Pasien">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label>Jumlah Obat</label>
                                                                                </div>
                                                                                <div class="col-md-2 form-group">
                                                                                    <input type="text" id="nama_pasien" class="form-control"
                                                                                        name="nama_pasien" placeholder="Nama Pasien">
                                                                                </div>
                                                                                <div class="col-md-2 form-group">
                                                                                    <select class="choices form-select">
                                                                                        <optgroup label="klasifikasi">
                                                                                            <option value="romboid">IT</option>
                                                                                            <option value="trapeze">HSE</option>
                                                                                            <option value="triangle">Triangle</option>
                                                                                            <option value="polygon">Polygon</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    </div>
                                                                                
                                                                                    <div class="col-md-2">
                                                                                        <label>Aturan Obat</label>
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <input type="text" id="aturan_obat" class="form-control"
                                                                                            name="aturan_obat" placeholder="Aturan Pakai">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        </div>
                                
                                                                                        <div class="col-md-2">
                                                                                            <label>Keterangan</label>
                                                                                        </div>
                                                                                        <div class="col-md-4 form-group">
                                                                                            <textarea type="text" id="keterangan" class="form-control"
                                                                                                name="keterangan">Keterangan</textarea>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            </div>
                                                                                            <div class="col-sm-5 d-flex justify-content-end">
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                                                                                <button type="reset"
                                                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                                            </div>
                                                                    </div>
                                                                    <div class="row" id="table-hover-row">
                                                                        <div class="col-12">
                                                                            <div class="card">
                                                                                {{-- <div class="card-header">
                                                                                    <h4 class="card-title">Hoverable rows</h4>
                                                                                </div> --}}
                                                                                
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-hover mb-0">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Nama Obat</th>
                                                                                                    <th>Jumlah Obat</th>
                                                                                                    <th>Aturan Pakai</th>
                                                                                                    <th>Keterangan</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
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
                                        </div>
                                
                                        </div>
                                                </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA="
  crossorigin="anonymous"></script>



<script type="text/javascript">
    $("#pasien_id").click(function(e) {
        var pasien = $(this).val();

        console.log(pasien);
        
        $.ajax({
            type: "GET",
            url: "{{route('superadmin.datapasien.id')}}",
            data: {'pasien': pasien},
            dataType: 'json',
            success:  function(data) {
                console.log(data);
            $('#nama_pasien').val(data.nama_pasien);
            $('#NIK').val(data.NIK);
            $('#tanggal_lahir').val(data.tanggal_lahir);
            $('#tempat_lahir').val(data.tempat_lahir);
            $('#umur').val(data.umur);
            $('#pekerjaan').val(data.pekerjaan);
            $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
            $('#divisi').val(data.divisi.nama_divisi_pasien);
            $('#jabatan').val(data.jabatan.nama_jabatan);
            $('#jenis_kelamin').val(data.jenis_kelamin);
            $('#alamat').val(data.alamat);
            $('#telepon').val(data.telepon);
            $('#email').val(data.email);
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
        });
    });
  </script>

    <script>
         $(".form-select").select2();
     </script>



@endsection