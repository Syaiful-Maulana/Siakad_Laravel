@extends('main')

@section('title', 'Nilai')

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
    <div class="breadcrumb-item active"><a href="{{ url('nilai')}}">Nilai</a></div>
    <div class="breadcrumb-item">Add</div>
  </div>
</div> 
@endsection
    
@section('content')
<div class="content mt-3">
    
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <strong >Tambah Data Nilai</strong>
                <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ url('nilai')}}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('nilai')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>NIM</label>
                                <select name="nim_id" class="form-control @error('nim_id') is-invalid @enderror" autofocus>
                                    <option>--Pilih--</option>
                                    @foreach ($mahasiswas as $item)
                                    <option value="{{ $item->id}}"{{ old('nim_id') == $item->id ? 'selected' : null }}>{{ $item->nim}}</option>
                                    @endforeach
                                </select>
                                @error('nim_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <select name="nama_id" class="form-control @error('nama_id') is-invalid @enderror" autofocus>
                                    <option>--Pilih--</option>
                                    @foreach ($mahasiswas as $item)
                                    <option value="{{ $item->id}}"{{ old('nama_id') == $item->id ? 'selected' : null }}>{{ $item->nama}}</option>
                                    @endforeach
                                </select>
                                @error('nama_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Makul</label>
                                <select name="makul_id" class="form-control @error('makul_id') is-invalid @enderror" autofocus>
                                    <option>--Pilih--</option>
                                    @foreach ($makuls as $item)
                                    <option value="{{ $item->id}}"{{ old('makul_id') == $item->id ? 'selected' : null }}>{{ $item->nama_makul}}</option>
                                    @endforeach
                                </select>
                                @error('makul_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas_id" autocomplete="off" class="form-control @error('kelas_id') is-invalid @enderror">
                                    <option>--Pilih--</option>
                                    @foreach ($kelas as $item)
                                    <option value="{{ $item->id}}"{{ old('kelas_id') == $item->id ? 'selected' : null }}>{{ $item->namaKelas}}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
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

                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" name="nilai" autocomplete="off" class="form-control @error('nilai') is-invalid @enderror"value="{{ old('nilai') }}" autofocus>
                                @error('nilai')
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
