@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Catatan Kegiatan Harian <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> Logbook Praktik Kerja Lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Logbook</li>
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
                            <div class="col">  Advisor : {{ $internship->advisors->name }} </div>
                        </div>
                        <div class="row">
                            <div class="col">NIS : {{ Auth::user()->nis }}</div>
                            <div class="col-6"> Alamat : {{ $internship->industries->address }}</div>
                            <div class="col"> Jurusan : {{ Auth::user()->departement->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    
                     <a href="{{ route('student.add-logbook') }}" class="btn btn-primary" style="margin-top:10px;"> <i class="bi bi-plus"></i> Tambah logbook </a>
                    <a href="#" class="btn btn-secondary flatpickr-date-range" style="margin-top:10px;"> <i class="bi bi-printer"></i> &nbsp; Export PDF </a>
                    {{-- <input type="datetime-local" class="form-control flatpickr-date-range" placeholder="Pilih tanggal.." id="" name=""> --}}
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
                                <th width="25%">Aksi</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($submissions as $key => $submission)
                            @php $i=1 @endphp
                                @foreach($submission->internshipLogbooks->sortByDesc('date') as $logbook)
                                
                            <tr style="font-size:15px;">
                                
                                <td width="1%"> {{ $i++ }} </td>
                                
                                <td width="17%">
                                @php
                                
                                    $date = Carbon::parse($logbook->date)->locale('id') ;
                                    $date->settings(['formatFunction' => 'translatedFormat']);
                                    echo $date->format('D, j F Y');

                                @endphp
                                    
                                </td>

                                <td> {{ $logbook->activity }}</td>
                                <td> <a href="{{ Storage::url('internship/logbook/'. $logbook->attachment_file)}}"
                                    class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;"> <i class="bi bi-eye"></i>  Preview </a>  </td>
                                
                                
                                @if($logbook->note == null || $logbook->note == '')
                                <td style="font-style:italic;"> Tidak ada catatan</td>
                                @else
                                <td style="font-weight:bold;"> {{ $logbook->note }}</td>
                                @endif
                                {{-- <form class="form" method="POST" action="{{ route('logbook.delete', $logbook->id) }}" enctype="multipart/form-data">
                                    @csrf --}}
                                <td width="20%">
                                    <a href="{{ route('logbook.edit', $logbook->id) }}" class="btn btn-info"> Edit </a>
                                    <button type="submit" class="btn btn-danger" id="delete"
                                    onclick="sweetConfirm('/student/logbook/delete/{{ $logbook->id }}', 'Data Logbook')"> Hapus</button>  
                                </td>
                                
                            </tr>
                            
                            @endforeach
                            
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