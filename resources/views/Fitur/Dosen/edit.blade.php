@extends('main')

@section('title', 'Dosen')

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
    <div class="breadcrumb-item active"><a href="{{ route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ url('dosen')}}">Dosen</a></div>
    <div class="breadcrumb-item">Edit</div>
  </div>
</div> 
@endsection
    
@section('content')
<div class="content mt-3">
    
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <strong >Edit Data Dosen</strong>
                
                <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ url('dosen')}}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('dosen/' .$dosens->id)}}" method="POST">
                          @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" name="name" autocomplete="off" class="form-control @error('name') is-invalid @enderror"value="{{ old('name', $dosens->name )}}" autofocus>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="mt-3">NIDN</label>
                                <input type="text" name="nidn" autocomplete="off" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn', $dosens->nidn )}}" autofocus>
                                @error('nidn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <label class="mt-3">Email</label>
                                <input type="text" name="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $dosens->email )}}" autofocus>
                                @error('email')
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

