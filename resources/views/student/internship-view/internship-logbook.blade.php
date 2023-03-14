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
                            <div class="col"> Jurusan : {{ Auth::user()->departement->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col">NIS : {{ Auth::user()->nis }}</div>
                            <div class="col-6"> Alamat : {{ $internship->industries->address }}</div>
                            <div class="col">  Advisor : {{ $internship->advisors->name }} </div>
                            @endforeach
                        </div>
                    </div>
                    
                     <a href="" class="btn btn-primary" style="margin-top:10px;"> <i class="bi bi-plus"></i> Tambah logbook </a>
                    <a href="" class="btn btn-secondary" style="margin-top:10px;">Export </a>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="">
                        
                        <thead>
                            <tr style="font-size:14px;">
                                <th width="7%">No. </th>
                                <th>Tanggal</th>
                                <th width="28%">Kegiatan</th>
                                <th>Lampiran</th>
                                <th width="25%">Catatan</th>
                                <th width="9%">Aksi</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($submissions as $key => $submission)
                            @php $i=1 @endphp
                                @foreach($submission->internshipLogbooks as $logbook)
                                
                            <tr style="font-size:15px;">
                                
                                <td width="1%"> {{ $i++ }} </td>
                                
                                <td width="17%"> {{ $logbook->date }} </td>
                                <td> {{ $logbook->activity }}</td>
                                <td> <a href="{{ Storage::url('internship/logbook/'. $logbook->attachment_file)}}"
                                    class="badge text-bg-success" target="__blank" style="font-size:14px;"> <i class="bi bi-eye"></i>  Lihat Lampiran </a>  </td>
                                
                                
                                @if($logbook->note == null || $logbook->note == '')
                                <td style="font-style:italic;"> Tidak ada catatan</td>
                                @else
                                <td> {{ $logbook->note }}</td>
                                @endif
                                
                                <td width="18%">
                                    <a href="" class="btn btn-info"> Edit </a>
                                        <button type="submit" class="btn btn-danger" id="delete"
                                        onclick="sweetConfirm('/student/delete/', 'Data Siswa')">Hapus</button>                                   
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