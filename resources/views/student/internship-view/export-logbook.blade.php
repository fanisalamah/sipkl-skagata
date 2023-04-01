<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        table.static {
            position: relative;
            border:1px solid black;
        }
    </style>
    <title>Export Logbook</title>
</head>

<body>
    <div class="form-group">
        <p align="center"> <b> Logbook Kegiatan Praktik Kerja Lapangan </b> </p>
        <p align="center">
                @foreach($internships as $key => $internship)
                <table align="center">
                    <tr>
                        <td width="30%">Nama : {{ Auth::user()->name }}&emsp;</td>
                        <td width="40%">Industri : {{ $internship->industries->name }}&emsp;&emsp;<br></td>
                        <td>Advisor : {{ $internship->advisors->name }}  <br></td>
                    </tr>
                    <tr>
                        <td width="30%">NIS : {{ Auth::user()->nis }}&emsp;</td>
                        <td width="40%">Alamat : {{ $internship->industries->address }}&emsp;&emsp;</td>
                        <td>Jurusan : {{ Auth::user()->departement->name }}</td>
                    </tr>
                </table>
                @endforeach
        </p>
        <hr color="grey"> <br>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <th>No</th>
            <th width="13%">Tangal</th>
            <th>Kegiatan</th>
            <th width="17%">Catatan</th>
            
            @php
                $tanggal_awal = Carbon::createFromFormat('d-m-Y', $tanggal[0]);
                $tanggal_akhir = Carbon::createFromFormat('d-m-Y', $tanggal[1]);   
            @endphp
            
            @foreach($submissions as $key => $submission)
                @php $i=1 @endphp
                @foreach($submission->internshipLogbooks->whereBetween('date', [$tanggal_awal, $tanggal_akhir])->sortBy('date') as $logbook)              
            <tr>
                <td align="center">{{ $i++ }}</td>
                <td align="center" width="20%">
                    @php                  
                        $date = Carbon::parse($logbook->date)->locale('id') ;
                        $date->settings(['formatFunction' => 'translatedFormat']);
                        echo $date->format('j F Y');
                    @endphp
                </td>
                <td style="padding:3px 5px;"> {{ $logbook->activity }}</td>
                <td style="padding:3px 5px; "> {{ $logbook->note }}</td>
            </tr>
                @endforeach
            @endforeach
        </table>
        <BR><BR><BR>
        <table align="center" style="width: 95%; position: relative;">
            <tr>
                <td>Mengetahui,<td>     
            </tr>
            <tr>
                <td>Pihak Industri<td>     
            </tr>
            <tr>
                <td><br><br><br><br><td>     
            </tr>
            <tr>
                <td>_________________<td>     
            </tr>
            
        </table>
    </div>

    <script type="text/javascript">
        window.print();

    </script>
    
</body>
</html>