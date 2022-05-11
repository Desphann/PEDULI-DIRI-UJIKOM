<div class="page">
    <header class="navbar navbar-expand-md navbar-light d-print-none " >
      <div class="container-xl">
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3" style="font-family: 'Snell Roundhand', cursive" >
          PEDULI DIRI
        </h1>
        <ul class="navbar-nav flex-row order-md-last">
          <li class="nav-item">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <desc>Download more icon variants from https://tabler-icons.io/i/mood-smile</desc>
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <circle cx="12" cy="12" r="9"></circle>
                  <line x1="9" y1="10" x2="9.01" y2="10"></line>
                  <line x1="15" y1="10" x2="15.01" y2="10"></line>
                  <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
               </svg>
              </span>
              <div class="d-none d-xl-block ps-2">
                <div>@if (!empty(auth()->user()->name))
                  Hi, {{ auth()->user()->name }}
                  @else
                  Hi, User
                  @endif</div>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/logout"  data-bs-auto-close="outside" role="button" aria-expanded="false" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-exit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <desc>Download more icon variants from https://tabler-icons.io/i/door-exit</desc>
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M13 12v.01"></path>
                  <path d="M3 21h18"></path>
                  <path d="M5 21v-16a2 2 0 0 1 2 -2h7.5m2.5 10.5v7.5"></path>
                  <path d="M14 7h7m-3 -3l3 3l-3 3"></path>
               </svg>
              </span>
              <span class="nav-link-title">
                Logout
              </span>
            </a>
          </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
          @auth
            <ul class="navbar-nav">
            <li class="nav-item @if(Request::segment(1)=='dashboard') active @endif">
              <a class="nav-link" href="/" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  Home
                </span>
              </a>
            </li>
            <li class="nav-item @if(Request::segment(1)=='table' || Request::segment(1)=='cari') active @endif">
              <a class="nav-link" href="/table">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <desc>Download more icon variants from https://tabler-icons.io/i/clipboard-list</desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                    <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                    <line x1="9" y1="12" x2="9.01" y2="12"></line>
                    <line x1="13" y1="12" x2="15" y2="12"></line>
                    <line x1="9" y1="16" x2="9.01" y2="16"></line>
                    <line x1="13" y1="16" x2="15" y2="16"></line>
                 </svg>
                </span>
                <span class="nav-link-title">
                  Catatan Perjalanan
                </span>
              </a>
            </li>
            <li class="nav-item @if(Request::segment(1)=='input') active @endif">
              <a class="nav-link" href="/input" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <desc>Download more icon variants from https://tabler-icons.io/i/edit</desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                    <path d="M16 5l3 3"></path>
                 </svg>
                </span>
                <span class="nav-link-title">
                  Isi Data
                </span>
              </a>
            </li>
          </ul>
          @else
          <ul class="navbar-nav">
            <li class="nav-item @if(Request::segment(1)=='dashboard') active @endif">
              <a class="nav-link" href="/" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  DASHBOARD
                </span>
              </a>
            </li>
            <li class="nav-item @if(Request::segment(1)=='register') active @endif">
              <a class="nav-link" href="/table">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <desc>Download more icon variants from https://tabler-icons.io/i/door-enter</desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M13 12v.01"></path>
                    <path d="M3 21h18"></path>
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h6m4 10.5v7.5"></path>
                    <path d="M21 7h-7m3 -3l-3 3l3 3"></path>
                 </svg>
                </span>
                <span class="nav-link-title">
                  Register
                </span>
              </a>
            </li>
            <li class="nav-item @if(Request::segment(1)=='') active @endif">
              <a class="nav-link" href="/input" >
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <desc>Download more icon variants from https://tabler-icons.io/i/door-enter</desc>
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M13 12v.01"></path>
                  <path d="M3 21h18"></path>
                  <path d="M5 21v-16a2 2 0 0 1 2 -2h6m4 10.5v7.5"></path>
                  <path d="M21 7h-7m3 -3l-3 3l3 3"></path>
               </svg>
                <span class="nav-link-title">
                  Login
                </span>
              </a>
            </li>
          @endauth 
          </div>
        </div>
      </div>
    </header>