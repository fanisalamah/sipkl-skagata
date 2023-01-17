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
        class="sidebar-item  ">
        <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    
    
    <li
        class="sidebar-item  ">
        <a href="ui-file-uploader.html" class='sidebar-link'>
            <i class="bi bi-file-bar-graph-fill"></i>
            <span>Laporan PKL Siswa</span>
        </a>
    </li>
    
    
</ul>
</div>
</div>
</div>