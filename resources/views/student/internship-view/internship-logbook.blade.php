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
                    <div class="container">
                        <div class="row">
                            @foreach($internships as $key => $internship)
                            <div class="col">Nama : {{ Auth::user()->name }}</div>
                            <div class="col"> Industri : {{ $internship->industries->name }}</div>
                            <div class="col"> Jurusan : {{ Auth::user()->departement->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col">NIS : {{ Auth::user()->nis }}</div>
                            <div class="col"> Alamat : {{ $internship->industries->address }}</div>
                            <div class="col">  Advisor : {{ $internship->advisors->name }} </div>
                            @endforeach
                        </div>
                    </div>
                    .
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="">
                        <thead>
                            <tr>
                                <th width="7%">No. </th>
                                <th>Industri</th>
                                <th width="28%">Dokumen Penerimaan</th>
                                <th>Status</th>
                                <th width="19%">Advisor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($internshipSubmissions as $key => $submissions ) --}}
                            
                            <tr>
                                {{-- <td width="4%"> {{ $key+1 }}</td>
                                <td> {{ $submissions->industries->name }} <br>
                                     <span style="font-size:12px;"> {{ $submissions->industries->address }} </span></td>
                                <td>  <a href="{{ Storage::url('LetterOfAcceptance/'. $submissions->url_acceptance)}}"
                                    class="btn btn-info" target="__blank"> <i class="bi bi-eye"></i>  Lihat Lampiran </a> </td>
                            @if($submissions->status == 1) 
                                <td> <span class="badge badge-warning">Waiting</span> </td>
                            @endif
                            @if ($submissions->status == 2) 
                                <td> <span class="badge badge-success">Accepted</span> </td>
                            @endif
                            @if ($submissions->status == 3) 
                                <td> <span class="badge badge-danger">Rejected</span> </td>
                            @endif
                                <td>
                                        @if($submissions->advisor_id == 0)
                                        <span class="badge badge-secondary">Not set</span> 
                                            @else
                                            {{ $submissions->advisors->name }}
                                            
                                        @endif
                                </td>
                                <td width="8%">
                                    <button type="button" class="btn btn-danger" id="delete" 
                                    @if($submissions->advisor_id != null) 
                                        <?= 'disabled'?>
                                    @endif
                                    onclick="sweetConfirm('/student/internship/submission/delete/{{ $submissions->id }}', 'Pengajuan PKL')">Hapus</button>                                   
                                </td>
                                 --}}

                            </tr>
                           
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
    
        </section>
    </div>
    
                 
                </div>

@endsection