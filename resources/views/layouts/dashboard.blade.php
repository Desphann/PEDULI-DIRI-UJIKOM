@extends('welcome')
@section('titlepage', 'Dashboard')
@section('dashboard')
@include('layouts.navbar')
<style>
  body{
    background-image:url(image/blueblack.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
</style>
<div class="container-xl">
    <div class="page-header d-print-none ">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            @yield('pageheader')
          </h2>
        </div>
      </div>
    </div>
    <div class="page=wrapper">
    <div class="page-body mt-0">
        @yield('body')
    </div>
</div>

@endsection