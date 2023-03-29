@extends('advisor.advisor-master')
@section('advisor')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Monitoring Logbook <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> SMK Negeri 3 Yogyakarta</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Monitoring Logbook</li>
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
                            <div class="col">Nama : {{ $internship->students->name }}</div>
                            <div class="col-6"> Industri : {{ $internship->industries->name }}</div>
                            <div class="col"> Jurusan : {{ $internship->students->departement->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col">NIS : {{ $internship->students->nis }}</div>
                            <div class="col-6"> Alamat : {{ $internship->industries->address }}</div>
                            <div class="col">  Advisor : {{ $internship->advisors->name }} </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr style="font-size:14px;">
                                <th width="5%">No. </th>
                                <th width="19%">Tanggal</th>
                                <th width="35%">Kegiatan</th>
                                <th>Lampiran</th>
                                <th width="25%">Catatan</th>
                                <th> Aksi </th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($logbooks->sortByDesc('date') as $key => $logbook)
                            <tr>
                                
                                <td> {{ $i++ }}</td>
                                <td>  @php
                                
                                    $date = Carbon::parse($logbook->date)->locale('id') ;
                                    $date->settings(['formatFunction' => 'translatedFormat']);
                                    echo $date->format('j F Y');

                                     @endphp
                                </td>
                                <td> {{ $logbook->activity }}</td>
                                <td> <a href="{{ Storage::url('internship/logbook/'. $logbook->attachment_file)}}"
                                    class="badge text-bg-success" target="__blank" style="font-size:14px; padding:10px;"> <i class="bi bi-eye"></i>  Preview </a>  </td>
                            @if($logbook->note == null || $logbook->note == '')
                                <td style="font-style:italic;">Tidak ada catatan</td>
                            @else
                                <td style="font-weight:bold;"> {{ $logbook->note }}</td>
                            @endif
                            <td>  <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                 data-bs-target="#noteModal-{{ $logbook->id }}" style="background-color:#1d8455; border:none;"> <i class="bi bi-plus"></i> </a> </td>
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

                @foreach($logbooks as $logbook)
                <div class="modal fade" id="noteModal-{{ $logbook->id }}" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="noteModalLabel">Tambahkan catatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="{{ route('update.note', $logbook->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                            
                            <div class="form-group">
                                  <div class="col-12">
                                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                  </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>    
                    @endforeach
                    </div>
                
                    </div>
            </div>

@endsection