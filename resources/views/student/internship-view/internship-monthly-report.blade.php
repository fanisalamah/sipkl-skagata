@extends('student.student-master')
@section('student')
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Laporan Bulanan <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> Laporan Bulanan Praktik Kerja Lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Bulanan</li>
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

                      <a href="{{ route('download.monthly.report') }}" class="btn btn-primary" style="margin-top:10px;">   <i class="bi bi-cloud-arrow-down-fill"></i> Download Form </a>
                      <a href="#" class="btn btn-secondary" style="margin-top:10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">   <i class="bi bi-cloud-arrow-up-fill"></i> Upload Form </a>
                    
                     
                </div>
                   

                 <!-- Modal -->
                 @foreach($monthly_report as $key => $mr)
                <div class="modal fade" id="editModal-{{ $mr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Form Laporan Bulanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('update.monthly.report', $mr->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <div class="col-md-12 mb-4">
                                    <h6>Judul</h6>
                                    <fieldset class="form-group">
                                      <select class="form-select" id="title" name="title" required>
                                        {{ request()->is('student/monthly-report') ? 'active' : '' }}
                                        <option value="Laporan Bulan ke-1" {{ $mr->title === 'Laporan Bulan ke-1' ? 'selected' : ''}}>Laporan Bulan ke-1</option>
                                        <option value="Laporan Bulan ke-2" {{ $mr->title === 'Laporan Bulan ke-2' ? 'selected' : ''}} >Laporan Bulan ke-2</option>
                                        <option value="Laporan Bulan ke-3" {{ $mr->title === 'Laporan Bulan ke-3' ? 'selected' : ''}}>Laporan Bulan ke-3</option>
                                      </select>
                                    </fieldset>
                                  </div>

                                  <div class="col-md-12 mb-4">
                                    <h6>Upload File (PDF, Maks. 1 MB)</h6>
                                    <input class="form-control form-control-lg" id="file" name="file" type="file" value="{{ $mr->file }}">
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
            @endforeach

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Form Laporan Bulanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('store.monthly.report') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <div class="col-md-12 mb-4">
                                <h6>Judul</h6>
                                <fieldset class="form-group">
                                  <select class="form-select" id="title" name="title" required>
                                    <option value="Laporan Bulan ke-1">Laporan Bulan ke-1</option>
                                    <option value="Laporan Bulan ke-2">Laporan Bulan ke-2</option>
                                    <option value="Laporan Bulan ke-3">Laporan Bulan ke-3</option>
                                  </select>
                                </fieldset>
                              </div>

                              <div class="col-md-12 mb-4">
                                <h6>Upload File (PDF, Maks. 1 MB)</h6>
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
                                <th width="9%">No. </th>
                                <th width="30%">Judul</th>
                                <th>File</th> 
                                <th width="15%">Aksi</th>    
                            </tr>
                        </thead>
                            
                        <tbody>
                            
                                @if($monthly_report->isEmpty())
                                <tr> <td colspan="4" style="text-align:center;"> Data tidak ditemukan</td></tr>

                                @else
                              @foreach($monthly_report as $key => $mr)  
                              
                              <tr>
                                  <td> {{ $key+1 }} </td>
                                  <td> {{ $mr->title }}</td>
                                  <td> <a href="{{ Storage::url('internship/monthly-report/'. $mr->file)}}"
                                      class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;"> <i class="bi bi-eye"></i>  Preview file </a>  </td>
                                  
                                  <td width="20%">
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal-{{ $mr->id }}"  > Edit </a>
                                    <button type="submit" class="btn btn-danger" id="delete"
                                    onclick="sweetConfirm('/student/delete/monthly-report/{{ $mr->id }}', 'Laporan Bulanan')"> Hapus</button>  
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