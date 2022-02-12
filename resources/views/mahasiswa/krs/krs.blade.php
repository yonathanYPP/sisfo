@extends ('template/mahasiswa_master')


@section ('content')
<body>
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="review-content-section">
                                @foreach ($data4 as $dt)
                                    <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                          <td style=>Nama</td> 
                                          <td colspan=""><input type="text" class="form-control" readonly value="{{$dt -> nama}}" style="font-size: 10pt;"> </td>
                                           <td style=>NPM</td> 
                                          <td colspan=""><input type="text" class="form-control" readonly value="{{$dt -> MhswID}}" style="font-size: 10pt;"> </td>  
                                          <td style="" colspan="1"> Penasehat Akademik </td> 
                                          <td colspan="1"><input type="text" class="form-control" readonly value="{{$dt->NamaPendamping_baru}}, {{$dt->GelarPendamping_Baru}}" style="font-size: 10pt;"> </td> 
             
                                        </tr>

                                        <tr>
                                         
                                          @foreach ($data5 as $dt2)
                                          <td style="">Semester</td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt2->Total_Sesi}}" style="font-size: 10pt;"> </td> 
                                           <td style=""> Batas SKS </td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt2->MaxSKS}}"style="font-size: 10pt;"> </td> 
                                          <td style="">Status</td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt->StatusMhsw_Baru}}" style="font-size: 10pt;"> </td> 
                                          @endforeach
                                        </tr>
                                        <tr>
                                          <td colspan="6"><button class="btn btn-block btn-info" style="text-align: center;" {{$statuskrs}}>Pengambilan/pengubahan KRS sedang ditutup. KRS tidak dapat diubah</button></td>
                                        </tr>
                                    </thead>  
                                </table>
                                @endforeach
                        </div>
                    </div>   
                </div>
            </div> 
  

<div class="row">
    <div class="col-12">
        <div class="card">                 
          <div class="card-body">
              <div class="table-responsive">

                <a href="{{url('krs_pilih')}}"   style="color: #ffffff;font-size: 12px"  class="btn btn-success btn-block"> Pilih KRS</a> 

                              
              </div>
          </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">                 
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-hover table-responsive-sm" style="border-collapse: collapse; border:1px solid black">
                    <thead style="">
                        <tr style="border-collapse: collapse; border-style: solid; border: 1px" >
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Kode</td>
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Nama Mata Kuliah</td>
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Jam</td>
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Hari</td>
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Ruang</td>
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Dosen</td>
                          <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">SKS</td>

                        </tr>
                        @foreach ($data8 as $dt)
                           
                        <tr style="border-collapse: collapse; border: 1px solid black; ">
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px; ">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>
                          <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">x</td>

                        </tr>
                        @endforeach      
                    </thead>  
                </table>
              
              </div>
          </div>
        </div>
    </div>
</div>




      </div>
</div>



@endsection

