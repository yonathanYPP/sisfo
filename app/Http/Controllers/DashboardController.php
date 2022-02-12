<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;


class DashboardController extends Controller
{

    public function index()
    {

    	$userid = Session::get('username');
       
        $data1 = DB::select( DB::raw("SELECT * from mhsw  WHERE MhswID = '$userid' "));

        return view ('template/index',['data'=>$data1]);   
    }
}
