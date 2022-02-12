<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
use PDF;


class UASController extends Controller
{

    public function index()
    {
  /*      if(!Session::get('login'))
            {
                return redirect('mahasiswa_login');
            }*/
    $userid = Session::get('username');
    $pilih_tahun = DB::select( DB::raw("SELECT TahunID FROM khs WHERE MhswID = '$userid' ORDER BY TahunID DESC LIMIT 1"));
    foreach ($pilih_tahun as $key => $value) {
            $pilih_tahun = $value ->TahunID;
        }
    $data = DB::select( DB::raw("SELECT  mhsw.nama, khs.Sesi AS semester,  dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru
                                FROM mhsw 
                                JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                JOIN khs ON mhsw.MhswID = khs.MhswID
                                WHERE mhsw.MhswID ='$userid'
                                ORDER BY khs.Sesi DESC LIMIT 1"));
      
    $data2 = DB::select( DB::raw("SELECT krs.MKKode, krs.Nama, krs.presensi,  jadwal.UASJamMulai, jadwal.UASJamSelesai,krs.JadwalID,
    jadwal.UASRuangID, jadwal.UASTanggal, hari.Nama AS nama_hari,dosen.Nama AS nama_dosen 
                                FROM krs
                                JOIN jadwal ON jadwal.JadwalID = krs.JadwalID
                                JOIN hari ON jadwal.HariID = hari.HariID
                                JOIN dosen ON dosen.Login = jadwal.DosenID
                                WHERE krs.MhswID = '$userid' AND krs.TahunID ='$pilih_tahun'
                                ORDER BY jadwal.UASTanggal AND hari.Nama ASC"));


    $data3 = DB::select( DB::raw("SELECT DATE(tahun.TglUASMulai) uas_mulai, DATE(tahun.TglUASSelesai) uas_akhir FROM tahun WHERE TahunID='$pilih_tahun' ORDER BY tahun.TglUASSelesai DESC LIMIT 1"));

    foreach ($data3 as $key => $value) {
        $TglUASMulai     = $value->uas_mulai;
        $TglUASSelesai   = $value->uas_akhir;
    }

    return view ('mahasiswa/uas',['data'=>$data,'data2'=>$data2,'data3'=>$data3,'TglUASMulai'=>$TglUASMulai,'TglUASSelesai'=>$TglUASSelesai]);   
    }

    public function uas_cetak(Request $request)

        {
              
            $userid = Session::get('username');
            $foto = DB::select( DB::raw("SELECT Foto FROM mhsw where MhswID='$userid'"));

            foreach ($foto as $key => $value) {
                $foto = $value ->Foto;
            };

            $pilih_tahun = DB::select( DB::raw("SELECT TahunID FROM khs WHERE MhswID = '$userid' ORDER BY TahunID DESC LIMIT 1"));
            foreach ($pilih_tahun as $key => $value) {
                    $pilih_tahun = $value ->TahunID;
                };
            $data = DB::select( DB::raw("SELECT krs.MKKode, krs.Nama, krs.presensi, LEFT(jadwal.UASJamMulai,5) AS UASJamMulai , LEFT(jadwal.UASJamSelesai,5) AS UASJamSelesai, krs.JadwalID,
    jadwal.UASRuangID, jadwal.UASTanggal, hari.Nama AS nama_hari,dosen.Nama AS nama_dosen 
                                FROM krs
                                JOIN jadwal ON jadwal.JadwalID = krs.JadwalID
                                JOIN hari ON jadwal.HariID = hari.HariID
                                JOIN dosen ON dosen.Login = jadwal.DosenID
                                WHERE krs.MhswID = '$userid' AND krs.TahunID ='$pilih_tahun'
                                ORDER BY jadwal.UASTanggal AND hari.Nama ASC"));
            $data4 =  DB::select( DB::raw("SELECT DISTINCT mhsw.nama, mhsw.MhswID, khs.TahunID,  dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, khs.sesi AS Semester, tahun.Nama AS tahun_akademik, prodi.Nama AS Prodi_Baru, fakultas.Nama AS Fakultas_Baru 
                                                FROM mhsw 
                                                JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                                JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                                JOIN khs ON mhsw.MhswID = khs.MhswID
                                                JOIN tahun ON tahun.TahunID = khs.TahunID
                                                JOIN prodi ON prodi.ProdiID = mhsw.ProdiID
                                                JOIN fakultas ON prodi.FakultasID = fakultas.FakultasID  
                                                WHERE mhsw.MhswID = '$userid' AND khs.TahunID = '$pilih_tahun' AND  tahun.Nama NOT LIKE 'TA%'"));
            $data7= DB::select( DB::raw("SELECT DATE_FORMAT(CURDATE(), '%d %M %Y') AS tanggal"));
            $data8= DB::select( DB::raw("SELECT Nama from Pejabat WHERE KodeJabatan = 'KABAA'"));
            foreach ($data8 as $key => $value) {
                $data8 = $value ->Nama;
            };

            $data9= DB::select( DB::raw("SELECT StUAS FROM khs WHERE MhswID = '$userid' AND TahunID = '$pilih_tahun'"));

            foreach ($data9 as $key => $value) {
                $StUAS = $value -> StUAS;
            }

            if( $StUAS == 'N'){
                Alert::error('Anda Belum Layak','Cek Bagian Keuangan Atau Akademik');
                return redirect('mahasiswa_uas');

            }else{
                $pdf = PDF::loadView('mahasiswa/uas_cetak',['data4'=>$data4,'foto'=>$foto,'data'=>$data,'data7'=>$data7,'data8'=>$data8]);   
                return $pdf->download("uas_$userid.pdf");

            }

           
        }

}
