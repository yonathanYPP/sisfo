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
              
               @foreach ($data2 as $dt2)
                <a href="{{url('krspaketid',$dt2->MKPaketID)}}"   style="color: #ffffff;font-size: 12px"  class="btn btn-success" >{{ $dt2-> Nama}}</a> 
               @endforeach

                           
              </div>
          </div>
        </div>
    </div>
</div>


<div class="row">
                    <div class="col-12">
                        <div class="card">
                                <form method="POST" enctype="multipart/form-data" action="{{url('krspaket_kelas')}}">
                                {{csrf_field()}}
             
                                <table class="table ">
                                <tr>
                                     <th> 
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Pilih Kelas</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <select class="form-control" name="pilih_kelas" id="pilih_kelas" onchange="pilihkelas()">
                                                    @foreach ($data10 as $dt)
                                                    <option>{{$dt->NamaKelas}}</option>
                                                    @endforeach  
                                                </select>
                                                <input type="hidden" name="MKPaketID" id="MKPaketID" value="{{$MKPaketID}}"> 
                                                <button type="submit" class="btn btn-success" style="float: right;">Cek</button>
                                             </div>
                                        </div>
                                    </th>
                                </tr>
                                </table>
                                </form>
                      
                      <form method="POST" enctype="multipart/form-data" action="{{url('krspaket_ambilkrs')}}">
                                {{csrf_field()}}
             
                    <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda Yakin ?');">Ambil KRS</button>
                               
                     <div class="card-body">
                                <div class="table-responsive">
                             
                                    <table id="example"  class="stripe row-border order-column nowrap" style="border: 1px solid #ddd; border-collapse: collapse;">
                                        <thead>
                                            <tr style="border-collapse: collapse; border-style: solid; border: 1px" >
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Pilih</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Kode</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Nama Mata Kuliah</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Jam</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Hari</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Ruang</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Dosen</td>
                                              <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">SKS</td>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($data9 as $dt)
                           
                                              <tr style="border-collapse: collapse; border: 1px solid black; ">
                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;"><input type="checkbox"  name="MKKode[]" value="{{$dt -> MKKode}}" checked="" id="checkAll"></td>

                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> MKKode}}</td>

                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> Nama}} <input type="checkbox"  name="Nama[]" value="{{$dt -> Nama}}" checked="">
                                                </td>

                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> JM}} - {{$dt -> JS}}
                                                <input type="checkbox"  name="JM[]" value="{{$dt -> JamMulai}}" checked=""></td>

                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> hari}}
                                                <input type="checkbox"  name="hari[]" value="{{$dt -> HariID}}" checked="">
                                                </td>
                                                
                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> RuangID}}</td>

                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px; ">{{$dt -> nama_dosen}}<input type="checkbox"  name="Login[]" value="{{$dt -> Login}}" checked="" ></td>

                                                <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> SKS}}<input type="checkbox"  name="SKS[]" value="{{$dt -> SKS}}" checked=""></td>

                                              </tr>
                                              @endforeach
                                        </tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>



      </div>
</div>


<script type="text/javascript">
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection

