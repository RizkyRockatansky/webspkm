<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SPKM Politeknik Negeri Indramayu</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{asset('isset')}}/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{asset('isset')}}/img/logo.png" sizes="96x96" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>

<script language='JavaScript'>
    var txt =
        "SISTEM PENGUKURAN KEPUASAN LAYANAN MAHASISWA POLITEKNIK NEGERI INDRAMAYU ";
    var speed = 300;
    var refresh = null;

    function action() {
        document.title = txt;
        txt = txt.substring(1, txt.length) + txt.charAt(0);
        refresh = setTimeout("action()", speed);
    }
    action();
    </script>
</head>

<body class="sb-nav-fixed">
    @include('layouts.header')
    <div id="layoutSidenav">
        @include('layouts.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('isset')}}/js/scripts.js"></script>
    <script src="{{asset('isset')}}/https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
        crossorigin="anonymous"></script>
    <script src="{{asset('isset')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{asset('isset')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('isset')}}/js/datatables-simple-demo.js"></script>
</body>

</html>