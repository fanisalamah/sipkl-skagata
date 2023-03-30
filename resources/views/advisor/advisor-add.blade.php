@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Data Advisor</h3>
                    <p class="text-subtitle text-muted">Form Tambah Data Advisor </p>
                </div>

                
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Manajemen Advisor</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data Advisor</li>
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
                                <form method="POST" action="{{ route('advisor.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email"  name="email" class="form-control" placeholder="Email"  data-parsley-restricted-city="Jakarta">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nip" class="form-label">NIP</label>
                                                <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="departement_id" class="form-label"> Pilih Jurusan </label>
                                                <select class="form-select" id="departement_id" name="departement_id">
                                                    <option value="" selected="" disabled>Pilih Jurusan</option>
                                                    @foreach($departements as $departement)
                                                    <option value="{{ $departement->id }}"> {{ $departement->name }}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-6 col-12">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            
                                               
                                            
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