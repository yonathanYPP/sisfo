<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
use PDF;
use Illuminate\Support\Facades\Redirect;


class KRSPaketController extends Controller
{

    public function index()
    {
  /*      if(!Session::get('login'))
            {
                return redirect('mahasiswa_login');
            }*/

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
                                                
            
        return view ('mahasiswa/krs/krs_paket',['data'=>$data,'data2'=>$data2,'data4'=>$data4,'data5'=>$data5,'statuskrs'=>$skrs,'data8' => $data8]);
  
    }

    public function krspaketid($MKPaketID)
    {
        $userid = Session::get('username');
        $data8 = DB::select( DB::raw("SELECT mk.Nama, mk.MKKode FROM mkpaketisi 
                                        JOIN mk ON mk.MKID = mkpaketisi.MKID
                                        WHERE mkpaketisi.MKPaketID ='$MKPaketID'"));

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

        $data9 = DB::select( DB::raw(" SELECT mkpaketisi.MKPaketIsiID,mk.MKKode, mk.Nama, mk.SKS, j.JadwalID, LEFT(j.JamMulai, 5) AS JM, LEFT(j.JamSelesai, 5) AS JS, j.NamaKelas,hari.Nama AS hari, dosen.Nama AS nama_dosen, j.RuangID,  kl.Nama AS NamaKelas
                                    FROM mkpaketisi mkpaketisi
                                    LEFT OUTER JOIN mk ON mkpaketisi.MKID = mk.MKID
                                    LEFT OUTER JOIN jadwal j ON j.MKID = mkpaketisi.MKID
                                    LEFT OUTER JOIN mkpaket p ON mkpaketisi.MKPaketID = p.MKPaketID 
                                    LEFT OUTER JOIN hari ON j.HariID = hari.HariID
                                    LEFT OUTER JOIN kelas kl ON kl.KelasID = j.NamaKelas
                                    LEFT OUTER JOIN dosen ON dosen.Login = j.DosenID
                                    WHERE mkpaketisi.MKPaketID = '$MKPaketID' AND p.ProdiID = '$prodi' AND j.JumlahMhsw < j.Kapasitas"));

        $data10 = DB::select( DB::raw("SELECT distinct kl.Nama AS NamaKelas
                                    FROM mkpaketisi mkpaketisi
                                    LEFT OUTER JOIN mk ON mkpaketisi.MKID = mk.MKID
                                    LEFT OUTER JOIN jadwal j ON j.MKID = mkpaketisi.MKID
                                    LEFT OUTER JOIN mkpaket p ON mkpaketisi.MKPaketID = p.MKPaketID 
                                    LEFT OUTER JOIN hari ON j.HariID = hari.HariID
                                    LEFT OUTER JOIN kelas kl ON kl.KelasID = j.NamaKelas
                                    LEFT OUTER JOIN dosen ON dosen.Login = j.DosenID
                                    WHERE mkpaketisi.MKPaketID = '$MKPaketID' AND p.ProdiID = '$prodi' AND j.JumlahMhsw < j.Kapasitas"));
                            
         return view ('mahasiswa/krs/krs_paket_detail',['data8' => $data8,'data4'=>$data4,'data5'=>$data5,'data2'=>$data2,'data9'=>$data9,'data10'=>$data10,'MKPaketID'=>$MKPaketID]);
    }

    public function krspaket_kelas(Request $request) {
        //
            $MKPaketID   = $request->MKPaketID;
            $pilih_kelas = $request->pilih_kelas;



            $userid = Session::get('username');
        $data8 = DB::select( DB::raw("SELECT mk.Nama, mk.MKKode FROM mkpaketisi 
                                        JOIN mk ON mk.MKID = mkpaketisi.MKID
                                        WHERE mkpaketisi.MKPaketID ='$MKPaketID'"));

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

        $data9 = DB::select( DB::raw(" SELECT mkpaketisi.MKPaketIsiID,mk.MKKode, mk.Nama, mk.SKS, j.JadwalID, LEFT(j.JamMulai, 5) AS JM, LEFT(j.JamSelesai, 5) AS JS, j.NamaKelas,hari.Nama AS hari, dosen.Nama AS nama_dosen,dosen.Login, j.RuangID,  kl.Nama AS NamaKelas, j.JamMulai, j.HariID
                                    FROM mkpaketisi mkpaketisi
                                    LEFT OUTER JOIN mk ON mkpaketisi.MKID = mk.MKID
                                    LEFT OUTER JOIN jadwal j ON j.MKID = mkpaketisi.MKID
                                    LEFT OUTER JOIN mkpaket p ON mkpaketisi.MKPaketID = p.MKPaketID 
                                    LEFT OUTER JOIN hari ON j.HariID = hari.HariID
                                    LEFT OUTER JOIN kelas kl ON kl.KelasID = j.NamaKelas
                                    LEFT OUTER JOIN dosen ON dosen.Login = j.DosenID
                                    WHERE mkpaketisi.MKPaketID = '$MKPaketID' AND p.ProdiID = '$prodi' and kl.Nama='$pilih_kelas' AND j.JumlahMhsw < j.Kapasitas" ));

        $data10 = DB::select( DB::raw("SELECT distinct kl.Nama AS NamaKelas
                                    FROM mkpaketisi mkpaketisi
                                    LEFT OUTER JOIN mk ON mkpaketisi.MKID = mk.MKID
                                    LEFT OUTER JOIN jadwal j ON j.MKID = mkpaketisi.MKID
                                    LEFT OUTER JOIN mkpaket p ON mkpaketisi.MKPaketID = p.MKPaketID 
                                    LEFT OUTER JOIN hari ON j.HariID = hari.HariID
                                    LEFT OUTER JOIN kelas kl ON kl.KelasID = j.NamaKelas
                                    LEFT OUTER JOIN dosen ON dosen.Login = j.DosenID
                                    WHERE mkpaketisi.MKPaketID = '$MKPaketID' AND p.ProdiID = '$prodi' AND j.JumlahMhsw < j.Kapasitas"));
                            
         return view ('mahasiswa/krs/krs_paket_list',['data8' => $data8,'data4'=>$data4,'data5'=>$data5,'data2'=>$data2,'data9'=>$data9,'data10'=>$data10,'MKPaketID'=>$MKPaketID]);
        }

        public function krspaket_ambilkrs(Request $request) {
    
            $MKKode = $request->MKKode;
            $Nama = $request->Nama;
            $Login = $request->Login;
            $SKS = $request->SKS;
            $JM = $request->JM;
            $hari = $request->hari;

            $hitung = (count($MKKode));
     
            for ($i = 0; $i < $hitung; $i++) {
               


            $dataSet = [];
            foreach ($MKKode as $a) {

                $dataSet= [
                ['MKKode' => $MKKode[$i],
                 'Nama'   => $Nama[$i],
                 'SKS'    => $SKS[$i]
                ],


            ];
            }

            $cek2=DB::table('jadwal')
             ->select('JamMulai','HariID')
             ->distinct()
             ->wherein('JamMulai', $JM)
             ->wherein('HariID', $hari)
             ->get(); 


            $val = count($cek2);
/*            if(count($cek2) > 0) {
        
            }
*/


/*             $cek =DB::table('tes')
             ->insert($dataSet)
             ->wherein('MKKode', $MKKode[$i])
             ->get();
*/
/*            $cek = DB::table('tes')->insert($dataSet);*/

            }

        
           if ($val < $hitung) {
            Alert::error('Gagal', 'Hari dan Jam Matakuliah Tidak Boleh Sama');
            return redirect ('mahasiswa_krspaket');
           }
           else{
            Alert::success('Yey', 'OK');
            $cek = DB::table('tes')->insert($dataSet);
            return redirect  ('mahasiswa_krspaket');
           }
      
        }


   
}
