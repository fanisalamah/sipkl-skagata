@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Siswa Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
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
                            <tr>
                                <th>No. </th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Industri</th>
                                <th>Alamat</th>
                                <th>Advisor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($internships as $key => $internship )
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td width="15%"> <a href="{{ route('internship.logbook',  $internship->id) }}"> {{ $internship->students->name}} </a></td>
                                <td>{{ $internship->students->departement->name }}</td>
                                <td>{{ $internship->industries->name }}</td>
                                <td>{{ $internship->industries->address }}</td>
                                @if($internship->advisor_id === null) 
                                <td width="23%"> <span class="label label-warning" style="background-color: #f39c12; font-size:15px; font-weight:bold; color:white;
                                    border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px; display:align-center;"> &nbsp; Belum ada pembimbing &nbsp;</span></td>
                                @else
                                <td width="23%">{{ $internship->advisors->name }}</td>
                                @endif

                                
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