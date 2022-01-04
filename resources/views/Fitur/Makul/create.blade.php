@extends('main')

@section('title', 'Makul')

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
    <div class="breadcrumb-item active"><a href="{{ url('makul')}}">Makul</a></div>
    <div class="breadcrumb-item">Add</div>
  </div>
</div> 
@endsection
    
@section('content')
<div class="content mt-3">
    
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <strong >Tambah Data Mata Kuliah</strong>
                <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ url('makul')}}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('makul')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode Makul</label>
                                <input type="text" name="kdmakul" autocomplete="off" class="form-control @error('kdmakul') is-invalid @enderror" value="{{ old('kdmakul') }}" autofocus>
                                @error('kdmakul')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Makul</label>
                                <input type="text" name="nama_makul" autocomplete="off" class="form-control @error('nama_makul') is-invalid @enderror" value="{{ old('nama_makul') }}" autofocus>
                                @error('nama_makul')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="number" name="semester" autocomplete="off" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester') }}" autofocus>
                                @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <select name="dosens_id" autocomplete="off" class="form-control @error('dosens_id') is-invalid @enderror">
                                    <option>--Pilih--</option>
                                    @foreach ($dosens as $item)
                                    <option value="{{ $item->id}}"{{ old('dosens_id') == $item->id ? 'selected' : null }}>{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                @error('dosens_id')
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

