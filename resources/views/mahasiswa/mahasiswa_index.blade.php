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
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-center mt-4 border-bottom-1 pb-3">
                                        <div class="form-group ">
                                            <label class="" style="float:left;">NPM
                                            </label>
                                            <br>
                                            <div class="">
                                                <input type="text" class="form-control" style="font-size: 10pt" value="{{$dt->MhswID}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="" style="float:left;">Prodi
                                            </label>
                                            <br>
                                            <div class="">
                                                <input type="text" class="form-control" value="{{$dt->Prodi_Baru}}" readonly style="font-size: 10pt">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="" style="float:left;">Jalur
                                            </label>
                                            <br>
                                            <div class="">
                                                <input type="text" class="form-control" value="{{$dt->ProgramID}}" readonly style="font-size: 10pt">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="" style="float:left;">Status
                                            </label>
                                            <br>
                                            <div class="">
                                                <input type="text" class="form-control" value="{{$dt->StatusMhsw_Baru}}" readonly style="font-size: 10pt">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs" >
                                            <li class="nav-item"><a href="#tentang_saya" data-toggle="tab" class="nav-link" style="font-size: 10pt">Tentang Saya</a>
                                            </li>
                                            <li class="nav-item"><a href="#orangtua" data-toggle="tab" class="nav-link" style="font-size: 10pt">Orang Tua</a>
                                            </li>
                                            <li class="nav-item"><a href="#alamat_tetap" data-toggle="tab" class="nav-link" style="font-size: 10pt">Alamat Tetap</a>
                                            </li>
                                            </li>
                                            <li class="nav-item"><a href="#akademik" data-toggle="tab" class="nav-link" style="font-size: 10pt">Akademik</a>
                                            </li>
                                            <li class="nav-item"><a href="#rubah_password" data-toggle="tab" class="nav-link" style="font-size: 10pt">Ubah Password</a>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content">
                                            <div id="tentang_saya" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                <form metdod="post" action="{{url('editdatadiri')}}">
                                                {{csrf_field()}}
                                                <table class="table" > 
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 80px;"> Nama </td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->Nama}}" name="nama" style="font-size: 10pt"> </td> 
                                                        </tr>
                                                    </thead>
                                                </table>

                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 80px;"> Tempat Lahir </td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->TempatLahir}}" name="tempatlahir" style="font-size: 10pt"> </td>

                                                            <td style="width: 80px;"> Tanggal Lahir </td> 
                                                            <td><input ttype="text" class="form-control" name="tanggallahir" id="mdate" value="{{$dt->TanggalLahir}}" style="font-size: 10pt"> </td> 
                                                        </tr>

                                                        <tr> 
                                                            <td> Warga Negara</td> 
                                                            <td>
                                                                <select class="form-control" style="font-size: 10pt"  id="pilihwarganegara" name="warganegara">
                                                                    <option>{{$dt->WargaNegara}}</option>
                                                                    <option>WNI</option>
                                                                    <option>WNA</option>
                                                                </select>

                                                            <td> Jika Asing, Sebutkan</td> 
                                                            <td>
                                                                <input id="datawna" type="text" class="form-control" disabled="disabled" style="font-size: 10pt" name="wargaasing" value="{{$dt->Kebangsaan}}" />
                                                                </td>  
                                                        </tr>

                                                        <tr> 
                                                            <td> Agama </td> 
                                                            <td>
                                                                <select class="form-control" style="font-size: 10pt" name="agama">
                                                                    
                                                                    <option value="{{$dt->Agama}}">{{$dt->Agama_Baru}}</option>
                                                                    <option value="KR">Kristen</option>
                                                                    <option value="K">Katholik</option>
                                                                    <option value="I">Islam</option>
                                                                    <option value="B">Budha</option>
                                                                    <option value="H">Hindu</option>
                                                                    <option value="KH">Konghucu</option>

                                                                </select>
                                                                

                                                            <td> Status Sipil</td> 
                                                            <td>
                                                                <select  class="form-control" style="font-size: 10pt" name="statusipil">
                                                                    
                                                                    <option value="{{$dt->StatusSipil}}">{{$dt->StatusSipil_Baru}}</option>
                                                                    <option value="B">Belum Menikah</option>
                                                                    <option value="K">Menikah</option>
                                                                    <option value="D">Duda / Janda</option>
                                                                </select>

                                                                </td>
                                                        </tr>


                                                        <tr> 
                                                            <td> Jenis Kelamin </td> 
                                                            <td>
                                                                <select class="form-control" style="font-size: 10pt" name="kelamin">
                                                                    <option value="{{$dt->Kelamin}}">{{$dt->Kelamin_Baru}}</option>
                                                                    <option value="P">Pria</option>
                                                                    <option value="W">Wanita</option>

                                                                </select>
                                

                                                            <td> No Handphone</td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->Handphone}}" style="font-size: 10pt" name="hp" onkeypress="return hanyaAngka(event)"></td> 
                                                        </tr>

                                                        <tr> 
                                                            <td> Email Pribadi</td> 
                                                            <td><input type="email" class="form-control"  value="{{$dt->Email}}"  style="font-size: 10pt" name="email"></td>

                                                            <td> Email Unisma</td> 
                                                            <td><input type="email" class="form-control"  value="{{$dt->EmailPT}}"  style="font-size: 10pt" name="emailPT"></td>
                                                        </tr>   
                                                    </thead>       
                                                </table>

                                                <table class="table" > 
                                                    <thead>
                                                        <tr>
                                                            <td> NIK</td> 
                                                            <td><input type="text" class="form-control"  
                                                             value="{{$dt->NIK}}"  style="font-size: 10pt"  name="NIK" onkeypress="return hanyaAngka(event)"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;"> Alamat </td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->Alamat}}"  style="font-size: 10pt" name="alamat"> </td> 
                                                        </tr>

                                                    </thead>
                                                </table>

                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 80px;"> RT </td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->RT}}" onkeypress="return hanyaAngka(event)"  style="font-size: 10pt" name="rt"> </td>

                                                            <td style="width: 80px;"> RW </td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->RW}}" onkeypress="return hanyaAngka(event)" style="font-size: 10pt" name="rw"> </td> 
                                                        </tr>

                                                        <tr> 
                                                            <td> Kelurahan </td> 
                                                            <td><input type="text" class="form-control"   value="{{$dt->Kelurahan}}"  style="font-size: 10pt" name="kelurahan"></td>

                                                            <td> Kecamatan</td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->Kecamatan}}"  style="font-size: 10pt" name="kecamatan"></td> 
                                                        </tr>

                                                        <tr> 

                                                            <td> Kode Pos</td> 
                                                            <td><input type="text" class="form-control"  value="{{$dt->KodePos}}" onkeypress="return hanyaAngka(event)"  style="font-size: 10pt" name="kodepos"></td>


                                                            <td> Kota / Kabupaten </td>

                                                            <td>

                                                                <select class="form-control"  style="font-size: 10pt" name="kota">
                                                                <option>{{$dt->Kota}}</option>
                                                                @foreach ($kota as $kt) 
                                                                <option>{{$kt->NamaDaerah}}</option>
                                                                @endforeach
                                                            </select> 
                                                            </td> 

                                                           
                                                        </tr>


                                                        <tr> 
                                                            <td> Propinsi</td> 
                                                            <td>
                                                                <select class="form-control"  style="font-size: 10pt" name="propinsi">
                                                                    <option >{{$dt->Propinsi}}</option>
                                                                    @foreach ($propinsi as $kt) 
                                                                    <option>{{$kt->NamaPropinsi}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>

                                                            <td> Negara</td> 
                                                            <td>
                                                                <select class="form-control"  style="font-size: 10pt" name="negara">

                                                                <option>{{$dt->Negara}}</option>
                                                                @foreach ($negara as $kt) 
                                                                <option>{{$kt->NamaNegara}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td> 
                                                        </tr> 
                                                    </thead>       
                                                </table>

                                                <button class="btn btn-primary" type="submit">Selesai</button>
                                            </form>
                     
               
@foreach ($data2 as $dt2)  
                                        
                                                </div>
                                            </div>
                                            <div id="orangtua" class="tab-pane fade">
                                                <div class="my-post-content pt-3">
                                                <h6>Data Ayah</h6>
                                                <table class="table "> 
                                                    <thead>
                                                      <tr>
                                                          <td style="width: 80px;"> Nama </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt2->NamaAyah}}" style="font-size: 10pt"> </td>
                                                    </tr>  
                                                    </thead>
                                                </table>
                                                <table class="table "> 
                                                    <thead>

                                                        <tr> 
                                                          <td style="width: 80px;"> Agama </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt2->AgamaAyah_Baru}}" style="font-size: 10pt"> </td>

                                                          <td style="width: 80px;"> Pendidikan Terakhir </td> 
                                                             <td><input type="text" class="form-control" readonly  value="{{$dt2->PendidikanAyah_Baru}}" style="font-size: 10pt"></td> 
                                                        </tr> 
                                                        
                                                        <tr>
                                                            <td style="width: 80px;"> Pekerjaan</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt2->PekerjaanAyah_Baru}}" style="font-size: 10pt"></td>
                                                                
                                                            <td style="width: 80px;"> Hidup</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt2->HidupAyah_Baru}}" style="font-size: 10pt"></td>   
                                                        </tr>
                                                    </thead>       
                                                </table>
                                                <table class="table "> 
                                                <thead>
                                                    <tr>
                                                        <td style="width: 80px;"> Penghasilan Perbulan</td> 
                                                             <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt2->PenghasilanAyah_Baru}}"  style="font-size: 10pt"></td>
                                                    </tr>
                                                </thead>
                                                </table>
