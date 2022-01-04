@extends('main')

@section('title', 'Tampil Mahasiswa')

@section('search')
<form class="form-inline mr-auto" action="mahasiswa" method="GET">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
  </ul>
  <div class="search-element">
    <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search" data-width="250">
    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
  </div>
</form>
@endsection

@section('breadcrumb')
<div class="section-header">
  <h1>Teknik Informatika Universitas Muria Kudus</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('home')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Tampil Mahasiswa</div>
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
          <strong >Data Mahasiswa</strong>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">

          </div>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th  class="text-center">No</th>
                <th class="text-center">NIM</th>
                <th class="text-center">Nama</th>
                {{-- <th class="text-center">Action</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $key => $item)
                <tr>
                    <td class="text-center">{{ $mahasiswa->firstItem() + $key}}</td>
                    {{-- <td class="text-center">{{ $loop->iteration}}</td> --}}
                    <td class="text-center">{{ $item->nim}}</td>
                    <td class="text-center">{{ $item->nama}}</td>
                    <td class="text-center">
                        {{-- <a href="{{ url('Tmahasiswa/'.$item->id)}}" class="btn btn-warning btn-sm">
                          <i class="fas fa-eye"></i>
                      </a> --}}

                </tr> 
                @endforeach
            </tbody>
          </table>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-start">
            Showing 
            {{$mahasiswa->firstItem()}}
            to
            {{ $mahasiswa->lastItem()}}
            of
            {{ $mahasiswa->total()}}
          </div>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
            {{ $mahasiswa->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

