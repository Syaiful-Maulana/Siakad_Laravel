@extends('main')

@section('title', 'Tampil Struktur Organisasi')

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
    <div class="breadcrumb-item">Tampil Struktur Organisasi</div>
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
        <div class="card-header">
          <h4>Struktur Organisasi</h4>
        </div>
        <div class="card-body">
          <div class="row" style="margin-bottom: 1rem">

          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th  class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
                 @foreach ($strukturs as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{ $item->name}}</td>
                    <td class="text-center">{{ $item->nama_jabatan}}</td>
                    <td class="text-center">

                    </td>
                </tr> 
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

