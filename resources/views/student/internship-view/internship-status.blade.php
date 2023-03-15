@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Status Pengajuan <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> SMK Negeri 3 Yogyakarta</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Status Pengajuan</li>
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
                            <div class="col">Nama : {{ Auth::user()->name }}</div>
                            <div class="col"> NIS : {{ Auth::user()->nis }}</div>
                            <div class="col"> Jurusan : {{ Auth::user()->departement->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th width="7%">No. </th>
                                <th>Industri</th>
                                <th width="20%">Dokumen Penerimaan</th>
                                <th>Status</th>
                                <th width="19%">Advisor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($internshipSubmissions as $key => $submissions )
                            
                            <tr>
                                <td width="4%"> {{ $key+1 }}</td>
                                <td> {{ $submissions->industries->name }} <br>
                                     <span style="font-size:12px;"> {{ $submissions->industries->address }} </span></td>
                                <td>  <a href="{{ Storage::url('internship/letter-of-acceptance/'. $submissions->acceptance_file)}}"
                                    class="badge text-bg-success" target="__blank" style="font-size:14px;"> <i class="bi bi-eye"></i>  Lihat Lampiran </a> </td>
                            @if($submissions->status == 1) 
                                <td> <span class="badge badge-secondary">Waiting</span> </td>
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