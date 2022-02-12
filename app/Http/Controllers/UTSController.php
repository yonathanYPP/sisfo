<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
use PDF;


class UTSController extends Controller
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
      
    $data2 = DB::select( DB::raw("SELECT krs.MKKode, krs.Nama, krs.presensi,  jadwal.UTSJamMulai, jadwal.UTSJamSelesai,krs.JadwalID,
    jadwal.UTSRuangID, jadwal.UTSTanggal, hari.Nama AS nama_hari,dosen.Nama AS nama_dosen 
                                FROM krs
                                JOIN jadwal ON jadwal.JadwalID = krs.JadwalID
                                JOIN hari ON jadwal.HariID = hari.HariID
                                JOIN dosen ON dosen.Login = jadwal.DosenID
                                WHERE krs.MhswID = '$userid' AND krs.TahunID ='$pilih_tahun'
                                ORDER BY jadwal.UTSTanggal AND hari.Nama ASC"));


    $data3 = DB::select( DB::raw("SELECT DATE(tahun.TglUTSMulai) uts_mulai, DATE(tahun.TglUTSSelesai) uts_akhir FROM tahun WHERE TahunID='$pilih_tahun' ORDER BY tahun.TglUTSSelesai DESC LIMIT 1"));

    foreach ($data3 as $key => $value) {
        $TglUTSMulai     = $value->uts_mulai;
        $TglUTSSelesai   = $value->uts_akhir;
    }

    return view ('mahasiswa/uts',['data'=>$data,'data2'=>$data2,'data3'=>$data3,'TglUTSMulai'=>$TglUTSMulai,'TglUTSSelesai'=>$TglUTSSelesai]);   
    }

    public function uts_cetak(Request $request)

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
            $data = DB::select( DB::raw("SELECT krs.MKKode, krs.Nama, krs.presensi,  LEFT(jadwal.UTSJamMulai,5) AS UTSJamMulai, LEFT(jadwal.UTSJamSelesai,5) AS UTSJamSelesai, krs.JadwalID,jadwal.UTSRuangID, jadwal.UTSTanggal, hari.Nama AS nama_hari,dosen.Nama AS nama_dosen 
                                FROM krs
                                JOIN jadwal ON jadwal.JadwalID = krs.JadwalID
                                JOIN hari ON jadwal.HariID = hari.HariID
                                JOIN dosen ON dosen.Login = jadwal.DosenID
                                WHERE krs.MhswID = '$userid' AND krs.TahunID ='$pilih_tahun'
                                ORDER BY jadwal.UTSTanggal AND hari.Nama ASC"));

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

            $data9= DB::select( DB::raw("SELECT StUTS FROM khs WHERE MhswID = '$userid' AND TahunID = '$pilih_tahun'"));

            foreach ($data9 as $key => $value) {
                $StUTS = $value -> StUTS;
            }

            if( $StUTS == 'N'){
                Alert::error('Anda Belum Layak','Cek Bagian Keuangan Atau Akademik');
                return redirect('mahasiswa_uts');

            }else{
                $pdf = PDF::loadView('mahasiswa/uts_cetak',['data4'=>$data4,'foto'=>$foto,'data'=>$data,'data7'=>$data7,'data8'=>$data8]);   
                return $pdf->download("uts_$userid.pdf");

            }

           
        }

}
