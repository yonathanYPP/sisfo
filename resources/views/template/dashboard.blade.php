<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   

</head>

<body>
    <div class="container-fluid" > 
   
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div style="background-color:green; height: 100px;">
                    
                    <div class="profile-photo">
                        <img src="{{asset('assets/images/logounisma.png')}}" class="img-fluid rounded-circle" style="height:100px; width:100px; margin-left: 10px; ">
                    </div>


                    </div>
                    <div style="background-color:#28b467; height: 30px;"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card" style="height:500px">
                    <div class="card-body text-center">
                        <div class="m-t-10">
                            <h4 class="card-title" style="background-color:red; height: 20px;" ></h4>
                            <h2 class="mt-3">MAHASISWA/I</h2>
                        </div>
                        
                        <div class="profile-photo">
                            <img src="{{asset('assets/images/logounisma.png')}}" class="img-fluid rounded-circle" style="height:200px; width:200px; margin-top: 30px; ">
                        </div>
                        <a class="btn btn-block btn-danger" href="{{url('mahasiswa_login')}}"  style="margin-top: 100px; color:white; opacity:0.7"> KLIK DISINI </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card" style="height:500px">
                    <div class="card-body text-center">
                        <div class="m-t-10">
                            <h4 class="card-title" style="background-color:orange; height: 20px;" ></h4>
                            <h2 class="mt-3">DOSEN</h2>
                        </div>
                        <div class="profile-photo">
                            <img src="{{asset('assets/images/logounisma.png')}}" class="img-fluid rounded-circle" style="height:200px; width:200px; margin-top: 30px; ">
                        </div>
                        <a class="btn btn-block btn-warning"  style="margin-top: 100px; color:white; opacity:0.7"> KLIK DISINI </a>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card" style="height:500px">
                    <div class="card-body text-center">
                        <div class="m-t-10">
                            <h4 class="card-title" style="background-color:blue; height: 20px;" ></h4>
                            <h2 class="mt-3">KARYAWAN</h2>
                        </div>
                        <div class="profile-photo">
                            <img src="{{asset('assets/images/logounisma.png')}}" class="img-fluid rounded-circle" style="height:200px; width:200px; margin-top: 30px; ">
                        </div>
                        <a class="btn btn-block btn-primary"  style="margin-top: 100px; color:white; opacity:0.7"> KLIK DISINI </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <div class="col-xl-12 col-lg-12 col-md-12">
            <div style="background-color:#28b467; height: 30px;"></div>
            <div style="background-color:green; height: 100px;"></div>
    </div>

    
    
</body>

    @include('sweetalert::alert')
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/js/quixnav-init.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{asset('assets/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{asset('assets/js/dashboard/dashboard-1.js')}}"></script>

</html>