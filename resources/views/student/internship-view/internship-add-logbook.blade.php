@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Logbook <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> Catatan Kegiatan Praktik Kerja Lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Logbook</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    
                      
                    <form class="form" method="POST" action="{{ route('logbook.store') }}">
                      @csrf
                      <div class="row">
                        {{-- <input type="hidden" name="internship_submission_id" id="internship_submission_id" value=""> --}}
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" id="date" class="form-control" placeholder="Pilih tanggal" name="date">
                          </div>
                        </div>

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="file">Lampiran (Max 1MB)</label>
                            <div class="mb-3">                                
                              <input class="form-control form-control-lg" id="acceptance_file" name="file" type="file" data-parsley-required="true">
                              </div> 
                          </div>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                
                                  
                                  <div class="form-group mb-3">
                                    <label for="activity">Uraian Kegiatan</label>
                                    <textarea class="form-control" name="activity" id="activity" rows="5"></textarea>
                                  </div>
                                      
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                          </button>
                                          <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                          </button>
                                      </div>
                        </div>
                        </form>
                          </div>
                        </div>
                        
                      </div>
                    
                  </div>
                </div>
             
    
        </section>
    </div>
    
                 
                </div>

@endsection