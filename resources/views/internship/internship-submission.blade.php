@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengajuan Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted">SMK Negeri 3  Yogyakarta</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            
            <div class="card">
                
                <div class="card-body"> 
                    <table class="table table-striped" id="table1">
                    {{-- <table class="table table-striped" > --}}
                        <!-- FILTER button -->
                    {{-- <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle mb-3" data-bs-toggle="dropdown" aria-expanded="false"> 
                        Pilih Jurusan
                        </button>
                        <ul class="dropdown-menu">

                @foreach($departements as $key => $departement)
                        <li><a class="dropdown-item" href="#"> {{ $departement->name  }}</a></li>                        
                    @endforeach
                        </ul>
                        
                    </div>
                     --}}
                        <thead>
                            
                            <tr>
                                <th>No. </th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Industri</th>
                                <th>Bukti Diterima</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          {{-- {{ dd($data['submissions']) }} --}}
                          @foreach($allDataSub as $key => $submission )
                            <tr>
                              
                                <td width="5%">{{ $key+1 }}</td>
                                <td>{{ $submission->students->name}}</td>
                                <td>{{ $submission->students->departement->name }}</td>
                                <td>{{ $submission->industries->name }}</td>
                                <td><a href="{{ $submission->acceptance_file }}" class="btn btn-success" target="_blank"> Lihat Lampiran <i class="bi bi-eye"></i> </a> </td>
                                
                                <td width="12%">
                                  <div class="d-flex justify-content-center">
                                    <form method="post" action="{{ route('submission.accept', $submission->id) }}">
                                      @csrf
                                      @method('put')
                                      <button type="submit" class="btn btn-success mr-2" data-toggle="tooltip" data-placement="top" title="Setuju" id="accept-submission"> <i class="bi bi-check2"></i> </button> 
                                    </form>
                                    <form method="post" action="{{ route('submission.reject', $submission->id) }}">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-danger mr-2" data-toggle="tooltip" data-placement="top" title="Tolak" id="reject-submission"> <i class="bi bi-x-lg"></i> </button> 
                                      </form>
                                  </div>
                                  
                                  
                                </td>
                                @endforeach
                            </tr>
                            
                        </tbody>
                    </table>

                  

                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection