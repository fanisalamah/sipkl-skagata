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
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Form Laporan Bulanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('upload.advisor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                        
                            <div class="form-group">
                                <input type="file" name="file" required>
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
                            <tr style="font-size:14px;">
                                <th width="5%">No. </th>
                                <th>Nama Dokumen</th>
                                
                                <th width="25%">Catatan</th>
                                <th width="9%">Aksi</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            
                            <tr style="font-size:15px;">
                            </tr>
                            
                            
                           
                            
                        </tbody>
                    </table>
                
                </div>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection