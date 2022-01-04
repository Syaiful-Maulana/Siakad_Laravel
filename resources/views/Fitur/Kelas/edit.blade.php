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
    <div class="breadcrumb-item">Edit</div>
  </div>
</div> 
@endsection
    
@section('content')
<div class="content mt-3">
    
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <strong >Edit Data Kelas</strong>
                
                <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ url('dosen')}}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('kelas/' .$kelas->id)}}" method="POST">
                          @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Nama Mata Kuliah</label>
                                <select name="makuls_id" class="form-control @error('makuls_id') is-invalid @enderror" autofocus>
                                    <option>--Pilih--</option>
                                    @foreach ($makuls as $item)
                                    <option value="{{ $item->id}}"{{ old('makuls_id', $kelas->makuls_id) == $item->id ? 'selected' : null }}>{{ $item->nama_makul}}</option>
                                    @endforeach
                                </select>
                                @error('makuls_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" name="namaKelas" autocomplete="off" class="form-control @error('namaKelas') is-invalid @enderror" value="{{ old('namaKelas', $kelas->namaKelas) }}" autofocus>
                                @error('namaKelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" name="ruangan" autocomplete="off" class="form-control @error('ruangan') is-invalid @enderror" value="{{ old('ruangan', $kelas->ruangan) }}" autofocus>
                                @error('ruangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="text" name="waktu" autocomplete="off" class="form-control @error('waktu') is-invalid @enderror" value="{{ old('waktu', $kelas->waktu) }}" autofocus>
                                @error('waktu')
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




