@extends('main')

@section('title', 'Mahasiswa')

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
    <div class="breadcrumb-item active"><a href="{{ url('mahasiswa')}}">Mahasiswa</a></div>
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
                    <a href="{{ url('mahasiswa')}}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('mahasiswa/' .$mahasiswa->id)}}" method="POST">
                          @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" autocomplete="off" class="form-control @error('nama') is-invalid @enderror"value="{{ old('nama', $mahasiswa->nama) }}" autofocus>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="number" name="nim" autocomplete="off" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $mahasiswa->nim) }}" autofocus>
                                @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select type="text" name="jekel" autocomplete="off" class="form-control @error('jekel') is-invalid @enderror" value="{{ old('jekel', $mahasiswa->jekel) }}" autofocus>
                                    <option value="">-- Pilih --</option>
                                    <option value="{{ old('jekel', $mahasiswa->jekel) }}" >Laki - Laki</option>
                                    <option value="{{ old('jekel', $mahasiswa->jekel) }}">Perempuan</option>
                                </select>
                                @error('jekel')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat" autocomplete="off" class="form-control @error('tempat') is-invalid @enderror" value="{{ old('tempat', $mahasiswa->tempat) }}" autofocus>
                                @error('tempat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input  type="text"  
                                        name="tanggal_lhr" 
                                        autocomplete="off"
                                        class="datepicker-here form-control @error('tanggal_lhr') is-invalid @enderror" 
                                        value="{{ old('tanggal_lhr', $mahasiswa->tanggal_lhr) }}" 
                                        data-language='en'
                                        data-date-format="yyyy-mm-dd"
                                        autofocus>
                                @error('tanggal_lhr')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" autocomplete="off" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat',$mahasiswa->alamat) }}" autofocus>
                                @error('alamat')
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




