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
                            <form method="POST" enctype="multipart/form-data" action="{{url('mahasiswa_khs_sort')}}" name="pilih_tahun">
                                {{csrf_field()}}
                                 @php
                                    $nos=1; 
                                @endphp
                                <table class="table ">
                                <tr>
                                     <th> 
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Pilih Semester</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <select class="form-control" name="pilih_tahun">
                                                    <option value="*"> Semua </option>
                                                     @foreach ($data2 as $dt)
                                                    <option value="{{$dt -> TahunID}}"> Semester {{$nos++}} </option>
                                                    @endforeach
                                                </select> 
                                                
                                                <button type="submit" class="btn btn-warning pull-right">Cari</button>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                </table>
                                </form>
                                @foreach ($data4 as $dt)
                                    <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                          <td style="width: 80px;">Nama</td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt -> nama}}" style="font-size: 10pt;width: 250px;"> </td> 
                                           <td style="width: 80px;"> Penasehat Akademik </td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt->NamaPendamping_baru}}, {{$dt->GelarPendamping_Baru}}" style="font-size: 10pt;width: 250px;"> </td> 
                                          <td style="width: 80px;">Status</td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt->StatusMhsw_Baru}}" style="font-size: 10pt;width: 100px;"> </td> 
                                        </tr>

                                        <tr>
                                         
                                          @foreach ($data5 as $dt)
                                          <td style="width: 80px;">Sesi</td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt->Total_Sesi}}" style="font-size: 10pt;width: 250px;"> </td> 
                                          <td style="width: 80px;"> Total SKS </td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt->Total_SKS}}" style="font-size: 10pt;width: 250px;"> </td> 
                                          <td style="width: 80px;"> IPS / IPK </td> 
                                          <td><input type="text" class="form-control" readonly value="{{$dt->Total_IP}}"style="font-size: 10pt;width: 100px;"> </td> 
                                          @endforeach
                                        </tr>
                                    </thead>  
                                </table>
                                @endforeach
                            </form> 
                        </div>
                    </div>   
                </div>
                </div>  

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                <form method="POST" enctype="multipart/form-data" action="{{url('khs_cetak')}}" name="pilih_tahun">
                                {{csrf_field()}}
                                 @php
                                    $nos=1; 
                                @endphp
                                <table class="table ">
                                <tr>
                                     <th> 
                                        <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                            <label>Pilih Semester</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <select class="form-control" name="pilih_tahun">
                                                    <option value="*"> Semua </option>
                                                     @foreach ($data2 as $dt)
                                                    <option value="{{$dt -> TahunID}}"> Semester {{$nos++}} </option>
                                                    @endforeach
                                                </select> 
                                                
                                                <button type="submit" class="btn btn-success" style="float: right;">Cetak</button>                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                </table>
                                </form>
                     <div class="card-body">
                                <div class="table-responsive">
                             
                                    <table id="example" style="border: 1px solid #ddd; border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Matakuliah</th>
                                                <th>SKS</th>
                                                <th>Nilai</th>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $no=1; 
                                        @endphp
                                        @foreach ($data as $dt) 

                                        
                                            <tr  style="border: 1px solid #ddd;">
                                                <td>{{$no++}}</td>
                                                <td>{{$dt->MKKode}}</td>
                                                <td>{{$dt->Nama}}</td>
                                                <td>{{$dt->SKS}}</td>
                                                <td>{{$dt->GradeNilai}}</td>
                                                <td>{{$dt->BobotNilai}}</td>
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

        
    </div>

@endsection

