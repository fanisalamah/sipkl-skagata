@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Download Form Laporan Bulanan <br>Praktik Kerja Lapangan</h3>
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
                    
                     
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        
                        <thead>
                            <tr style="font-size:14px;">
                                <th width="5%">No. </th>
                                <th>Tanggal</th>
                                <th width="28%">Kegiatan</th>
                                <th>Lampiran</th>
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