@extends('advisor.advisor-master')
@section('advisor')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan Akhir <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> SMK Negeri 3 Yogyakarta</p>
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
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr style="font-size:14px;">
                                <th width="5%">No. </th>
                                <th width="22%">Nama</th>
                                <th width="25%">Industri</th>
                                <th width="15%">File Laporan</th>
                                <th>Nilai Akhir</th>
                                <th width="15%">Aksi</th>
                                
                            </tr>
                            
                        </thead>
                        <tbody>
                            
                            @foreach($reports as $key => $report)
                            <tr style="font-size:14px;">
                                
                                <td> {{ $key+1 }}</td>
                                <td>{{ $report->internshipSubmission->students->name }}</td>
                                <td> {{ $report->internshipSubmission->industries->name }}</td>
                                <td> <a href="{{ Storage::url('internship/report/'.  $report->url_file)}} " class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;" > <i class="bi bi-eye"></i>  Preview</td>
                            @if($report->final_score == null)
                                <td style="font-style:italic;"> Belum ada nilai</td>
                            @else 
                            <td style="font-weight:bold;"> {{ $report->final_score }}</td>
                            @endif
                                <td> <button type="button" class="badge text-bg-success" data-toggle="modal" data-target="#nilaiModal{{ $report->id }}"  style="background-color:#1d8455; border:none;font-size:14px; padding:10px;"> <i class="bi bi-plus"></i> Input Nilai</button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>


                      <!-- Modal -->
                      @foreach($reports as $key => $report)
                      <div class="modal fade" id="nilaiModal{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="nilaiModal{{ $report->id }}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="nilaiModal{{ $report->id }}">Input Nilai (Skala: 1-100)</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                              <form action="{{ route('update.score', $report->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                    <div class="container">

                                        <div class="row">
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Disiplin</label>
                                                    <input type="text" class="form-control" id="disiplin" name="disiplin" >
                                                  </div>
                                            </div>
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Kerjasama</label>
                                                    <input type="text" class="form-control" id="kerjasama" name="kerjasama">
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Inisiatif</label>
                                                    <input type="text" class="form-control" id="inisiatif" name="inisiatif">
                                                  </div>
                                            </div>
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Tanggung Jawab</label>
                                                    <input type="text" class="form-control" id="tanggungjawab" name="tanggungjawab">
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Kejujuran</label>
                                                    <input type="text" class="form-control" id="kejujuran" name="kejujuran">
                                                  </div>
                                            </div>
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Laporan</label>
                                                    <input type="text" class="form-control" id="laporan" name="laporan">
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"> 
                                                <div class="form-group">
                                                    <label for="basicInput">Presentasi</label>
                                                    <input type="text" class="form-control" id="presentasi" name="presentasi">
                                                  </div>
                                            </div>
                                            <div class="col-6"> 
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"></div>
                                            <div class="col-6 d-flex justify-content-end"><button type="submit" class="btn btn-primary">Simpan</button></div>
                                        </div>
                                        
                                        
                                    </div>
                                  </div>
                                  
                              </form>
                              </div>
                          </div>
                          </div>
                      </div>
                      @endforeach
          
@endsection