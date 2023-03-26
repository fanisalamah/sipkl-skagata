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
        <a href="{{ route('advisor.dashboard') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li
    class="sidebar-item has-sub {{ request()->is('advisor/student/*') ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-people-fill"></i>
        <span>Manajemen Siswa</span>
    </a>
    <ul class="submenu {{ request()->is('advisor/student/*') ? 'active' : '' }}">
        <li class="submenu-item {{ request()->is('advisor/student/data') ? 'active' : '' }}">
            <a href="{{ route('advisor.student.data') }}">Data Siswa</a>
        </li>
        <li class="submenu-item {{ request()->is('advisor/student/add') ? 'active' : '' }} ">
            <a href="{{ route('advisor.student.add') }}">Tambah Data Siswa</a>
        </li>
    </ul>
</li>

    <li
    class="sidebar-item  has-sub  {{ request()->is('advisor/industries/*') ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-clipboard-data-fill"></i>
        <span>Manajemen Industri</span>
    </a>
    <ul class="submenu {{ request()->is('advisor/industries/*') ? 'active' : '' }} ">
        <li class="submenu-item {{ request()->is('advisor/industries/data') ? 'active' : '' }}">
            <a href="{{ route('advisor.industri.data') }}">Data Industri</a>
        </li>
        <li class="submenu-item {{ request()->is('advisor/industries/add') ? 'active' : '' }}">
            <a href="{{ route('advisor.industri.add') }}">Tambah Industri</a>
        </li>
    </ul>
</li>

<li
    class="sidebar-item  has-sub {{ request()->is('advisor/internship/*') ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Menu PKL</span>
    </a>
    <ul class="submenu  {{ request()->is('advisor/internship/*') ? 'active' : '' }} ">
        <li class="submenu-item {{ request()->is('advisor/internship/submission') ? 'active' : '' }}">
            <a href="{{ route('advisor.internship.submission') }}">Daftar Siswa PKL</a>
        </li>
        <li class="submenu-item ">
            {{-- <a href="{{ route('internship.data') }}">Daftar Siswa PKL</a> --}}
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