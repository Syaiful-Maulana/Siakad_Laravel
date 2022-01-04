@extends('main')

@section('title', 'Dosen')

@section('search')
<form class="form-inline mr-auto" action="dosen" method="GET">
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
    <div class="breadcrumb-item">Dosen</div>
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
        <div class="card-body">
          <strong >Data Dosen</strong>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="{{ url('dosen/add')}}" class="btn btn-success btn-sm">
                  <i class="fas fa-plus-square"></i> Add
              </a>
          </div>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th  class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">NIDN</th>
                <th class="text-center">Email</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $key => $item)
                <tr>
                    <td class="text-center">{{ $dosens->firstItem() + $key}}</td>
                    <td class="text-center">{{ $item->name}}</td>
                    <td class="text-center">{{ $item->nidn}}</td>
                    <td class="text-center">{{ $item->email}}</td>
                    <td class="text-center">
                        <a href="{{ url('dosen/edit/' .$item->id)}}" class="btn btn-primary btn-sm">
                          <i class="fas fa-pen-square"></i>
                      </a>
                      <button onclick="delet(<?=$item->id?>)" class="btn btn-danger btn-sm" >
                        <i class="fa fa-trash"></i>
                      </button>

                    </td>
                </tr> 
                @endforeach
            </tbody>
          </table>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-start">
            Showing
            {{ $dosens->firstItem()}}
            to
            {{ $dosens->lastItem()}}
            of
            {{ $dosens->total()}}
          </div>
          <div class="col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
            {{ $dosens->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('modal')

<script>
  function showEdit(q){
    //  var id = $(this).data("idne");
    //  console.log(q)
      // $("#modal-edit-"+q).modal('show');
    }
    function delet(q){
  
      $("#modal-hapus-"+q).modal('show');
  
    }
  
    </script>
  @foreach ($dosens as $item) 
      {{-- modal delete --}}
      <form action="{{ url('deleteDosen', $item->id)}}" method="POST" class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-<?=$item->id?>" aria-modal="true"> 
        @method('delete')
        @csrf     
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">         
          <div class="modal-content">          
            <div class="modal-header">             
            <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini?</h5>             
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
              <span aria-hidden="true">×</span>             
            </button>           
          </div>           
          <div class="modal-body">          
             Klik 'Delete' untuk melanjutkan</div>  
                       
             <div class="modal-footer">           
               {{-- <button type="submit" class="btn btn-danger btn-shadow" id="">Yes</button> --}}
               <a href="{{ url('deleteDosen', $item->id)}}" class="btn btn-danger">Delete</a>
               <button type="button" data-dismiss="modal" class="btn btn-secondary" id="">Cancel</button>
              </div>         
            </div>       
          </div>    
        </form>
      @endforeach
          
@endsection
