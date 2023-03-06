@extends('student.student-master')
@section('student')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Status Pengajuan <br>Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted"> Status Pengajuan Praktik Kerja Lapangan</p>
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
                    <table class="table table-striped" id="">
                        <thead>
                            <tr>
                                <th width="7%">No. </th>
                                <th>Nama Industri</th>
                                <th width="28%">Alamat</th>
                                <th>Status</th>
                                <th width="19%">Advisor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($allData as $key => $industri )
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td>{{  $industri->name }}</td>
                                <td>{{  $industri->address }}</td>
                                <td width="18%">
                                    <a href="{{ route('industri.edit', $industri->id) }}" class="btn btn-info"> Edit </a>
                                    <button type="button" class="btn btn-danger" id="delete"
                                    onclick="sweetConfirm('/industries/delete/{{ $industri->id }}', 'Industri')">Hapus</button>                                   
                                </td>
                            </tr>
                            @endforeach --}}

                            @foreach($internshipSubmission as $key => $submission )
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td> {{ $submission->industries->name }}</td>
                                <td> {{ $submission->industries->address }}</td>
                                <td><span class="badge badge-warning">Waiting</span> </td>
                                <td> Belum diset</td>
                                <td>
                                    <a href="" class="btn btn-info"> Edit </a>
                                        <button type="submit" class="btn btn-danger" id="delete"
                                        onclick="sweetConfirm('/', 'Data Siswa')">Hapus</button>                                   
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