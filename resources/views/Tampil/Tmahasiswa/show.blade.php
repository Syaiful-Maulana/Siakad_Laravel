@extends('main')

@section('title', 'Tampil Mahasiswa')

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
    <div class="breadcrumb-item active"><a href="home">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="mahasiswa">Mahasiswa</a></div>
    <div class="breadcrumb-item">Detail</div>
  </div>

</div> 

@endsection
    
@section('content')
<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-body table-responsive">
          <strong >Data  Mahasiswa</strong>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ url('Tmahasiswa')}}" class="btn btn-secondary btn-sm">
                <i class="fas fa-undo"></i> Back
            </a>
        </div>
          </div>
          <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td>{{$mahasiswa->nama}}</td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <td>{{$mahasiswa->nim}}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{$mahasiswa->jekel}}</td>
                </tr>
                <tr>
                    <th>Tempat</th>
                    <td>{{$mahasiswa->tempat}}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{$mahasiswa->tanggal_lhr}}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{$mahasiswa->alamat}}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

