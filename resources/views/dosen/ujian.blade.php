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

  <link rel="stylesheet" href="admin2/assets/plugins/icons/feather/feather.css">

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
              <span> {{ session('username') }} - AUDITEE</span>
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
            <a href="/dashboardDosen" onclick="return confirm('Apakah Anda yakin ingin meninggalkan halaman ini? Jawaban Anda tidak akan disimpan!');" class="logo">
              <img src="admin2/unifa.png" width="40" height="40" alt="">
              <span class="text-uppercase">SPMI</span>
            </a>
          </div>
          <ul class="sidebar-ul">
            <li class="menu-title">Menu</li>
            <li class="">
              <a href="/dashboardDosen" onclick="return confirm('Apakah Anda yakin ingin meninggalkan halaman ini? Jawaban Anda tidak akan disimpan!');"><img src="admin2/assets/img/sidebar/icon-1.png" alt="icon"><span>Dashboard</span></a>
            </li>
            <li class="">
              <a href="/hasilDosen" onclick="return confirm('Apakah Anda yakin ingin meninggalkan halaman ini? Jawaban Anda tidak akan disimpan!');"><img src="admin2/assets/img/sidebar/icon-10.png" alt="icon">
                <span>Lihat Hasil</span></a>
            </li>
          </ul>

        </div>
      </div>
    </div>


    <div class="page-wrapper">
      <div class="content container-fluid">

        <div class="row">
          <div class="col-lg-12">
            <div class="card" id="printableArea">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-sm-12">
                    <div class="page-title">
                      <img src="admin2/assets/img/kopfajar.png" style="width: 90%;" alt="">
                    </div>
                    <table class="table text-center table-bordered bg-light">
                      <thead class="">
                        <tr>
                          <th>Audit</th>
                          <th colspan="2">Tipe Audit</th>
                          <th colspan="2">Standar yang Digunakan</th>
                        </tr>
                      </thead>
                      <form action="/tambahHasilDosen" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($informasi as $a)
                        <tbody>
                          <tr>
                            <td> {{ $a->audit }}</td>
                            <input type="hidden" name="audit" value="{{ $a->audit }}">
                            <td colspan="2">
                              {{ $a->tipe_audit }}
                              <input type="hidden" name="tipe_audit" value="{{ $a->tipe_audit }}">
                            </td>
                            <td colspan="2"> {{ $a->standar_yg_digunakan }}</td>
                            <input type="hidden" name="standar_yg_digunakan" value="{{ $a->standar_yg_digunakan }}">
                          </tr>
                        </tbody>

                        <thead class="">
                          <tr>
                            <th>Nama Program Studi</th>
                            <th colspan="2">Ruang Lingkup</th>
                            <th colspan="2">Tanggal Audit</th>
                          </tr>
                          <tr>
                            <td>{{ $a->nama_prodi }}</td>
                            <input type="hidden" name="nama_prodi" value="{{ $a->nama_prodi }}">
                            <td colspan="2">{{ $a->ruang_lingkup }}</td>
                            <input type="hidden" name="ruang_lingkup" value="{{ $a->ruang_lingkup }}">
                            <td colspan="2">{{ $a->tanggal_audit }}</td>
                            <input type="hidden" name="tanggal_audit" value="{{ $a->tanggal_audit }}">
                          </tr>
                          <tr>
                            <th colspan="2">Auditee</th>
                            <th colspan="3">Ketua Auditor</th>
                          </tr>
                          <tr>
                            <td colspan="2">{{ $a->auditee }}</td>
                            <input type="hidden" name="auditee" value="{{ $a->auditee }}">
                            <td colspan="3">{{ $a->ketua_audit }}</td>
                            <input type="hidden" name="ketua_audit" value="{{ $a->ketua_audit }}">
                          </tr>
                          <tr>
                            <td>Distribusi Dokumen **)</td>
                            <td>Auditee</td>
                            <td>Auditor</td>
                            <td>KPM</td>
                            <td>Arsip</td>
                          </tr>
                        </thead>
                        @endforeach
                    </table>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <div class="">
                  <div style="font-size: 9px; font-weight:bold" class="mb-2"> **) Ingkari sesuai dengan peruntukan dokumen</div>
                  <table class="table table-bordered text-center ">
                    <tbody class="thead-light">
                      <tr>
                        <td rowspan="2">No. </td>
                        <td rowspan="2"><b> Referensi </b> <br>
                          <i>(Diisi butir standar)</i>
                        </td>
                        <td rowspan="2"><b> Pertanyaan </b> <br>
                          <i>(Diisi sesuai dengan butir standar yang dinilai kurang memenuhi)</i>
                        </td>
                        <td colspan="2">Bukti</td>
                        <td rowspan="2">Evaluasi </td>

                      </tr>
                      <tr>
                        <td> <b>Ya/Tidak/Kurang</b> </td>
                        <td><b> Keterangan </b> <br>
                          <i>(Tuliskan bukti dokumen pendukung yang dibutuhkan)</i>
                        </td>
                      </tr>
                    </tbody>
                    <tbody class="text-left">
                      @foreach ($pertanyaan as $a)

                      <tr>
                        <td>
                          <h2> {{ $loop->iteration }} </h2>
                        </td>
                        <td> {{ $a->referensi }}</td>
                        <input required type="hidden" name="referensi{{ $loop->iteration }}" value="{{ $a->referensi }}">
                        <td>
                          {{ $a->pertanyaan }}
                          <input required type="hidden" name="pertanyaan{{ $loop->iteration }}" value="{{ $a->pertanyaan }}">
                        </td>
                        <td>
                          <select class="form-control" name="bukti{{ $loop->iteration }}">
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                            <option value="kurang">Kurang</option>
                          </select>
                          <!-- <input required type="text" class="form-control" placeholder="" name="bukti{{ $loop->iteration }}"> -->
                        </td>
                        <td>
                          <span class="badge bg-light">Keterangan</span>
                          <input required type="text" class="form-control" placeholder="" name="keterangan{{ $loop->iteration }}">
                          <br>
                          <span class="badge bg-light">Upload bukti pendukung</span>
                          <input type="file" class="form-control" name="file_bukti{{ $loop->iteration }}">
                        </td>
                        <td>
                          <textarea required name="evaluasi{{ $loop->iteration }}" class="form-control" id="" cols="30" rows="10"></textarea>
                          <!-- <input type="text" class="form-control" placeholder="" name="evaluasi"> -->
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
              <input type="hidden" name="pengirim" value=" {{ session('username') }}">
              <input type="hidden" name="jabatan" value="dosen">
              <!-- <input type="hidden" name="pertanyaan" value="-"> -->
              <input type="hidden" name="totalData" value=" {{ $totalPertanyaan }}">
              <button type="submit" class="mt-3 btn btn-success" onclick="return confirm('Pastikan semua pertanyaan sudah terisi semua!'); ">Kirim Hasil Audit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

  <script>
    function printPageArea(areaID) {
      var printContent = document.getElementById(areaID).innerHTML;
      var originalContent = document.body.innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = originalContent;
    }

    function kirim() {
      let text = "Pastikan Anda telah mengisi semua pertanyaan!";
      if (confirm(text) == true) {
        text = "y";
      } else {
        text = "t";
      }
      if (text == "y") {
        printPageArea('printableArea');
      }
    }
  </script>

</body>

</html>