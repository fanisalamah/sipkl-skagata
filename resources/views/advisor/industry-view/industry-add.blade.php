@extends('advisor.advisor-master')
@section('advisor')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Industri</h3>
                    <p class="text-subtitle text-muted">Form Tambah Industri </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Manajemen Industri</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Industri</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                       
                        <div class="card-content">
                            <div class="card-body">
                                <form method="POST" action="{{ route('advisor.industri.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="name" class="form-label">Nama Industri</label>
                                                <input type="text" name="name" id="name" class="form-control"  data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="address" class="form-label">Alamat Industri</label>
                                                <input type="text" name="address" id="address" class="form-control" data-parsley-required="true">
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
                </div>
            </div>
        </section>
    </div>
    
                 
                </div>

@endsection