<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand ">
        <a href="{{url('home')}}">Siakad</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{url('home')}}">UMK</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="{{url('home')}}" class="nav-link has-dropdown active"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{url('visimisi')}}">Visi Misi</a></li>
              @if (auth()->user()->level=="admin")
              <li><a class="nav-link" href="{{url('struktur')}}">Struktur Organisasi</a></li>
              @endif
            </ul>
          </li>
          @if (auth()->user()->level=="dosen")
          <li class="menu-header">Lihat Data</li>
          <li class="nav-item dropdown">
            <a href="{{url('home')}}" class="nav-link has-dropdown active"><i class="fas fa-table"></i><span>Lihat Data</span></a>
            <ul class="dropdown-menu">
              {{-- @if (auth()->user()->level=="admin")
              <li><a class="nav-link" href="{{url('Tnilai')}}">Tampil Nilai</a></li>
              @endif --}}
              
              <li><a class="nav-link" href="{{url('Tstruktur')}}">Struktur Organisasi</a></li>
              <li><a class="nav-link" href="{{url('Tmahasiswa')}}">Tampil Mahasiswa</a></li>
              
            </ul>
          </li>
          @endif
          <li class="menu-header">Fitur</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-plus-square"></i> <span>Add Data</span></a>
            <ul class="dropdown-menu">
              @if (auth()->user()->level=="admin")
              <li><a class="nav-link" href="{{url('dosen')}}">Dosen</a></li>
              <li><a class="nav-link" href="{{url('makul')}}">Mata Kuliah</a></li>
              <li><a class="nav-link" href="{{url('kelas')}}">Kelas</a></li>
              <li><a class="nav-link" href="{{url('mahasiswa')}}">Mahasiswa</a></li>
              @endif
              @if (auth()->user()->level=="dosen")
              <li><a class="nav-link" href="{{url('nilai')}}">Nilai</a></li>
              @endif
            </ul>
          </li>
          @if (auth()->user()->level=="admin")
          <li class="menu-header">Data Master</li>
          <li class="nav-item dropdown">
            <a href="{{url('home')}}" class="nav-link has-dropdown active"><i class="fas fa-users-cog"></i><span>Data Master</span></a>
            <ul class="dropdown-menu">
              
              <li><a class="nav-link" href="{{url('admin')}}">Data Admin</a></li>
              
            </ul>
          </li>
          @endif
    </aside>
  </div>