@endforeach
@foreach ($data3 as $dt3)    
                                               <h6>Data Ibu</h6>
                                                <table class="table "> 
                                                    <thead>
                                                      <tr>
                                                          <td style="width: 80px;"> Nama </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt3->NamaIbu}}" style="font-size: 10pt"> </td>
                                                    </tr>  
                                                    </thead>
                                                </table>
                                                <table class="table "> 
                                                    <thead>

                                                        <tr> 
                                                          <td style="width: 80px;"> Agama </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt3->AgamaIbu_Baru}}" style="font-size: 10pt"> </td>

                                                          <td style="width: 80px;"> Pendidikan Terakhir </td> 
                                                             <td><input type="text" class="form-control" readonly  value="{{$dt3->PendidikanIbu_Baru}}" style="font-size: 10pt"></td> 
                                                        </tr> 
                                                        
                                                        <tr>
                                                            <td style="width: 80px;"> Pekerjaan</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt3->PekerjaanIbu_Baru}}" style="font-size: 10pt"></td>
                                                                
                                                            <td style="width: 80px;"> Hidup</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt3->HidupIbu_Baru}}" style="font-size: 10pt"></td>   
                                                        </tr>
                                                    </thead>       
                                                </table>
                                                <table class="table "> 
                                                <thead>
                                                    <tr>
                                                        <td style="width: 80px;"> Penghasilan Perbulan</td> 
                                                             <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt3->PenghasilanIbu_Baru}}"  style="font-size: 10pt"></td>
                                                    </tr>
                                                </thead>
                                                </table>

