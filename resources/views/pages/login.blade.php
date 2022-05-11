@extends('welcome')
@section('pagetitle', 'Login')
@section('dashboard')
<style>
  body{
    background-image:url(image/bluestrip.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
</style>
<div class="page page-center">
  <div class="container-tight py-4">
      <div class="text-center mb-4">
        <h1 style="font-size: 28pt">PEDULI DIRI</h1>
      </div>
      @include('layouts.alert')
      <div class="card">
        <div class="card-body p-0">
          <form method="POST" action="/postLogin">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="mb-3">
                <label for="email" class="form-label">NIK</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="Masukkan NIK" tabindex="1" required autofocus autocomplete="off">
                <input id="password" type="hidden" class="form-control" name="password" required autofocus>
              </div>
              <div class="mb-2">
                <label for="password" class="form-label">
                  Nama Lengkap
                </label>
                <div class="input-group input-group-flat">
                  <input id="name" type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="name" tabindex="2" autocomplete="off" required>
                </div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col">
                    <div class="form-footer mt-3">
                      <a href="/register" class="btn btn-primary w-100">Saya Pengguna Baru</a>
                       
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-footer mt-3">
                      <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

  
  <script>
    window.onload = function() {
        var src = document.getElementById("email"),
            dst = document.getElementById("password")
        src.addEventListener('input', function() {
            dst.value = src.value;
        })
    }
</script>

@endsection