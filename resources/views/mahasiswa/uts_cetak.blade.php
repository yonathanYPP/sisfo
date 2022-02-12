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

            <th width="80" rowspan="4" ><img src="{{asset('assets/images/logounisma.png')}}"   style="height:80px; width:80px;"></th>
            <th width="324" height="25"  style="font-weight: bold; font-size: 20px">Universitas Islam Malang</th>
            <th width="99"></th>
          </tr>
          <tr>
            <th height="13"  style="font-style:  italic; font-size: 10px; font-weight: 1px">JL. MT. HARYONO 193 MALANG</th>
            <th></th>
          </tr>
          <tr>
            <th height="19" style="font-size: 12px; border-bottom: 3px solid black;" >Telp. 0341-551932, Fax. (0341)552249, Website:www.unisma.ac.id, Email:pmb@unisma.ac.id</th>
            <th rowspan="2"><img src="{{asset('assets/images/' .$foto)}}"  width="15%"></th>
          </tr>
          <tr>
            <th height="19" style="font-size: 20px;" >Kartu Ujian Tenggah Semester</th>
            <th width="0"></th>
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
<table width="523"  style="border: 1px solid black;" border="1px">
    <tbody>
      <thead >
        <tr >
            <th width="" style="text-align:center;font-size:12px; ">Tanggal</th>
            <th width="" style="text-align:center;font-size:12px; ">Mata Kuliah</th>
            <th width="" style="text-align:center;font-size:12px; ">Dosen Pengajar</th>
            <th width="" style="text-align:center;font-size:12px; ">Jam</th>
            <th width="" style="text-align:center;font-size:12px; ">Ruang</th>
            <th width="" style="text-align:center;font-size:12px; ">Cek List</th>
        </tr>
        </thead>
      
       

      @foreach ($data as $dt)
      <tr style="border-bottom: 1px black;" >
            <td style="text-align:center;font-size:12px; ">{{$dt->nama_hari}} <br>
            <span style="font-size: 12px;">({{$dt->UTSTanggal}})</span></td>
            <td style="text-align:center;font-size:12px; ">{{$dt->Nama}} 
            <br><span style="font-size: 12px;">({{$dt->MKKode}})</span></td></td>
            <td style="text-align:center;font-size:12px; ">{{$dt->nama_dosen}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->UTSJamMulai}}</td>
            <td style="text-align:center;font-size:12px; ">{{$dt->UTSRuangID}}</td>
            <td style="text-align:center;font-size:12px; "></td>
      </tr>
      @endforeach
      <tr>
      	<td colspan="7"><p style="text-align:center; font-weight:bold">KARTU UTS INI HARUS DITUNJUKKAN KEPADA PENGAWAS PADA SAAT UJIAN</p></td>
      </tr>
      
    </tbody>
  </table>
  <br>
  <table width="524" >
    <tbody>
   	<thead >
       @foreach ($data7 as $dt)
        <tr >
            <th width="254" style="text-align:center;font-size:12px; font-weight: normal; ">Malang, {{$dt->tanggal}} </th>
   	  </tr>
        <tr >
            <th width="256" height="21" style="text-align:center;font-size:12px; font-weight: normal; ">Mengetahui, Kepala BAAK</th>
      </tr>
        <tr >
            <th width="256" height="63" style="text-align:center;font-size:12px; ">INI GAMBAR TTD</th>
   	  </tr>
        <tr >
            <th width="256" style="text-align:center;font-size:12px; font-weight:bold; ">{{$data8}}</th>
            <th width="251" style="text-align:center;font-size:12px;font-weight: normal; "></th>
      	</tr>
    </tbody>
     @endforeach  
  </table>

</body>

</html>