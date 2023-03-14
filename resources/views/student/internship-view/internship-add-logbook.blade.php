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
                    <form class="form">
                      <div class="row">

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" id="date" class="form-control" placeholder="Pilih tanggal" name="date">
                          </div>
                        </div>

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="last-name-column">Lampiran</label>
                            <div class="mb-3">                                
                                <input class="form-control" type="file" id="formFile">
                              </div> 
                          </div>
                        </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="activity">Uraian Kegiatan</label>
                                  <div class="form-group with-title mb-3">
                                      <textarea class="form-control" id="activity" style="height: 168px;"></textarea>
                                      
                                    </div>
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


                          </div>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-end">
                          
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection