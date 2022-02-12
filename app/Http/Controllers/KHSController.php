<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
use PDF;


class KHSController extends Controller
{

    public function index()
    {
  /*      if(!Session::get('login'))
            {
                return redirect('mahasiswa_login');
            }*/

        $userid = Session::get('username');

        $data = DB::select( DB::raw("SELECT * FROM krs WHERE MhswID = '$userid' "));
        $data2 = DB::select( DB::raw("SELECT Distinct TahunID FROM krs WHERE MhswID = '$userid'"));


        $data4 =  DB::select( DB::raw("SELECT  mhsw.nama,  dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, statusmhsw.Nama AS StatusMhsw_Baru
                                        FROM mhsw 
                                        JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                        JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                        WHERE mhsw.MhswID = '$userid' "));

        $data5 = DB::select( DB::raw("SELECT SUM(SKS) AS Total_SKS, ROUND(SUM(IP)/COUNT(IP),2) AS Total_IP, '1 - Akhir' AS Total_Sesi FROM khs WHERE MhswID= '$userid'"));
         
        return view ('mahasiswa/khs',['data'=>$data,'data2'=>$data2,'data4'=>$data4,'data5'=>$data5]);  
  
    }

    public function mahasiswa_khs_sort(Request $request)
 {
    /*      if(!Session::get('login'))
            {
                return redirect('mahasiswa_login');
            }*/

    $userid = Session::get('username');
    $pilih_tahun = $request->pilih_tahun;

    if ($pilih_tahun == '*') {

        $data = DB::select( DB::raw("SELECT * FROM krs WHERE MhswID = '$userid' "));
        $data2 = DB::select( DB::raw("SELECT Distinct TahunID FROM krs WHERE MhswID = '$userid'"));
        $data3 = DB::select( DB::raw("SELECT * FROM khs WHERE MhswID = '$userid'  "));
        $data4 =  DB::select( DB::raw("SELECT  mhsw.nama,  dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, statusmhsw.Nama AS StatusMhsw_Baru
                                        FROM mhsw 
                                        JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                        JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                        WHERE mhsw.MhswID = '$userid' "));

        $data5 = DB::select( DB::raw("SELECT SUM(SKS) AS Total_SKS, ROUND(SUM(IP)/COUNT(IP),2) AS Total_IP, '1 - Akhir' AS Total_Sesi FROM khs WHERE MhswID= '$userid'"));

         return view ('mahasiswa/khs',['data'=>$data,'data2'=>$data2,'data4'=>$data4,'data5'=>$data5]);     
    

    }else{
        $data = DB::select( DB::raw("SELECT * FROM krs WHERE MhswID = '$userid' and TahunID = '$pilih_tahun' "));
        $data2 = DB::select( DB::raw("SELECT Distinct TahunID FROM krs WHERE MhswID = '$userid'"));
        $data3 = DB::select( DB::raw("SELECT * FROM khs WHERE MhswID = '$userid'  and TahunID = '$pilih_tahun' "));
        $data4 =  DB::select( DB::raw("SELECT  mhsw.nama,  dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, statusmhsw.Nama AS StatusMhsw_Baru
                                        FROM mhsw 
                                        JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                        JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                        JOIN khs ON mhsw.MhswID = khs.MhswID
                                        WHERE mhsw.MhswID = '$userid' and khs.TahunID = '$pilih_tahun'"));

        $data5 = DB::select( DB::raw("SELECT SKS AS Total_SKS, IP AS Total_IP, sesi AS Total_Sesi FROM khs WHERE MhswID= '$userid' and TahunID = '$pilih_tahun'"));


         return view ('mahasiswa/khs',['data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'data5'=>$data5]);        
    }

    
             
 }

     public function khs_cetak(Request $request)

        {
              
            $userid = Session::get('username');
            $pilih_tahun = $request->pilih_tahun;

            if ($pilih_tahun == '*') {

                $data = DB::select( DB::raw("SELECT * FROM krs WHERE MhswID = '$userid' "));
                $data4 =  DB::select( DB::raw("SELECT DISTINCT mhsw.nama, mhsw.MhswID,   dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, '1 - Akhir' AS Semester, ' - ' AS tahun_akademik, prodi.Nama AS Prodi_Baru, fakultas.Nama AS Fakultas_Baru 
                                                FROM mhsw 
                                                JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                                JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                                JOIN khs ON mhsw.MhswID = khs.MhswID
                                                JOIN tahun ON tahun.TahunID = khs.TahunID
                                                JOIN prodi ON prodi.ProdiID = mhsw.ProdiID
                                                JOIN fakultas ON prodi.FakultasID = fakultas.FakultasID  
                                                WHERE mhsw.MhswID = '$userid' "));

                $data5 = DB::select( DB::raw("SELECT  ROUND(SUM(IP)/COUNT(IP),2)  AS Total_IP, '-' AS maxSKS FROM khs WHERE MhswID= '$userid'"));
                foreach ($data5 as $key => $value) {
                    $ip_baru = $value -> Total_IP;
                }
                $data6 = DB::select( DB::raw("SELECT SUM(SKS) AS total_sks, ROUND(SUM(BobotNilai * SKS),0) AS totalBX FROM krs WHERE MhswID='$userid' "));

                $data7= DB::select( DB::raw("SELECT prodi.PejabatTTD, prodi.JabatanTTD, DATE_FORMAT(CURDATE(), '%d %M %Y') AS tanggal, dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru
                                            FROM prodi
                                            JOIN mhsw ON prodi.ProdiID = mhsw.ProdiID
                                            JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                            WHERE MhswID='$userid' ")); 

                 
                $pdf = PDF::loadView('mahasiswa/khs_cetak',['data'=>$data,'data4'=>$data4,'data5'=>$data5,'data6'=>$data6,'ip_baru'=>$ip_baru,'data7'=>$data7]);         
                return $pdf->download("khs_$userid.pdf");
   
            

            }else{
                $data = DB::select( DB::raw("SELECT * FROM krs WHERE MhswID = '$userid' and TahunID = '$pilih_tahun' "));
                $data4 =  DB::select( DB::raw("SELECT DISTINCT mhsw.nama, mhsw.MhswID, khs.TahunID,  dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, khs.sesi AS Semester, tahun.Nama AS tahun_akademik, prodi.Nama AS Prodi_Baru, fakultas.Nama AS Fakultas_Baru 
                                                FROM mhsw 
                                                JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                                JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                                JOIN khs ON mhsw.MhswID = khs.MhswID
                                                JOIN tahun ON tahun.TahunID = khs.TahunID
                                                JOIN prodi ON prodi.ProdiID = mhsw.ProdiID
                                                JOIN fakultas ON prodi.FakultasID = fakultas.FakultasID  
                                                WHERE mhsw.MhswID = '$userid' AND khs.TahunID = '$pilih_tahun' AND  tahun.Nama NOT LIKE 'TA%'"));

                $data5 = DB::select( DB::raw("SELECT IP  AS Total_IP, maxSKS AS maxSKS FROM khs WHERE MhswID= '$userid' and TahunID = '$pilih_tahun'"));
                foreach ($data5 as $key => $value) {
                    $ip_baru = $value -> Total_IP;
                }
                $data6 = DB::select( DB::raw("SELECT SUM(SKS) AS total_sks, ROUND(SUM(BobotNilai * SKS),0) AS totalBX FROM krs WHERE MhswID='$userid' and TahunID = '$pilih_tahun' "));

                $data7= DB::select( DB::raw("SELECT prodi.PejabatTTD, prodi.JabatanTTD, DATE_FORMAT(CURDATE(), '%d %M %Y') AS tanggal, dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru
                                            FROM prodi
                                            JOIN mhsw ON prodi.ProdiID = mhsw.ProdiID
                                            JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                            WHERE MhswID='$userid' ")); 

             $pdf = PDF::loadView('mahasiswa/khs_cetak',['data'=>$data,'data4'=>$data4,'data5'=>$data5,'data6'=>$data6,'ip_baru'=>$ip_baru,'data7'=>$data7]);         
                return $pdf->download("khs_$userid.pdf");

/*            PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('myfile.pdf')
*/

        }
    }

    


   
}
