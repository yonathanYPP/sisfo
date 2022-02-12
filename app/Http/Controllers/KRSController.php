<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
use PDF;
use Illuminate\Support\Facades\Redirect;


class KRSController extends Controller
{

    public function index()
    {
        $userid = Session::get('username');

        $data = DB::select( DB::raw("SELECT * FROM krs WHERE MhswID = '$userid' "));
        
        $data4 =  DB::select( DB::raw("SELECT  mhsw.nama, mhsw.MhswID, mhsw.ProdiID, dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, statusmhsw.Nama AS StatusMhsw_Baru
                                        FROM mhsw 
                                        JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                        JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                        WHERE mhsw.MhswID = '$userid' "));
        foreach ($data4 as $key => $value) {
            $prodi = $value -> ProdiID;
        }


        $data5 = DB::select( DB::raw("SELECT sesi AS Total_Sesi, MaxSKS FROM khs WHERE MhswID = '$userid' ORDER BY Total_Sesi DESC LIMIT 1"));

        

        $pilih_tahun = DB::select( DB::raw("SELECT TahunID FROM khs WHERE MhswID = '$userid' ORDER BY TahunID DESC LIMIT 1"));
            foreach ($pilih_tahun as $key => $value) {
                $pilih_tahun = $value ->TahunID;
            }


        $data2 = DB::select( DB::raw("SELECT mkpaket.Nama, tahun.TglKRSSelesai, mkpaket.MKPaketID  FROM mkpaket 
                                    JOIN tahun ON mkpaket.ProdiID = tahun.ProdiID
                                    WHERE mkpaket.NA='N' AND mkpaket.ProdiID ='$prodi' AND tahun.TglKRSSelesai > DATE(NOW()) AND tahun.TahunID='$pilih_tahun'"));


        if ($data2  == []) {
            $skrs = '';
        }
        else{
            $skrs = 'hidden';   
        }

        $data8 = DB::select( DB::raw("SELECT mkpaketisi.MKID FROM mkpaket 
                                        JOIN mkpaketisi ON mkpaket.MKPaketID = mkpaketisi.MKPaketID
                                        WHERE mkpaketisi.MKPaketID =''"));
                                                
     


        return view ('mahasiswa/krs/krs',['data'=>$data,'data2'=>$data2,'data4'=>$data4,'data5'=>$data5,'statuskrs'=>$skrs,'data8' => $data8]);
  
    }

    public function krs_pilih() {
        
                            
        $userid = Session::get('username');
      

        $data4 =  DB::select( DB::raw("SELECT  mhsw.nama, mhsw.MhswID, mhsw.ProdiID, dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru, statusmhsw.Nama AS StatusMhsw_Baru
                                        FROM mhsw 
                                        JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                                        JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
                                        WHERE mhsw.MhswID = '$userid' "));
        foreach ($data4 as $key => $value) {
            $prodi = $value -> ProdiID;
        }


        $data5 = DB::select( DB::raw("SELECT sesi AS Total_Sesi, MaxSKS FROM khs WHERE MhswID = '$userid' ORDER BY Total_Sesi DESC LIMIT 1"));

        $pilih_tahun = DB::select( DB::raw("SELECT TahunID FROM khs WHERE MhswID = '$userid' ORDER BY TahunID DESC LIMIT 1"));
            foreach ($pilih_tahun as $key => $value) {
                $pilih_tahun = $value ->TahunID;
            }


        $data9 = DB::select( DB::raw("SELECT j.MKKode, j.Nama,j.JadwalID, LEFT(j.JamMulai, 5) AS JM, LEFT(j.JamSelesai, 5) AS JS, j.NamaKelas,hari.Nama AS hari, dosen.Nama AS nama_dosen,dosen.Login, j.RuangID, j.SKS,j.JamMulai, j.HariID 
                                    FROM jadwal j
                                    LEFT OUTER JOIN dosen ON dosen.Login = j.DosenID
                                    LEFT OUTER JOIN hari ON j.HariID = hari.HariID
                                    WHERE j.TahunID = '$pilih_tahun' AND j.ProdiId='$prodi' limit 3" ));
  
        $detail = DB::select("SELECT * FROM tes ");                   
         return view ('mahasiswa/krs/krs_pilih',['data4'=>$data4,'data5'=>$data5,'data9'=>$data9,'detail' => $detail]);
        }


     public function ajaxTambahKRS(Request $request) 
        {


            $MKKode = $request->MKKode;
            $Nama = $request->Nama;
            $JM = $request->JM;
            $Login = $request->Login;
            $SKS = $request->SKS;
            $hari = $request->hari;


            $cek = DB::select("SELECT count(MKKode) as Nmbr FROM tes WHERE JM='$JM' AND Hari='$hari'");

            foreach ($cek as $key => $value) {
                $Nmbr = $value -> Nmbr;
            }

            if ($Nmbr > 0)   {
     

           Alert::error('Gagal', 'Hari dan Jam Matakuliah Tidak Boleh Sama');
           return redirect  ('mahasiswa_krspaket');



           }
           else{

            $insert = DB::table('tes')->insert([
            'MKKode' => $MKKode,
            'Nama'=>$Nama,
            'Login'=>$Login,
            'SKS'=>$SKS,
            'JM'=>$JM,
            'Hari'=>$hari
            ]);

            $detail = DB::select("SELECT * from tes");
            return json_encode($detail);

           }


        }

        public function destroy($MKKode) {
        //


            $delete = DB::select("DELETE FROM `tes` WHERE MKKode='$MKKode'");
            $detail = DB::select("SELECT * from tes ");

            $response = ['detail' => $detail];

            return json_encode($response);
        }
   
}
