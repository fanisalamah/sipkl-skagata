@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengajuan Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> Pengajuan Praktik Kerja Lapangan</p>
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
                    <form method="POST" action="{{ route('student.internship-store') }}">
                        @csrf
                        <div class="row">

                            <input type="hidden" id="student_id" name="student_id" value="{{ Auth::id(); }}">
                            <div class="col-md-6 col-12">
                                <div class="form-group mandatory">
                                    <label for="name" class="form-label">Pilih Industri Tempat PKL </label>
                                    <div class="search-select-box">
                                        <select data-live-search="true" name="industry_id" > 
                                            <option selected="" disabled> Pilih Industri </option>
                                            @foreach($industries as $key => $industry )
                                            
                                            <option value="{{ $industry->id }}"> {{ $industry->name }}</option>    
                                            @endforeach
                                            
                                        </select>
                                      </div>
                                      
                                </div>
                            </div>                        
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group mandatory">
                                    <div>
                                        <label for="formFileLg" class="form-label">Upload Dokumen Penerimaan (PDF)</label>
                                        <input class="form-control form-control-lg" id="url_acceptance" name="url_acceptance" type="file">
                                      </div>
                                      
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                            </div>
                            <div class="col-md-6 col-12">
                                
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                
                            </div>
                           
                            
                        </div>
                    </form>
                </div>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection