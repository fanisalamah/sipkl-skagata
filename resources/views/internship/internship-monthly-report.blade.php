@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan Bulanan Siswa <br> Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"></p>
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
                <div class="card-body">
                    <span style="font-size: 14px;">   
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Industri</th>
                                <th>Advisor</th>
                                <th>Title</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monthlyReports as $key => $monthlyReport)
                            <tr>
                            
                                <td> {{ $key+1 }} </td>
                                <td> {{ $monthlyReport->InternshipSubmission->students->name }}</td>
                                <td> {{ $monthlyReport->InternshipSubmission->students->departement->name }}</td>
                                <td> {{ $monthlyReport->InternshipSubmission->industries->name }} </td>
                                @if($monthlyReport->InternshipSubmission->advisor_id === null) 
                                <td> Pembimbing belum ditentukan</td>
                                @else 
                                <td> {{ $monthlyReport->InternshipSubmission->advisors->name }}</td> 
                                @endif
                                <td> {{ $monthlyReport->title }}</td>
                                <td> <a href="{{ $monthlyReport->url_file }}" target="__blank"
                                    style="background-color:#198754;color:white; text-decoration:none; padding:5px 6px 5px 6px;border-radius:5px;"> Preview file </a> </td>
                                    
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    </span>



                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection