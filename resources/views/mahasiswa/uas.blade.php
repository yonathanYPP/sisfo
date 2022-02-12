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
                             <center><h2>CETAK KARTU UAS</h2></center>
                            <br>
                                @foreach($data as $dt)
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <td style="width: 80px;">Nama</td> 
                                            <td><input type="text" class="form-control" readonly value="{{$dt -> nama}}" style="font-size: 10pt;"> </td> 
                                            <td style="width: 80px;"> Penasehat Akademik </td> 
                                            <td><input type="text" class="form-control" readonly value="{{$dt->NamaPendamping_baru}}, {{$dt->GelarPendamping_Baru}}" style="font-size: 10pt;"> </td> 
                                        </tr>
                                        
                                        <tr>
                                            <td style="width: 80px;">Semester</td> 
                                            <td><input type="text" class="form-control" readonly value="{{$dt -> semester}}" style="font-size: 10pt;"> </td> 
                                            <td style="width: 80px;"> Tanggal</td>
                                           
                                            <td><input type="text" class="form-control" readonly value="{{$TglUASMulai}} - {{$TglUASSelesai}}" style="font-size: 10pt;"> </td>
                                        
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
                            <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                             <a href="{{url('uas_cetak')}}"> <button type="submit" class="btn btn-success" style="float: right;">Cetak</button> </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                             
                                    <table id="example" style="border: 1px solid #ddd; border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Matkul</th>
                                                <th>Jadwal</th>
                                                <th>Ruang</th>
                                                <th>Dosen</th>
                                                <th>Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $no=1; 
                                        @endphp
                                        @foreach ($data2 as $dt) 

                                        
                                             <tr  style="border: 1px solid #ddd;">
                                                <td>{{$no++}}</td>
                                                <td>{{$dt->MKKode}}</td>
                                                <td>{{$dt->Nama}}</td>
                                                <td>{{$dt->nama_hari}} ({{$dt->UASTanggal}})</span></td>
                                                <td>{{$dt->UASRuangID}}</td>
                                                <td>{{$dt->nama_dosen}}</td>
                                                <td style="text-align: center;">{{$dt->presensi}}%</td>
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

