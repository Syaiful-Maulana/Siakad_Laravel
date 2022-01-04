@extends('main')

@section('title', 'Struktur Organisasi')

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
    <div class="breadcrumb-item">Struktur Organisasi</div>
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
            <div class="col-lg-12">
              <button onclick="showModalTambah()" class="btn btn-primary">Tambah Jabatan</button>
            </div>
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
                        <button onclick="showEdit(<?=$item->id?>)" data-idne="<?= $item->id ?>" class="btn btn-primary btn-sm" >
                          <i class="fas fa-pen-square"></i>
                        </button>
                        <button onclick="delet(<?=$item->id?>)" class="btn btn-danger btn-sm" >
                          <i class="fa fa-trash"></i>
                        </button>
                        {{-- <a href="{{ url('deleteStruktur', $item->id)}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </a> --}}
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

@section('modal')
    <!-- modal add--->
<form action="{{ url('prosesStruktur')}}" method="POST" class="modal fade" tabindex="-1" id="modal-tambah" role="dialog" id="exampleModal" aria-modal="true">
  @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Jabatan</h5>     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <label for="">Nama</label>
                <input type="text"  autocomplete="off" name="name" class="form-control" required> 
              </div>
          <div class="col-lg-12 mt-4">
            <label for="">Jabatan</label>
            <input type="text"  autocomplete="off" name="nama_jabatan" class="form-control" required> 
          </div>
        </div>  
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</form> 

  @foreach ($strukturs as $item) 
    <!-- modal edit--->
    <form action="{{ url('editProses/'.$item->id)}}" method="POST" class="modal fade" tabindex="-1" id="modal-edit-<?=$item->id?>" role="dialog" aria-modal="true">
      @method('patch')
      @csrf
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Jabatan</h5>     
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <label for="">Nama</label>
                    <input type="text"  autocomplete="off" name="name" class="form-control" value="{{ old('name', $item->name )}}" autofocus  required> 
                  </div>
              <div class="col-lg-12 mt-4">
                <label for="">Jabatan</label>
                <input type="text" name="nama_jabatan"  autocomplete="off"  class="form-control" value="{{ old('nama_jabatan', $item->nama_jabatan )}}" required> 
              </div>
            </div>  
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </form>
    <script>
    function showEdit(q){
      //  var id = $(this).data("idne");
      //  console.log(q)
        $("#modal-edit-"+q).modal('show');
      }
      function delet(q){

        $("#modal-hapus-"+q).modal('show');

      }

      </script>

    {{-- modal delete --}}
    <form action="{{ url('deleteStruktur', $item->id)}}" method="POST" class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-<?=$item->id?>" aria-modal="true"> 
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
             <a href="{{ url('deleteStruktur', $item->id)}}" class="btn btn-danger">Delete</a>
             <button type="button" data-dismiss="modal" class="btn btn-secondary" id="">Cancel</button>
            </div>         
          </div>       
        </div>    
      </form>
 @endforeach

@endsection
