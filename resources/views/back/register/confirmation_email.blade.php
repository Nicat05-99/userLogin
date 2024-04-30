<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Qeydiyyat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/adminTemplate/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminTemplate/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminTemplate/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminTemplate/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/adminTemplate/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/adminTemplate/index2.html"><b>Qeydiyyat</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Yeni istifadəçi Yarat</p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <form action="{{route('user-create')}}" method="post">
        @csrf
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Confirmation - code" name="confirmation_code">
        
      </div>
      <div id="countdown">3:00</div>

      
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Confirm</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script>

    // Geri sayımın başlangıç süresi (3 dakika)
var remainingTime = 180; // 3 dakika = 180 saniye
var countdownElement = document.getElementById('countdown');

// Geri sayımı güncelleyen fonksiyon
function updateCountdown() {
    var minutes = Math.floor(remainingTime / 60);
    var seconds = remainingTime % 60;

    // Saniyeleri 2 haneli olarak göstermek için ön ek ekle
    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    // Geri sayımı göster
    countdownElement.textContent = minutes + ':' + seconds;

    // Zamanı azalt
    remainingTime--;

    // Geri sayım tamamlandığında durdur
    if (remainingTime < 0) {
        clearInterval(countdownInterval);
        countdownElement.textContent = 'Süre Doldu';
    }
}

// Geri sayımı her saniye güncelle
var countdownInterval = setInterval(updateCountdown, 1000);

// Sayfa yüklendiğinde geri sayımı başlat
updateCountdown();

</script>
<script src="/adminTemplate/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminTemplate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/adminTemplate/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
