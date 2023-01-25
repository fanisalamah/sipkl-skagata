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
    
    <li class="sidebar-title">Menu</li>
    <li
        class="sidebar-item {{ request()->is('student/dashboard') ? 'active' : '' }} ">
        <a href="{{ route('student.dashboard') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            
            <span>Dashboard</span>
        </a>
    </li>

    <li
        class="sidebar-item {{ request()->is('student/industries/data') ? 'active' : '' }} ">
        <a href="{{ route('student.industry-data') }}" class='sidebar-link'>
            <i class="bi bi-clipboard-data-fill"></i>
            
            <span>Data Industri</span>
        </a>
    </li>


<li
    class="sidebar-item  has-sub {{ request()->is('student/internship/submission')  ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>PKL</span>
    </a>
    <ul class="submenu {{ request()->is('student/internship/submission') ? 'active' : '' }}">
        <li class="submenu-item {{ request()->is('student/internship/submission') ? 'active' : '' }}">
            <a href="{{ route('student.internship-submission') }}">Pengajuan PKL</a>
        </li>
        <li class="submenu-item {{ request()->is('internship/data') ? 'active' : '' }}">
            <a href="{{ route('internship.data') }}">Status Pengajuan</a>
        </li>
    </ul>
</li>  
    
    
    <li
        class="sidebar-item  {{ request()->is('internship/report') ? 'active' : '' }}">
        <a href="{{ route('internship.report') }}" class='sidebar-link'>
            <i class="bi bi-file-bar-graph-fill"></i>
            <span>Laporan PKL Siswa</span>
        </a>
    </li>

    
    
    
</ul>
</div>
</div>
</div>