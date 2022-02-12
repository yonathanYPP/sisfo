<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;


class MahasiswaController extends Controller
{

    public function index()
    {
  /*      if(!Session::get('login'))
            {
                return redirect('mahasiswa_login');
            }*/

       $userid = Session::get('username');
       
       $data1 = DB::select( DB::raw("SELECT mhsw.*, agama.Nama AS Agama_Baru, kelamin.Nama AS Kelamin_Baru, statussipil.Nama AS StatusSipil_Baru, prodi.Nama AS Prodi_Baru, statusmhsw.Nama AS StatusMhsw_Baru, statusawal.Nama AS StatusAwal_Baru, dosen.Nama AS NamaPendamping_baru, dosen.Gelar AS GelarPendamping_Baru
        
            FROM mhsw 
            JOIN agama ON agama.Agama = mhsw.Agama 
            JOIN kelamin ON kelamin.Kelamin = mhsw.Kelamin 
            JOIN statussipil ON statussipil.StatusSipil = mhsw.StatusSipil
            JOIN prodi ON prodi.ProdiID = mhsw.ProdiID
            JOIN statusmhsw ON statusmhsw.StatusMhswID = mhsw.StatusMhswID
            JOIN statusawal ON statusawal.StatusAwalID = mhsw.StatusAwalID
            JOIN dosen ON dosen.Login = mhsw.PenasehatAkademik
                WHERE MhswID = '$userid' "));

       $data2 = DB::select( DB::raw("SELECT mhsw.NamaAyah, agama.Nama AS AgamaAyah_Baru, pendidikanortu.Nama AS PendidikanAyah_Baru, pekerjaanortu.Nama AS PekerjaanAyah_Baru, hidup.Nama AS HidupAyah_Baru, penghasilanortu.Nama AS PenghasilanAyah_Baru
            FROM mhsw 
            JOIN agama ON agama.Agama = mhsw.AgamaAyah
            JOIN pendidikanortu ON pendidikanortu.Pendidikan = mhsw.PendidikanAyah
            JOIN pekerjaanortu ON pekerjaanortu.Pekerjaan = mhsw.PekerjaanAyah
            JOIN hidup ON hidup.Hidup = mhsw.HidupAyah
            JOIN penghasilanortu ON penghasilanortu.PenghasilanOrtuID = mhsw.PenghasilanAyah
              WHERE MhswID = '$userid'"));

       $data3 = DB::select( DB::raw("SELECT mhsw.NamaIbu, agama.Nama AS AgamaIbu_Baru, pendidikanortu.Nama AS PendidikanIbu_Baru, pekerjaanortu.Nama AS PekerjaanIbu_Baru, hidup.Nama AS HidupIbu_Baru, penghasilanortu.Nama AS PenghasilanIbu_Baru
            FROM mhsw 
            JOIN agama ON agama.Agama = mhsw.AgamaIbu
            JOIN pendidikanortu ON pendidikanortu.Pendidikan = mhsw.PendidikanIbu
            JOIN pekerjaanortu ON pekerjaanortu.Pekerjaan = mhsw.PekerjaanIbu
            JOIN hidup ON hidup.Hidup = mhsw.HidupIbu
            JOIN penghasilanortu ON penghasilanortu.PenghasilanOrtuID = mhsw.PenghasilanIbu
              WHERE MhswID = '$userid'"));

       $kota        = DB::select( DB::raw("SELECT NamaDaerah FROM propinsi  WHERE NamaDaerah !=''  ORDER by NamaDaerah asc"));
       $propinsi    = DB::select( DB::raw("SELECT DISTINCT NamaPropinsi FROM propinsi  ORDER by NamaPropinsi asc"));
       $negara      = DB::select( DB::raw("SELECT NamaNegara FROM negara  order by NamaNegara asc"));




        return view ('mahasiswa/mahasiswa_index',['data'=>$data1, 'data2'=>$data2, 'data3'=>$data3, 'kota'=>$kota,'propinsi'=>$propinsi,'negara'=>$negara]);   
    }

    public function edit_password(Request $request)
    {


        $userid = Session::get('username');
        $pass1 = $request->pass1;
        $pass2 = $request->pass2;

        
        if ($pass1 != $pass2) {
        
        Alert::error('Gagal','Password Baru Tidak Sama');
        return redirect ('mahasiswa_index');

 
        
        }
        else{

        $data = DB::select( DB::raw("UPDATE mhsw SET Password = '$pass1' WHERE MhswID = '$userid' "));
        Alert::info('Sukses','Password telah dirubah');
        return redirect ('mahasiswa_index');
        
        }

        
    }

    public function editdatadiri(Request $request)
    {


        $userid         = Session::get('username');
        $nama           = $request->nama;
        $tempatlahir    = $request->tempatlahir;
        $tanggallahir   = $request->tanggallahir;
        $warganegara    = $request->warganegara;
        $wargaasing     = $request->wargaasing;
        $agama          = $request->agama;
        $statusipil     = $request->statusipil;
        $kelamin        = $request->kelamin;
        $hp             = $request->hp;
        $email          = $request->email;
        $emailPT        = $request->emailPT;
        $NIK            = $request->NIK;
        $alamat         = $request->alamat;
        $rt             = $request->rt;
        $rw             = $request->rw;
        $kelurahan      = $request->kelurahan;
        $kecamatan      = $request->kecamatan;
        $kota           = $request->kota;
        $kodepos        = $request->kodepos;
        $propinsi       = $request->propinsi;
        $negara         = $request->negara;


        $inputan = DB::table('mhsw')->where('MhswID',$userid)->update([
            'Nama'          => $nama,
            'TempatLahir'   => $tempatlahir,
            'TanggalLahir'  => $tanggallahir,
            'WargaNegara'   => $warganegara,
            'Kebangsaan'    => $wargaasing,
            'Agama'         => $agama,
            'StatusSipil'   => $statusipil,
            'Kelamin'       => $kelamin,
            'Handphone'     => $hp,
            'Email'         => $email,
            'EmailPT'       => $emailPT,
            'NIK'           => $NIK,
            'Alamat'        => $alamat,
            'RT'            => $rt,
            'RW'            => $rw,
            'Kelurahan'     => $kelurahan,
            'Kecamatan'     => $kecamatan,
            'Kota'          => $kota,
            'KodePos'       => $kodepos,
            'Propinsi'      => $propinsi,
            'Negara'        => $negara]);

        Alert::info('Sukses','Data Telah Diperbarui');
        return redirect ('mahasiswa_index');


        
    }

   
}
