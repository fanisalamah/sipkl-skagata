@extends('advisor.advisor-master')
@section('advisor')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Monitoring Siswa Bimbingan <br>
                        Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted">Lakukan monitoring terhadap logbook siswa bimbingan anda</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Monitoring</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            
            <div class="card">
                
                <div class="card-body" > 
                
                    <table class="table table-striped" id="table1" >
                    {{-- <table class="table table-striped" > --}}
                    
                        <thead>
                            
                            <tr>
                                <th >No</th>
                                <th >Nama Siswa</th>
                                <th >Jurusan</th>
                                <th >Industri</th>
                                <th width="15%" >Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($internships as $key => $internship)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $internship->students->name }}</td>
                                <td> {{ $internship->students->departement->name }}</td>
                                <td> {{ $internship->industries->name }}</td>
                                <td><a href="#" class="badge text-bg-success" target="_blank"> Lihat Logbook </a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>


                </div>
                
            </div>
            
        </section>
    </div>
    
                 
                </div>
                

@endsection
