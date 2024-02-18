<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>

<style>
    /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  width: 100%;
  background-image: url('assets/img/bg-perpus.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 430px;
  width: 100%;
  background-color: rgba(190, 186, 186, 0.8);
  backdrop-filter: blur(5px);
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}
.container .registration{
  display: none;
}
#check:checked ~ .registration{
  display: block;
}
#check:checked ~ .login{
  display: none;
}
#check{
  display: none;
}
.container .form{
  padding: 2rem;
}
.form header{
  font-size: 2rem;
  font-weight: 500;
  text-align: center;
  margin-bottom: 1.5rem;
}
 .form input{
   height: 60px;
   width: 100%;
   padding: 0 15px;
   font-size: 17px;
   margin-bottom: 1.3rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
 }
 .form input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  font-size: 16px;
  color: #009579;
  text-decoration: none;
}
.form a:hover{
  text-decoration: underline;
}
.form input.button{
  color: #fff;
  background: #009579;
  font-size: 1.2rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-top: 1.7rem;
  cursor: pointer;
  transition: 0.4s;
}
.form input.button:hover{
  background: #006653;
}
.signup{
  font-size: 17px;
  text-align: center;
}
.signup label{
  color: #009579;
  cursor: pointer;
}
.signup label:hover{
  text-decoration: underline;
}
</style>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">

      <header>Login</header>
      @if ($message = Session::get('loginError'))
      <div class="alert alert-danger mt-4" role="alert">
          {{$message}}
        </div>
      @endif

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
          {{ session('loginError') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <div class="logo d-flex justify-content-center mb-2">
        <img src="assets/img/Logo_SMK_Negeri_40_Jakarta.png" alt="" width="200">
      </div>

      <form action="/login" method="POST">
        @csrf
        <input type="email" class="form-control @error('email') is-invalid
        @enderror" name="email" placeholder="Masukan alamat email" value="{{ old('email') }}" required>
        @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
        <input type="password" name="password" placeholder="Masukan password" required  >
      
        <button class="w-100 btn btn-info">Login</button>
      </form>
      <div class="signup mt-3">
        <span class="signup">Belum memiliki akun?
         <a href="/register" for="check">Signup</a>
        </span>
      </div>
    </div>
    
</body>
</html>