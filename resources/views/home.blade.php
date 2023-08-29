<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SPMI - Universitas Fajar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

  <link rel="shortcut icon" type="image/x-icon" href="admin2/assets/img/favicon.png">

  <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <link rel="stylesheet" href="admin2/assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="admin2/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="admin2/assets/plugins/fontawesome/css/fontawesome.min.css">

  <link rel="stylesheet" href="admin2/assets/css/style.css">
  <!--[if lt IE 9]>
		<script src="admin2/assets/js/html5shiv.min.js"></script>
		<script src="admin2/assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <div class="main-wrapper">
    <div class="account-page">
      <div class="container">
        <div class="account-box" style="">
          <div class="account-wrapper">
            <div class="account-logo">
              <a href="/"><img src="admin2/unifa.png" style="width: 60px;" alt="SchoolAdmin"></a>
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
            </div>
            <form action="/login" method="post">
              @csrf
              <div class="form-group">
                <label>Login Sebagai </label>
                <select class="form-control select" name="jabatan" id="jabatan">
                  <option value="admin">Admin</option>
                  <option value="dosen">Auditee</option>
                  <option value="kaprodi">Kaprodi</option>
                </select>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input name="username" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" required>
              </div>
              <div class="form-group text-center custom-mt-form-group">
                <button class="btn btn-primary btn-block btn-sm account-btn" type="submit">Login</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="admin2/assets/js/jquery-3.6.0.min.js"></script>

  <script src="admin2/assets/js/bootstrap.bundle.min.js"></script>

  <script src="admin2/assets/js/jquery.slimscroll.js"></script>

  <script src="admin2/assets/js/app.js"></script>
</body>

</html>