@extends('main')

@section('title', 'Visi Misi')

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
  <h1>Visi Misi Progdi Teknik Informatika</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Visi Misi</div>
  </div>
</div> 
@endsection
    
@section('content')
<div class="section-body">
  <h2 class="section-title">Visi & Misi</h2>
  <p class="section-lead">
    Green Campus Universitas Muria Kudus
  </p>

  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Visi</h4>
        </div>
        <div class="card-body">
          Kampus Hijau Universitas Muria Kudus Pengembang Kehidupan Harmoni
        </div>
      </div>

    </div>
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Misi</h4>
        </div>
        <div class="card-body">
          <p>1. Harmoni Pendidikan</p>
          <p>2. Harmoni Penelitian</p>
          <p>3. Harmoni Pengabdian</p>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
