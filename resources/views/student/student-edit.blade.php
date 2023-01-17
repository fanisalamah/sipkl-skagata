@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Data Siswa</h3>
                    <p class="text-subtitle text-muted">Form Edit Siswa </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Manajemen Siswa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Siswa</li>
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
                                <form method="post" action="{{ route('student.update', $editData['users']->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $editData['users']->name }}" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="nis" class="form-label">NIS</label>
                                                <input type="text" name="NIS" id="NIS" class="form-control" value="{{ $editData['users']->nis }}" data-parsley-required="true">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="role_id" class="form-label"> Pilih Role </label>
                                                <select class="form-select" id="role_id" name="role_id"  data-parsley-required="true">
                                                    <option value="" selected="" disabled>Pilih Role</option>
                                                    @foreach($editData['roles'] as $role)
                                                    <option value="{{ $role->id }}" {{ $editData['users']->role_id == $role->id ? "selected" : "" }}>{{ $role->name }}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email"  name="email" class="form-control" value="{{ $editData['users']->email }}"  data-parsley-restricted-city="Jakarta">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group masndatory">
                                                <label for="departement_id" class="form-label"> Pilih Jurusan </label>
                                                <select class="form-select" id="departement_id" name="departement_id">
                                                    <option value="" selected="" disabled>Pilih Jurusan</option>
                                                    @foreach($editData['departements'] as $departement)
                                                    <option value="{{ $departement->id }}" {{ $editData['users']->departement_id == $departement->id ? "selected" : "" }}> {{ $departement->name }}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                           
                                           
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                                
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