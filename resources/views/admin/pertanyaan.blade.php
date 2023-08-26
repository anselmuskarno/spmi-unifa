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
            <a href="/dashboardAdmin" class="mobile-logo d-md-block d-lg-none d-block"><img src="unifa.png" alt="" width="30" height="30"></a>
          </li>
        </ul>

        <ul class="nav user-menu float-right">
          <li class="nav-item dropdown has-arrow">
            <a href="#" class=" nav-link user-link" data-toggle="dropdown">
              <span class="user-img"><img class="rounded-circle" src="admin2/assets/img/user-06.jpg" width="30" alt="Admin">
                <span class="status online"></span></span>
              <span> {{ session('username') }}</span>
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
            <a href="/dashboardAdmin" class="logo">
              <img src="admin2/unifa.png" width="40" height="40" alt="">
              <span class="text-uppercase">SPMI</span>
            </a>
          </div>
          <ul class="sidebar-ul">
            <li class="menu-title">Menu</li>
            <li class="">
              <a href="/dashboardAdmin"><img src="admin2/assets/img/sidebar/icon-1.png" alt="icon"><span>Dashboard</span></a>
            </li>
            <li>
              <a href="/userAdmin"><img src="admin2/assets/img/sidebar/icon-10.png" alt="icon">
                <span>User</span></a>
            </li>
            <li class="active">
              <a href="/pertanyaanAdmin"><img src="admin2/assets/img/sidebar/icon-7.png" alt="icon"> <span>Pertanyaan</span></a>
            </li>
            <li>
              <a href="/informasiAdmin"><img src="admin2/assets/img/sidebar/icon-8.png" alt="icon">
                <span>Informasi</span></a>
            </li>
            <li>
              <a href="/hasilAdmin"><img src="admin2/assets/img/sidebar/icon-12.png" alt="icon">
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

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-sm-6">
                    <div class="page-title">
                      Daftar Pertanyaan (
                      @if ($totalPertanyaan == 0)
                      <div class="badge bg-danger text-white">
                        {{ ' Total : '. $totalPertanyaan}}
                      </div>
                      @else ()
                      <div class="badge bg-info text-white">
                        {{ ' Total : '. $totalPertanyaan}}
                      </div>
                      @endif
                      )
                    </div>
                  </div>
                  <div class="col-sm-6 text-sm-right">
                    <div class=" mt-sm-0 mt-2">
                      <button style="background-color: blue; color:white" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn mr-2"><i class="fe fe-file-plus"></i><span class="ml-2">Tambah Data</span></button>

                    </div>
                  </div>
                </div>
              </div>
              @if (session()->has('error'))
              <div class="alert alert-danger" role="alert">
                {{ session('error') }}
              </div>
              @endif
              @if (session()->has('berhasil'))
              <div class="alert alert-success" role="alert">
                {{ session('berhasil') }}
              </div>
              @endif

              <div class="card-body">
                <!-- <div class="table-responsive"> -->
                <table class="table custom-table" style="display: absolute; width:100%">
                  <thead class="thead-light">
                    <tr>
                      <th>No. </th>
                      <th>Referensi</th>
                      <th>Pertanyaan</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pertanyaan as $a)

                    <tr>
                      <td>
                        <h2> {{ $loop->iteration }} </h2>
                      </td>
                      <td> {{ $a->referensi }}</td>
                      <td> {{ $a->pertanyaan }}</td>
                      <td class="text-right d-flex">
                        <a href="#!" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{$a->id}}">
                          <i class="far fa-edit" data-bs-toggle="tooltip" title="Edit"></i>
                        </a>
                        <a href="/hapusPertanyaan/{{$a->id}}" onclick="return confirm('Apakah anda yakin data ini akan dihapus?');" type="submit" class="btn btn-danger btn-sm mb-1">
                          <i class="far fa-trash-alt" data-bs-toggle="tooltip" title="Hapus"></i>
                        </a>
                      </td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>

                <!-- Modal Tambah -->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/tambahPertanyaan" method="post" class="form-horizontal">
                          @csrf
                          <div class="form-group">
                            <div class="col-sm-12">
                              <input class="form-control" name="referensi" placeholder="Referensi" type="text">
                              <small class="text-danger"> <i>*Tidak boleh kosong</i> </small>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="">Pertanyaan</label>
                              <textarea name="pertanyaan" class="form-control" cols="30" rows="3"></textarea>
                              <small class="text-danger"> <i>*Tidak boleh kosong</i> </small>
                            </div>
                          </div>
                          <input type="hidden" name="bukti" value="">
                          <input type="hidden" name="keterangan" value="">
                          <input type="hidden" name="evaluasi" value="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal Edit -->
                @foreach ($pertanyaan as $a)
                <div class="modal fade" id="editModal{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/editPertanyaan/{{$a->id}}" method="post" class="form-horizontal">
                          @csrf
                          <div class="form-group">
                            <div class="col-sm-12">
                              <input class="form-control" name="referensi" placeholder="Referensi" value="{{$a->referensi}}" type="text">
                              <small class="text-danger"> <i>*Tidak boleh kosong</i> </small>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="">Pertanyaan</label>
                              <textarea name="pertanyaan" class="form-control" cols="30" rows="3">{{$a->pertanyaan}}</textarea>
                              <small class="text-danger"> <i>*Tidak boleh kosong</i> </small>
                            </div>
                          </div>
                          <input type="hidden" name="bukti" value="">
                          <input type="hidden" name="keterangan" value="">
                          <input type="hidden" name="evaluasi" value="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
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
</body>

</html>