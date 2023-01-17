@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Advisor (Guru)</h3>
                    <p class="text-subtitle text-muted">Sistem Informasi Monitoring Praktik Kerja Lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Manajemen Advisor</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Advisor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                <a href="{{ route('advisor.add') }}" class="btn icon icon-left btn-primary">
                    <i class="bi bi-person-plus-fill"> </i>
                     Tambah Data</a>
                     {{-- <a href="#" class="btn icon icon-left btn-secondary">
                        <i class="bi bi-person-plus-fill"> </i>
                         Import User</a> --}}

                         
                          
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-cloud-arrow-up-fill"></i> Import Data
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('download.template.advisor', '?file=Template_Advisor.xlsx') }}">Download Template</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Data</a></li>
                              </ul>
                            </div>
                         
                            <!-- Button trigger modal -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="{{ route('upload.advisor') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                
                                    <div class="form-group">
                                        <input type="file" name="file" required>
                                    </div>


                                </div>
                                
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>    
                            </div>
                        
                            </div>
                    </div>
                       



                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                {{-- <th>Role</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $user )
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td>{{  $user->name }}</td>
                                <td>{{  $user->nip }}</td>
                                <td>{{  $user->email }}</td>
                                <td>{{ $user->departement->name }}</td>
                                {{-- <td width="15%">{{ $user->role->name }}</td> --}}
                                <td width="18%">
                                    <a href="{{ route('advisor.edit', $user->id) }}" class="btn btn-info"> Edit </a>
                                        <button type="submit" class="btn btn-danger" id="delete"
                                        onclick="sweetConfirm('/advisor/delete/{{ $user->id }}', 'Data Advisor')">Hapus</button>                                   
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection

