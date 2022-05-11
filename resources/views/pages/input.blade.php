@extends('layouts.dashboard')

@section('pagetitle', 'Input Data Perjalanan') 

@section('pageheader', 'Input Data Perjalanan')

@section('body')
    <div class="page-body">
      @include('layouts.alert')
      <div class="container-xl-14">
        <div class="card">
          <div class="card-body p-0">
            <div class="row row-cards">
              <div class="col-12">
                <form method="POST" action="/simpanInput">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-12">
                        <div class="row">
                          <div class="col-md-12 col-xl-12 mb-12">
                            <div class="mb-3">
                              <label class="form-label">Tanggal</label>
                              <input type="date" class="form-control" name="tanggal" placeholder="Input placeholder" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Jam</label>
                              <input type="time" class="form-control" name="jam" placeholder="Input placeholder" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi yang dikunjungi</label>
                                <input class="form-control"  name="lokasi"  autocomplete="off" required/>   
                            </div>  
                            <div class="mb-3">
                                <label class="form-label">Suhu Tubuh</label>
                                <input type="float" class="form-control" name="suhu" autocomplete="off" required>
                            </div>
                            <div class="form-footer">
                                <div class="d-flex">
                                  <a href="/input" class="btn btn-link">Kosongkan</a>
                                  <button type="submit" class="btn btn-primary ms-auto" >Simpan</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection