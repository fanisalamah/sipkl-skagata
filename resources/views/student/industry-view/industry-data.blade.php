@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Industri</h3>
                    <p class="text-subtitle text-muted">Daftar Industri Tempat Praktik Kerja Lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Industri</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Industri</li>
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
                                <th>Nama</th>
                                <th>Alamat</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($industries as $key => $industri )
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td width="35%">{{  $industri->name }}</td>
                                <td>{{  $industri->address }}</td>
                                
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