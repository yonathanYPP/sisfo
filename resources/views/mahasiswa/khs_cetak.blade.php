<html>

<head>
<style>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</style>
</head>

<body>
<div class="container">
  <table width="523" >
  <tbody >
          <tr class="row-12">
            <th width="13" rowspan="4"></th>
            <th width="80" rowspan="4" ><img src="{{asset('assets/images/logounisma.png')}}"   style="height:80px; width:80px;"></th>
            <th width="402" height="25"  style="font-weight: bold; font-size: 20px">Universitas Islam Malang</th>
            <th width="10"></th>
          </tr>
          <tr>
            <th height="13"  style="font-style:  italic; font-size: 10px; font-weight: 1px">JL. MT. HARYONO 193 MALANG</th>
            <th></th>
          </tr>
          <tr>
            <th height="19" style="font-size: 12px; border-bottom: 3px solid black;" >Telp. 0341-551932, Fax. (0341)552249, Website:www.unisma.ac.id, Email:pmb@unisma.ac.id</th>
            <th></th>
          </tr>
          <tr>
            <th height="19" style="font-size: 20px;" >Laporan Hasil Studi Mahasiswa</th>
            <th></th>
          </tr>
        </tbody>
  </table>
  <br>    
</div>
<div class="container">
     @foreach ($data4 as $dt)
  <table width="523" >
    <tbody >
      <tr >
        <th width="62" style="text-align:left; font-size:12px">Nama</th>
        <th width="10">=</th>
        <th width="181" style="text-align:left; font-size:12px">{{$dt -> nama}}</th>
        <th width="98" style="text-align:left;font-size:12px">Tahun Akademik</th>
        <th width="10">=</th>
        <th width="134" style="text-align:left;font-size:12px">{{$dt -> tahun_akademik}}</th>
      </tr>
      <tr >
        <th width="62" style="text-align:left;font-size:12px">NPM</th>
        <th width="10">=</th>
        <th width="181" style="text-align:left;font-size:12px">{{$dt -> MhswID}}</th>
        <th width="98" style="text-align:left;font-size:12px">Fakultas</th>
        <th width="10">=</th>
        <th width="134" style="text-align:left;font-size:12px">{{$dt -> Fakultas_Baru}}</th>
      </tr>
      <tr >
        <th width="62" style="text-align:left;font-size:12px">Semester</th>
        <th width="10">=</th>
        <th width="181" style="text-align:left;font-size:12px">{{$dt ->Semester}}</th>
        <th width="98" style="text-align:left;font-size:12px">Program Studi</th>
        <th width="10">=</th>
        <th width="134" style="text-align:left;font-size:12px">{{$dt -> Prodi_Baru}}</th>
      </tr>
    </tbody>
  </table>
   @endforeach
  </div>
  <br>
  <div>
  <table width="523"  style="border: 1px solid black;" border="1px">
    <tbody>
    	<thead >
        <tr >
            <th width="" style="text-align:center;font-size:12px; ">No</th>
            <th width="" style="text-align:center;font-size:12px; ">Kode</th>
            <th width="" style="text-align:center;font-size:12px; ">Mata Kuliah</th>
            <th width="" style="text-align:center;font-size:12px; ">SKS</th>
            <th width="" style="text-align:center;font-size:12px; ">Nilai</th>
            <th width="" style="text-align:center;font-size:12px; ">Bobot</th>
            <th width="" style="text-align:center;font-size:12px; ">B*K</th>
      	</tr>
        </thead>
      
       
        @php
          $no=1;
       @endphp 
      @foreach ($data as $dt)
      <tr style="border-bottom: 1px black;" >
            <td style="text-align:center;font-size:12px; ">{{$no++}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->MKKode}}</td>
            <td style="text-align:left;font-size:12px; ">{{$dt->Nama}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->SKS}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->GradeNilai}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->BobotNilai}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->BobotNilai * $dt->SKS}}</td>
      </tr>
      @endforeach  
      @foreach ($data6 as $dt)
      <tr style="border-bottom: 1px black;" >
            <td style="text-align:center;font-size:12px;" colspan="3">Jumlah</td>
            <td style="text-align:center;font-size:12px; ">{{$dt ->total_sks}}</td>
            <td></td>
            <td style="text-align:center;font-size:12px;">{{$ip_baru}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt ->totalBX}}</td>
      </tr>
      @endforeach  
    </tbody>
  </table>
  
  @foreach ($data5 as $dt)
  <a>Index Prestasi<span> = </span><span> {{$ip_baru}} </span></a><br>
  <a>SKS Maks yg dpt diambil<span> = </span> <span> {{$dt ->maxSKS}} </span></a>
  @endforeach
<br>
<br>
<br>
<table width="524" >
    <tbody>
   	<thead >
       @foreach ($data7 as $dt)
        <tr >
            <th width="254" style="text-align:center;font-size:12px; ">{{$dt->JabatanTTD}}</th>
             <th width="254" style="text-align:center;font-size:12px; ">Malang, {{$dt->tanggal}} </th>
   
   	  </tr>
        <tr >
            <th width="256" height="63" style="text-align:center;font-size:12px; ">&nbsp;</th>
             <th width="251" style="text-align:center;font-size:12px; ">&nbsp;</th>
   
   	  </tr>
        <tr >
            <th width="256" style="text-align:center;font-size:12px; font-weight: normal; ">{{$dt->PejabatTTD}}</th>
             <th width="251" style="text-align:center;font-size:12px;font-weight: normal; ">{{$dt->NamaPendamping_baru}},{{$dt->GelarPendamping_Baru}}</th>
   
      	</tr>
 
    </tbody>
     @endforeach  
  </table>
  <br>
  <br>
<a style="font-weight:bold; font-style:italic; text-decoration:underline">Keterangan :</a><br>
( - ) Nilai Matakuliah belum masuk dari jurusan/dosen <br>
( BL ) Nilai belum lengkap

</div>
 

</body>

</html>