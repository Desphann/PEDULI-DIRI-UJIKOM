@extends('welcome')
@section('pagetitle', 'Register')
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
      <h1 style="font-size: 28pt">Daftar Akun Baru</h1>
    </div>
    @include('layouts.alert')
    <div class="card col-auto">
      <div class="card-body p-0">
        <form method="POST" action="/berhasilRegister">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="mb-3">
              <label for="email" class="form-label">NIK</label>
              <input id="email" type="text" class="form-control" placeholder="Masukkan NIK" name="NIK" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Nama Lengkap</label>
              <input id="nama_lengkap" type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" autocomplete="off" required>
              <div class="invalid-feedback">
                please fill in your Nama Lengkap
              </div>
            </div>
            <div class="form-footer mb-3">
              <button type="submit" class="btn btn-primary w-100">Buat Akun Baru</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="text-center text-muted mt-4">
      Sudah Punya Akun ? <a href="/logout" tabindex="-1">Masuk </a>
    </div>
  </div>
</div>
@endsection