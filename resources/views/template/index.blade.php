@extends ('template/mahasiswa_master')


@section ('content')
@foreach ($data as $dt)  
<div class="content-body" style="font-size: 10pt;">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="">                                               
                            <h4 style="color:green;">Hi, {{$dt->Nama}}</h4>
                        </div>
                    </div>
                </div>
                <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo" style="background-image: url({{asset('assets/images/background.jpg')}}">
                                <!-- <img src="{{asset('assets/images/background.jpg')}}" style="height: 250px; widtd: 970px;"> -->
                            </div>
                            <div class="profile-photo">
                                <img src="{{asset('assets/images/' .$dt->Foto)}}" class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="row">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

             <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color: green; text-align: center;">
                                <h4 class="card-title" style="color: white;" >PENTING</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table primary-table-bordered">
                                        <thead class="thead-primary">
                                            <tr style="background-color: green;">
                                                <th >No</th>
                                                <th >Nama Kegiatan</th>
                                                <th >Status</th>
                                                <th style="text-align: center;">Keterangan</th>
                                            </tr>
                                        </thead>

                                        @php

                                        if($dt->StOshika == 'Y'){
                                        $StOshika='LULUS';
                                        $color1='blue';
                                        }
                                        else
                                        {

                                        $StOshika='TIDAK LULUS';
                                        $color1='red';
                                        }

                                        ////////////////////////
                                        if($dt->StHalaqoh == 'Y'){
                                        $StHalaqoh='LULUS';
                                        $color2='blue';
                                        }
                                        else
                                        {

                                        $StHalaqoh='TIDAK LULUS';
                                        $color2='red';
                                        }

                                        ////////////////////////
                                        if($dt->StMaster == 'Y'){
                                        $StMaster='LULUS';
                                        $color3='blue';
                                        }
                                        else
                                        {

                                        $StMaster='TIDAK LULUS';
                                        $color3='red';
                                        }

                                        ////////////////////////
                                        if($dt->StPIslam == 'Y'){
                                        $StPIslam='LULUS';
                                        $color4='blue';
                                        }
                                        else
                                        {

                                        $StPIslam='TIDAK LULUS';
                                        $color4='red';
                                        }





                                        @endphp

                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>Oshika</td>
                                                <td style="color: {{$color1}}; font-weight: bolder;border-collapse: collapse; border-style: solid; border: 1px">{{$StOshika}}</td>
                                                <td>Bila <span style="font-weight: bold; color: red"> Tidak Lulus </span> maka tidak bisa mengambil mata kuliah Skripsi</td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>Halaqoh Diniyah</td>
                                                <td style="color: {{$color2}}; font-weight: bolder;">{{$StHalaqoh}}</td>
                                                <td>Bila <span style="font-weight: bold; color: red">Tidak Lulus</span> maka tidak bisa mengambil mata kuliah Agama Islam 2 / mata kuliah setaranya</td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>Master MABA</td>
                                                <td style="color: {{$color3}}; font-weight: bolder;">{{$StMaster}}</td>
                                                <td>Wajib <span style="font-weight: bold; color: blue">Lulus</span> sebagai persyaratan untuk mengambil mata kuliah Skripsi</td>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <td>Pendalaman Islam</td>
                                                <td style="color: {{$color4}}; font-weight: bolder;">{{$StPIslam}}</td>
                                                <td >Wajib <span style="font-weight: bold; color: blue">Lulus</span> sebagai persyaratan untuk mengambil mata kuliah Skripsi ( Hub. LPIK )</td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align: center;">Bagi yang di Nyatakan Tidak Lulus Maka Harus Mengulang di Tahun Berikutnya (Jangan Terlambat!) Hubungi. Bagian Kemahasiswaan BAKAK</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    
    </div>
</div>



@endforeach

@endsection

