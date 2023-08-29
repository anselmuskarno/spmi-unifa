<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SPMI - Universitas Fajar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

  <link rel="shortcut icon" type="image/x-icon" href="admin2/unifa.png">

  <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <link rel="stylesheet" href="admin2/assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="admin2/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="admin2/assets/plugins/fontawesome/css/fontawesome.min.css">

  <link rel="stylesheet" href="admin2/assets/css/fullcalendar.min.css">

  <link rel="stylesheet" href="admin2/assets/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="admin2/assets/plugins/morris/morris.css">

  <link rel="stylesheet" href="admin2/assets/css/style.css">
  <!--[if lt IE 9]>
		<script src="admin2/assets/js/html5shiv.min.js"></script>
		<script src="admin2/assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>

  <div class="main-wrapper">

    <div class="header-outer">
      <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
          <img src="admin2/assets/img/sidebar/icon-21.png" alt="">
        </a>
        <ul class="nav float-left">
          <li>
            <div class="">
              <a href="javascript:void(0);" class="responsive-search">
                <i class="fa fa-search"></i>
              </a>
              <form action="#!" class="mt-2">
                <div class="alert" style="color: #5F8DB0;">SISTEM PENJAMINAN MUTU INTERNAL BESERTA EVALUASI</div>
              </form>
            </div>
          </li>
          <li>
            <a href="/dashboardKaprodi" class="mobile-logo d-md-block d-lg-none d-block"><img src="unifa.png" alt="" width="30" height="30"></a>
          </li>
        </ul>

        <ul class="nav user-menu float-right">
          <li class="nav-item dropdown has-arrow">
            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
              <span class="user-img"><img class="rounded-circle" src="admin2/assets/img/user-06.jpg" width="30" alt="Admin">
                <span class="status online"></span></span>
              <span> {{ session('username') }} - KAPRODI</span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/logout" onclick="return confirm('Apakah Anda yakin ingin meninggalkan halaman ini?')">Logout</a>
            </div>
          </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="/logout" onclick="return confirm('Apakah Anda yakin ingin meninggalkan halaman ini?')">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <div class="header-left">
            <a href="/dashboardKaprodi" class="logo">
              <img src="admin2/unifa.png" width="40" height="40" alt="">
              <span class="text-uppercase">SPMI</span>
            </a>
          </div>
          <ul class="sidebar-ul">
            <li class="menu-title">Menu</li>
            <li class="active">
              <a href="/dashboardKaprodi"><img src="admin2/assets/img/sidebar/icon-1.png" alt="icon"><span>Dashboard</span></a>
            </li>
            <li>
              <a href="/hasilKaprodi"><img src="admin2/assets/img/sidebar/icon-10.png" alt="icon">
                <span>Hasil</span></a>
            </li>
          </ul>
          </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
      <div class="content container-fluid">
        @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
        @endif
        <div class="page-header">
          <div class="row">
            <div class="col-md-6">
              <h3 class="page-title mb-0">Dashboard</h3>
            </div>
            <div class="col-md-6">
              <ul class="breadcrumb mb-0 p-0 float-right">
                <li class="breadcrumb-item"><a href="/dashboardKaprodi"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="breadcrumb-item"><span>Dashboard</span></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-12">
            <div class="dash-widget dash-widget5">
              <div class="dash-widget-info text-left d-inline-block">
                <span>Selamat datang! Jumlah data yang harus diisi</span>
                <h3> {{ $totalPertanyaan }} Nomor</h3>
              </div>
              <?php
              if ($totalHasil > 0) { ?>
                <a href="#!" class="btn btn-danger">Anda telah melakukan Audit</a>
              <?php } else  if ($totalData > 0) { ?>
                <a href="ujianKaprodi" class="btn btn-primary">Mulai Audit</a>
              <?php } else { ?>
                <a href="#!" class="btn btn-success">Tidak Ada Data yang Perlu Diaudit</a>
              <?php } ?>
              <span class="float-right"><img src="admin2/assets/img/dash/dash-2.png" width="80" alt=""></span>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>


  <script src="admin2/assets/js/jquery-3.6.0.min.js"></script>

  <script src="admin2/assets/js/bootstrap.bundle.min.js"></script>

  <script src="admin2/assets/js/jquery.slimscroll.js"></script>

  <script src="admin2/assets/js/select2.min.js"></script>
  <script src="admin2/assets/js/moment.min.js"></script>

  <script src="admin2/assets/js/fullcalendar.min.js"></script>
  <script src="admin2/assets/js/jquery.fullcalendar.js"></script>

  <script src="admin2/assets/plugins/morris/morris.min.js"></script>
  <script src="admin2/assets/plugins/raphael/raphael-min.js"></script>
  <script src="admin2/assets/js/apexcharts.js"></script>
  <script src="admin2/assets/js/chart-data.js"></script>

  <script src="admin2/assets/js/app.js"></script>
</body>

</html>