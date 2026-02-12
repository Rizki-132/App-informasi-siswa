<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
     <link rel="icon" type="image/x-icon" href="assets/favicon_poltek.png" />

    <link rel="stylesheet" href="fonts2/icomoon/style.css">

    <link rel="stylesheet" href="css2/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css2/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css2/style.css">

    <title>Poltek-Register </title>
  </head>
  <body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('assets/img/politeknik.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Register <strong>Politeknik Mardira Indonesia</strong></h3>
            <p class="mb-4">Kampus Teknik Pertama Di Majalengka</p>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group first">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" value="{{ old('name') }}" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="your-email@gmail.com" id="email" name="email" value="{{ old('email') }}" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required>
              </div>

              <input type="submit" value="Register" class="btn btn-block btn-primary">
            </form>
            <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="js2/jquery-3.3.1.min.js"></script>
    <script src="js2/popper.min.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </body>
</html>
