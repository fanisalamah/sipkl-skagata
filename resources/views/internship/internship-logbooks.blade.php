@extends('admin.admin-master')
@section('admin')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Monitoring Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"></p>
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
            <div class="d-flex p-1 mb-2">
                
                <div class="flex-fill m-1 p-1">
                    <span style="font-size: 12px;">     
                    <table>
                        
                        <tr>
                            <td>Nama Siswa&emsp;</td>
                            <td>:</td>
                            <td>&emsp;{{ $internships->students->name }}</td>
                            
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>&emsp;{{ $internships->students->nis }}</td>
                            
                        </tr>
                    </table>
                </span> 
                </div>
                <div class="flex-fill m-1 p-1">
                    <span style="font-size: 12px;">     
                    <table>
                        <tr>
                            <td>Industri&emsp;</td>
                            <td>:</td>
                            <td>&emsp;{{ $internships->industries->name }}</td>
                            
                        </tr>
                        <tr>
                            <td>Alamat&emsp;</td>
                            <td>:</td>
                            <td>&emsp;{{ $internships->industries->address }}</td>
                            
                        </tr>
                    </table>
                </span>
                </div>
                <div class="flex-fill m-1 p-1">
                    <span style="font-size: 12px;">     
                    @if($internships->advisor_id == 0)
                        Advisor&emsp;:&emsp;Pembimbing belum diset
                        @else
                        Advisor&emsp;:&emsp;{{ $internships->advisors->name }}
                        
                    @endif
                     
                    </span>
                </div>
               
              
            
            
            </div>
            <div class="card">
                
                <div class="card-body">
                   
                 
                     
                    {{-- <table class="table table-striped" id="">
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
                          

                                
                            </tr>
                            
                        </tbody>
                        
                    </table> --}}




                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection