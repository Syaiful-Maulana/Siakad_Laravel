@extends('main')

@section('title', 'admin')

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
    <div class="breadcrumb-item active"><a href="{{ url('kelas')}}">Admin</a></div>
    <div class="breadcrumb-item">Add</div>
  </div>
</div> 
@endsection
    
@section('content')
<div class="content mt-3">
    
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <strong >Tambah Data Admin</strong>
                <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ url('kelas')}}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('admin')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" autocomplete="off" class="form-control @error('name') is-invalid @enderror"value="{{ old('name') }}" autofocus>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" autocomplete="off" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" autocomplete="off" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autofocus>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
