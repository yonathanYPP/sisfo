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

                <a  onclick="tambahKRS()" style="color: #ffffff;font-size: 12px"  class="btn btn-primary btn-block"> Pilih KRS</a> 

                              
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
                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;"><input type="checkbox"  name="MKKode[]" value="{{$dt -> MKKode}}" checked="" id="checkAll" class="MKKode"></td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> MKKode}}
                                      <input type="checkbox"  name="MKKode[]" value="{{$dt -> MKKode}}" checked="" id="MKKode">
                                    </td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> Nama}} <input type="checkbox"  name="Nama[]" value="{{$dt -> Nama}}" checked=""  id="Nama" class="Nama"> 
                                    </td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> JM}} - {{$dt -> JS}}
                                    <input type="checkbox"  name="JM[]" value="{{$dt -> JamMulai}}" checked=""  id="JM"  class="JM"></td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> hari}}
                                    <input type="checkbox"  name="hari[]" value="{{$dt -> HariID}}" checked="" class="hari">
                                    </td>
                                    
                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> RuangID}}</td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px; ">{{$dt -> nama_dosen}}<input type="checkbox"  name="Login[]" value="{{$dt -> Login}}" checked="" id="Login"  class="Login"></td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> SKS}}<input type="checkbox"  name="SKS[]" value="{{$dt -> SKS}}" checked="" id="SKS"  class="SKS"></td>

                                  </tr>
                                  @endforeach
                            </tbody>
                        </table>
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
                  <table id="examplev2"  class="stripe row-border order-column nowrap" style="border: 1px solid #ddd;">
                            <thead>
                                <tr>
                                  <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Kode</td>
                                  <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Nama Mata Kuliah</td>
                                  <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Dosen</td>
                                  <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">SKS</td>
                                  <td style="border: 1px solid black; text-align: center; background-color: green; color: white; font-weight: bold;font-size: 12px;">Hapus</td>
                                
                                </tr>
                            </thead>
                            <tbody id="tabelnya">
                        
               
                                 @foreach ($detail as $dt)
               
                                  <tr style="border-collapse: collapse; border: 1px solid black;">
                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> MKKode}}</td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> Nama}} 
                                    </td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px; ">{{$dt -> Login}}</td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;">{{$dt -> SKS}}</td>

                                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;"><button class='fa fa-trash btn btn-danger' onclick="deleteKRS('{{$dt->MKKode}}')"></button>
                                    </td>
                                  </tr>

                                  @endforeach

         
                            </tbody>
                        </table>
                 </div>
          </div>
        </div>
    </div>
</div>

      </div>
</div>


<script type="text/javascript">
    function tambahKRS() {

/*
    for (var i =0; i < aa; i++) 
    {
        i= checked;
    } */


   /* var MKKode = document.getElementById('MKKode').checked = true;
    var Nama = document.getElementById('Nama').checked = true;
    var JM = document.getElementById('JM').checked = true;
    var Login = document.getElementById('Login').checked = true;
    var SKS = document.getElementById('SKS').checked = true;*/

    var MKKode = document.querySelector('.MKKode:checked').value;
    var Nama = document.querySelector('.Nama:checked').value;
    var JM = document.querySelector('.JM:checked').value;
    var Login = document.querySelector('.Login:checked').value;
    var SKS = document.querySelector('.SKS:checked').value;
    var hari = document.querySelector('.hari:checked').value;

     

        $.ajax({
            method: "POST",
            url: "{{ url('ajax/tambahKRS') }}",
            data: {
                MKKode: MKKode,
                Nama: Nama,
                JM: JM,
                Login: Login,
                SKS: SKS,
                hari: hari,
                _token: $('meta[name="csrf-token"]').attr('content')
            },

            dataType: "json",

            beforeSend: function () {
                console.log(this.data);
            },
            success: function (data) {
/*
              var x = data.length;
              alert(x);*/


            $('#tabelnya').find('tr').remove().end();
                for (var i = 0; i < data.length; i++) {
                   $("#tabelnya").append("<tr style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data[i].MKKode + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data[i].Nama + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data[i].Login + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data[i].SKS + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'><button class='fa fa-trash btn btn-danger' onclick=deleteKRS('"+data[i].MKKode+"')></button></td></tr>");

                  }
            },
           error: function (data) {
            console.log('Error:', data);
        }
    });
    }


</script>

<script type="text/javascript">
    function deleteKRS(MKKode) {
        var MKKode = MKKode;

        var _token =$('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'DELETE',
            url: "mahasiswa_krs/" + MKKode,
            dataType: "json",
            data: {MKKode : MKKode, _token: _token},
            success: function (data) {                        
                $('#tabelnya').find('tr').remove().end();
                for (var i = 0; i < data['detail'].length; i++) {
                    $("#tabelnya").append("<tr style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data['detail'][i].MKKode + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data['detail'][i].Nama + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data['detail'][i].Login + "</td> <td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'>" + data['detail'][i].SKS + "</td><td style='border-collapse: collapse; border: 1px solid black; text-align: center; font-size: 12px;'><button class='fa fa-trash btn btn-danger' onclick=deleteKRS('"+data['detail'][i].MKKode+"')></button></td></tr>");
                    
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        
    }
</script>

@endsection

