<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-my profileenu d-flex">
                            <div class="user-name text-end me-3">                                
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600"> Student</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li><a class="dropdown-item" href="#"  data-toggle="modal" data-target="#updatePassword{{ Auth::user()->id }}"><i class="icon-mid bi bi-gear me-2"></i>
                            Update Password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

{{-- Modal         --}}
<div class="modal fade" id="updatePassword{{ Auth::user()->id }}" tabindex="-1" role="dialog" aria-labelledby="updatePassword{{ Auth::user()->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="updatePassword{{ Auth::user()->id }}">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('student.update.password', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            <div class="form-group">
                <label for="oldPassword">Password saat ini</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Masukkan password saat ini">
            </div>
            <div class="form-group">
                <label for="newPassword">Password baru</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Masukkan password baru">
            </div>
            <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">Update</button></div>
            
        </form>
        </div>
    </div>
    </div>
</div>