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
                    class="sidebar-item  has-sub {{ request()->is('student/internship/*')  ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Pengajuan PKL</span>
                    </a>
                    <ul class="submenu {{ request()->is('student/internship/*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->is('student/internship/submission') ? 'active' : '' }}">
                            <a href="{{ route('student.internship-submission') }}">Pengajuan PKL</a>
                        </li>
                        <li class="submenu-item {{ request()->is('student/internship/status') ? 'active' : '' }}">
                            <a href="{{ route('student.internship-status') }}">Status Pengajuan</a>
                        </li>
                    </ul>
                </li>  
    


                @php
                use App\Models\InternshipSubmission;
                $submissions = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get();
                @endphp
                
                @foreach($submissions as $submission)                     
                    @if($submission->advisor_id != null)
            
                <li
                    class="sidebar-item  {{ request()->is('student/logbook*') ? 'active' : '' }}">
                    <a href="{{ route('student.logbook') }}" class='sidebar-link'>
                        <i class="bi bi-journal-richtext"></i>
                        <span>Logbook</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  {{ request()->is('student/monthly-report') ? 'active' : '' }}">
                    <a href="{{ route('monthly.report') }}" class='sidebar-link'>
                        <i class="bi bi-folder2-open"></i>
                        <span>Form Laporan Bulanan</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  {{ request()->is('student/report') ? 'active' : '' }}">
                    <a href="{{ route('internship.report') }}" class='sidebar-link'>
                        <i class="bi bi-journal-richtext"></i>
                        <span>Laporan dan Nilai</span>
                    </a>
                </li>
                    @endif
                @endforeach

    
    
    
</ul>
</div>
</div>
</div>