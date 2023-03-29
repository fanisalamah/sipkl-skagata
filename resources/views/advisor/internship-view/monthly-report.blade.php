@extends('advisor.advisor-master')
@section('advisor')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan Bulanan <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> SMK Negeri 3 Yogyakarta</p>
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
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr style="font-size:14px;">
                                <th width="5%">No. </th>
                                <th width="19%">Nama</th>
                                <th width="35%">Industri</th>
                                <th>Judul</th>
                                <th width="15%">File Laporan</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            
                            @foreach($monthlyReports as $key => $mr)
                            <tr>
                                
                                <td> {{ $key+1 }}</td>
                                <td>{{ $mr->internshipSubmission->students->name }}</td>
                                <td> {{ $mr->internshipSubmission->industries->name }}</td>
                                <td> {{ $mr->title }} </td>
                                <td> <a href=" {{ $mr->file }}" class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;" > <i class="bi bi-eye"></i>  Preview</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection