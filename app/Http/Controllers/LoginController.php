<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;


class LoginController extends Controller
{

    public function mahasiswa()
    {
        return view ('login/mahasiswa');   
    }

    public function masuk(Request $kiriman)

    {
    
        $data1 = DB::select( DB::raw("SELECT * from mhsw where Login='$kiriman->username' and TanggalLahir = '$kiriman->password'")); 

        $username = $kiriman->username;
        $password = $kiriman->password;

        if (count($data1)>0) {
            Session::put('login',TRUE);
            Session::put('username',$username);
            Session::put('password',$password); 

            Alert::success('Selamat Datang', $username);
/*            return view('mahasiswa/mahasiswa_index',['username'=>$username]);
*/        
            return redirect('/');
        }else {


            Alert::error('Gagal','Username atau Password Salah');
            return redirect('mahasiswa_login');
              }
    }

    public function logout()
    {   

        Session::flush();
           return redirect('mahasiswa_login');
    }
}
