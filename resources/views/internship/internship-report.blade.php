@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Draft Laporan <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
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
                                <th>File Laporan</th>
                                <th>Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($internshipReports as $key => $internshipReport)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td>{{ $internshipReport->internshipSubmission->students->name }}</td>
                                <td>{{ $internshipReport->internshipSubmission->students->departement->name }}</td>
                                <td>{{ $internshipReport->internshipSubmission->industries->name }}</td>
                                <td><a href="{{ $internshipReport->url_file }}" class="btn btn-success" target="__blank"> Lihat Laporan <i class="bi bi-eye"></i> </a> </td>
                                <td style="text-align:center;">{{ $internshipReport->final_score }}</td>
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