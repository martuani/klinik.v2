<?php

namespace App\Http\Controllers;


use App\Models\Divisi;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Keluarga;
use App\Models\LokasiKejadian;
use App\Models\BobotObat;
use App\Models\GolonganObat;
use App\Models\JenisObat;
use App\Models\NamaObat;
use App\Models\ObatAlkes;
use App\Models\SatuanObat;
use App\Models\HasilPemantauan;
use App\Models\IzinBerobat;
use App\Models\Jabatan;
use App\Models\KategoriPasien;
use App\Models\KeteranganBerobat;
use App\Models\KeteranganSehat;
use App\Models\KlasifikasiPenyakit;
use App\Models\Level;
use App\Models\NamaPenyakit;
use App\Models\PemantauanCovid;
use App\Models\PemeriksaanAntigen;
use App\Models\PemeriksaanCovid;
use App\Models\PersetujuanTindakan;
use App\Models\Perusahaan;
use App\Models\RekamMedis;
use App\Models\RumahSakitRujukan;
use App\Models\SpesialisRujukan;
use App\Models\SubKlasifikasi;
use App\Models\SuratRujukan;
use App\Models\TestUrin;
use App\Models\Tindakan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use PDF;
use Response;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function pemeriksaannarkoba()
    {
        $pasien_id = Pasien::get();
        $test = TestUrin::all();


        return view('petugas.superadmin.pemeriksaan_narkoba', compact('pasien_id', 'test'));
    }

    public function addpemeriksaannarkoba(Request $request)
    {

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'penggunaan_obat' => 'required',
            'jenis_obat' => 'required',
            'asal_obat' => 'required',
            'terakhir_digunakan' => 'required',
            'amp' => 'required',
            'met' => 'required',
            'thc' => 'required',
            'bzo' => 'required',
            'mop' => 'required',
            'coc' => 'required',
        ]);

        TestUrin::create([
            'pasien_id' => $request->pasien_id,
            'penggunaan_obat' => $request->penggunaan_obat,
            'jenis_obat' => $request->jenis_obat,
            'asal_obat' => $request->asal_obat,
            'terakhir_digunakan' => $request->terakhir_digunakan,
            'amp' => $request->amp,
            'met' => $request->met,
            'thc' => $request->thc,
            'bzo' => $request->bzo,
            'mop' => $request->mop,
            'coc' => $request->coc,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/pemeriksaan/narkoba')->with('success', 'Berhasil Menambahkan Data Pemeriksaan Narkoba');
    }



    public function pemeriksaancovid()
    {
        $pasien_id = Pasien::get();
        $pemeriksaanantigen = PemeriksaanAntigen::all();
        $covid = PemeriksaanCovid::all();


        return view('petugas.superadmin.pemeriksaan_covid', compact('pasien_id', 'pemeriksaanantigen'));
    }

    public function addpemeriksaancovid(Request $request)
    {

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'pemeriksaan_antigen_id' => 'required',
            'hasil_pemeriksaan' => 'required'
        ]);

        PemeriksaanCovid::create([
            'pasien_id' => $request->pasien_id,
            'pemeriksaan_antigen_id' => $request->pemeriksaan_antigen_id,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/pemeriksaan/covid')->with('success', 'Berhasil Menambahkan Data Pemeriksaan Covid');
    }

    public function pemantauancovid()
    {
        $pasien_id = Pasien::get();
        $covid = PemantauanCovid::all();
        $hasilpemantauan = HasilPemantauan::all();

        return view('petugas.superadmin.pemantauan_covid', compact('pasien_id', 'covid', 'hasilpemantauan'));
    }

    public function addpemantauancovid(Request $request)
    {

    dd($request);

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'tempat' => 'required',
            'suhu_pagi' => 'required',
            'td' => 'required',
            'hr' => 'required',
            'spo' => 'required',
            'gejala' => 'required',
            'jenis_pemeriksaan' => 'required',
            'spoo' => 'required',
            'hasil_laboratorium' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'hasil_rontgen' => 'required',
            'lampiran_rontgen' => 'required',
            'tanggal_rontgen' => 'required',
            'keterangan' => 'required',
            'perjalanan' => 'required',
            'asal' => 'required',
            'kota_tujuan' => 'required',
        ]);

        if($request->hasFile('lampiran_laboratorium')) {
            $file = $request->file('lampiran_laboratorium');

            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('petugas/pemantauan_covid/file', $filename);
        }else {
            $filename = '';
        }

        if($request->hasFile('lampiran_rontgen')) {
            $file = $request->file('lampiran_rontgen');

            $nama = time().'_'.$file->getClientOriginalName();
            $file->move('petugas/pemantauan_covid/file', $nama);
        }else {
            $nama = '';
        }
        
        PemantauanCovid::create([
            'pasien_id' => $request->pasien_id,
            'tempat' => $request->tempat,
            'suhu_pagi' => $request->suhu_pagi,
            'td' => $request->td,
            'hr' => $request->hr,
            'spo' => $request->spo,
            'gejala' => $request->gejala,
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'spoo' => $request->spoo,
            'hasil_laboratorium' => $request->hasil_laboratorium,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'hasil_rontgen' => $request->hasil_rontgen,
            'tanggal_rontgen' => $request->tanggal_rontgen,
            'keterangan' => $request->keterangan,
            'perjalanan' => $request->perjalanan,
            'asal' => $request->asal,
            'kota_tujuan' => $request->kota_tujuan,
            'lampiran_laboratorium' => $filename,
            'lampiran_rontgen' => $nama,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);


        return redirect('/data/izin/berobat')->with('message', 'Berhasil menambah surat izin berobat!');
    }

    public function pemantauantandavital()
    {
        $pasien_id = Pasien::get();
        $hasilpemantauan = HasilPemantauan::all();

        return view('petugas.superadmin.pemantauan_tanda_vital', compact('pasien_id', 'hasilpemantauan'));
    }

    public function keteranganpemeriksaan()
    {
        $pasien_id = Pasien::all();

        return view('petugas.superadmin.keterangan_pemeriksaan', compact('pasien_id'));
    }

    public function rekammedis(Request $request){
        

        $pasien_id = Pasien::all();
        $namapenyakit = NamaPenyakit::all();
        $klasifikasi = KlasifikasiPenyakit::all();
        $subklasifikasi = SubKlasifikasi::all(); 
        $tindakan = Tindakan::all();
        $namaobat = NamaObat::all();

        return view('petugas.superadmin.rekam_medis', compact('pasien_id', 'namapenyakit', 'klasifikasi', 'subklasifikasi', 'tindakan', 'namaobat'));
    }

    public function pengesahanhasil()
    {
        $pasien_id = Pasien::all();

        return view('petugas.superadmin.pengesahan_hasil', compact('pasien_id'));
    }

    public function rawatinap()
    {
        $pasien_id = Pasien::get();

        return view('petugas.superadmin.rawat_inap', compact('pasien_id'));
    }

    public function rawatinapdokter()
    {
        $pasien_id = Pasien::get();
        $namapenyakit = NamaPenyakit::all();
        $tindakan = Tindakan::all();
        $jenisobat = JenisObat::all();
        $namaobat = NamaObat::all();

        return view('petugas.superadmin.rawat_inap_dokter', compact('pasien_id', 'namapenyakit', 'tindakan', 'jenisobat', 'namaobat'));
    }

    public function rawatinapperawat()
    {
        $pasien_id = Pasien::get();
        $namapenyakit = NamaPenyakit::all();
        $tindakan = Tindakan::all();
        $jenisobat = JenisObat::all();
        $namaobat = NamaObat::all();

        return view('petugas.superadmin.rawat_inap_perawat', compact('pasien_id', 'namapenyakit', 'tindakan', 'jenisobat', 'namaobat'));
    }

    public function permintaanmakanan()
    {
        $pasien_id = Pasien::get();
        $namapenyakit = NamaPenyakit::all();

        return view('petugas.superadmin.permintaan_makanan', compact('pasien_id', 'namapenyakit'));
    }

    public function kecelakaankerja()
    {
        $pasien_id = Pasien::all();

        return view('petugas.superadmin.kecelakaan_kerja', compact('pasien_id'));
    }

    public function dataketeranganberobat()
    {
        $keterangan = KeteranganBerobat::all();
        $pasien = Pasien::all();
        $namapenyakit = NamaPenyakit::all();
        $rsrujukan = RumahSakitRujukan::all();

        return view('petugas.superadmin.data_keterangan_berobat', compact( 'keterangan', 'pasien', 'keterangan', 'rsrujukan'));
    }

    public function keteranganberobat()
    {
        $pasien_id = Pasien::get();
        $keterangan = KeteranganBerobat::all();
        $namapenyakit = NamaPenyakit::all();
        $rsrujukan = RumahSakitRujukan::all();

        return view('petugas.superadmin.keterangan_berobat', compact('pasien_id', 'namapenyakit', 'keterangan', 'rsrujukan'));
    }

    public function addketeranganberobat(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'rumah_sakit_rujukans_id' => 'required',
            'nama_penyakit_id' => 'required',
            'sekunder' => 'required',
            'resep' => 'required',
            'saran' => 'required',
            'kontrol' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        KeteranganBerobat::create([
            'pasien_id' => $request->pasien_id,
            'rumah_sakit_rujukans_id' => $request->rumah_sakit_rujukans_id,
            'nama_penyakit_id' => $request->nama_penyakit_id,
            'sekunder' => $request->sekunder,
            'resep' => $request->resep,
            'saran' => $request->saran,
            'kontrol' => $request->kontrol,
            'tanggal_kembali' => $request->tanggal_kembali,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/keterangan/berobat')->with('message', 'Berhasil menambah surat keterangan berobat!');
    }

    public function printketberobat($id)
    {
        $keterangan = KeteranganBerobat::find($id);
        $pasien = Pasien::all();

        $today = Carbon::now()->isoFormat('D MMMM Y');
  
        $pdf = PDF::loadView('petugas.superadmin.print_keterangan_berobat', ['keterangan' => $keterangan])->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'portrait');
        
        $pdf->save(storage_path().'keteranganberobat.pdf');
        return $pdf->stream();
    }

    public function ubahketberobat($id)
    {
        $keterangan = KeteranganBerobat::find($id);
        $pasien = Pasien::all();
        $namapenyakit = NamaPenyakit::all();
        $rsrujukan = RumahSakitRujukan::all();

        return view('petugas.superadmin.ubah_keterangan_berobat', compact('keterangan', 'pasien', 'namapenyakit', 'rsrujukan'));
    }

    function changeketberobat(Request $request, $id) {
        
        $keterangan = KeteranganBerobat::find($id);
        $keterangan->rumah_sakit_rujukans_id = $request->input('rumah_sakit_rujukans_id');
        $keterangan->nama_penyakit_id = $request->input('nama_penyakit_id');
        $keterangan->sekunder = $request->input('sekunder');
        $keterangan->resep = $request->input('resep');
        $keterangan->saran = $request->input('saran');
        $keterangan->kontrol = $request->input('kontrol');
        $keterangan->tanggal_kembali = $request->input('tanggal_kembali');
        $keterangan->update();

        return redirect('/data/keterangan/berobat')->with('message', 'Berhasil mengubah surat keterangan berobat');
        
    }

    public function dataizinberobat()
    {
        $izin = IzinBerobat::all();
        $pasien = Pasien::all();

        return view('petugas.superadmin.data_izin_berobat', compact( 'izin', 'pasien'));
    }

    public function viewizinberobat($id)
    {
        $izin = IzinBerobat::find($id);
        $pasien = Pasien::all();
        return view('petugas.superadmin.view_izin_berobat', compact('izin', 'pasien'));
    }

    public function print($id)
    {
        $izin = IzinBerobat::find($id);
        $pasien = Pasien::all();
  

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('petugas.superadmin.print_izin_berobat', ['izin' => $izin])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'portrait');
        
        $pdf->save(storage_path().'izinberobat.pdf');
        return $pdf->stream();
    }

    public function izinberobat()
    {
        $pasien_id = Pasien::get();
        $izin = IzinBerobat::all();

        return view('petugas.superadmin.izin_berobat', compact( 'pasien_id', 'izin'));
    }

    public function addizinberobat(Request $request)
    {

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'tempat' => 'required',
        ]);

        if($request->hasFile('ttd')) {
            $file = $request->file('ttd');

            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('petugas/izin_berobat/file', $filename);
        }else {
            $filename = '';
        }
        
        IzinBerobat::create([
            'pasien_id' => $request->pasien_id,
            'tempat' => $request->tempat,
            'ttd' => $filename,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);


        return redirect('/data/izin/berobat')->with('message', 'Berhasil menambah surat izin berobat!');
    }

    public function ubahizinberobat($id)
    {
        $izin = IzinBerobat::find($id);
        $pasien = Pasien::all();

        return view('petugas.superadmin.ubah_izin_berobat', compact('izin', 'pasien'));
    }

    function changeizinberobat(Request $request, $id) {
        
        $izin = IzinBerobat::find($id);
        $izin->tempat = $request->input('tempat');
        $izin->update();

        return redirect('/data/izin/berobat')->with('message', 'Berhasil mengubah surat izin berobat');
        
    }


    public function izinistirahat()
    {
        $pasien_id = Pasien::get();
        $rsrujukan = RumahSakitRujukan::all();
        $spesialisrujukan = SpesialisRujukan::all();

        return view('petugas.superadmin.izin_istirahat', compact('pasien_id', 'rsrujukan', 'spesialisrujukan'));
    }

    public function datasuratrujukan()
    {
        $suratrujukan = SuratRujukan::all();
        $pasien = Pasien::all();
        $rsrujukan = RumahSakitRujukan::all();
        $spesialisrujukan = SpesialisRujukan::all();

        return view('petugas.superadmin.data_surat_rujukan', compact( 'suratrujukan', 'pasien', 'rsrujukan', 'spesialisrujukan'));
    }

    public function suratrujukan()
    {
        $pasien_id = Pasien::get();
        $suratrujukan = SuratRujukan::all();
        $spesialisrujukan = SpesialisRujukan::all();
        $rsrujukan = RumahSakitRujukan::all();

        return view('petugas.superadmin.surat_rujukan', compact( 'pasien_id', 'suratrujukan', 'spesialisrujukan', 'rsrujukan'));
    }

    public function printsuratrujukan($id)
    {
        $surat = SuratRujukan::find($id);
        $pasien = Pasien::all();
  
        $pdf = PDF::loadView('petugas.superadmin.print_surat_rujukan', ['surat' => $surat])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');
        
        $pdf->save(storage_path().'surat.pdf');
        return $pdf->stream();
    }

    public function addsuratrujukan(Request $request)
    {
        // dd($request);
        
        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'riwayat' => 'required',
            'obat_diberikan' => 'required',
            'hasil_pengobatan' => 'required',
            'spesialis_rujukan_id' => 'required',
            'rumah_sakit_rujukan_id' => 'required',
        ]);

        if($request->hasFile('ttd')) {
            $file = $request->file('ttd');

            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('petugas/surat_rujukan/file', $filename);
        }else {
            $filename = '';
        }

        $surat = SuratRujukan::create([
            'pasien_id' => $request->pasien_id,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'riwayat' => $request->riwayat,
            'obat_diberikan' => $request->obat_diberikan,
            'hasil_pengobatan' => $request->hasil_pengobatan,
            'spesialis_rujukan_id' => $request->spesialis_rujukan_id,
            'rumah_sakit_rujukan_id' => $request->rumah_sakit_rujukan_id,
            'ttd' => $filename,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        if($surat) {
            return redirect('/data/surat/rujukan')->with('message', 'Berhasil menambah surat rujukan!');
        }
        return redirect()->back()->with('fail', 'Data Fail!');
    }

    public function ubahsuratrujukan($id)
    {
        $surat = SuratRujukan::find($id);
        $pasien = Pasien::all();
        $spesialisrujukan = SpesialisRujukan::all();
        $rsrujukan = RumahSakitRujukan::all();;
        return view('petugas.superadmin.ubah_surat_rujukan', compact('surat', 'pasien', 'spesialisrujukan', 'rsrujukan'));
    }
    

    function changesuratrujukan(Request $request, $id) {
        $surat = SuratRujukan::find($id);
        $surat->tempat = $request->input('tempat');
        $surat->tanggal = $request->input('tanggal');
        $surat->riwayat = $request->input('riwayat');
        $surat->obat_diberikan = $request->input('obat_diberikan');
        $surat->hasil_pengobatan = $request->input('hasil_pengobatan');
        $surat->spesialis_rujukan_id = $request->input('spesialis_rujukan_id');
        $surat->rumah_sakit_rujukan_id = $request->input('rumah_sakit_rujukan_id');
        $surat->update();


        return redirect('/data/surat/rujukan')->with('message', 'Berhasil mengubah surat rujukan!');
        
    }

    public function dataketerangansehat()
    {
        $pasien = Pasien::all();
        $sehat = KeteranganSehat::all();

        return view('petugas.superadmin.data_keterangan_sehat', compact( 'pasien', 'sehat'));
    }

    public function keterangansehat()
    {
        $pasien_id = Pasien::get();

        return view('petugas.superadmin.keterangan_sehat', compact('pasien_id'));
    }

    public function datatindakanmedis()
    {
        $pasien_id = Pasien::get();
        $tindakan = PersetujuanTindakan::all();

        return view('petugas.superadmin.data_tindakan_medis', compact('pasien_id', 'tindakan'));
    }

    public function persetujuantindakanmedis()
    {
        $pasien_id = Pasien::get();

        return view('petugas.superadmin.persetujuan_tindakan_medis', compact('pasien_id'));
    }

    public function addpersetujuantindakanmedis(Request $request)
    {

        // dd($request);

        $validatedData = $request->validate([
            'pasien_id' => 'required',
            'riwayat' => 'required',
            'hasil' => 'required'
        ]);
        
        PersetujuanTindakan::create([
            'pasien_id' => $request->pasien_id,
            'riwayat' => $request->riwayat,
            'hasil' => $request->hasil,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);


        return redirect('/data/tindakan/medis')->with('message', 'Berhasil menambah surat persetujuan tindakan medis!');
    }

    public function ubahpersetujuantindakanmedis($id)
    {
        $tindakan = PersetujuanTindakan::find($id);
        $pasien = Pasien::all();

        return view('petugas.superadmin.ubah_persetujuan_tindakan', compact('tindakan', 'pasien'));
    }

    function changepersetujuantindakanmedis(Request $request, $id) {
        
        $tindakan = PersetujuanTindakan::find($id);
        $tindakan->riwayat = $request->input('riwayat');
        $tindakan->hasil = $request->input('hasil');
        $tindakan->update();

        return redirect('/data/tindakan/medis')->with('message', 'Berhasil mengubah surat persetujuan tindakan medis!');
        
    }

    public function printpersetujuantindakan($id)
    {
        $tindakan = PersetujuanTindakan::find($id);
        $pasien = Pasien::all();
  

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('petugas.superadmin.print_persetujuan_tindakan', ['tindakan' => $tindakan])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'portrait');
        
        $pdf->save(storage_path().'persetujuantindakanmedis.pdf');
        return $pdf->stream();
    }

    public function dataobat()
    {
        $obatalkes = ObatAlkes::all();

        return view('petugas.superadmin.data_obat', compact('obatalkes'));
    }

    public function addobat()
    {
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $jenisobat = JenisObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();

        return view('petugas.superadmin.add_data_obat', compact('bobotobat', 'golonganobat', 'jenisobat', 'namaobat', 'satuanobat'));
    }

    public function tambahobat(Request $request)
    {

        $validatedData = $request->validate([
            'jenis_obat_id' => 'required',
            'golongan_obat_id' => 'required',
            'nama_obat_id' => 'required',
            'bobot_obat_id' => 'required',
            'satuan_obat_id' => 'required',
            'komposisi_obat' => 'required'
        ]);

        ObatAlkes::create([
            'jenis_obat_id' => $request->jenis_obat_id,
            'golongan_obat_id' => $request->golongan_obat_id,
            'nama_obat_id' => $request->nama_obat_id,
            'bobot_obat_id' => $request->bobot_obat_id,
            'satuan_obat_id' => $request->satuan_obat_id,
            'komposisi_obat' => $request->komposisi_obat,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return redirect('/data/obat')->with('success', 'Berhasil Menambahkan Data Obat!');
    }

    public function ubahobat($id)
    {

        $obatalkes = ObatAlkes::find($id);
        $bobotobat = BobotObat::all();
        $golonganobat = GolonganObat::all();
        $jenisobat = JenisObat::all();
        $namaobat = NamaObat::all();
        $satuanobat = SatuanObat::all();
        return view('petugas.superadmin.ubah_data_obat', compact('obatalkes', 'bobotobat', 'golonganobat', 'jenisobat', 'namaobat', 'satuanobat'));
    }

    function changeobat(Request $request, $id) {
        $obatalkes = ObatAlkes::find($id);
        $obatalkes->jenis_obat_id = $request->input('jenis_obat_id');
        $obatalkes->golongan_obat_id = $request->input('golongan_obat_id');
        $obatalkes->nama_obat_id = $request->input('nama_obat_id');
        $obatalkes->satuan_obat_id = $request->input('satuan_obat_id');
        $obatalkes->bobot_obat_id = $request->input('bobot_obat_id');
        $obatalkes->komposisi_obat = $request->input('komposisi_obat');
        $obatalkes->update();

        return redirect('/data/obat')->with('success', 'Berhasil Mengubah Data Obat!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datapasien()
    {
        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');

        $pasien =  Pasien::all();

        return view('petugas.superadmin.data_pasien')->with('pasiens', $pasien);
    }
    
    public function viewdatapasien($id)
    {

        $now = CarbonImmutable::now()->locale('id_ID');
        $start_week = $now->startOfWeek(Carbon::MONDAY)->format('m-d');
        $end_week = $now->endOfWeek()->format('m-d');
        
        $pasien = Pasien::find($id);
        $kategori = KategoriPasien::all();
        $perusahaan = Perusahaan::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $keluarga = Keluarga::all();
        $namapenyakit = NamaPenyakit::all();

        return view('petugas.superadmin.view_data_pasien', compact('pasien', 'kategori', 'perusahaan', 'divisi', 'jabatan', 'keluarga', 'namapenyakit'));
    }

    public function addpasien()
    {
        $pasien = Pasien::all();
        $kategori = KategoriPasien::all();
        $perusahaan = Perusahaan::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $namapenyakit = NamaPenyakit::all();

        $now = CarbonImmutable::now()->locale('id_ID');

        return view('petugas.superadmin.add_data_pasien', compact('kategori', 'perusahaan', 'divisi', 'jabatan',  'pasien', 'namapenyakit'));
    }
    public function tambahpasien(Request $request)
    {

        
        $validatedData = $request->validate([
            'kategori_pasien_id' => 'required',
            'NIK' => 'required',
            'perusahaan_id' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'telepon' => 'required',
            'alergi_obat' => 'required',
            'hamil_menyusui' => 'required'
        ]);

        // $id_rekam_medis = IdGenerator::generate(['table' => 'pasiens', 'field' => 'id_rekam_medis', 'length' => 10, 'prefix' =>'RM-']);

        $keluarga = Keluarga::create([
            'nama' => $request->nama_keluarga,
            'hubungan' => $request->hubungan_keluarga,
            'alamat' => $request->alamat_keluarga,
            'pekerjaan' => $request->pekerjaan_keluarga,
            'telepon' => $request->telepon_keluarga,
            'email' => $request->email_keluarga,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        if($request->hasFile('upload')) {
            $file = $request->file('upload');

            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('pasien/foto/file', $filename);
        }else {
            $filename = '';
        }
            
            $pasien = Pasien::create([
                'kategori_pasien_id' => $request->kategori_pasien_id,
                'NIK' => $request->NIK,
                'penduduk' => $request->penduduk,
                'perusahaan_id' => $request->perusahaan_id,
                'divisi_id' => $request->divisi_id,
                'jabatan_id' => $request->jabatan_id,
                'keluarga_id' => $keluarga->id,
                'nama_pasien' => $request->nama_pasien,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'alamat_mess' => $request->alamat_mess,
                'pekerjaan' => $request->pekerjaan,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'alergi_obat' => $request->alergi_obat,
                'hamil_menyusui' => $request->hamil_menyusui,
                'upload' => $filename,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ]);

        if ($pasien) {
            return redirect('/data/pasien')->with('success', 'Berhasil Menambahkan Data Pasien!');
        }

        return redirect()->back()->with('fail', 'Fail Create Data!');
    }

    public function ubahpasien($id)
    {

        $pasien = Pasien::find($id);
        $kategori = KategoriPasien::all();
        $perusahaan = Perusahaan::all();
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $keluarga = Keluarga::all();
        $namapenyakit = NamaPenyakit::all();

        return view('petugas.superadmin.ubah_data_pasien', compact('pasien', 'kategori', 'perusahaan', 'divisi', 'jabatan', 'keluarga', 'namapenyakit'));
    }

    function changepasien(Request $request, $id) {
        $pasien = Pasien::find($id);
        $pasien->kategori_pasien_id = $request->input('kategori_pasien_id');
        $pasien->NIK = $request->input('NIK');
        $pasien->penduduk = $request->input('penduduk');
        $pasien->perusahaan_id = $request->input('perusahaan_id');
        $pasien->divisi_id = $request->input('divisi_id');
        $pasien->jabatan_id = $request->input('jabatan_id');
        $pasien->nama_pasien = $request->input('nama_pasien');
        $pasien->tempat_lahir = $request->input('tempat_lahir');
        $pasien->tanggal_lahir = $request->input('tanggal_lahir');
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        $pasien->alamat = $request->input('alamat');
        $pasien->pekerjaan = $request->input('pekerjaan');
        $pasien->telepon = $request->input('telepon');
        $pasien->email = $request->input('email');
        $pasien->alergi_obat = $request->input('alergi_obat');
        $pasien->hamil_menyusui = $request->input('hamil_menyusui');
        $pasien->update();
        $keluarga = Keluarga::find($id);
        $keluarga->nama = $request->input('nama_keluarga');
        $keluarga->hubungan = $request->input('hubungan_keluarga');
        $keluarga->alamat = $request->input('alamat_keluarga');
        $keluarga->pekerjaan = $request->input('pekerjaan_keluarga');
        $keluarga->telepon = $request->input('telepon_keluarga');
        $keluarga->email = $request->input('email_keluarga');
        $keluarga->update();

        return redirect('/data/pasien')->with('success', 'Berhasil Mengubah Data Pasien!');
    }

    public function mitrakerja(Request $request)
    {
        $users = User::where("level_id", "6")->get();
        // dd($pasien);

        return view('petugas.superadmin.mitra_kerja', compact('users'));
    }

    public function viewmitrakerja($id)
    {
        $user = User::find($id);
        $jadwal = Jadwal::all();
        $level = Level::all();
        return view('petugas.superadmin.view_mitra_kerja', compact('user', 'jadwal', 'level'));
    }

    public function addmitrakerja()
    {
        $jadwal = Jadwal::all();
        $perusahaan = Perusahaan::all();
        $level = Level::where("nama_level", "mitrakerja")->get();
        $divisi = Divisi::all();

        return view('petugas.superadmin.add_mitra_kerja', compact('jadwal', 'level', 'perusahaan', 'divisi'));
    }
    public function tambahmitrakerja(Request $request)
    {

        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'status' => 'required',
            'nik' => 'required',
            'telp' => 'required',
            'level_id' => 'required',
            'divisi_id' => 'required',
            'perusahaan_id' => 'required'
        ]);

        $request['password'] = Hash::make($validatedData['password']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'nik' => $request->nik,
            'status' => $request->status,
            'telp' => $request->telp,
            'level_id' => $request->level_id,
            'divisi_id' => $request->divisi_id,
            'perusahaan_id' => $request->perusahaan_id,
        ]);

        if ($user) {
        return redirect('/mitra/kerja')->with('success', 'Berhasil Menambahkan Data Petugas!');
    }   
        return redirect()->back()->with('fail', 'Fail Create Data!');
    }

    public function ubahmitrakerja($id)
    {

        $user = User::find($id);
        $jadwal = Jadwal::all();
        $level = Level::all();
        $perusahaan = Perusahaan::all();
        $divisi = Divisi::all();

        return view('petugas.superadmin.ubah_mitra_kerja', compact('user', 'jadwal', 'level', 'perusahaan', 'divisi'));
    }

    function changemitrakerja(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        if ($request->input('cek')== 'x'){
            $user->password = Hash::make( $request->input('password'));
        }
        $user->nik = $request->input('nik');
        $user->email = $request->input('email');
        $user->status = $request->input('status');
        $user->telp = $request->input('telp');
        $user->divisi_id = $request->input('divisi_id');
        $user->perusahaan_id = $request->input('perusahaan_id');
        $user->update();

        return redirect('/mitra/kerja')->with('success', 'Berhasil Mengubah Data Mitra Kerja!');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datauser()
    {
        $users = User::where("level_id", "1")->orWhere("level_id", "2")->orWhere("level_id", "3")->orWhere("level_id", "4")->orWhere("level_id", "5")->get();


        return view('petugas.superadmin.data_user')->with('users', $users);
    }

    public function viewuser($id)
    {
        $user = User::find($id);
        $jadwal = Jadwal::all();
        $level = Level::all();
        return view('petugas.superadmin.view_user', compact('user', 'jadwal', 'level'));
    }

    public function adduser()
    {
        $jadwal = Jadwal::all();
        $level = Level::all();

        return view('petugas.superadmin.add_data_user', compact('jadwal', 'level'));
    }

    public function tambahuser(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'status' => 'required',
            'telp' => 'required',
            'level_id' => 'required'
        ]);

        $request['password'] = Hash::make($request['password']);
        

        $jadwal = Jadwal::create([
            'senin' => $request->senin,
            'selasa' => $request->selasa,
            'rabu' => $request->rabu,
            'kamis' => $request->kamis,
            'jumat' => $request->jumat,
            'sabtu' => $request->sabtu,
            'minggu' => $request->minggu,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'jadwal_id' => $jadwal->id,
            'status' => $request->status,
            'telp' => $request->telp,
            'level_id' => $request->level_id,
        ]);

        if ($user) {
        return redirect('/data/user')->with('success', 'Berhasil Menambahkan Data Petugas!');
        
    }   
        return redirect()->back()->with('fail', 'Fail Create Data!');
    }

    public function ubahuser($id, $jadwal_id)
    {
        $user = User::find($id);
        $jadwal = Jadwal::find($jadwal_id);
        $level = Level::all();
        return view('petugas.superadmin.ubah_data_user', compact('user', 'jadwal', 'level'));
    }

    function changeuser(Request $request, $id, $jadwal_id) {
        // dd($request->input('senin'));
        $user = User::find($id);
        $user->name = $request->input('name');
        if ($request->input('cek')== 'x'){
            $user->password = Hash::make( $request->input('password'));
        }
        $user->email = $request->input('email');
        $user->status = $request->input('status');
        $user->telp = $request->input('telp');
        $user->level_id = $request->input('level_id');
        $user->update();
        $jadwal = Jadwal::find($jadwal_id);
        $jadwal->senin = $request->input('senin');
        $jadwal->selasa = $request->input('selasa');
        $jadwal->rabu = $request->input('rabu');
        $jadwal->kamis = $request->input('kamis');
        $jadwal->jumat = $request->input('jumat');
        $jadwal->sabtu = $request->input('senin');
        $jadwal->minggu = $request->input('minggu');
        
        $jadwal->update();


        return redirect('/data/user')->with('success', 'Berhasil Mengubah Data Petugas!');
        
    }

    public function jadwal()
    {
        $jadwal = Jadwal::all();
        return view('petugas.superadmin.jadwal')->with('jadwal', $jadwal);
    }

    public function addjadwal()
    {
        return view('petugas.superadmin.add_jadwal');
    }

    public function tambahjadwal(Request $request)
    {
        $validatedData = $request->validate([
            'senin' => 'required',
            'selasa' => 'required',
            'rabu' => 'required',
            'kamis' => 'required',
            'jumat' => 'required',
            'sabtu' => 'required',
            'minggu' => 'required'
        ]);

        Jadwal::create([
            'senin' => $request->senin,
            'selasa' => $request->selasa,
            'rabu' => $request->rabu,
            'kamis' => $request->kamis,
            'jumat' => $request->jumat,
            'sabtu' => $request->sabtu,
            'minggu' => $request->minggu,
        ]);

        return redirect('/jadwal')->with('success', 'Berhasil Menambahkan Jadwal');
    }

    public function ubahjadwal($id)
    {
        $jadwal = Jadwal::find($id);

        return view('petugas.superadmin.ubah_jadwal', compact('jadwal'));
    }

    function changejadwal(Request $request, $id) {
        $jadwal = Jadwal::find($id);
        $jadwal->hari = $request->input('hari');
        $jadwal->shift = $request->input('shift');
        $jadwal->dari = $request->input('dari');
        $jadwal->sampai = $request->input('sampai');
        $jadwal->update();

        return redirect('/jadwal')->with('success', 'Berhasil Mengubah Jadwal');
    }

    public function lokasikejadian()
    {
        $lokasikejadian = LokasiKejadian::all();
        return view('petugas.superadmin.lokasi_kejadian')->with('lokasi_kejadians', $lokasikejadian);
    }

    public function addlokasikejadian()
    {
        return view('petugas.superadmin.add_lokasi_kejadian');
    }

    public function tambahlokasikejadian(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lokasi' => 'required'
        ]);

        LokasiKejadian::create([
            'nama_lokasi' => $request->nama_lokasi,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/lokasi/kejadian')->with('success', 'Berhasil Menambahkan Lokasi Kejadian!');
    }

    public function ubahlokasikejadian($id)
    {
        $lokasikejadian = LokasiKejadian::find($id);
        return view('petugas.superadmin.ubah_lokasi_kejadian', compact('lokasikejadian'));
    }

    function changelokasikejadian(Request $request, $id) {
        $lokasikejadian = LokasiKejadian::find($id);
        $lokasikejadian->nama_lokasi = $request->input('nama_lokasi');
        $lokasikejadian->update();

        return redirect('/lokasi/kejadian')->with('success', 'Berhasil Mengubah Lokasi Kejadian!');
    }

    public function rsrujukan()
    {
        $rsrujukan = RumahSakitRujukan::all();
        return view('petugas.superadmin.rs_rujukan')->with('rumah_sakit_rujukans', $rsrujukan);
    }

    public function addrsrujukan()
    {
        return view('petugas.superadmin.add_rs_rujukan');
    }

    public function tambahrsrujukan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_RS_rujukan' => 'required',
        ]);

        RumahSakitRujukan::create([
            'nama_RS_rujukan' => $request->nama_RS_rujukan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/rs/rujukan')->with('success', 'Berhasil Menambahkan Rumah Sakit Rujukan!');
    }

    public function ubahrsrujukan($id)
    {
        $rsrujukan = RumahSakitRujukan::find($id);
        return view('petugas.superadmin.ubah_rs_rujukan', compact('rsrujukan'));
    }

    function changersrujukan(Request $request, $id) {
        $rsrujukan = RumahSakitRujukan::find($id);
        $rsrujukan->nama_RS_rujukan = $request->input('nama_RS_rujukan');
        $rsrujukan->update();

        return redirect('/rs/rujukan')->with('success', 'Berhasil Mengubah Rumah Sakit Rujukan!');
    }

    public function spesialisrujukan()
    {
        $spesialisrujukan = SpesialisRujukan::all();
        return view('petugas.superadmin.spesialis_rujukan')->with('spesialis_rujukans', $spesialisrujukan);
    }

    public function addspesialisrujukan()
    {
        return view('petugas.superadmin.add_spesialis_rujukan');
    }

    public function tambahspesialisrujukan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_spesialis_rujukan' => 'required'
        ]);

        SpesialisRujukan::create([
            'nama_spesialis_rujukan' => $request->nama_spesialis_rujukan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/spesialis/rujukan')->with('message', 'Berhasil!');
    }

    public function hasilpemantauan()
    {
        $hasilpemantauan = HasilPemantauan::all();


        return view('petugas.superadmin.hasil_pemantauan')->with('hasilpemantauan', $hasilpemantauan);
    }

    public function ubahspesialisrujukan($id)
    {
        $spesialisrujukan = SpesialisRujukan::find($id);
        return view('petugas.superadmin.ubah_spesialis_rujukan', compact('spesialisrujukan'));
    }

    function changespesialisrujukan(Request $request, $id) {
        $spesialisrujukan = SpesialisRujukan::find($id);
        $spesialisrujukan->nama_spesialis_rujukan = $request->input('nama_spesialis_rujukan');
        $spesialisrujukan->update();

        return redirect('/spesialis/rujukan')->with('message', 'Berhasil!');
    }

    public function addhasilpemantauan()
    {
        return view('petugas.superadmin.add_hasil_pemantauan');
    }

    public function tambahhasilpemantauan(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_pemantauan' => 'required'
        ]);

        HasilPemantauan::create([
            'kode' => $request->kode,
            'nama_pemantauan' => $request->nama_pemantauan,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return redirect('/hasil/pemantauan')->with('success', 'Berhasil!');
    }

    public function ubahhasilpemantauan($id)
    {
        $hasilpemantauan = HasilPemantauan::find($id);
        return view('petugas.superadmin.ubah_hasil_pemantauan', compact('hasilpemantauan'));
    }

    function changehasilpemantauan(Request $request, $id) {
        $hasilpemantauan = HasilPemantauan::find($id);
        $hasilpemantauan->kode = $request->input('kode');
        $hasilpemantauan->nama_pemantauan = $request->input('nama_pemantauan');
        $hasilpemantauan->update();

        return redirect('/hasil/pemantauan')->with('message', 'Succesfully!');
    }

    public function addkeluarga($id)
    {
        $keluarga = Keluarga::find($id);
        return view('petugas.superadmin.add_data_keluarga', compact('keluarga'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function datapasienById(Request $request) {
        if ($request->pasien) {
            $pasien = Pasien::where('id', $request->pasien)->first();
            $pasien->nama_perusahaan = $pasien->perusahaan->nama_perusahaan_pasien;
            $pasien->nama_divisi = $pasien->divisi->nama_divisi_pasien;
            $pasien->nama_jabatan = $pasien->jabatan->nama_jabatan;
            return response()->json($pasien, 200);
        }
    }


    
}
