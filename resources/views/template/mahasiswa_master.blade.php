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

    <!-- Material color picker -->
    <link href="{{asset('assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

 
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

   <!-- select -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Datatable -->
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
   


   

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="{{asset('assets/images/logounisma.png')}}" alt="">
               <!--  <img class="logo-compact" src="{{asset('assets/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('assets/images/logo-text.png')}}" alt=""> -->
            </a>

            <div class="nav-control">
                <div class="hamburger" >
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first" style="color:#00FF00">Main Menu</li>
                     <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Mahasiswa</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('mahasiswa_index')}}">Data Diri</a></li>
                            <li><a href="{{url('mahasiswa_khs')}}">KHS</a></li>
                            <li><a href="{{url('mahasiswa_uts')}}">UTS</a></li>
                            <li><a href="{{url('mahasiswa_uas')}}">UAS</a></li>
                            <li><a href="{{url('mahasiswa_krspaket')}}">KRS PAKET</a></li>
                            <li><a href="{{url('mahasiswa_krs')}}">KRS</a></li>
                        </ul>
                    </li>

                    <li class="nav-label"style="color:#00FF00">Keluar</li>
                    <li><a  href="{{url('logout')}}" aria-expanded="false"><i class="icon icon-single-copy-06"></i><span class="nav-text">Keluar</span></a>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->


        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>SISFO193 UNISMA</p>

            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
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

    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
   
    <!-- Material color picker -->
    <script src="{{asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
 
    <!-- Material color picker init -->
    <script src="{{asset('assets/js/plugins-init/material-date-picker-init.js')}}"></script>


    <!-- Datatable -->
    <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function(){
          $('#pilihwarganegara').change(function(){
            var status = (($(this).val())==='WNA')?false:true;
            $("#datawna").prop("disabled",status);
        })
      })
    </script>

    <script type="text/javascript">
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
              return false;
            return true;
          }
    </script>



</body>
</html>