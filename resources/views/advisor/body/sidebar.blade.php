<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
<div class="sidebar-header ">
    {{-- <a href="{{ route('dashboard') }}"><img src="assets/images/logo/logo-smk.svg" alt="Logo" srcset=""> SIMPKL</a> --}}
        <div class="form-check form-switch fs-6">
            <img src="{{ asset('assets/images/logo/logo-smk.svg') }}" height="100">
            {{-- <span class=""> SIMPKL SKAGATA </span> --}}
            
            <input type="hidden" class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
            {{-- <label class="form-check-label" ></label> --}}
        </div>

    
    <div class="sidebar-toggler  x">
    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
    </div>

    

</div>

<div class="sidebar-menu">
<ul class="menu"> 
    
    {{-- <li class="sidebar-title">Menu</li> --}}
    <li
        class="sidebar-item {{ request()->is('advisor/dashboard') ? 'active' : '' }}  ">
        <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li
    class="sidebar-item has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-people-fill"></i>
        <span>Manajemen Siswa</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item ">
            <a href="{{ route('advisor.student.data') }}">Data Siswa</a>
        </li>
        <li class="submenu-item ">
            <a href="{{ route('student.add') }}">Tambah Data Siswa</a>
        </li>
    </ul>
</li>

    <li
    class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-clipboard-data-fill"></i>
        <span>Manajemen Industri</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item ">
            <a href="{{ route('industri.data') }}">Data Industri</a>
        </li>
        <li class="submenu-item ">
            <a href="{{ route('industri.add') }}">Tambah Industri</a>
        </li>
    </ul>
</li>

<li
    class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>PKL</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item ">
            <a href="{{ route('internship.submission') }}">Pengajuan PKL</a>
        </li>
        <li class="submenu-item ">
            <a href="{{ route('internship.data') }}">Daftar Siswa PKL</a>
        </li>
    </ul>
</li>  
    
    
    <li
        class="sidebar-item  ">
        <a href="{{ route('internship.report') }}" class='sidebar-link'>
            <i class="bi bi-file-bar-graph-fill"></i>
            <span>Laporan PKL Siswa</span>
        </a>
    </li>

    
    
    
</ul>
</div>
</div>
</div>