@endforeach
foreach($data as $dt)
                                                <h6>Alamat Orang Tua</h6>
                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                          <td style="width: 80px;"> Alamat </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->AlamatOrtu}}" style="font-size: 10pt"> </td> 
                                                        </tr>
                                                    </thead>
                                                </table>

                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 80px;"> RT </td> 
                                                            <td><input type="text" class="form-control" readonly value="{{$dt->RTOrtu}}" style="font-size: 10pt"> 

                                                            <td style="width: 80px;"> RW </td> 
                                                            <td><input type="text" class="form-control" readonly value="{{$dt->RWOrtu}}" style="font-size: 10pt"> 
                                                        </tr>
                                                        
                                                        <tr> 
                                                            <td style="width: 80px;"> Kota </td> 
                                                            <td><input type="text" class="form-control" readonly value="{{$dt->KotaOrtu}}" style="font-size: 10pt" > </td>

                                                            <td style="width: 80px;"> Kode Pos </td> 
                                                            <td><input type="text" class="form-control" readonly  value="{{$dt->KodePosOrtu}}" style="font-size: 10pt"></td> 

                                                        </tr> 

                                                            <td style="width: 80px;"> Propinsi</td> 
                                                            <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt->PropinsiOrtu}}" style="font-size: 10pt"></td> 

                                                            <td style="width: 80px;"> Negara</td> 
                                                            <td><input type="text" class="form-control" readonly 
                                                            value="{{$dt->NegaraOrtu}}" style="font-size: 10pt"></td> 
                                                        </tr> 
                                                    </thead>       
                                                </table>


                                                <h6>Kontak</h6>
                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                          <td style="width: 80px;"> Telephone </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->TeleponOrtu}}" style="font-size: 10pt"> </td> 
                                                        </tr>

                                                        <tr>
                                                          <td style="width: 80px;"> Handphone </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->HandphoneOrtu}}" style="font-size: 10pt"> 
                                                        </tr>
                                                        
                                                        <tr> 
                                                          <td style="width: 80px;"> Email </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->EmailOrtu}}" style="font-size: 10pt"> </td>
                                                        </tr> 

                                                    </thead>       
                                                </table>   

                                                </div>
                                            </div>
                                            <div id="alamat_tetap" class="tab-pane fade">
                                                <div class="my-post-content pt-3">
                                                <h6>Alamat Menetap Sesuai KTP</h6>
                                                <table class="table table-bordered table-striped table-hover"> 
                                                    <thead>
                                                        <tr>
                                                          <td style=""> Alamat </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->AlamatAsal}}"  style="font-size: 10pt"> </td> 
                                                        </tr>
                                                        
                                                        <tr> 
                                                          <td> Agama </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->KotaAsal}}"  style="font-size: 10pt"> </td>
                                                        </tr> 

                                                        <tr> 
                                                        <td> RT / RW </td> 
                                                             <td><input type="text" class="form-control" readonly  value="{{$dt->RTAsal}} / {{$dt->RWAsal}}"  style="font-size: 10pt"></td> 
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td> Kota</td> 
                                                             <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt->KotaAsal}}"  style="font-size: 10pt"></td> 
                                                        </tr>

                                                        <tr>
                                                        <td> Kode Pos</td> 
                                                             <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt->KodePosAsal}}"  style="font-size: 10pt"></td> 
                                                        </tr>

                                                        <tr>
                                                        <td> Propinsi</td> 
                                                             <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt->PropinsiAsal}}"  style="font-size: 10pt"></td> 
                                                        </tr>

                                                        <tr>
                                                        <td> Negara</td> 
                                                             <td><input type="text" class="form-control" readonly 
                                                             value="{{$dt->NegaraAsal}}"  style="font-size: 10pt"></td> 
                                                        </tr>

                                                    </thead>       
                                                </table>                      
                                           
                                                </div>
                                            </div>

                                            <div id="akademik" class="tab-pane fade">
                                                <div class="my-post-content pt-3">
                                                
                                                <h6>Data Akademik Mahasiswa</h6>
                                                <table class="table "> 
                                                    <thead>

                                                        <tr> 
                                                          <td style="width: 80px;"> Program </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->ProgramID}}" style="font-size: 10pt"> </td>

                                                          <td style="width: 80px;"> Program Studi</td> 
                                                             <td><input type="text" class="form-control" readonly  value="{{$dt->Prodi_Baru}}" style="font-size: 10pt"></td> 
                                                        </tr> 
                                                        
                                                        <tr>
                                                            <td style="width: 80px;"> Status Awal </td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt->StatusAwal_Baru}}" style="font-size: 10pt"></td>
                                                                
                                                            <td style="width: 80px;"> Status Mahasiswa</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt->StatusMhsw_Baru}}" style="font-size: 10pt"></td>   
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 80px;"> Tahun Masuk</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt->PMBPeriodID}}" style="font-size: 10pt"></td>
                                                                
                                                            <td style="width: 80px;"> Batas Studi</td> 
                                                                 <td><input type="text" class="form-control" readonly 
                                                                 value="{{$dt->BatasStudi}}" style="font-size: 10pt"></td>   
                                                        </tr>
                                                    </thead>       
                                                </table>


                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                          <td style="width: 80px;"> Penasehat Akademik </td> 
                                                          <td><input type="text" class="form-control" readonly value="{{$dt->NamaPendamping_baru}}, {{$dt->GelarPendamping_Baru}}" style="font-size: 10pt"> </td> 
                                                        </tr>
                                                    </thead>       
                                                </table>
@endforeach      
                                                </div>
                                            </div>
                                            <div id="rubah_password" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <form metdod="post"  action="{{url('editpass')}}">
                                                         {{csrf_field()}}
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Password Baru</label>
                                                                    <input type="password" placeholder="4-10 karakter" class="form-control" name="pass1" maxlengtd="10" minlengtd="4">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Ketik Password Baru Sekali Lagi</label>
                                                                    <input type="password" placeholder="tuliskan password baru sekali lagi" class="form-control"name="pass2" maxlengtd="10" minlengtd="4">
                                                                </div>
                                                            </div>
                                                            
                                                            <button class="btn btn-primary" type="submit">Selesai</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div>



@endsection

