@extends('student.student-master')
@section('student')
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3> Laporan Akhir <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> Laporan Akhir Praktik Kerja Lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Akhir</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="container" style="font-size:14px;">
                        <div class="row">
                            @foreach($internships as $key => $internship)
                            <div class="col">Nama : {{ Auth::user()->name }}</div>
                            <div class="col-6"> Industri : {{ $internship->industries->name }}</div>
                            <div class="col"> Jurusan : {{ Auth::user()->departement->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col">NIS : {{ Auth::user()->nis }}</div>
                            <div class="col-6"> Alamat : {{ $internship->industries->address }}</div>
                            <div class="col">  Advisor : {{ $internship->advisors->name }} </div>
                            @endforeach
                        </div>
                    </div>

                      <a href="#" class="btn btn-primary" style="margin-top:10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">   <i class="bi bi-cloud-arrow-up-fill"></i> Upload Laporan </a>
                    
                     
                </div>
                   

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Laporan Akhir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('store.internship.report') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <div class="col-md-12 mb-4">                                
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul laporan">
                            </div>

                              <div class="col-md-12 mb-4">
                                <h6>Upload File (PDF, Maks. 3 MB)</h6>
                                <input class="form-control" type="file" id="file" name="file">
                              </div>
                        </div>
                        <div class="mb-3">
                            
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


                <div class="card-body">
                    <table class="table table-striped" id="">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th >Judul</th>
                                <th>File Laporan</th> 
                                <th>Nilai Akhir</th>    
                                <th width="5%">Aksi</th>    
                            </tr>
                        </thead>
                            
                        <tbody>
                            
                                @if($reports->isEmpty())
                                <tr> <td colspan="5" style="text-align:center;"> Data tidak ditemukan</td></tr>

                                @else
                              @foreach($reports as $key => $report)  
                              
                              <tr>
                                  <td> {{ $key+1 }} </td>
                                  <td> {{ $report->title }}</td>
                                  <td> <a href="{{ Storage::url('internship/report/'. $report->url_file)}}"
                                      class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;"> <i class="bi bi-eye"></i>  Preview file </a>  </td>
                                  
                                  <td> {{ $report->final_score }} </td>
                                      <td width="20%">
                                    <button type="submit" class="btn btn-danger" id="delete"
                                    onclick="sweetConfirm('/student/delete/monthly-report/{{ $report->id }}', 'Laporan Bulanan')"> Hapus</button>  
                                  </td>
                              </tr>

                              @endforeach    
                              @endif
                              

                        </tbody>
                        
                        
                    </table>
                
                </div>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection