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
            
                <div class="container">
                    <div class="row">
                        <div class="col">
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

                        <div class="col-6">
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

                        <div class="col">
                            <span style="font-size: 12px;">     
                                @if($internships->advisor_id == 0)
                                    Advisor&emsp;:&emsp;Pembimbing belum diset
                                    @else
                                    Advisor&emsp;:&emsp;{{ $internships->advisors->name }}
                                    
                                @endif
                                 
                                </span>
                            
                        </div>
                    </div>

                </div>
       <br>         
       {{-- <button class="btn btn-primary mb-2" type=""> Export </button> --}}
            <div class="card">
                
                <div class="card-body">
                   
                 
                 
                   <span style="font-size: 14px;">     
                    <table class="table table-striped" id="table1">
                        
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Tanggal</th>
                                <th>Kegiatan</th>
                                <th>Lampiran</th>
                                <th>Catatan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($logbooks as $key => $logbook)
                            <tr>
                                <td> {{ $key+1 }}</td>
                                <td width="15%"> @php
                                
                                    $date = Carbon::parse($logbook->date)->locale('id') ;
                                    $date->settings(['formatFunction' => 'translatedFormat']);
                                    echo $date->format('j F Y');

                                     @endphp </td>
                                <td width="40%"> {{ $logbook->activity }} </td>
                                <td>  <a href="{{ Storage::url('internship/logbook/'. $logbook->attachment_file)}}"
                                    class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;"> <i class="bi bi-eye"></i>  Preview </a>  </td>
                                @if($logbook->note == null)
                                <td width="20%">Belum ada catatan dari Pembimbing</td>
                                @else
                                <td width="20%">{{ $logbook->note }}</td>
                                @endif
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