@extends('advisor.advisor-master')
@section('advisor')


<div id="main-content">
                
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Siswa <br>
                        Praktik Kerja Lapangan</h3>
                    <p class="text-subtitle text-muted">Pilih siswa-siswa berikut untuk ditambahkan ke daftar bimbingan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Praktik Kerja Lapangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            
            <div class="card">
                
                <div class="card-body" > 
                
                    <table class="table table-striped" id="" >
                    {{-- <table class="table table-striped" > --}}
                        <!-- FILTER button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle mb-3" data-bs-toggle="dropdown" aria-expanded="false"> 
                        Pilih Jurusan
                        </button>
                        <ul class="dropdown-menu">

                @foreach($departements as $key => $departement)
                        <li><a class="dropdown-item" href="{{ url('/advisor/internship/submission/'. $departement->id) }}"> {{ $departement->name  }}</a></li>                        
                    @endforeach
                        </ul>
                        
                    </div>

                
                    
                        <thead>
                            
                            <tr>
                                <th width="5%">Pilih</th>
                                <th width="25%">Nama Siswa</th>
                                <th width="20%">Jurusan</th>
                                <th width="30%">Industri</th>
                                <th>Bukti Diterima</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if($allDataSub->isEmpty())
                            <tr> <td colspan="5" style="text-align:center;"> Data tidak ditemukan</td></tr>

                            @else
                          @foreach($allDataSub as $key => $submission )
                          <form id="myForm" action="{{ route('update.advisor', ) }}" method="POST">
                            @csrf
                            <tr>
                              
                                <td>
                                    <div class="form-check" >
                                        <div class="custom-control custom-checkbox" >
                                          <input type="checkbox" class="form-check-input form-check-success" name="selected[]" value="{{ $submission->id }}">  
                                        </div>
                                    </div>
                                </td>
                                
                                <td>{{ $submission->students->name}}</td>
                                <td>{{ $submission->students->departement->name }}</td>
                                <td>{{ $submission->industries->name }} <br>
                                    <span style="font-size:12px;"> {{ $submission->industries->address }} </span></td>
                                <td><a href="{{ Storage::url('internship/letter-of-acceptance/'. $submission->acceptance_file)}}" class="badge text-bg-success" target="_blank"> Lihat Lampiran <i class="bi bi-eye"></i> </a> </td>
                                
                               
                                @endforeach
                                @endif
                            </tr>
                            
                        </tbody>
                        
                    </table>
                    
                    @if($allDataSub->isNotEmpty())
                    <button class="btn btn-primary" id="myButton"> Tambahkan</button>
                    @endif
                    </form>
                    
                
                  

                </div>
                
            </div>
            
        </section>
    </div>
    
                 
                </div>
                

@endsection

<script>
    const myForm = document.getElementById('myForm');
    const myButton = document.getElementById('myButton');
    myButton.addEventListener('click', (event) => {
      event.preventDefault();
      const formData = new FormData(myForm);
      fetch(myForm.action, {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
      })
      .catch(error => {
        console.error(error);
      });
    });
  </script>