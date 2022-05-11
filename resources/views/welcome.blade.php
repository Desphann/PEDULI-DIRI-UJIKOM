<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>PEDULI DIRI - @yield('pagetitle')</title>
    @include('layouts.style')
    
  <body>
    <div class="page-wrapper">
      <div class="page-wrapper">
            @yield('dashboard')
        </div>
  </body>
  <footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
      <div class="row text-center align-items-center justify-content-center">
        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
          <ul class="list-inline list-inline-dots mb-0">
            <li class="list-inline-item">
              Copyright &copy; 2022 Peduli Diri All rights reserved.
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</html>