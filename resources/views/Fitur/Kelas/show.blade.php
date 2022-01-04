@extends('main')

@section('title', 'Kelas')

@section('search')
<form class="form-inline mr-auto">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> --}}
  </ul>
</form>
@endsection

@section('breadcrumb')
<div class="section-header">
  <h1>Teknik Informatika Universitas Muria Kudus</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ url('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ url('kelas')}}">Kelas</a></div>
    <div class="breadcrumb-item">Detail</div>
  </div>

</div> 

@endsection
    
@section('content')
<div class="section-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-body table-responsive">
          <strong >Data  Kelas</strong>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ url('kelas')}}" class="btn btn-secondary btn-sm">
                <i class="fas fa-undo"></i> Back
            </a>
        </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <table class="table table-bordered">
              <tbody>
                  <tr>
                      <th>Kelas</th>
                      <td>{{$kelas->namaKelas}}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%">Nama Makul</th>
                      <td>{{$kelas->makuls->nama_makul}}</td>
                  </tr>
                  <tr>
                      <th>Ruangan</th>
                      <td>{{$kelas->ruangan}}</td>
                  </tr>
                  <tr>
                      <th>Waktu</th>
                      <td>{{$kelas->waktu}}</td>
                  </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

