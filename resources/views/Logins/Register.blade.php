<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Register')</title>

  @include('Templates.Head')
</head>

<body>
  <div id="app">
    <section class="section" style="margin-top: 200px">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form action="{{ route('simpanRegistrasi')}}" method="POST">
                    @csrf
                  <div class="row">
                  </div>

                  <div class="form-group">
                    <label for="name">Username</label>
                    <input id="name" type="name" autocomplete="off" class="form-control" name="name" placeholder="Username" >
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" autocomplete="off" class="form-control" name="email" placeholder="Email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Pasword</label>
                    <input id="password" type="password" autocomplete="off" class="form-control" name="password" placeholder="Password">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                    <div class="mt-5 text-center">
                        Sudah Memilik Akun? <a href="{{ route('login')}}">Silahkan Login</a>
                      </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Syaiful 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    @include('Templates.Script')
</body>
</html>
