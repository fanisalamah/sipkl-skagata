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
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Siswa</th>
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
                                <td>{{ $submission->industries->name }}</td>
                                <td><a href="{{ $submission->url_acceptance }}" class="btn btn-success" target="_blank"> Lihat Lampiran <i class="bi bi-eye"></i> </a> </td>
                                
                                <td width="12%">
                                  <div class="d-flex justify-content-center">
                                    <form method="post" action="{{ route('submission.accept', $submission->id) }}">
                                      @csrf
                                      @method('put')
                                      <button type="submit" class="btn btn-success mr-2" data-toggle="tooltip" data-placement="top" title="Setuju" id="accept-submission"> <i class="bi bi-check2"></i> </button> 
                                    </form>
                                    <a href="#" class="btn btn-danger" id="reject-submission"  data-bs-toggle="modal" data-bs-target="#rejectSubmission" data-bs-whatever="@mdo"> <i class="bi bi-x-lg"></i> </a>                                    
                                  </div>
                                  
                                  
                                </td>
                                @endforeach
                            </tr>
                            
                        </tbody>
                    </table>
{{-- Modal --}}

                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection